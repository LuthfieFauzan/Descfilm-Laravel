<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function add(Request $request)
    {
        $data['user_id'] = $request->uid;
        $data['feedbacks'] = $request->message;
        Feedback::create($data);
        return redirect()->back()->with('success', 'Data berhasil dikirim');;
    }
}
