<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FormSubmissionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function __invoke(Request $request)
    {

        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        $attributes['user_id'] = 1;


      $submission  = FormSubmission::create($attributes);

      if ($submission) {
        return response(['message' =>'Submission Created Successfully'],200);
      } else{
          return response(['message' =>'Submission Could not be created'],500);
      }
    }

}
