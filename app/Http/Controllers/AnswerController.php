<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'answer' => 'required|min:5',
            'question' => 'required|exists:questions,id',
        ]);

        $answer = new Answer();
        $answer->body = $request->input('answer');
        $answer->question_id = $request->input('question');
        $answer->save();

        return back()->with('success', 'Thanks for contributing!');
    }
}
