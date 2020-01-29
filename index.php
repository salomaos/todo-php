<?php 
session_start();

require_once 'User.php';

$user = new User('Jovem');
$task = new Task();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="normalize.css">
  <link rel="stylesheet" href="main.css">

  <title>Document</title>
</head>

<body>
  <div class="container">
    <header>
        <h1>Welcome <?php echo $user->get('salomaos')->name ?></h1>
    </header>
    <main>
      <h2>To-do List</h2>
      <form action="new_task.php" method="POST">
        <input type="text" name="user_id" id="user-id" value="<?php echo $user->get('salomaos')->id ?>" hidden>
        <div id="new-to-do-input">
          <input type="text" name="task_content" id="task-content">
          <input type="submit" value="Adicionar">
        </div>
        <div>
          <?php foreach($task->getAll($user->get('salomaos')->id) as $key => $value): ?>
            <input type="checkbox" name="primeira" id="primeira">
            <label for="primeira"><?php echo $value->content; ?></label>
            <br>
          <?php endforeach; ?>
        </div>      
      </form>
    </main>
  </div>
</body>

</html>