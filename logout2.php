<?php
session_start();
session_destroy();
setcookie("email", "", time() - 3600, "/"); // Remove cookie
header("Location: task2.php");
exit();
?>
