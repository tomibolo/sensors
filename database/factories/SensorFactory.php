<?php

use Faker\Generator as Faker;

$factory->define(App\Sensor::class, function (Faker $faker) {
    return [
        'master_id' => $faker->text(20),
        'sensornode_id'  => $faker->text(5),
        'contactsensor_state'  => $faker->text(8),
        'battery_voltage'  => $faker->randomFloat(4,0,10)
    ];
});
