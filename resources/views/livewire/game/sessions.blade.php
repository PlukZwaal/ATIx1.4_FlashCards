<div>
    <h1>Game Sessions</h1>

    @foreach ($sessions as $session)
        <p>
            ID: {{ $session->id }}<br>
            Deck ID: {{ $session->deck_id }}<br>
            User ID: {{ $session->user_id }}<br>
            Correct: {{ $session->correct }}<br>
            Wrong: {{ $session->wrong }}<br>
            Correct Answers: {{ is_array($session->correct_answers) ? implode(', ', $session->correct_answers) : '' }}<br>
            Incorrect Answers: {{ is_array($session->incorrect_answers) ? implode(', ', $session->incorrect_answers) : '' }}
        </p>
        <hr>
    @endforeach
</div>
