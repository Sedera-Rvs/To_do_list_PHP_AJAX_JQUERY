<?php
session_start();
include('../include/database.php');
if(isset($_POST['signup'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);

        $recupUser = $dbb->prepare('SELECT * FROM user WHERE pseudo=? AND mdp=?');
        $recupUser->execute(array($pseudo, $mdp));

        if($recupUser->rowCount() > 0){
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'] ;

            header("location:index.php");
        }else{
            ?>  
                <div style="padding: 10px;text-align:center;background-color: #ff4444;" class="alert">Invalid username or password</div>
            <?php
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
    <title>Signup</title>
</head>
<body>
    <div class="container">
        <h1>Signup</h1>
        <form action="" method="POST">
            <p>Name</p>
            <input type="text" name="pseudo" required>
            <p>Password</p>
            <input type="password" name="mdp" required>
            <input type="submit" name="signup" value="Signup">
            <a href="login.php">Don't have an account</a>
        </form>
    </div>
</body>
</html>

