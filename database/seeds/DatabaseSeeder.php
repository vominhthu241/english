<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\TestSkill;
use App\Test;
use App\Content;
use App\Question;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'       => 'user1',
                'email'      => 'user1@gmail.com',
                'password'   => bcrypt('123456'),
                'phone'      => '123456789',
                'address'    => 'user1 address',
                'gender'     => 'Male',
                'dob'        => '1996/11/12',
                'role'       => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], 
            [
                'name'       => 'user2',
                'email'      => 'user2@gmail.com',
                'password'   => bcrypt('123456'),
                'phone'      => '987654321',
                'address'    => 'user2 address',
                'gender'     => 'Female',
                'dob'        => '1996/12/12',
                'role'       => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'Admin',
                'email'      => 'admin@gmail.com',
                'password'   => bcrypt('admin'),
                'phone'      => '123456789',
                'address'    => 'admin address',
                'gender'     => 'Male',
                'dob'        => '1996/11/11',
                'role'       => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], 
        ]);

        DB::table('test_skill')->insert([
            ['test_skill_name' => 'Listening', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['test_skill_name' => 'Reading', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('test')->insert([
            // Insert test Incomplete Sentence - Reading
            [
                'name'         => 'Incomplete Sentence',
                'time'         => '00:35', 
                'type_test'    => 'Beginner',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Incomplete Sentence',
                'time'         => '00:35', 
                'type_test'    => 'Intermediate',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Incomplete Sentence',
                'time'         => '00:35', 
                'type_test'    => 'Advanced',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            // Insert test Text Completion - Reading
            [
                'name'         => 'Text Completion',
                'time'         => '00:35', 
                'type_test'    => 'Beginner',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Text Completion',
                'time'         => '00:35', 
                'type_test'    => 'Intermediate',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Text Completion',
                'time'         => '00:35', 
                'type_test'    => 'Advanced',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            // Insert test Single Passage - Reading
            [
                'name'         => 'Single Passage',
                'time'         => '00:35', 
                'type_test'    => 'Beginner',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Single Passage',
                'time'         => '00:35', 
                'type_test'    => 'Intermediate',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Single Passage',
                'time'         => '00:35', 
                'type_test'    => 'Advanced',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            // Insert test Double Passage - Reading
            [
                'name'         => 'Double Passage',
                'time'         => '00:35', 
                'type_test'    => 'Beginner',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Double Passage',
                'time'         => '00:35', 
                'type_test'    => 'Intermediate',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Double Passage',
                'time'         => '00:35', 
                'type_test'    => 'Advanced',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            // Insert test Photo - Listening
            [
                'name'         => 'Photo',
                'time'         => '00:35', 
                'type_test'    => 'Beginner',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Photo',
                'time'         => '00:35', 
                'type_test'    => 'Intermediate',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Photo',
                'time'         => '00:35', 
                'type_test'    => 'Advanced',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            // Insert test Question-Reponse - Listening
            [
                'name'         => 'Question-Reponse',
                'time'         => '00:35', 
                'type_test'    => 'Beginner',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Question-Reponse',
                'time'         => '00:35', 
                'type_test'    => 'Intermediate',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Question-Reponse',
                'time'         => '00:35', 
                'type_test'    => 'Advanced',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            // Insert test Short Conversation - Listening
            [
                'name'         => 'Short Conversation',
                'time'         => '00:35', 
                'type_test'    => 'Beginner',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Short Conversation',
                'time'         => '00:35', 
                'type_test'    => 'Intermediate',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Short Conversation',
                'time'         => '00:35', 
                'type_test'    => 'Advanced',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            // Insert test Short Talk - Listening
            [
                'name'         => 'Short Talk',
                'time'         => '00:35', 
                'type_test'    => 'Beginner',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Short Talk',
                'time'         => '00:35', 
                'type_test'    => 'Intermediate',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Short Talk',
                'time'         => '00:35', 
                'type_test'    => 'Advanced',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'status'       => '1',
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
        ]);
    }
}
