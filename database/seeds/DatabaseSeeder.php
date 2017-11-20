<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserTableSeeder::class);

        /*    App\User::create([
                      'name' => 'Carlos Ferreira',
                      'email' => 'carlos@especializati.com.br',
                      'password' => bcrypt('123456')           
                      ]);*/
        
    }
}
