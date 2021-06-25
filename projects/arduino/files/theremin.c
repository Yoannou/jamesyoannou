/*
Theremin
James Yoannou, 2019

Creating a theremin out of a buzzer using the SHARP distance sensor.

When the switch is held, an interrupt is triggered and:
We convert the sensor's return voltage into the desired frequency for the buzzer PWM signal.

When the switch is not held, we exit the interrupt loop and:
Shut down the buzzer in the main method.

-------------------------------------------------------------
CONNECTION DIAGRAM:
Atmega328P:	Romeo Board:	I/O Trainer Board	Component	

PB1 ->		D9 ->			JP4_2 ->			BZ1
PD2 ->		D2 ->			JP2_5 ->			S1
PC5 ->		A5 ->			----- ->			SHARP Sensor
-------------------------------------------------------------

*/

#include <avr/io.h>
#include <avr/interrupt.h>
#include <util/delay.h>
#include <stdlib.h>
#define F_CPU 16000000UL
#define BAUD 9600
#define PRESCALE 8
#define BIT_IS_SET(byte, bit) (byte & (1 << bit))
#define BIT_IS_CLEAR(byte, bit) (!(byte & (1 << bit)))

void initTimer(void);
void initInterrupts(void);

void initADC(void);
uint16_t analog(uint8_t channel);
uint16_t medFilter(uint16_t signal, uint16_t array[11]); // This caused delay issues
float map(float v, float a, float b, float c, float d); // Mike's mapping function

void initUART(unsigned int baud);
void transmitByte(unsigned char data);
void printDec(int num);
void transmitString(char* StringPtr);

// For my abandonned filter function (unused):
uint16_t medArray[11];
uint8_t count = 0;
uint16_t median;


uint16_t converter; // To convert the signal to a 0-4000 value.


int main(void)
{
	initInterrupts();
	initUART(BAUD);
	initTimer();
	initADC();

	DDRD = 0;
	PORTD = (1 << PD2);
	// Switch S1 will trigger interrupt when pressed

	while (1)
	{
		DDRB = 0;
		// Clear buzzer output (mute)
	}
	return 1;
}


void initTimer(void)
{
	TCCR1A = (1 << COM1A1) | (1 << WGM11);
	// Set timer/counter properties for fast PWM
	TIMSK1 = (1 << ICIE1);
	// Ensure ICR1 is used as TOP
	ICR1 = 0;
	OCR1A = (ICR1 / 2);
	// 50% duty cycle
	TCCR1B = (1 << WGM13) | (1 << WGM12) | (1 << CS11);
	// CS11 sets clock prescalar to 8 and starts timer
}


void initInterrupts(void)
{
	EIMSK |= (1 << INT0);
	// Turns PD2 int INT0, enables interrupts on it
	EICRA |= (1 << ISC01);
	// Set INT0 to trigger when high -> low (switch press)
	sei();
	// Enables all external interrupts
}


// map number v from range a-b to range c-d
float map(float v, float a, float b, float c, float d)
{
	return (v - a) * (d - c) / (b - a) + c;
}


// Interrupt on switch press:
ISR(INT0_vect)
{
	// Run buzzer tone loop until switch is released:
	while (BIT_IS_CLEAR(PIND, PD2))
	{
		//median = medFilter(analog(5), medArray);
		// CAUSED DELAYS - NEED FASTER FILTER. Will use raw analog(5) value for now

		DDRB |= (1 << PB1);
		PORTB |= (1 << PB1);
		// Set buzzer output
		converter = 4000 - (map((float)analog(5), 0.0, 620.0, 0.0, 4000.0));
		// Map raw signal value to 0-4000 range, invert it (for theremin direction)
		ICR1 = ((F_CPU / converter) / PRESCALE);
		OCR1A = (ICR1 / 2);
		// Change frequency, 50% square duty cycle
		printDec(converter);
		_delay_ms(10);
	}
}


ISR(TIMER1_CAPT_vect)
{
}


/***********************************************************************************
 HELPER FUNCTIONS
***********************************************************************************/


void swap(uint16_t* a, uint16_t* b)
{
	uint16_t temp = *a;
	*a = *b;
	*b = temp;
}

// Improved filter function:
uint16_t medFilter(uint16_t signal, uint16_t array[11])
{
	array[count] = signal;
	int i, j, min;
	for (i = 0; i < 11-1; i++) {
		min = i;
		for (j = i + 1; j < 11; j++) {
			if (array[j] < array[min])
				min = j;
		}
		swap(&array[min], &array[i]);
	}
	count++;
	if (count == 11)
		count = 0;

	return array[6];
}

void initADC(void)
{
	ADCSRA |= (1 << ADEN);
	ADMUX |= (1 << REFS0);
	ADCSRA |= (1 << ADPS2) | (1 << ADPS1);
	ADCSRA |= (1 << ADSC);
}

uint16_t analog(uint8_t channel)
{
	ADMUX &= 0xF0;
	ADMUX |= channel;
	ADCSRA |= (1 << ADSC);
	
	while (ADCSRA & (1 << ADSC));
	return ADC;
}

void initUART(unsigned int baud)
{
	UCSR0A = (1 << U2X0);

	// Enable interrupts each transmission:
	//USCR0B = (1 << TXCIE0);

	unsigned int ubrr = F_CPU / 8 / baud - 1;
	UBRR0H = (unsigned char)(ubrr >> 8);
	UBRR0L = (unsigned char)ubrr;

	UCSR0B = (1 << TXEN0);
	UCSR0C = (1 << UCSZ00) | (1 << UCSZ01);
}


void transmitByte(unsigned char data)
{
	while (!(UCSR0A & (1 << UDRE0)));
	UDR0 = data;
}


void printDec(int num) {
	char stringNumber[20];
	sprintf(stringNumber, "%d\r\n", num);
	transmitString(stringNumber);

}


void transmitString(char* StringPtr) {
	while (*StringPtr != 0x00) {
		transmitByte(*StringPtr);
		_delay_ms(10);
		StringPtr++;
	}
}