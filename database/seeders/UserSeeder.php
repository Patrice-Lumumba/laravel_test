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
                'gender_id' => 1,
                'tel' => '6884874154',
                'firstname' => 'dev',
                'lastname' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('123'),
                'is_admin' => 1,
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
