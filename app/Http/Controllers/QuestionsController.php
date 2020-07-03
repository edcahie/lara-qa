<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;
use Illuminate\Http\Request;
use function Sodium\compare;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(5);

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));
        return redirect()->route('questions.index')->with('success', 'your questions has been submited');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $this->authorize('update' , $question);
        return view('questions.edit', compact('question'));

    }


    public function update(AskQuestionRequest $request, Question $question)
    {

        if ($request->expectsJson())
        {
            return response()->json([
                'message' => "Your question has been updated.",
                'body_html' => $question->body_html
            ]);
        }

        return redirect('/questions')->with('success', "Your question has been updated.");
    }

    public function destroy(Question $question )
    {
        $this->authorize('delete', $question);
        $question->delete();

        if (request()->expectsJson())
        {
            return response()->json([
                'message' => "Your question has been deleted."
            ]);
        }
        return redirect('/questions')->with('success', 'Your questions has been deleted');
    }
}
