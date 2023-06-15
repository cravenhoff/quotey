<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Quote;

class QuotePolicy
{
    // Create a delete() method to check if the user logged-in can delete quotes that belong to them   
    public function delete(User $user, Quote $quote) {
        return $user->id === $quote->user_id;
    }
}
