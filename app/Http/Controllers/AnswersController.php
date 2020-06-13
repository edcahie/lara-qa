<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function store(Question $question, Request $request){

        $request->validate(['body'=> 'required' ]);
        $question->answers()->create(['body' => $request->body,
                                      'user_id' => \Auth::id() ]);
        return back()->with('success', 'your answer has been submited');
    }
}

//
//public function store(Question $question, Request $request)
//{
//    $question->answers()->create($request->validate([
//            'body' => 'required'
//        ]) + ['user_id' => \Auth::id()]);
//
//    return back()->with('success', "Your answer has been submitted successfully");
//}