@extends('layouts.main')

@section('title', $question->body)

@section('content')
    <h2 class="bg-primary text-white p-3 mb-3">{{ $question->body }}</h2>

    @forelse ($question->answers as $answer)
        <h4>
            {{ $answer->body }}
        </h4>
        <div class="border-bottom mt-3 pb-3 mb-3">
            <em>
                Posted on {{ date_format(date_create($answer->created_at), 'n/j/Y') }} at
                {{ date_format(date_create($answer->created_at), 'G:i A') }}
            </em>
        </div>
    @empty
        <p class="border-bottom pb-3 font-weight-bold">
            No answers yet! Be the first to answer by using the form below.
        </p>
    @endforelse

    @error('question')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror

    <form
        class="mt-3"
        action="{{ route('answers.store') }}"
        method="POST"
    >
        @csrf
        <input type="hidden" name="question" value="{{ $question->id }}">
        <div class="form-group">
            <h4 class="bg-primary text-white p-3">
                Answer
            </h4>
            <textarea
                name="answer"
                class="form-control">{{ old('answer') }}</textarea>
            @error('answer')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="text-right mt-3">
            <button class="btn btn-primary" type="submit">
                Answer question
            </button>
        </div>
    </form>
@endsection
