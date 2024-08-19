<?php

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

//validate form inputs (email and password)
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please use a password between 7 and 255 characters';

}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);   
}

$db = App::resolve(Database::class);
//check if account already exists
$result = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

    //if yes, redirect to login page.

if($user) {
// someone has an account
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    //mark that the user has logged in.
    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}
    // if no, save account to the database and then log user in and redirect 


