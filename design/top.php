<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : CrossWalk 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140216

-->

<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $titre;?></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" />
        <link href="<?php echo $arriere;?>design/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $arriere;?>design/fonts.css" rel="stylesheet" type="text/css" media="all" />

        <!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
    </head>


    



    <body>
        <div id="wrapper">
            <div id="header" class="container">
                <div id="logo">
                    <h1><a href="<?php echo $arriere;?>index.php">V.V.A.</a></h1>
                </div>
                <div id="menu">
                    <ul>
                        <li class="current_page_item"><a href="<?php echo $arriere;?>index.php" accesskey="1" title="">Accueil</a></li>
                        <li><a href="<?php echo $arriere;?>hebergements.php" accesskey="2" title="">Nos offres</a></li>
                        <li><a href="<?php echo $arriere;?>recherche.php" accesskey="3" title="">Recherche</a></li>
                        <li><a href="<?php echo $arriere;?>apropos.php" accesskey="4" title="">Nous découvrir</a></li>
                        <?php
                        if(isset($_SESSION['TYPECOMPTE'])){
                        switch($_SESSION['TYPECOMPTE']){
                            case 'vil':
                                $type = "villageois/index.php";
                                break;
                            case 'ges':
                                $type = "gestion/index.php";
                                break;
                            case 'adm':
                                $type = "admin/index.php";
                                break;
                        }
                        echo "<li><a href='".$arriere."".$type."' accesskey='5' title=''>Mon compte</a></li>";
                        }
                        
                        if (!isset($_SESSION['LOGIN'])) {
                            echo "<li><a href='".$arriere."connexion.php' accesskey='6' title=''>Connexion</a></li>";
                        } 
                        else {
                            echo "<li><a href='".$arriere."bdd/deconnexion.php' accesskey='6' title=''>Deconnexion</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div id="banner">&nbsp;</div>