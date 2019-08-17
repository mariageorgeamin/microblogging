<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PassportController extends Controller
{
    public function register(Request $request)
    {
        $img = Storage::putFile('public/user', $request->file('img'));

        $validator = \Validator::make($request->all(), ['name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'img' => 'required']);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            "img" => $img,

        ]);

        $token = $user->createToken('Blog')->accessToken;

        return response()->json(['success' => true, 'token' => $token], 200);
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

    public function details()
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

    public function timeline()
    {
        $user = auth()->user()->id;
        $following = User::find($user)->followings()->pluck('name')->toArray();
        $following_ids = User::find($user)->followings()->pluck('id')->toArray();
        $tweets = Tweet::whereIn('user_id', $following_ids)->join('users', 'tweets.user_id', '=', 'users.id');
        $tweetsPaginate = $tweets->paginate(2, ['description', 'users.name']);
        return response()->json(['success' => true, 'following' => $following, 'tweets' => $tweetsPaginate]);
    }

}
