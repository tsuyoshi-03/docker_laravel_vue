<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'contents', 'user_id'];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function searchAllTopics($params){
        return Topic::query()
            ->where('title','LIKE',"%{$params}%")
            ->orWhere('contents','LIKE',"%{$params}%")
            ->latest()->paginate(5);
    }

    public static function searchUsersTopics($params, $user_id){
        return Topic::query()
            ->where('title','LIKE',"%{$params}%")
            ->where('user_id', $user_id)
            ->orWhere('contents','LIKE',"%{$params}%")
            ->where('user_id', $user_id)
            ->latest()->paginate(5);
    }
}
