<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function __construct() {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    // Create index() method that serves 'quotes' view
    public function index() {
        /* ----- RETRIEVE LIST OF QUOTE ENTRIES IN DATABASE ----- */
        // Use the pagination() method instead to limit the number of listed records retrieved
        $quotes = Quote::latest()->with(['user', 'likes'])->paginate(3); // Add 'eager loading' to the paginator query
        // dd($quotes); // Instead of returning a 'collection' as the get() method did, the paginate() method returned a 'LengthAwarePaginator'

        // Ensure collecton of $quotes is accessible to be displayed as a list in the view
        return view('quotes.index', [
            'quotes' => $quotes
        ]);
    }

    // Create show() method to display a separate, dedicated page per quote
    public function show(Quote $quote) {
        return view('quotes.show', [
            'quote' => $quote,
        ]);
    }

    // Create store() method that processes the add quote 'form' submission
    public function store(Request $request) {
        
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

    // Create a destroy() method to 'delete' quote entries
    public function destroy(Quote $quote) {
        // Check to see if the 'delete' function can be used on a specific quote, using the inbuilt authorize() shorthand
        $this->authorize('delete', $quote); // This throws an exception.

        $quote->delete();

        // Redirect user back to original page
        return back();
    }
}
