
## Retrieve all Sensors
GET https://iot.enoch.systems/sensors/public/api/sensors

## Retrieve Sensor by id
GET https://iot.enoch.systems/sensors/public/api/sensor/1

## Delete Sensor by id
DELETE https://iot.enoch.systems/sensors/public/api/sensor/3

## Create Sensor record
POST https://iot.enoch.systems/sensors/public/api/sensor
Content-Type application/json

Single record
```
{
    "master_id": "SENSORMASTER1",
    "sensornode_id": "1",
    "contactsensor_state": "Low",
    "battery_voltage": "4.64"
}
```

Multiple records
```
{
    "data": [
        {
            "master_id": "SENSORMASTER1",
			"sensornode_id": "2",
			"contactsensor_state": "Low",
			"battery_voltage": "4.63"
        },
        {
            "master_id": "SENSORMASTER1",
			"sensornode_id": "3",
			"contactsensor_state": "High",
			"battery_voltage": "4.62"
        },
        {
            "master_id": "SENSORMASTER1",
			"sensornode_id": "4",
			"contactsensor_state": "Low",
			"battery_voltage": "4.61"
        },
        {
            "master_id": "SENSORMASTER1",
			"sensornode_id": "5",
			"contactsensor_state": "High",
			"battery_voltage": "4.60"
        }
    ]
}
```
