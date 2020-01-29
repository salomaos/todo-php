<?php

session_start();

require_once 'Task.php';

$task = new Task();

$user_id = $_POST['user_id'];
$content = $_POST['task_content'];

$task->create($content, $user_id);

header('Location: index.php');