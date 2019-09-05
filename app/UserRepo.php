<?php


namespace App;


class UserRepo implements UserInterface
{
    public function getUserFollowings($user)
    {
        $following = User::find($user)->followings()->pluck('name')->toArray();
        return $following;
    }

    public function getUserFollowingsIDs($user)
    {
        $following_ids = User::find($user)->followings()->pluck('id')->toArray();
        return $following_ids;

    }

    public function getTimelineTweets($following_ids)
    {
        $tweets = Tweet::whereIn('user_id', $following_ids)->join('users', 'tweets.user_id', '=', 'users.id');
        $tweetsPaginate = $tweets->paginate(2, ['description', 'users.name']);
        return $tweetsPaginate;
    }

    public function isFollowing($profileId)
    {
        $user = User::find($profileId);
        return $user->followers->contains(auth()->user()->id);
    }
}
