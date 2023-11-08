#include <LiquidCrystal_I2C.h>
#include <DHT.h>
#include <Arduino.h>
#define DHTPIN 14
#define DHTTYPE DHT11
DHT dht (DHTPIN, DHTTYPE);

const int sensorPin = 15;
const int lightsPin = 13; // Pin de las luces (directamente alimentadas por el ESP32)
const int fanRelayPin = 25; // Pin del relé del ventilador
const int waterPumpRelayPin = 32; // Pin del relé de la bomba de agua

int lcdColumns = 16;
int lcdRows = 2;
LiquidCrystal_I2C lcd(0x27, lcdColumns, lcdRows);

const int tempThresholdLow = 10; // Umbral de temperatura inferior
const int tempThresholdHigh = 15; // Umbral de temperatura superior

const int soilHumidityThresholdLow = 50; // Umbral de humedad del suelo inferior
const int soilHumidityThresholdHigh = 70; // Umbral de humedad del suelo superior


void setup() {
  Serial.begin(115200);
   pinMode(sensorPin, INPUT);
  Serial.println("DHT11 test!");
  dht.begin();
  // initialize LCD
  lcd.init();
  // turn on LCD backlight
  lcd.backlight();
}

void loop() { float humedad = dht.readHumidity();
  float temperatura = dht.readTemperature();

  int sensorValue = analogRead(sensorPin);

  float voltage = sensorValue * (5.0 / 1023.0);
  float humedadsuelo = (voltage - 1.1) * 100.0 / 1.4;


  if (isnan(humedad) || isnan(temperatura)) {
    Serial.println("fallo al leer el sensor DTH!");
    return;
  }
  Serial.print("Humedad: ");
  Serial.print(humedad);
  Serial.print(",Temperatura: ");
  Serial.print(temperatura);
  Serial.println("*c");
  Serial.print("Lectura del sensor:(%): ");
  Serial.println(humedadsuelo);



  // Actualizar la pantalla LCD
  lcd.setCursor(0, 0);
  lcd.print("HUM:" );
  lcd.setCursor(4, 0);
  lcd.print( humedad);
  lcd.setCursor(6, 0);
  lcd.print( " TEM: ");
  lcd.setCursor(15, 0);
  lcd.print( " *c ");
  lcd.setCursor(11, 0);
  lcd.print( temperatura);
  lcd.setCursor(0, 1);
  lcd.print(" SUELO :");
  lcd.setCursor(8, 1);
  lcd.print(humedadsuelo);

  if (temperatura < tempThresholdLow) {
    digitalWrite(lightsPin, HIGH); // Enciende las luces
    //  lcd.setCursor(0, 0);
    Serial.println("Luces ON     "); // Mensaje para encendido
    //delay(5000); // Espera 5 segundos
  } else if (temperatura > tempThresholdHigh) {
    digitalWrite(lightsPin, LOW); // Apaga las luces
    digitalWrite(fanRelayPin, HIGH); // Enciende el ventilador
    //lcd.setCursor(0, 0);
    Serial.println("Ventilador ON     "); // Mensaje para encendido
    //delay(5000); // Espera 5 segundos
  } else {
    digitalWrite(lightsPin, LOW); // Apaga las luces
    digitalWrite(fanRelayPin, LOW); // Apaga el ventilador
    //lcd.setCursor(0, 0);
    Serial.println("Luces OFF     ");
    Serial.println("ventilador off     ");// Mensaje para apagado
    //delay(5000); // Espera 5 segundos
  }

  // Control de la bomba de agua en función de la humedad del suelo
  if (humedad < soilHumidityThresholdLow) {
    digitalWrite(waterPumpRelayPin, HIGH); // Enciende la bomba de agua
    //  lcd.setCursor(0, 1);
    Serial.println("bomba ON     "); // Mensaje para encendido
    //  delay(5000); // Espera 5 segundos
  } else if (humedad > soilHumidityThresholdHigh) {
    digitalWrite(waterPumpRelayPin, LOW); // Apaga la bomba de agua
    // lcd.setCursor(0, 1);
    Serial.println("bomba OFF     "); // Mensaje para apagado
    delay(5000); // Espera 5 segundos
  }

  delay(5000); // Espera 5 segundos antes de la próxima lectura


  return;
}
