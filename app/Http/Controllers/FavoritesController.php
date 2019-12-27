<?php

namespace App\Http\Controllers;
use App\Question;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question)
    {
        $question->favorites()->attach(auth()->id());

        if(request()->expectsJson()){

          return response()->json(null,204);

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->favorites()->detach(auth()->id());

        if(request()->expectsJson()){

          return response()->json(null,204);

        }

    }
}
