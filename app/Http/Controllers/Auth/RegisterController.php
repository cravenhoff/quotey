<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
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

        dd('store');

        // store the user
        // sign user in
        // redirect user
    }

}
