<?php 

/******    SÉCURISATION DU ROUTAGE   ******/
if(isset($_GET['page'])) {
    $pageSecure = htmlspecialchars($_GET['page']);
    $pageSecure = htmlentities($pageSecure);
}
else {
    $pageSecure = "accueil";
}


/******   ROUTAGE PAR DEFAUT   ******/
if(!isset($controleur[$pageSecure]["nom"]) OR empty($controleur[$pageSecure]["nom"]) OR !is_file('layout/'.$controleur[$pageSecure]["layout"].'/'.$controleur[$pageSecure]["nom"].'.php')) {
    $pageSecure = "accueil";
}


/******    MODEL POUR L'ENSEMBLE DU SITE    ******/


/******    MODEL PAR PAGE    ******/
switch($pageSecure) {
        
    case "contact":
        require_once('library/form_process.php');
        // Id du formulaire
        $id_form_send = "formContact";
        // Traitement du formulaire. Pour un traitement par mail, indiquer l'adresse mail du destinataire
        $traitement = "creatroyes@gmail.com";
        traitement_formulaire(htmlspecialchars($_POST['send']), $id_form_send, $traitement);
        require_once('library/form.php');
        break;
        
    default:
        break;
        
}


/******    LAYOUT HEADER    ******/
require_once('library/layout_header.php');
show_header($headHTML, $controleur, $pageSecure);


/******    Menu    ******/   
require_once('library/menu.php');
show_menu($menuHeader, $headHTML, $pageSecure);


/******    LAYOUT PAGE    ******/
require_once('layout/'.$controleur[$pageSecure]["layout"].'/'.$controleur[$pageSecure]["nom"].'.php');


/******    LAYOUT FOOTER    ******/
require_once('library/layout_footer.php');
show_footer($headHTML, $controleur,$pageSecure);


?>