<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Factory as FakerID;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    $faker = FakerID::create('id_ID');
    return [
        'uuid' => $faker->uuid,
        'supplier' => $faker->name,
        'alamat' => $faker->address,
        'kontak' => $faker->e164PhoneNumber,
    ];
});
