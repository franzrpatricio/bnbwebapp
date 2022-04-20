<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // note: ilagay nyo na lang totoong gmail kapag sinample na yung forgot pass
        User::create(
            [
                'id' => '1',
                'name' => 'Renz Bana',
                'email' => 'rBana@gg.com',
                'password' => '$2y$10$8.fbJ0ZXgeyVbWGhVYFsy.fWWt3UIVHnusX5iGCx.oqDP3xCPt9NW'
                #adm1nrenz
            ]
        );
        User::create(
            [
                'id' => '2',
                'name' => 'AJ Cotoner',
                'email' => 'ajCotoner@gg.com',
                'password' => '$2y$10$ulUHE3QrxwbkpjiaKqxklONR39odBZYD5sIslHTVmhovOLc59YJL.'  
                #admin2aj    
            ]
        );
        User::create(
            [
                'id' => '3',
                'name' => 'Trisha Ellorda',
                'email' => '3shaEllorda@gg.com',
                'password' => '$2y$10$FBW2OyDcoRk4iYTidtdpDu1d0waCINDGpYq9YPyEuotX0NcVzMvYO'  
                #admin3sha
            ]
        );
        User::create(
            [
                'id' => '4',
                'name' => 'Franz Patricio',
                'email' => 'fgPatricio@gg.com',
                'password' => '$2y$10$8K/olc27rSPi6mIuJdizW.8QJu1yA7rAMoqzXrXLWKKtdrX/hLopm'    
                #adminfr4nz   
            ]
        );
    }
}
