<?php

require 'functions.php';
require 'router.php';
require 'Database.php';
require 'router.php';

$config = require('config.php');
$db = new Database($config['database']);