<?php

namespace App\Http\Controllers;

use App\Mail\QuoteLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    // Run auth() middleware to ensure only authenticated (signed-in) users can access the 'Dashboard' page.
    public function __construct() {
        $this->middleware(['auth']);
    }

    // Create the index() function to serve the dashboard blade view template/page
    public function index() {
        // dd(auth()->user()->quotes);

        // Grab a user from the database
        // $user = auth()->user();

        // Use the Mail Facade to send a new email
        // Mail::to($user)->send(new QuoteLiked());

        return view('dashboard');
    }
}
