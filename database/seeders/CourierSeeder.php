<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create default couriers
        $courier = new Courier();
        $courier->name = 'RedEx';
        $courier->save();

        $courier = new Courier();
        $courier->name = 'Pathao';
        $courier->save();

        $courier = new Courier();
        $courier->name = 'Paperfly';
        $courier->save();
    }
}
