<?php
session_start();
session_destroy();
header("Location: /exam/index.php");
?>
