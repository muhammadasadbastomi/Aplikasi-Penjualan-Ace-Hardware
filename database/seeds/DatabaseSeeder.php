<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Supplier::class, 3)->create()->each(function ($supplier) {

            // Seed the relation with 10 members
            $barangs = factory(App\Barang::class, 10)->make();
            $supplier->barang()->saveMany($barangs);
        });

        DB::table('users')->insert([
            'uuid' => Str::random(36),
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
