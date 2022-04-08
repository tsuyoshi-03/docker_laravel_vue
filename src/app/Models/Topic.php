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
        return $this->belongsTo('App\Models\User');
    }

    public static function extractTopics($searchWord, $user = null){
        $q = Topic::query();
        if($user){
            $q->where('title','LIKE',"%{$searchWord}%")
            ->where('user_id', $user)
            ->orWhere('contents','LIKE',"%{$searchWord}%")
            ->where('user_id', $user);
        }else{
            $q->where('title','LIKE',"%{$searchWord}%")
            ->orWhere('contents','LIKE',"%{$searchWord}%");
        }
        return $q->latest()->paginate(5);
    }

}
