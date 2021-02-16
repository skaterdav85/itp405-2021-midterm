<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\URL;

Route::get('/', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.show');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::post('/answers', [AnswerController::class, 'store'])->name('answers.store');

if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}
