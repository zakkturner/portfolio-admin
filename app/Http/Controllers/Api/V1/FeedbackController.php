<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Store feedback to db
     */
    public function __invoke(Request $request)
    {
        $attr = request()->validate([
            'rating' => 'required|min:0|max:10',
            'email' => 'nullable|email',
            'feedback' => 'nullable|min:3',
        ]);
        $feedback = Feedback::create($attr);
        if($feedback){
            return response()->json(['message' => 'Feedback submitted successfully.']);

        }else{
            return response()->json(['message' => 'Something went wrong.']);
        }
    }


}
