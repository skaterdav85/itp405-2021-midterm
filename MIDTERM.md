# Midterm Requirements

The goal of this project is to build a simple Q&A website. A visitor should be able to ask questions and leave answers without any authentication.

[Here is a working example of what you're going to build](https://itp405-2021-midterm.herokuapp.com/). The styles don't need to match exactly, but you should display all of the same data, have the same URLs, and the same document titles (the browser tab title). It should _function_ exactly the same as the example.

Design your database tables and create them with migrations. If you get stuck here, send me a message on Slack and I will give you a database dump with all of the tables, but I will deduct 7 points from your midterm score.

1. The forms **must** be validated. If a form fails validation, it must stay populated with what the user entered rather than getting reset.

    - Question validation:
        - Required
        - Minimum length of 5 characters
        - **Ends with** a question mark ("?")
        - Must be **unique** (The same question can't be asked more than once)
    - Answer validation:
        - Required
        - Minimum length of 5 characters
        - The question that the answer belongs to must exist in the database

1. The list of questions and answers **must** be sorted from **newest to oldest**.
1. On the questions page, if no questions have been asked, display "No questions have been asked yet.".
1. On the question page, if a question doesn't have any answers, display "No answers yet! Be the first to answer by using the form below.".
1. A green success alert/notification that contains the question should be shown when a question is created. See the example.
1. A green success alert/notification should be shown when an answer is created. See the example.
1. All routes should have names and all URLs in the app should be generated from the route names.
