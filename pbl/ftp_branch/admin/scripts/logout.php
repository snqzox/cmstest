<?php 
ini_set('session.save_path', 'w:\Temp');
session_start();
session_destroy();
header("location: ../login.php");
?>