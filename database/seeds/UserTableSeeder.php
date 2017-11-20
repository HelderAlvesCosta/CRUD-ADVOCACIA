<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         App\User::create([
         User::create([

                   'name' => 'Carlos Ferreira',
                   'email' => 'carlos@especializati.com.br',
                   'password' => bcrypt('123456')           
                   ]);
    }
}
