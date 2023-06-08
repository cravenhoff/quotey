<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Run auth() middleware to ensure only authenticated (signed-in) users can access the 'Dashboard' page.
    public function __construct() {
        $this->middleware(['auth']);
    }

    // Create the index() function to serve the dashboard blade view template/page
    public function index() {
        // dd(auth()->user());
        return view('dashboard');
    }
}
