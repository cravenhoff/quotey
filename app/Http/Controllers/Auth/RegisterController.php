<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Run auth() middleware to ensure only guests can access the 'Register' page.
    public function __construct() {
        $this->middleware(['guest']);
    }

    // Create index() method that serves 'register' view
    public function index() {
        return view('auth.register');
    }

    // Create store() method that processes the register 'form' submission
    public function store(Request $request) {
        /* ----- VALIDATION ----- */
        // dd($request); // Get the full contents of the $request object
        // dd($request->email); // Get a specific form field 'email'

        // Validate form using validate() method of the base controller.
        $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
        ]); // if fails, throws an exception

        // /* ----- STORE USER IN DATABASE ----- */
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        /* ----- SIGN-IN NEWLY REGISTERED USER ----- */
        // Use the auth() function to access the new user created (you can only use the Auth:: facade)
        auth()->attempt($request->only('email', 'password'));        

        /* ----- REDIRECT USER ----- */
        return redirect()->route('dashboard');
        
    }

}
