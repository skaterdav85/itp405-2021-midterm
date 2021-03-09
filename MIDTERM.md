# Midterm Requirements

The goal of this project is to build a simple Q&A website. A visitor should be able to ask questions and leave answers without any authentication.

[Here is a working example of what you're going to build](https://itp405-2021-midterm.herokuapp.com/). The styles don't need to match exactly, but you should display all of the same data and have the same URLs and document titles (the browser tab title). The timestamps don't need to be formatted like the example. Your application should _function_ exactly the same as the example.

## Creating the Database

To create the database, you will create and run a migration that I give you.

To create the migration, run `php artisan make:migration create_questions_and_answers_table`. This will create a migration file at a path similar to the following: `database/migrations/2021_03_01_025453_create_questions_and_answers_table.php` (the timestamp in your file will be different).

Replace the contents of that file with the following:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsAndAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->timestamps();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
        Schema::dropIfExists('answers');
    }
}
```

Now run `php artisan migrate`. Refresh your database and you should see the `questions` and `answers` tables.

## The Questions Page

1. You must use Eloquent exclusively for this page.
1. The Question form **must** be validated using [Laravel's validation library](https://laravel.com/docs/8.x/validation#available-validation-rules). If a form fails validation, it must stay populated with what the user entered rather than getting reset. This form should have the following validation rules:

    - Required
    - Minimum length of 5 characters
    - **Ends with** a question mark ("?")
    - Must be **unique** (The same question can't be asked more than once)

1. If no questions have been asked, display "No questions have been asked yet.".
1. The list of questions **must** be sorted from **newest to oldest**.
1. A green success alert/notification that contains the question should be shown when a question is created. See the example.

To display the number of answers for a question, you can use the [`count()`](https://www.php.net/manual/en/function.count.php) function in PHP.

## The Question Page

1. If a question doesn't have any answers, display "No answers yet! Be the first to answer by using the form below.".
1. The Answer form **must** be validated using [Laravel's validation library](https://laravel.com/docs/8.x/validation#available-validation-rules). If a form fails validation, it must stay populated with what the user entered rather than getting reset. This form should have the following validation rules:

    - Required
    - Minimum length of 5 characters
    - The question that the answer belongs to must exist in the database

1. A green success alert/notification should be shown when an answer is created. See the example.
1. The list of answers **must** be sorted from **newest to oldest**. While I didn't cover how to do this with Eloquent, you know how to do this with the Query Builder.
1. If a user tries to visit a Question page for a question that doesn't exist, such as https://itp405-2021-midterm.herokuapp.com/questions/999999999999, redirect to the Questions page.

## Other Requirements

1. All routes should have names and all URLs in the app should be generated from the route names.
1. Before you finish the exam, please delete all questions and answers from your database.
1. All pages should share the same Blade layout
