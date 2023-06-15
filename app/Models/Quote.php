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

    // Check to ensure the user logged in, can only delete the quotes they've created
    public function ownedBy(User $user) {
        return $user->id === $this->user_id;
    }

    // Validate to ensure no user submits more than one like to a quote
    public function likedBy(User $user) {
        return $this->likes->contains('user_id', $user->id); // The contains method is a collections method used to check if a particular key exists.
    }

    // Establish eloquent relationship between user and quotes
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Establish eloquent relationship between likes and quotes
    public function likes() {
        return $this->hasMany(Like::class);
    }
}
