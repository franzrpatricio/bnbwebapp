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
            'service' => 'Play Area',
        ]);
        Amenities::create([
            'id' => '3',
            'service' => 'Home Theater',
        ]);
        Amenities::create([
            'id' => '4',
            'service' => 'Kitchen',
        ]);
        Amenities::create([
            'id' => '5',
            'service' => 'Laundry Area',
        ]);
        Amenities::create([
            'id' => '6',
            'service' => 'Garage',
        ]);
        Amenities::create([
            'id' => '7',
            'service' => 'Balcony',
        ]);
        Amenities::create([
            'id' => '8',
            'service' => 'Fireplace',
        ]);
        Amenities::create([
            'id' => '9',
            'service' => 'Yard',
        ]);
        Amenities::create([
            'id' => '10',
            'service' => 'Mini-Gym',
        ]);
        Amenities::create([
            'id' => '11',
            'service' => 'Audio Visual Room',
        ]);
    }
}
