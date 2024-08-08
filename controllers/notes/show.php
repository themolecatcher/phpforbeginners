<?php

$config = require('config.php');
$db = new Database($config['database']);

$a = "https://in.linkedin.com";
$domain = parse_url($a);
echo $domain;

$heading = 'Note';
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id'],
    ])->findOrFail();

authorize($note['user_id'] === $currentUserId);

require "views/notes/show.view.php";