<?php
session_start(); //deconnexion
session_destroy();
mysqli_close();
header('Location: ../index.php');
?>