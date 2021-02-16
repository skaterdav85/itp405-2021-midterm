<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')->get();

        return view('questions.index', [
            'questions' => $questions,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|min:5|ends_with:?|unique:questions,body'
        ]);

        $question = new Question();
        $question->body = $request->input('question');
        $question->save();

        return redirect()
            ->route('questions.show', $question->id)
            ->with('success', "Your question \"{$question->body}\" was successfully posted.");
    }

    public function show($id)
    {
        return view('questions.show', [
            'question' => Question::find($id),
        ]);
    }
}
