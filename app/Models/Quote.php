<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'body',
    ];

    // Establish eloquent relationship between user and quotes
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Establish eloquent relationship between likes and quotes
    public function likes() {
        return $this->hasMany(Like::class);
    }
}
