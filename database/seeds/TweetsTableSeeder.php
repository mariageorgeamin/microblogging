<?php

use App\Tweet;
use Illuminate\Database\Seeder;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tweets')->delete();

        Tweet::create(array('user_id' => '1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ornare volutpat diam, in vehicula massa volutpat placerat. Suspendisse potenti. Quisque sed consequat urna, in hendrerit felis. In hac habitasse platea dictumst. Nunc consequat, elit nec tristique pulvinar, elit eros mollis justo, tincidunt ultrices nulla mi ac libero. In eu molestie est.'));

        Tweet::create(array('user_id' => '1',
            'description' => 'Duis maximus quam non finibus ultricies. Curabitur eget eros libero.'));

        Tweet::create(array('user_id' => '2',
            'description' => 'Aenean efficitur dolor eu justo luctus convallis sit amet ac sem. Praesent iaculis diam eros, sed scelerisque neque ultrices eu.'));

        Tweet::create(array('user_id' => '2',
            'description' => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
            أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا يوت انيم أد مينيم فينايم,كيواس نوستريد
            أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيو .'));

        Tweet::create(array('user_id' => '3',
            'description' => 'Ut et elementum tellus, eget accumsan augue'));

        Tweet::create(array('user_id' => '3',
            'description' => 'lis auctor gravida vitae vel erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec male'));

        Tweet::create(array('user_id' => '3',
            'description' => 'vallis sit amet ac sem. Praesent iaculis diam eros, sed scelerisque neque ultrices eu. Donec sagittis et elit quis eleifend. Nulla sollicitudin, massa vitae lacinia porta,'));

        Tweet::create(array('user_id' => '4',
            'description' => 'm tellus, eget accumsan au'));

        Tweet::create(array('user_id' => '5',
            'description' => 'Uts, eget accumsan augue'));

        Tweet::create(array('user_id' => '5',
            'description' => 'Ut et elementum accumsan augue'));

        Tweet::create(array('user_id' => '5',
            'description' => 'Ut et elementum tellus, m tellus, eget accumsan au eget accumsan augue'));

        Tweet::create(array('user_id' => '6',
            'description' => 'Ut et elemibh quis felis auctor gravida vitae vel erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec malesuada tortor, at luctus magna. Aenentum tellus, eget accumsan augue'));
    }
}
