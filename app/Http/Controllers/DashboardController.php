<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Create the index() function to serve the dashboard blade view template/page
    public function index() {
        return view('dashboard');
    }
}
