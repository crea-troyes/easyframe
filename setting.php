<?php 

/******    Information Général, CSS, JS, META ...   ******/
$headHTML = [
            
    // TITRE du site
    'titre' => 'EASYFRAME',
    
    // URL ou adresse du site web
    'adresse_site' => 'index.php',
    
    // Balise Meta
    'viewport' => '<meta name="viewport" content="width=device-width, initial-scale=1">',
    'charset' => '<meta charset="UTF-8">',
    'phone' => '<meta name="format-detection" content="telephone=no" />',
    
    // LOGO du site web rangé dans le dossier img/
    'logo' => 'logo.jpg',
    
    // AUTEUR : attribut de la balise <meta name="author">
    'auteur' => 'Jean Dupont',
    
    // NOM des fichiers .CSS rangé dans le dossier css/
    // Vous pouvez indiquer autant de fichiers que vous souhaitez. Ils s'ajouteront dans le même ordre
    // 'Nom UNIQUE du fichier' => 'nom du fichier .css'
    'bootstrap' => 'bootstrap.min.css',
    'css' => 'style.css',
    'css2' => 'style2.css',

    // NOM des fichiers .JS rangé dans le dossier js/
    // Vous pouvez indiquer autant de fichiers que vous souhaitez. Ils s'ajouteront dans le même ordre
    // 'Nom UNIQUE du fichier' => 'nom du fichier .js'
    'jquery' => 'jquery.min.js',
    'bootstrapjs' => 'bootstrap.min.js',
    'monScript' => 'monscript.js',
    'monScript2' => 'monscript2.min.js',

    // NOM du FAVICON rangé dans le dossier img/
    'favicon' => 'favicon.ico',
    
    // Copyright du bas de page
    'copyright' => 'copyright du footer'

];


/******    MENU   ******/
$menuHeader = array(
    
    // Informations du menu - Élément obligatoire
    'info' => array(
    
        // Ajoutez une class CSS au menu
        'class' => '',
    
        // Indiquez la couleur du menu
        // Choix : bg-inverse  /  navbar-dark bg-primary  /  navbar-dark bg-info  /  navbar-dark bg-success  /  navbar-dark bg-warning  /  navbar-dark bg-danger  /  navbar-light
        'color' => '',
    
        // Indiquez le positionnement du menu
        // Choix :   navbar-full  /  navbar-fixed-top (menu fixe en haut)  /  navbar-fixed-bottom (menu fixe en bas)
        'placement' => 'navbar-full',
    
        // ID du menu - OBLIGATOIRE
        'id' => 'menuHaut'
    ),
    
    
    // LIEN déroulant du menu
    'Menu déroulant' => array(
        // Premier sous-menu
        'Page exemple' => 'exemple.html',
        // Deuxième sous-menu ...
        'exemple 2#' => 'exemple2.html',
        // Troisième sous-menu ...
        'exemple 3#' => 'exemple3.html'
    ),
    
    // LIEN déroulant du menu
    'Menu déroulant 2' => array(
        'exemple 4#' => 'exemple4.html',
        'exemple 5#' => 'exemple5.html',
        'exemple 6#' => 'exemple6.html'
    ),
    
    // LIEN simple du menu
    'contact' => 'contact.html'
    
);


?>