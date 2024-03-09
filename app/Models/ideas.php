<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ideas extends Model
{
    use HasFactory;

    // Make sure that when we use eager loading with must make sure the table or model have a relationship and also using this below mean it loads all column data
    // protected $with = ['user', 'comments.user'];

    // Make sure that when we use eager loading with must make sure the table or model have a relationship and also using this below mean it only loads what is necessary for example the user it only loads the user id and name 
    protected $with = ['user:id,name,image', 'comments.user:id,name,image'];

    protected $fillable = [
        'content',
        'like',
        'user_id'
    ];

    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at'
    // ];

    public function comments() {
        return $this->hasMany(Comment::class, 'idea_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }


}
