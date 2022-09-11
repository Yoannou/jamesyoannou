<!DOCTYPE html prefix="og: http://ogp.me/ns#">

<html>
    <head>
		<title>Microcontroller Zone</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<meta property="og:type" content="website">
        <meta property='og:image' content='http://wwww.jamesyoannou.com/resources2/img/compressedpng/holo3-min.png'/>
        <meta property='og:title' content='James Yoannou Arduino'/>
        <meta property='og:url' content='//www.jamesyoannou.com/projects/arduino/arduino.php'/>


        <link rel="stylesheet" href="../../resources2/css/general.css">
        <link rel="stylesheet" href="./arduino.css">
        <link rel="stylesheet" href="https://use.typekit.net/yom0nhp.css">
    </head>
    <body>
        <header>
            <div class="video-container">
                <div class="background-filter"></div>
                <video id="header-video" width="100%" muted autoplay loop>
                    <source id="landing-vid" src="media/headline720pCOMP.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video> 
                <div class="name-wrapper">
                    <h1>Microcontroller Projects</h1>
                </div>
            </div>
        </header>
        <main>
            <div class="body-text overview">
                <p>Robots are cool.</p>
                <p>Below are some C-based projects I put together for my DFRobot Romeo AOI Controller.
                It's essentailly an Arduino UNO with a motor driver, and can run the same
                source code.</p>
				<p>This is mostly preparation for my planned wine-serving robot.</p>
            </div>
            <div class="project-pair">
                <div class="project-text binary-counter">
                    <h2>Binary LED Counter</h2>
                    <p>This program translates a binary value into a sequence of illuminated LEDs.<br>
                    Can be used as a very niche 8-bit record-keeping device (for nerds only).</p>
                    <div class="project-video video-container">
                        <video width="100%" controls preload="none" poster="./media/binary-comp.png">
                            <source id="binary-vid" src="media/binary-vid-comp.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>                     
                    </div>
                    <div class="source-code-wrapper">
                        <!-- DO THIS WITH JAVASCRIPT -->
                        <pre>
/*
Binary LED Counter
James Yoannou, 2019

Using momentary switches with state machines to increment and decrement a binary value, displayed by LEDs.

--------------------------------------------------------------
CONNECTION DIAGRAM:

Atmega328p:		Romeo Board:	I/O Trainer:	Component:

LEDS:
PD2 ->			D2 ->			JP3_1 ->		D1A
PD3 ->			D3 ->			JP3_2 ->		D1B
PD4 ->			D4 ->			JP3_3 ->		D1C
PD5 ->			D5 ->			JP3_4 ->		D1D
PD6 ->			D6 ->			JP3_5 ->		D1E
PD7 ->			D7 ->			JP3_6 ->		D1F
PB0 ->			D8 ->			JP3_7 ->		D1G
PB1 ->			D9 ->			JP3_8 ->		D1H

Switches:
PB3 ->			D11	->			JP2_6 ->		S2
PB4 ->			D12	->			JP2_5 ->		S1
--------------------------------------------------------------

*/

#include &lt;util/delay.h&gt;
#include &lt;avr/io.h&gt;
#define F_CPU 16000000UL

// Returns true if value of bit is 1:
#define BIT_IS_SET(byte, bit) (byte & (1 << bit))
// Returns true if value of bit is 0:
#define BIT_IS_CLEAR(byte, bit) (!(byte & (1 << bit)))

void pause_ms(uint16_t ms);
int btt1 = 0;
int btt2 = 0;
// Count could also be a uint8_t (8-bit) to save space, and will automatically overflow:
int count = 0;

int main(void)
{
	// Ports
	DDRD = 0b11111100;
	DDRB = 0b00000011;
	PORTD = 0b00000000;
	PORTB = 0b00011000;

	while (1)
	{
		/*Set each LED to change according to count*/
		PORTD = count << 2;

		// Bit-twiddling is necessary for PORTB to avoid changing the whole port:
		if (BIT_IS_SET(count, 6))
			PORTB |= (1 << 0);
		else
			PORTB &= ~(1 << 0);
		if (BIT_IS_SET(count, 7))
			PORTB |= (1 << 1);
		else
			PORTB &= ~(1 << 1);


		/*State machines to instantiate button presses: */

		// STATE MACHINE S1:
		if (btt1 == 0) {
			// Check for press: value of 0 means the button is being pressed:
			if (BIT_IS_CLEAR(PINB, PB3)) {
				btt1 = 1; // We hold here, increment on release (1)!
			}
		}
		else {
			// Now we take action if the button is released:
			if(BIT_IS_SET(PINB, PB3)){
				btt1 = 0;
				if (count == 0)
					count = 255;
				else
					count--;
				// Quick pause to stop double-input:
			}
		}

		// STATE MACHINE S2:
		if (btt2 == 0) {
			if (BIT_IS_CLEAR(PINB, PB4)) {
				btt2 = 1;
			}
		}
		else {
			if (BIT_IS_SET(PINB, PB4)) {
				btt2 = 0;
				if (count == 255)
					count = 0;
				else
					count++;
			}
		}
		pause_ms(5);
	}
	return 0;
}

// For smooth button pressing
void pause_ms(uint16_t ms)
{
	uint16_t i;
	for (i = 0; i < ms; i++)
		_delay_ms(5);
}
                            
                        
                        </pre>
                    </div>
                </div>
                <div class="project-text theremin">
                    <h2>Theremin</h2>
                    <p>Input values from a ranged sensor can be used in all sorts of creative ways.<br>
                    As a musician, there was only one way for me: To make some noise.</p>
                    <div class="project-video video-container">
                        <video width="100%" controls preload="none" poster="./media/theremin-comp.png">
                            <source id="theremin-vid" src="media/theremin-comp.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="source-code-wrapper">
                        <!-- DO THIS WITH JAVASCRIPT -->
                        <pre>
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

#include &lt;avr/io.h&gt;
#include &lt;avr/interrupt.h&gt;
#include &lt;util/delay.h&gt;
#include &lt;stdlib.h&gt;
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
                        </pre>
                    </div>
                </div>
            </div>
        </main>
        <div class="bottom">
            <a href="/index.php" class="btn">To main website</a>
        </div>
		<footer>
            <div class="footer-tab">
                James Yoannou 2021. All rights reserved.
            </div>
        </footer>
    </body>
	<script src="./content.js"></script>
</html> 