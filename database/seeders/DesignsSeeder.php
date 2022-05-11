<?php

namespace Database\Seeders;

use App\Models\Designs;
use Illuminate\Database\Seeder;

class DesignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Designs::create([
            'id' => '1',
            'design' => 'Barouque',
        ]);
        Designs::create([
            'id' => '2',
            'design' => 'Modern',
        ]);
        Designs::create([
            'id' => '3',
            'design' => 'Classical',
        ]);
    }
}
