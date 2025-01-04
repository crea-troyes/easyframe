<?php 

/***********************************************************************

Version 2.0.0
Start : 02.11.16
Last : 02.01.25

PHP 8.2.20 / HTML5 / CSS3

Bootstrap 5 

Développer by créa-troyes.fr  /  @crea_troyes

Documentation : http://easyframe.crea-troyes.fr

***********************************************************************/


// En tête
// 
// Empêche l'interprétation incorrecte des types MIME
header("X-Content-Type-Options: nosniff");

// Protection contre le clickjacking
header("X-Frame-Options: SAMEORIGIN");

// Politique de sécurité pour les cadres
header("Content-Security-Policy: frame-ancestors 'self';");

header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");


// LOADER
require_once('setting.php');
require_once('root.php');
require_once('controleur.php');

?>