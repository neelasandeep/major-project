<?php
session_start();
session_destroy();
header("location:signin.php?logout=you are sucessfully logged out!");
?>
