<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{
    public function add(Request $request)
    {
        $data['review_id'] = $request->rid;
        $data['user_id'] = $request->uid;
        Like::create($data);
        $like=Like::select('*')->where('review_id', $request->rid)->count();
        $new['like']= $like;
        Review::where('review_id', $request->rid)->update($new);
        return Redirect::to(URL::previous() . "#review".$request->rid);
    }
    public function remove(Request $request)
    {
        Like::where('review_id', $request->rid)
        ->where('user_id', $request->uid)
        ->delete();
        $like=Like::select('*')->where('review_id', $request->rid)->count();
        $new['like']= $like;
        Review::where('review_id', $request->rid)->update($new);
        return Redirect::to(URL::previous() . "#review".$request->rid);
    }
}
