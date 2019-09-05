<?php


namespace App;


interface UserInterface
{
    public function getUserFollowings($user);
    public function getUserFollowingsIDs($user);
    public function getTimelineTweets($following_ids);
}
