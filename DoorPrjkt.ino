#define RELAY1  7
#include <Servo.h>

Servo myservo;
const int buttonPin = 0;
const int servoPin = 12;
const int lock = 5;
const int unlock = 90;

 
void setup() {
  // initialize serial:
  Serial.begin(9600);
  myservo.attach(servoPin);
  myservo.write(lock);
  pinMode(servoPin, OUTPUT);
  pinMode(RELAY1, OUTPUT);
}
void loop() {
   // Recieve data from Node and write it to a String
    char inChar = (char)Serial.read();
        if(inChar == 'v') // end character for locking
      {
       Serial.println("U");
       digitalWrite(RELAY1,1);
       Serial.println("Lock open");
       digitalWrite(servoPin, HIGH);
       myservo.write(unlock);
       delay (3000); 
       myservo.write(lock);
      }
    else if(inChar == 'l') // end character for locking
      {
       Serial.println("U");
       digitalWrite(RELAY1,1);
       Serial.println("Lock open");
       digitalWrite(servoPin, HIGH);
       myservo.write(unlock);
       delay(10000);
       digitalWrite(RELAY1,1);
       delay(10000); 
       digitalWrite(RELAY1,1);
       delay (10000); 
       digitalWrite(RELAY1,1);
       delay(10000); 
       digitalWrite(RELAY1,1);
       delay (10000); 
       digitalWrite(RELAY1,1);
       delay(10000);
       digitalWrite(RELAY1,1);
       delay(10000);
       myservo.write(lock); 
       digitalWrite(RELAY1,1);// Turns ON
     }
     else {
      digitalWrite(RELAY1,0); 
       myservo.write(lock);   
     }  
}
