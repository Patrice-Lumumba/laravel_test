<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entries = [

            [
                'firstname' => 'Admin',
                'lastname' => 'AdminDev',
                'tel' => '6884874154',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'admin',
                'status' => 'active',
                'check_in' => '2023-07-31',
                'check_out' => '2023-07-31',
            ],

            [
                'firstname' => 'User',
                'lastname' => 'Userdev',
                'tel' => '6859874154',
                'email'=>'user@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'user',
                'status' => 'active',
                'check_in' => '2023-07-31',
                'check_out' => '2023-07-31',
            ],
        ];

        $tableName = (new User())->getTable();
        foreach ($entries as $entry) {
            DB::table($tableName)->insert($entry);
        }
    }
}
