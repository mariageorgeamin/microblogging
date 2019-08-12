<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    //

    protected $fillable = [
        'description',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
