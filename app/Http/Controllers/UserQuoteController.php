<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserQuoteController extends Controller
{
    // Create index() method that serves the detailed page view of a particular user and all their registered quotes
    public function index(User $user) {
        dd($user);
    }
}
