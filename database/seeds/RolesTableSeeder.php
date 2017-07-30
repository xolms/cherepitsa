<?php

use Illuminate\Database\Seeder;
use App\Role;
use Carbon\Carbon;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Role $role, Carbon $carbon)
    {
        $role->create(
            [
                    'name' => 'user',
                    'name_rus' => 'Пользователь',
                    'created_at' => $carbon->now(),
                    'updated_at' => $carbon->now()

            ]
        );
        $role->create(
            [
                'name' => 'admin',
                'name_rus' => 'Администратор',
                'created_at' => $carbon->now(),
                'updated_at' => $carbon->now()

            ]
        );

    }
}
