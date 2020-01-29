<?php

require_once 'Task.php';
require_once 'Database.php';

class User {
  public $name;
  public $tasks = [];

  public function __construct($name) {
    $this->name = $name;
  }

  public function addTask($task) {
    $task_obj = new Task($task);
    array_push($this->tasks, $task_obj);
  }

  public function get($username)
  {
    $conn = Database::getConnection();
    $stmt = $conn->prepare("select * from users where username = :username");
    $stmt->bindParam(':username', $username);
    if($stmt->execute()){    
      return $stmt->fetch();
    }
    return "MILK";
  }
}
