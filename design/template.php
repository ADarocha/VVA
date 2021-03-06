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
 <?php $arriere = "";?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" />
        <link href="<?php echo $arriere;?>default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $arriere;?>fonts.css" rel="stylesheet" type="text/css" media="all" />

        <!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
    </head>


   



    <body>
        <div id="wrapper">
            <div id="header" class="container">
                <div id="logo">
                    <h1><a href="#">V.V.A.</a></h1>
                </div>
                <div id="menu">
                    <ul>
                        <li class="current_page_item"><a href="#" accesskey="1" title="">Accueil</a></li>
                        <li><a href="<?php echo $arriere;?>hebergements.php" accesskey="2" title="">Nos offres</a></li>
                        <li><a href="<?php echo $arriere;?>apropos.php" accesskey="3" title="">Nous découvrir</a></li>
                        <?php
                        if (!isset($_SESSION['LOGIN'])) {
                            echo "<li><a href='".$arriere."connexion.php' accesskey='4' title=''>Connexion</a></li>";
                        } else {
                            echo "<li><a href='".$arriere."bdd/deconnexion.php' accesskey='5' title=''>Deconnexion</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div id="banner">&nbsp;</div>



            <!-- Au dessus : bannière et image bannière, menus.
                En dessous : présentation en vert-->



            <div id="featured">
                <div class="container">
                    <div class="title">
                        <h2>Fusce ultrices fringilla metus</h2>
                        <span class="byline">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue</span> </div>
                    <p>This is <strong>CrossWalk</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
                </div>
                <ul class="actions">
                    <li><a href="#" class="button">Etiam posuere</a></li>
                </ul>
            </div>



            <!-- En dessous : 3 grilles, colonnes-->



            <div id="extra" class="container">
                <div class="title">
                    <h2>Praesent scelerisquet</h2>
                    <span class="byline">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue</span> </div>
                <div id="three-column">
                    <div class="boxA">
                        <div class="box"> <span class="fa fa-cloud-download"></span>
                            <p>Praesent pellentesque facilisis elit. Class aptent taciti sociosqu ad  torquent per conubia nostra.</p>
                        </div>
                    </div>
                    <div class="boxB">
                        <div class="box"> <span class="fa fa-cogs"></span>
                            <p>Etiam neque. Vivamus consequat lorem at nisl. Nullam  wisi a sem semper eleifend. Donec mattis.</p>
                        </div>
                    </div>
                    <div class="boxC">
                        <div class="box"> <span class="fa fa-user"></span>
                            <p> Aenean lectus lorem, imperdiet at, ultrices eget, ornare et, wisi. Pellentesque adipiscing purus.</p>
                        </div>
                    </div>
                </div>
                <ul class="actions">
                    <li><a href="#" class="button">Etiam posuere</a></li>
                </ul>
            </div>





            <!-- En dessous : 3 images et un texte-->




            <div id="page" class="container">
                <div class="title">
                    <h2>Nulla luctus eleifend</h2>
                    <span class="byline">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span> </div>
                <div class="gallery">
                    <div class="boxA"><img src="images/pic01.jpg" width="320" height="200" alt="" /></div>
                    <div class="boxB"><img src="images/pic02.jpg" width="320" height="200" alt="" /></div>
                    <div class="boxC"><img src="images/pic03.jpg" width="320" height="200" alt="" /></div>
                </div>	
                <p>Vivamus fermentum nibh in augue. Praesent a lacus at urna congue rutrum. Nulla enim eros nibh. Duis enim nulla, luctus eu, dapibus lacinia, venenatis id, quam. Vestibulum imperdiet, magna nec eleifend rutrum, nunc lectus vestibulum velit, euismod lacinia quam nisl id lorem. Quisque erat. Vestibulum pellentesque, justo mollis pretium suscipit, justo nulla blandit libero, in blandit augue justo quis nisl. Fusce mattis viverra elit. Fusce quis tortor.</p>
                <ul class="actions">
                    <li><a href="#" class="button">Etiam posuere</a></li>
                </ul>
            </div>
        </div>







        <div id="copyright" class="container">
            <p>&copy; Village Vacances Alpes. Tous droits réservés. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> | Adapté par <a href="http://www.anthony-darocha.com" rel="nofollow">Anthony DA ROCHA</a> au projet VVA.</p>
        </div>
    </body>
</html>
