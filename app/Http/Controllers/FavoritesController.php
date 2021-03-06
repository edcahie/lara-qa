<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store(Question $question){
        //insert into favorites Question->id and user->id
        $question->favorites()->attach(auth()->id());

        if(request()->expectsJson()){

            return response()->json(null);
        }
        return back();
    }

    public function destroy(Question $question){

        $question->favorites()->detach(auth()->id());

        if(request()->expectsJson()){
            return response()->json(null);
        }

        return back();

    }
}
