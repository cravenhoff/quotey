<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    // Create index() method that serves 'quotes' view
    public function index() {
        return view('quotes.index');
    }

    // Create store() method that processes the add quote 'form' submission
    public function store(Request $request) {
        // dd('post quote');

        /* ----- VALIDATION ----- */
        // Validate form using validate() method of the base controller.
        $this->validate($request, [
            'body' => 'required|max:555',
        ]); // if fails, throws an exception

        
    }
}
