<?php

//find the corresponding note
use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve('Core\Database');

$currentUserId = 1;


$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id'],
    ])->findOrFail();

//authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);

//validate the form
$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A body between 1 and 1000 characters is required.";
}


//if no validation error: update database with the edits
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

//redirect user
header('location: /notes');
die();