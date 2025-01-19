<?php
try {
    $dbb = new PDO('mysql:host=localhost; dbname=to_do_list;charset=utf8;', 'root', '');
    // set the PDO error mode to exception
    $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

?>