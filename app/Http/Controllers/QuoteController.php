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

        /* ----- STORE NEW QUOTE INTO DATABASE ----- */
        // $request->user()->quotes()->create([
        //     // Based on the above declared relationship, laravel will automatically get the user_id and input it into the appropriate column in the quotes table when registering the new quote.
        //     'body' => $request->body
        // ]);

        // Shorter hand method
        $request->user()->quotes()->create($request->only('body'));

        // Redirect user back to original page
        return back();
    }
}
