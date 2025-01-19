<?php
session_start();
if(!$_SESSION['mdp']){
    header('location:signup.php');
}

$ip = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>My task</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>My Tasks</h1>
            <a href="addtask.php?id=<?= $ip ;?>" class="add-btn">Add new task</a>
        </div>
        <section id="list"></section>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <script src="js/load_list.js"></script>
</body>
</html>