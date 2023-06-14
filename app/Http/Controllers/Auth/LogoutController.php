<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /// Create store() method that processes the logout request
    public function store() {
        
        // Log user out of the application
        auth()->logout();

        // Redirect user to 'home' page
        return redirect()->route('home');
    }
}
