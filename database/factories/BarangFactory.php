<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Factory as FakerID;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    $faker = FakerID::create('id_ID');
    return [
        'uuid' => $faker->uuid,
        'nama_barang' => $faker->name,
        'kode_barang' => $faker->number(20),
        'satuan' => 'buah',
        'departement' => $faker->word(30),
        'harga_jual' => $faker->numberBetween($min = 120000, $max = 4000000),
        'stok_tersedia' => $faker->numberBetween($min = 0, $max = 1000),
        'kategori' => $faker->numberBetween($min = 1, $max = 7),
        'keterangan' => $faker->word(520),
    ];
});
