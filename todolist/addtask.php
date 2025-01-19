<?php
session_start();
include('../include/database.php');
if(!$_SESSION['mdp']){
    header('location:signup.php');
}


if(isset($_POST['add'])){
    if(!empty($_POST['task'])){
        $task = htmlspecialchars($_POST['task']);
        $insertTask = $dbb->prepare('INSERT INTO tasks(task, id_user) VALUES(?,?)');
        $insertTask->execute(array($task, $_SESSION['id']));
    }else{
        echo "No task to add.";
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>To do list</title>
</head> 
<body>
    <div class="container">
        <h1>Add New Task</h1>
        <form action="" method="POST">
            <p>Add new task:</p>
            <input type="text" name="task" required>
            <input type="submit" name="add" value="Add">
        </form>
        <section id="list"></section>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    <script src="js/load_list.js"></script>
</body>
</html>