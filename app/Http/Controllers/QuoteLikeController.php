<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteLikeController extends Controller
{
    // Add middleware to prevent guests and unauthorized users from liking quotes
    public function __construct() {
        $this->middleware(['auth']);
    }

    // Create store() method that processes the addition of likes to quotes
    public function store(Quote $quote, Request $request) {

        if($quote->likedBy($request->user())) {
            return response(null, 409);
        }
        
        $quote->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    // Create destory() method to process the 'dislike' feature of quotes
    public function destroy (Quote $quote, Request $request) {
        // dd($quote);
        $request->user()->likes()->where('quote_id', $quote->id)->delete();

        // Redirect user back to the previous page
        return back();
    }
}
