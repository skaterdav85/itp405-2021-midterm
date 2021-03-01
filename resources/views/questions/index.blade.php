@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <form class="pb-3 border-bottom mb-3" action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea
                name="question"
                class="form-control"
                placeholder="What is your favorite movie?">{{ old('question') }}</textarea>

            @error('question')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="text-right mt-3">
            <button class="btn btn-primary" type="submit">
                Ask away
            </button>
        </div>
    </form>

    <h2 class="mb-3 p-3 bg-primary text-white">Questions</h2>

    @forelse ($questions as $question)
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="m-0">
                <a href="{{ route('questions.show', $question->id) }}">
                    {{ $question->body }}
                </a>
            </h3>
            <div class="ml-3">
                <span class="badge bg-secondary">
                    {{ count($question->answers) }} answers
                </span>
            </div>
        </div>
        <div class="mt-3 pb-3 mb-3">
            <em>
                Posted on {{ $question->created_at->format('n/j/Y') }} at
                {{ $question->created_at->format('G:i A') }}
            </em>
        </div>
    @empty
        <p class="font-weight-bold">
            No questions have been asked yet.
        </p>
    @endforelse
@endsection
