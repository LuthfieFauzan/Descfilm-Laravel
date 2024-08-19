<?php

namespace App\Http\Controllers;

use App\Models\Fav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FavController extends Controller
{
    public function add(Request $request)
    {
        $data['movie_id'] = $request->mid;
        $data['user_id'] = $request->uid;
        Fav::create($data);
        return redirect()->back();
    }
    public function remove(Request $request)
    {
        Fav::where('movie_id', $request->mid)
        ->where('user_id', $request->uid)
        ->delete();
        return redirect()->back();
    }

}
