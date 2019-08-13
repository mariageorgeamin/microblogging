<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class FollowerFollowingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('follower_following')->delete();
        $faker = Faker::create();

        $userIds = DB::table('users')->pluck('id')->all();

        //Seed user_role table with 20 entries
        foreach ((range(1, 20)) as $index) {
            DB::table('follower_following')->insert(
                [
                    'follower_id' => $userIds[array_rand($userIds)],
                    'following_id' => $userIds[array_rand($userIds)],
                ]
            );
        }
    }
}
