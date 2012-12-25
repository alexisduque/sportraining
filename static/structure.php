<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Carnet d'entrainement en ligne !</title>
        <style type="text/css" media="screen">
<?php
link_to_css("style");
date_default_timezone_set('UTC');
?>
        </style>

        <SCRIPT LANGUAGE="JavaScript">

            function affichage_doc(nom_de_la_page, nom_interne_de_la_fenetre)
            {
                window.open (nom_de_la_page, nom_interne_de_la_fenetre, config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
            }

        </SCRIPT> 
       <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>

    <body>	

        <div id="wrapper">
            <div id="header">
                <h1>&nbsp;</h1>
            </div>

            <div id="menu">
                <ul>
                    <li><a href="/sportraining/index">R&eacute;sum&eacute;</a></li>
                    <?php
                    if (isset($_SESSION['auth']))
                        echo '<li><a href="/sportraining/deconnexion">Se deconnecter</a></li>';
                    else
                        echo '<li><a href="/sportraining/connexion">Se connecter</a></li>';
                    ?>

                    <li><a href="/sportraining/addtraining">Nouvel entrainement</a></li>
                    <?php echo '<li><a href="/sportraining/calendrier/' . date("Y/m/d") . '">Calendrier</a></li>'; ?>
                    <?php
                    if (isset($_SESSION['auth']))
                        echo '<li><a> S\'enregistrer</a></li>';
                    else
                        echo '<li><a href="/sportraining/adduser">S\'enregistrer</a></li>';
                    ?>
                    <li><a href="/sportraining/stats">Statistiques</a></li>
                </ul>
            </div>

            <div id="sidebar">
                <div id="feed">

                    <?php
                    if (isset($_SESSION['auth']))
                        echo '	<a class="user_connect" href="/sportraining/moncompte"> Bonjour ' . ucfirst($_SESSION['auth']['prenom']) . '</a>';
                    else
                        echo 'Connectez-vous !';
                    ?>

                </div>
                <?php include ('lib/sidebar.php'); ?>

                <div id="sidebar-bottom">
                    &nbsp;
                </div>
            </div>

            <div id="content">
                <div id="ban">
                    <!-- Insertion Banniere -->
                </div>
                <?php include($adresse); ?>
            </div>
            <div id="footer">
                <div id="footer-valid">Alexis DUQUE - 3TC - 2012<br />
                </div>
            </div>

        </div>

    </body>
</html>
