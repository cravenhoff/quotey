<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Run auth() middleware to ensure only guests can access the 'Login' page.
    public function __construct() {
        $this->middleware(['guest']);
    }
    
    // Create index() method that serves 'login' view
    public function index() {
        return view('auth.login');
    }

     // Create store() method that processes the login 'form' submission
     public function store(Request $request) {
        // dd($request->remember);

        /* ----- VALIDATION ----- */
        // Validate form using validate() method of the base controller.
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]); // if fails, throws an exception

        /* ----- SIGN-IN NEWLY REGISTERED USER ----- */
        // Use the auth() function to access the new user created (you can only use the Auth:: facade)
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) { // First check if the user authentication is not valid
            return back()->with('status', 'Invalid login credentials');
        } 

        // Redirect sucessfully athenticated user to 'dashboard' page
        return redirect()->route('dashboard');

     }
}
