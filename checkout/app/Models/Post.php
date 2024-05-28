<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{

    use HasApiTokens, HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'is_published',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
