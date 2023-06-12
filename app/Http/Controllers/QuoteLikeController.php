<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteLikeController extends Controller
{
    // Create store() method that processes the addition of likes to quotes
    public function store(Quote $quote, Request $request) {
        // dd('store');
        // dd($quote);
        $quote->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }
}
