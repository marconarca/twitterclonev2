<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ideas extends Model
{
    use HasFactory;

    
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
