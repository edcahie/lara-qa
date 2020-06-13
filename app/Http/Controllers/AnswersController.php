<?php

namespace App\Http\Controllers;

use App\Answer;
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

    public function edit(Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);

        return view('answers.edit', compact('question', 'answer'));
    }

    public function update(Request $request, Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);

        $answer->update($request->validate([
            'body' => 'required',
        ]));

        return redirect()->route('questions.show', $question->slug)->with('success', 'Your answer has been updated');
    }
    public function destroy(Answer $answer)
    {
        //
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