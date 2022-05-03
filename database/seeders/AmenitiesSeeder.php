<?php

namespace Database\Seeders;

use App\Models\Amenities;
use Illuminate\Database\Seeder;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Amenities::create([
            'id' => '1',
            'service' => 'Swimming Pool',
        ]);
        Amenities::create([
            'id' => '2',
            'service' => 'Game Room',
        ]);
        Amenities::create([
            'id' => '3',
            'service' => 'Home Theater',
        ]);
    }
}
