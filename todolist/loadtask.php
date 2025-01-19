<?php
session_start();
include('../include/database.php');

$ip = $_SESSION['id'];

$recupTask = $dbb->query("SELECT * FROM tasks WHERE id_user = $ip");

while($task = $recupTask->fetch()){
    ?>
        <!-- <script src="slide.js"></script> -->
        <div class="task-item" data-task-id="<?= $task['id']; ?>">
            <div class="task-content">
                <p><?= $task['task']; ?></p>
                <span class="task-date"><?= $task['date_insert']; ?></span>
            </div>
            <a href="delete.php?id=<?= $task['id']; ?>" class="delete-btn">×</a>
        </div>
    <?php
}

?>