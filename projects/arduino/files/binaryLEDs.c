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

#include <util/delay.h>
#include <avr/io.h>
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