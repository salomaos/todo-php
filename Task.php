<?php

require_once 'Database.php';

class Task {
  public $content;

  public function create($content, $user_id)
  {
    $conn = Database::getConnection();
    $stmt = $conn->prepare('INSERT INTO tasks (id, content, user_id) VALUES (NULL, :content, :user_id)');
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
  }

  public function getAll($user_id)
  {
    $conn = Database::getConnection();
    $stmt = $conn->prepare("select * from tasks where user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    if($stmt->execute()){    
      return $stmt->fetchAll();
    }
    return "MILK";
  }
}
