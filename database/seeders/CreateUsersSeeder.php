<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'admin',
               'email'=>'admin@admin.com',
               'password'=> bcrypt('admin'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
