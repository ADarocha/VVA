<?php

if (isset($_SESSION['TYPECOMPTE']))
{
    if ($_SESSION['TYPECOMPTE'] == "ges")
    {
        header("Location: gestion.php");
    }
    else
    {
        header("Location:../index.php");
    }
}
