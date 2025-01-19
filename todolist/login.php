<?php
session_start();
include('../include/database.php');
if(isset($_POST['login'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);

        $insertUser = $dbb->prepare('INSERT INTO user(pseudo, mdp) VALUES(?, ?)');
        $insertUser->execute(array($pseudo, $mdp));

        $recupUser = $dbb->prepare('SELECT * FROM user WHERE pseudo=? AND mdp=?');
        $recupUser->execute(array($pseudo, $mdp));

        if($recupUser->rowCount() > 0){
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'] ;
        }

    }else{
        echo "Veuillez bien remplir les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="POST">
            <p>Name</p>
            <input type="text" name="pseudo">
            <p>Password</p>
            <input type="password" name="mdp">
            <input type="submit" name="login" value="Login">
            <a href="signup.php">Already have an account</a>
        </form>
    </div>
</body>
</html>