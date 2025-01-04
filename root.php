<?php


/******    PAGE du site   ******/

$controleur = array ( 
    
    // ID de la page pour routage, doit etre IDENTIQUE au NOM de la page
    // Chaque ID de page doit etre unique
    "accueil"  => array ( 
        
        // Nom de la page. Doit etre unique et identique à la clé de cet Array.
        // Aucun espace, ni accent, ni caractères spéciaux. Seul le - est autorisé.
        'nom' => 'accueil',
        
        // Balise <TITLE>
        'title' => 'Titre de la page',
        
        // Balise <DESCRIPTION>
        'description' => 'Descrption de la page ...',
        
        // Chemin pour trouver la Vue : LAYOUT/...
        'layout' => 'front',
        
        // Choix des fichiers .CSS que la page doit charger => entre les balises <HEAD>
        // Entrez le nom du fichier défini depuis la page setting.php
        // Vous pouvez mettre plusieurs noms séparés d'une virgule ou laisser le champ vide
        'css' => '',
        
        // Choix des fichiers .CSS que la page doit charger de façon asynchrone
        // La page ne bloque pas le chargement des éléments de la page dans l'attente du CSS
        'cssasync' => 'bootstrap,css',
        
        // Choix des fichiers .JS que la page doit charger => entre les balises <HEAD>
        // Entrez le nom du fichier défini depuis la page setting.php
        // Vous pouvez mettre plusieurs noms séparés d'une virgule ou laisser le champ vide
        'jshead' => '',
        
        // Choix des fichiers .JS que la page doit charger => avant la balise </BODY>
        // Entrez le nom du fichier défini depuis la page setting.php
        // Vous pouvez mettre plusieurs noms séparés d'une virgule ou laisser le champ vide
        'jsfoot' => 'jquery,bootstrapjs'
        
    ),
    
    
    // Chaque ID de page doit etre unique
    // Nom de la deuxieme page pour routage ...
    "contact"  => array ( 
        
        'nom' => 'contact',
        'title' => '',
        'description' => 'Balise meta descrption',
        'layout' => 'front',
        'css' => '',
        'cssasync' => 'bootstrap,css',
        'jshead' => '',
        'jsfoot' => 'jquery,bootstrapjs'
    
    ),
    
    "exemple"  => array ( 
        
        'nom' => 'exemple',
        'title' => 'Page d\'exemple',
        'description' => 'Balise meta descrption de la page d\'exemple',
        'layout' => 'front',
        'css' => '',
        'cssasync' => 'bootstrap,css',
        'jshead' => '',
        'jsfoot' => 'jquery,bootstrapjs'
    
    )
     
);


?>