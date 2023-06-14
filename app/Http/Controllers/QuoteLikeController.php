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
}
