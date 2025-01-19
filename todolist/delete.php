<?php
session_start();
include('../include/database.php');

$getid = $_GET['id'];
$recupUser = $dbb->prepare(" SELECT * FROM tasks WHERE id = ? ");
$recupUser->execute(array($getid));

if($recupUser->rowCount() > 0){
     $delete = $dbb->prepare('DELETE FROM tasks WHERE id = ?');
     $delete->execute(array($getid));

     header('location:index.php');
}

?>