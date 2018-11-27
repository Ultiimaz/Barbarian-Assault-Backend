<?php

use App\User;
use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++)
        {
        User::create([
                'id' => Uuid::generate()->string,
                'displayName' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('secret'),

            ]);
        }
 // so i can log in
        User::create([
            'id' => Uuid::generate()->string,
            'displayName' => 'Ultiimaz',
            'email' => 'sven-tjeerd-sma@hotmail.com',
            'password' => bcrypt('secret'),
            'privelege_level' => 5,
        ]);
     }
}
