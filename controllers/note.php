<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';

$note = $db->query('select * from notes where id = :id', [
    'user' => 1,
    'id' => $_GET['id']

])->fetch();

if (! $note) {

abort(403);

}

if($note['user_id'] !== 1) {

    abort(403);

}

require "views/note.view.php";