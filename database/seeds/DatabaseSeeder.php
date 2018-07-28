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
            ['test_skill_name' => 'Photo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['test_skill_name' => 'Listening', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['test_skill_name' => 'Reading', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('test')->insert([
            // Insert test skill photo
            [
                'name'         => 'Part 1',
                'time'         => '00:35', 
                'type_test'    => 'Beginner',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Photo')->first()->id,
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Part 2',
                'time'         => '00:35', 
                'type_test'    => 'Intermediate',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Photo')->first()->id,
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Part 3',
                'time'         => '00:35', 
                'type_test'    => 'Advanced',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Photo')->first()->id,
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            // Insert test skill reading
            [
                'name'         => 'Part 1',
                'time'         => '00:35', 
                'type_test'    => 'Beginner',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Part 2',
                'time'         => '00:35', 
                'type_test'    => 'Intermediate',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Part 3',
                'time'         => '00:35', 
                'type_test'    => 'Advanced',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id,
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            // Insert test skill listening
            [
                'name'         => 'Part 1',
                'time'         => '00:35', 
                'type_test'    => 'Beginner',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Part 2',
                'time'         => '00:35', 
                'type_test'    => 'Intermediate',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Part 3',
                'time'         => '00:35', 
                'type_test'    => 'Advanced',
                'testskill_id' => DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id,
                'created_at'   => Carbon::now(), 
                'updated_at'   => Carbon::now(),
            ],
        ]);
        
        DB::table('content')->insert([
            // Insert content for Reading
            [
                'content'    => 'To: All staff members
                From: Jenny Lee, HR Director
                Subject: Vacation days
                 
                Some changes regarding our company vacation policy here at Johnson and Johnson Incorporated have been made. It is now mandatory for everyone to submit a completed vacation request form at least 2 weeks in advance to get the vacation days you want. This, of course, is the result of the problems we had last year when too many employees took time off in June to see the World Cup. As you know, June was a very busy time for us, and we ran into big problems
                 
                The form is available at the Human Resources Department. You are to fill it out and submit it to your immediate manager to get approval. Once it has been approved, it will also be sent up to me to get my approval. Once it has been approved, it will also be sent up to me to get my approval. In case your manager feels that the timing of your request is not proper, then he will have the authority to deny your request. Therefore, I suggest that everyone hand in your requests early. Thank you for your cooperation
                ',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id],
                    ['name', 'Part 1'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'content'    => '
                NEW York (April 14, 2006) – The famous New York institution, the Winchester Hotel, established in 1887, has just announced its intention to enter the convention market. In a press release today, the hotel’s management announced that it will demolish several adjacent buildings, which it also owns, to make way for a new convention center to be known as the Winchester Center. The design, already approved by the New York Council, involves ultra-modern facilities that will be linked to the existing hotel by an atrium.

                One of New York’s most successful architects, the award-wining Lars Svendersen, has accepted the challenge of creating a beautiful and functional new center while not diminishing the elegance of the existing hotel. “My design intends to complement the beautiful Victorian structure. It is understated, but at the same time elegant. It will also be multi-functional. The atrium will encourage informal meetings, while the new convention center will offer state of the art audio-visual technology, exhibition halls of several sizes and not far away, access to a health club, restaurants and bars. My aim is to conserve the best of a past world while offering a stimulating contrast in the design of the new center”
                ',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id],
                    ['name', 'Part 1'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'content'    => '
                December 1, 2006
                Jessica Robinson
                25 Miller Road
                Sacramento, CA 95852

                Dear Ms. Robinson,

                We recently received an order of your new model Angle Grinder, which your salesman advised us to offer as our of our handyman range. Although we have only had them in stock for the last two weeks, we have already had 3 returns. Customers have complained to us that the locking ring simply does not work properly, which cause the disk to fall off.

                You can imagine our embarrassment. This is truly a dangerous situation, and we suggest that you stop supplying this item immediately. You should also issue recall notices.

                We are returning the entire order. Most of them are still in their boxes. I realize that your power tools are generally of very high quality, so I hope you sort this problem out quickly for the sake of your reputation.

                Please issue us with a credit notice for the entire value of the order.

                Yours faithfully
                Raul Richman
                Store Manager
                ',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id],
                    ['name', 'Part 2'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'content'    => '
                MOVIES
                Rating out of 5
                IN THE MINOTAUR’S MAZE

                This movie belongs to a completely new genre perhaps. It’s a historical horror movie set in ancient Greece, thousands of years ago. Filmed on location in beautiful young people from all over Greece being shipped as sacrifices to the Minotaur. The contrast between the sparkling light of the Greek islands and the darkness of the mysterious Minotaur’s maze is stunning done. A gripping and visually impressive movie.  3 stars +1/2 - Ben King

                SWEAT AND BLOOD

                This Spanish nonfiction movie set during the Civil War deservedly won the critics’ prize at last year’s Toronto Film Festival. Filmed in a naturalistic style, it follows the lives of 4 once-close friends who are separated by the war. Realistic and dramatic, it paints an all-too-believable picture of a world turned upside-down by war. Recommended. (English subtitles ) 4 stars–Jane Stevenson.

                YOUNG HEARTS IN VENICE

                This is an awful attempt at a “romantic drama”. Young hearts in Venice tries to exploit the Venetian setting to give this very ordinary little story a lift but utter fails. Two couples intent on a romantic Venetian holiday accidentally meet. They spend time together and … you guessed it: there are unexpected chemical reactions. The problem is that the script and acting are so poor that we couldn’t care less about any of the protagonists! Not recommended. 1 star – MH

                RED RAIN

                If you enjoy horror movies where city slickers unintentionally get stuck in sinister country towns, this movie is for you. Red rain is a finely crafted effort from one of the masters of schlock-horror, Jim Middleton. There’s nothing new in the plot, but ht special effects, décor, and script are excellent and the acting, mostly by unknown, is also first-rate.  3 stars + ½ - Jan Stevenson
                ',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id],
                    ['name', 'Part 2'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'content'    => '
                September, 25
                Andrew Johnson
                190 Arthur Road
                Chicago, IL 60010

                Dear Mr. Johnson,

                Please accept my apologies on behalf of Tyco Electrical Appliance Supplies. For a reason I really don’t understand, your order was not processed in the usual manner, resulting in a delay in the delivery time.

                No doubt you are anxious to receive your Electric Space Heater as soon as possible before winter really sets in. We have given your order priority status, and you should receive your purchase tomorrow or the following day.

                As a goodwill gesture, I am enclosing in this letter a gift voucher which can use at any Tyco Store.
                Should you experience any further problems, please do not hesitate to contact me personally at 977 0037.

                Yours sincerely,
                Carol Jackman
                Head of sales
                ',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id],
                    ['name', 'Part 3'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'content'    => '
                RICHMOND

                This large Art Deco style apartment is a rare opportunity for the discerning buyer. Situated in a building constructed in 1938, it has original decorative features aplenty and is in perfect condition. It has three bedrooms (2 master-size with river views), a large living area with separate dining room, and a balcony also offering sweeping views. The kitchen and bathroom have been tastefully remodeled without destroying any of the original feel. Located a stone’s throw from vibrant Hawkesbury Road, this apartment combines comfort with rare elegance and convenience. Inspect now!

                · Three bedrooms
                · Dining area
                · Large formal lounge with balcony and sweeping views
                · Ground floor parking
                · Many original architectural features
                · Wood fireplaces

                Please contact Brian Jones at 876 2288 or 555 2288 to arrange an inspection.
                ',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Reading')->first()->id],
                    ['name', 'Part 3'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            // Insert content for Listening
            [
                'content'    => 'Listen and choose the answer',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id],
                    ['name', 'Part 1'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'content'    => 'Listen and choose the answer',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id],
                    ['name', 'Part 2'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'content'    => 'Listen and choose the answer',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Listening')->first()->id],
                    ['name', 'Part 3'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            // Insert content for Photo
            [
                'content'    => 'See the picture and choose the answer',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Photo')->first()->id],
                    ['name', 'Part 1'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'content'    => 'See the picture and choose the answer',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Photo')->first()->id],
                    ['name', 'Part 2'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
            [
                'content'    => 'See the picture and choose the answer',
                'test_id'    => DB::table('test')->where([
                    ['testskill_id', '=', DB::table('test_skill')->where('test_skill_name', '=', 'Photo')->first()->id],
                    ['name', 'Part 3'],
                ])->first()->id,
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ],
        ]);

    }
}
