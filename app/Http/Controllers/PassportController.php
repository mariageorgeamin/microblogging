<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\RegisterUserRequest;
use App\Tweet;
use App\User;
use App\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PassportController extends Controller
{
    protected $userRepo;

    public function __construct(UserInterface $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function register(RegisterUserRequest $request)
    {
        $password = bcrypt($request->password);
        $img = Storage::putFile('public/user', $request->file('img'));
        $user = User::create( $request->only(['name', 'email'])+
           [
            'password' => $password,
            "img" => $img,
        ]);


        $token = $user->createToken('Blog')->accessToken;

        return response()->json(['success' => true, 'data' => $user, 'token' => $token], 200);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('Blog')->accessToken;
            return response()->json(['success' => true, 'token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

    public function getUserDetails()
    {
        return response()->json(['user' => auth()->user()], 200);
    }

    public function index()
    {
        $users = User::all();

        return response()->json([
            'success' => true,
            'data' => $users,
        ]);
    }
    public function followUser(int $profileId)
    {
        $user = User::find($profileId);
        if (!$user) {
            return response()->json([
                'error' => 'error user doesnot exist',
            ]);
        }

        $user->followers()->attach(auth()->user()->id);
        return response()->json(['success' => 'you followed user successfully']);
    }

    public function unFollowUser(int $profileId)
    {
        $user = User::find($profileId);
        if (!$user) {

            return response()->json([
                'error' => 'error user doesnot exist',
            ]);
        }
        $user->followers()->detach(auth()->user()->id);
        return response()->json(['success' => 'you unfollowed user successfully']);
    }

    public function showUserTimeline()
    {
        $user = auth()->user()->id;
        $following_ids = $this->userRepo->getUserFollowingsIDs($user);
        $following = $this->userRepo->getUserFollowings($user);
        $tweetsPaginate = $this->userRepo->getTimelineTweets($following_ids);
        return response()->json(['success' => true, 'following' => $following, 'tweets' => $tweetsPaginate]);
    }

}
