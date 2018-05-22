<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
        DB::table('users')->insert([[
            'name' => 'Amanda',
            'email' => 'vominhthu@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '01246582247',
            'address' => '236B Le Van Sy',
            'gender' => 'Female',
            'dob' => '1996/01/24',
            'role' => '1',
            ],
            [
            'name' => 'Jane',
            'email' => 'aaa@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '01246582246',
            'address' => '236B Le Van Sy',
            'gender' => 'Female',
            'dob' => '1996/01/23',
            'role' => '1',
            ]]
        );
    }
}
