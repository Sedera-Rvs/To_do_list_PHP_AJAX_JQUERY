<?php
session_start();
include('../include/database.php');

$getid = $_GET['id'];
$recupUser = $dbb->prepare("SELECT * FROM tasks WHERE id = ? AND id_user = ?");
$recupUser->execute(array($getid, $_SESSION['id']));

if($recupUser->rowCount() > 0){
    $delete = $dbb->prepare('DELETE FROM tasks WHERE id = ?');
    $delete->execute(array($getid));
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        // Si c'est une requête Ajax, renvoyer un JSON
        echo json_encode(['success' => true]);
        exit;
    } else {
        // Si c'est une requête normale, rediriger
        header('location:index.php');
    }
}
?>