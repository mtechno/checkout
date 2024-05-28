<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Comment extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'post_id',
        'user_id',
        'body',
        'likes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public function replies()
//    {
//        return $this->hasMany(Comment::class, 'parent_id');
//    }


}
