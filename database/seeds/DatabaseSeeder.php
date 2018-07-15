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
        $this->call(UsersTableSeeder::class);
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
        DB::table('question')->insert([[
            'question' => 'The assets of Marble Faun Publishing Company_____ last quarter when one of their main local distributors went out of business.',
            'score' => '10',
            'content_id' => '1',
            ],
            [
            'question' => 'lndie film director Luke Steele will be in London for the premiere of ____ new movie.',
            'score' => '10',
            'content_id' => '1',
            ],
            [
            'question' => 'Laboratory employees are expected to wear a name tag and carry identification at ___ times.',
            'score' => '10',
            'content_id' => '1',
            ],
            [
            'question' => 'The latest training ____ contains tips on teaching a second language to international students.',
            'score' => '10',
            'content_id' => '1',
            ],
            [
            'question' => 'Once you have your resume with references and ——-, please submit it to the Human Resources Department on the 3rd floor.',
            'score' => '10',
            'content_id' => '1',
            ],
            ]
        );
    }
}
