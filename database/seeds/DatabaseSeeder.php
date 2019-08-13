<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->command->info('Users table seeded!');

        $this->call(TweetsTableSeeder::class);
        $this->command->info('Tweets table seeded!');

        $this->call(FollowerFollowingTableSeeder::class);
        $this->command->info('Follower_Following table seeded!');

    }
}
