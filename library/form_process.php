<?php

function traitement_formulaire($id_form, $id_form_send, $traitement) {

    $valeur_form = "";
    $error_form = 0;
    $message_error_form = "";
    
    $id_form = ( empty($id_form) ? "" : htmlspecialchars($id_form));
    if(trim($id_form) != "" AND $id_form == $id_form_send) {

        $array_champ = explode("-", $_POST['array_champ']);
        
        foreach($array_champ as $array_champ_verif) {
            
            $array_champ_verif = explode(":", $array_champ_verif);
            
            // Récupération et sécurisation des variables
            switch($array_champ_verif[0]) {
                
                case "input":
                case "radio":
                case "select":
                case "textarea":
                    $champ_secure = trim(htmlspecialchars($array_champ_verif[2]));
                    $valeur_secure = trim(htmlspecialchars($_POST[$champ_secure]));
                    break;
                    
               case "checkbox":
                    $champ_secure = trim(htmlspecialchars($array_champ_verif[2]));
                    $valeur_secure = $_POST[$champ_secure];
                    break;
                    
            }
            
            // Vérifiez que toutes les variables sont des chaînes
            $champ_secure = is_array($champ_secure) ? implode(', ', $champ_secure) : $champ_secure;
            $valeur_secure = is_array($valeur_secure) ? implode(', ', $valeur_secure) : $valeur_secure;
            $valeur_form = is_array($valeur_form) ? implode(', ', $valeur_form) : $valeur_form;

            // Concaténation
            $valeur_form .= ( $valeur_form == "" 
                ? $champ_secure . '::' . $valeur_secure 
                : '//' . $champ_secure . '::' . $valeur_secure );

            // Vérification des champs
            switch(substr($array_champ_verif[1] ,0, 2)) {
                    
                case "ob":
                    $error_form = ( !empty($valeur_secure) ? $error_form : $error_form+1);
                    if(empty($valeur_secure)) { 
                        $message_error_form .= ( empty($message_error_form) ? $champ_secure.":Veuillez renseigner ce champ" : '/'.$champ_secure.":Veuillez renseigner ce champ"); 
                    }
                    break;
                    
                case "ma":
                    $valeur_secure = strtolower($valeur_secure);
                    $error_form = ( preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $valeur_secure) ? $error_form : $error_form+1);
                    if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $valeur_secure)) { 
                        $message_error_form .= ( empty($message_error_form) ? $champ_secure.":Veuillez indiquer une adresse mail valide" : '/'.$champ_secure.":Veuillez indiquer une adresse mail valide");
                    }
                    break;
                    
                case "na":
                    $error_form = ( preg_match("/^[a-z ,.éèêâàç'-]+$/i", $valeur_secure) && strlen($valeur_secure) < 40 && strlen($valeur_secure) > 2 ? $error_form : $error_form+1);
                    if(!preg_match("/^[a-z ,.éèêâàç'-]+$/i", $valeur_secure) OR strlen($valeur_secure) > 40 OR strlen($valeur_secure) < 3) { 
                        $message_error_form .= ( empty($message_error_form) ? $champ_secure.":Veuillez renseigner ce champ" : '/'.$champ_secure.":Veuillez renseigner ce champ"); 
                    }
                    break;
                    
                case "ps":
                    $error_form = ( preg_match("/^[a-z ,.éèêâàç@_'-]+$/i", $valeur_secure) && strlen($valeur_secure) < 20 && strlen($valeur_secure) > 5 ? $error_form : $error_form+1);
                    if(!preg_match("/^[a-z ,.éèêâàç@_'-]+$/i", $valeur_secure) OR strlen($valeur_secure) > 20 OR strlen($valeur_secure) < 5) { 
                        $message_error_form .= ( empty($message_error_form) ? $champ_secure.":Veuillez renseigner ce champ" : '/'.$champ_secure.":Veuillez renseigner ce champ"); 
                    }
                    break;
                    
                case "nu":
                    $error_form = ( is_numeric($valeur_secure) ? $error_form : $error_form+1);
                    if(!is_numeric($valeur_secure)) {
                        $message_error_form .= ( empty($message_error_form) ? $champ_secure.":Veuillez indiquer un nombre" : '/'.$champ_secure.":Veuillez indiquer un nombre"); 
                    }
                    break;
                    
                 case "pa":
                    $error_form = ( preg_match("#.*^(?=.{6,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $valeur_secure) ? $error_form : $error_form+1);
                    if(!preg_match("#.*^(?=.{6,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $valeur_secure)) { 
                        $message_error_form .= ( empty($message_error_form) ? $champ_secure.":Veuillez indiquer votre mot de passe composé de six caractères minimum dont un chiffres" : '/'.$champ_secure.":Veuillez indiquer votre mot de passe composé de six caractères minimum dont un chiffres"); 
                    }
                    break;
                    
                case "ph":
                    $error_form = ( preg_match('#^0[1-9]([-. ]?[0-9]{2}){4}$#', $valeur_secure) ? $error_form : $error_form+1);
                    if(!preg_match('#^0[1-9]([-. ]?[0-9]{2}){4}$#', $valeur_secure)) { 
                        $message_error_form .= ( empty($message_error_form) ? $champ_secure.":Veuillez indiquer votre numéro de téléphone composé de 10 chiffres" : '/'.$champ_secure.":Veuillez indiquer votre numéro de téléphone composé de 10 chiffres"); 
                    }
                    break;
                    
                case "sa":
                    $champ_identique = str_replace("same=", "", $array_champ_verif[1]);
                    $valeur_champ_identique = $_POST[$champ_identique];
                    $error_form = ( $valeur_secure == $valeur_champ_identique ? $error_form : $error_form+1);
                    if($valeur_secure != $valeur_champ_identique) { 
                        $message_error_form .= ( empty($message_error_form) ? $champ_secure.":Ces champs doivent être identiques" : '/'.$champ_secure.":Ces champs doivent être identiques");
                    }
                    break;
                
                case "no":
                    break;
                
                default:
                    if(intval($array_champ_verif[1]) > 0 && intval($array_champ_verif[1]) < 50000) {
                        $error_form = ( strlen($valeur_secure) > $array_champ_verif[1]-1 ? $error_form : $error_form+1);
                        if(strlen($valeur_secure) < $array_champ_verif[1]) { 
                            $message_error_form .= ( empty($message_error_form) ? $champ_secure.":limit" : '/'.$champ_secure.":limit"); 
                        }       
                    }
                    
                    break;
                    
            }
        }
        
        // Envoi du formulaire par mail
        if($error_form == 0 AND preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $traitement)) {
            
            $mail_formulaire = '<h1>Formulaire <code>'.$id_form_send.'</code></h1>';
            $titre_mail_form = 'Formulaire '.$id_form_send;
            $mail_formulaire .= '<ul>';
            
            foreach($array_champ as $array_valeur_mail) {
                $mail_formulaire .= '<li>';
                $valeur_mail = explode(":", $array_valeur_mail);
                $champ_form_checkbox = (isset($champ_form_checkbox) ? $champ_form_checkbox : "");
                foreach($valeur_mail as $champ_mail) {
                    if($champ_mail == $valeur_mail[0]) {
                        $valeur_form_mail = $valeur_mail[2];
                        $champ_form = ( empty($_POST[$valeur_form_mail]) ? "Non communiqué" : $_POST[$valeur_form_mail]);
                        
                        
                        
                        if($valeur_mail[0] == "checkbox") {
                            $mail_formulaire .= '<strong>Champ '.$valeur_mail[0].' ['.$valeur_mail[2].']</strong> : ';
                            foreach($champ_form as $array_champ_form_checkbox) {
                                $champ_form_checkbox .= ( empty($champ_form_checkbox) ? $array_champ_form_checkbox : ', '.$array_champ_form_checkbox );
                            }
                            $mail_formulaire .= $champ_form_checkbox;
                        } else {
                            $mail_formulaire .= '<strong>Champ '.$valeur_mail[0].' ['.$valeur_mail[2].']</strong> : '.$champ_form;     
                        }
                        
                        
                      
                    }
                }
                $mail_formulaire .= '</li>';
            } 
            
            $mail_formulaire .= '</ul>';
            
            require_once('library/form_mail.php');
            envoi_formulaire($traitement, $mail_formulaire, $titre_mail_form);
            
        }
        
        $_POST['validation_form'] = $id_form;
        $_POST['error_form'] = $error_form;
        $_POST['message_error_form'] = $message_error_form;
        $_POST['valeur_form'] = $valeur_form;
        
    }

}

?>