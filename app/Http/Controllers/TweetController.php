<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    //

    public function index()
    {
        $tweets = auth()->user()->tweets;

        return response()->json([
            'success' => true,
            'data' => $tweets,
        ]);
    }

    public function show($id)
    {
        $tweet = auth()->user()->tweets()->find($id);

        if (!$tweet) {
            return response()->json([
                'success' => false,
                'message' => 'Tweet with id ' . $id . ' not found',
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $tweet->toArray(),
        ], 400);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $tweet = new Tweet();
        $tweet->description = $request->description;

        if (auth()->user()->tweets()->save($tweet)) {
            return response()->json([
                'success' => true,
                'data' => $tweet->toArray(),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tweet could not be added',
            ], 500);
        }

    }

    public function destroy($id)
    {
        $tweet = auth()->user()->tweets()->find($id);

        if (!$tweet) {
            return response()->json([
                'success' => false,
                'message' => 'Tweet with id ' . $id . ' not found',
            ], 400);
        }

        if ($tweet->delete()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tweet could not be deleted',
            ], 500);
        }
    }
}
