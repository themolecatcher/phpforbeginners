<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = "A body between 1 and 1000 characters is required.";
    }

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}    

if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);

        header('location: /notes');
        die();
    }


    //validation issue