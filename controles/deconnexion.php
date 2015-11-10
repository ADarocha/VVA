<?php
session_start(); //deconnexion
session_destroy();
header('Location: ../index.php');
?>