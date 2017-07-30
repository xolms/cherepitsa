<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $pass = str_random(10);
        DB::table('users')->insert(
            [
                'name' => 'Кузовов Степан',
                'email' => 'xolms111@ya.ru',
                'password' => bcrypt($pass)
            ]
        );
        echo $pass;
        DB::table('users')->insert(
            [
                'name' => 'Алена Брежнева',
                'email' => 'trishforever@mail.ru',
                'password' => bcrypt('Fktyrf2040670')
            ]
        );

    }
}
