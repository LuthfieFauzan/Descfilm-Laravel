<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function store(Request $request)
    {

            $data['movie_id'] = $request->mid;
            $data['user_id'] = $request->uid;
            $data['rates'] = $request->rate;
            $data['review_content'] = $request->review;
            $data['like'] = 0;
            Review::create($data);
            return redirect()->back();

    }

    public function remove(Request $request)
    {

        Review::where('movie_id', $request->mid)
        ->where('user_id', $request->uid)
        ->delete();
        return redirect()->back();

    }

}
