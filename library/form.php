<?php

function formulaire($arrayForm, $pageSecure) {
    
    $arrayInfo = $arrayForm["info"];
    $id_form = ( !empty($arrayInfo["id"]) ? $arrayInfo["id"] : "");
    
    if($_POST['validation_form'] == $id_form AND $_POST['error_form'] == 0) {
        $confirmation_formulaire = ( !empty($arrayInfo['confirmation']) ? $arrayInfo['confirmation'] : "<h4>Formulaire envoyé !</h4>");
        echo '<div class="alert alert-info top50" role="alert">'.$confirmation_formulaire.'</div>';
    } else {

        // définition des champ ayant une erreur et du message d'erreur à afficher
        if($_POST['validation_form'] == $id_form AND $_POST['error_form'] != 0) { 
            $array_valeur_form = explode("//", $_POST['valeur_form']);
            $array_message_error_form = explode("/", $_POST['message_error_form']);
        }
        
        $message_error_form; $valeur_form; $valeur_champ;$i_radio = 1;
        
        $class = ( !empty($arrayInfo["class"]) ? $arrayInfo["class"] : "");
        $method = ( !empty($arrayInfo["method"]) ? $arrayInfo["method"] : "post");
        $action = ( !empty($arrayInfo["action"]) ? $arrayInfo["action"] : "index.php?page=".$pageSecure);

        echo '<form method="'.$method.'" action="'.$action.'" class="row g-3 '.$class.'" id="'.$id_form.'">';

        foreach($arrayForm as $champ) {

            $key = array_search ($champ, $arrayForm);

            if($key != "info") {

                $key_champ = key($champ);
                
                $verif_champ = ( !empty($champ[$key_champ]["verif"]) ? $champ[$key_champ]["verif"] : "no");
                $array_champ .= ( !empty($array_champ) ? "-".$key_champ.':'.$verif_champ.':'.$champ[$key_champ]["name"] : $key_champ.':'.$verif_champ.':'.$champ[$key_champ]["name"]);
                
                $required= "";
                $asterisque = ( !empty($champ[$key_champ]["verif"]) ? " *" : "");
                $required = ( !empty($asterisque) ? "required" : "");
                $help_champ = ( !empty($champ[$key_champ]["help"]) ? "<p class='form-text text-muted'><small>".$champ[$key_champ]["help"]."</small></p>": "");
                
                if(isset($array_valeur_form)) {
                
                    foreach($array_valeur_form as $valeur_champ_recup) {
                        $array_valeur_champ = explode("::", $valeur_champ_recup);
                        foreach($array_valeur_champ as $valeur_champ) {
                            if($array_valeur_champ[0] == $valeur_champ AND $champ[$key_champ]["name"] == $array_valeur_champ[0]) { 
                                $valeur = $array_valeur_champ[1];
                                if($champ[$key_champ]["verif"] == "mail") { $valeur = strtolower($valeur); }
                            }
                        }
                    }
                    
                } 
                else {
                    $valeur = $champ[$key_champ]["value"];
                }
                
                $class_error_form = "";$msg_error_form = "";
                
                foreach($array_message_error_form as $message_error_recup) {
                    $array_message_error_recup = explode(":", $message_error_recup);
                    foreach($array_message_error_recup as $error_msg) {
                        if($array_message_error_recup[1] == $error_msg AND $champ[$key_champ]["name"] == $array_message_error_recup[0]) {
                            if($array_message_error_recup[1] != "") { 
                                $class_error_form = 'is-invalid'; 
                                $msg_error_form = '<div class="invalid-feedback">'.$array_message_error_recup[1].' </div>';
                            }
                        }
                    }
                }
                
                switch(key($champ)) {

                    case "input":
                        $placeholder = ( empty($champ[$key_champ]["placeholder"]) ? "" : 'placeholder="'.$champ[$key_champ]["placeholder"].'"');
                        echo '<div class="col-md-10 '.$champ[$key_champ]["class"].'">
                            <label for="'.$champ[$key_champ]["name"].'" class="form-label">'.$champ[$key_champ]["label"].' '.$asterisque.'</label>
                            <input value="'.$valeur.'" name="'.$champ[$key_champ]["name"].'" id="'.$champ[$key_champ]["name"].'" type="'.$champ[$key_champ]["type"].'" class="form-control '.$class_error_form.'" '.$placeholder.' '.$required.'>
                            '.$msg_error_form.''.$help_champ.'
                        </div>';
                        break;

                    case "select":
                        $name_select = $champ[$key_champ]["name"];
                        $selected_option = ( !empty($valeur) ? $valeur : $champ[$key_champ]["selected"]);
                        echo '<div class="col-md-10 '.$champ[$key_champ]["class"].'">
                            <label for="'.$champ[$key_champ]["name"].'" class="form-label">'.$champ[$key_champ]["label"].' '.$asterisque.'</label>
                            <select id="'.$champ[$key_champ]["name"].'" class="form-select" name="'.$name_select.'" '.$required.'>';
                        foreach($arrayForm[$key][$key_champ]["option"] as $champ_select) {
                            $key_select = array_search ($champ_select, $arrayForm[$key][$key_champ]["option"]);
                            $select_this = ( $selected_option == $key_select ? "selected" : "" );
                            echo '<option value="'.$key_select.'" '.$select_this.'>'.$champ_select.'</option>';
                        }
                        echo '</select>'.$help_champ.'</div>';
                        break;

                    case "checkbox":
                        echo '
                        <div class="col-md-10 '.$class_error_form.' '.$champ[$key_champ]["class"].'">';
                        $name_check = $champ[$key_champ]["name"];
                        foreach($arrayForm[$key][$key_champ]["input"] as $champ_check) {
                            $key_check = array_search ($champ_check, $arrayForm[$key][$key_champ]["input"]);
                            $arrayValueCheck = explode(",", $key_check);
                            $checked_check = ( $arrayValueCheck[1] != "" ? "checked" : "" );
                            echo '
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="'.$name_check.'[]" id="'.str_replace(",checked", "", $key_check).'" value="'.str_replace(",checked", "", $key_check).'" '.$checked_check.'>
                                    <label class="form-check-label" for="'.str_replace(",checked", "", $key_check).'">'.$champ_check.'</label>
                                </div>';  
                        }
                        echo $help_champ.'</div>';
                        break;

                   case "radio":
                        echo '
                        <div class="col-md-10 '.$class_error_form.' '.$champ[$key_champ]["class"].'">
                            <legend class="col-form-legend col-sm-2">'.$champ[$key_champ]["label"].' '.$asterisque.'</legend>';
                        $name_radio = $champ[$key_champ]["name"];
                        $checked_radio = ( !empty($valeur) ? $valeur : $champ[$key_champ]["checked"]);
                        
                        foreach($arrayForm[$key][$key_champ]["input"] as $champ_radio) {
                            $key_radio = array_search ($champ_radio, $arrayForm[$key][$key_champ]["input"]);
                            $check_this = ( $checked_radio == $key_radio ? "checked" : "" );
                            
                            echo '
                                <div class="form-check">
                                
                                    <input class="form-check-input" type="radio" name="'.$name_radio.'" id="radio'.$i_radio.'" value="'.$key_radio.'" '.$check_this.'>
                                    
                                    
                                    <label class="form-check-label" for="radio'.$i_radio.'">'.$champ_radio.'</label>
                                
                                </div>';
                            $i_radio = $i_radio + 1;
                        }

                        echo $help_champ.'</div>';
                        break;
                        
                   case "textarea":
                        echo '
                        <div class="col-md-10 '.$class_error_form.' '.$champ[$key_champ]["class"].'">
                        
                            <label for="'.$champ[$key_champ]["name"].'" class="form-label">'.$champ[$key_champ]["label"].' '.$asterisque.'</label>
                            
                            <textarea name="'.$champ[$key_champ]["name"].'" id="'.$champ[$key_champ]["name"].'" class="form-control '.$class_error_form.'" rows="'.$champ[$key_champ]["row"].'" placeholder="'.$champ[$key_champ]["placeholder"].'">'.$valeur.'</textarea>';
                        
                        echo $msg_error_form.''.$help_champ.'</div>';
                        break;

                    case "submit":
                        echo '<div class="form-group row"><div class="col-sm-10">';
                        $class_submit = (!empty($champ[$key_champ]["class"]) ? $champ[$key_champ]["class"] : "default");
                        $text_submit = ( !empty($champ[$key_champ]["text"]) ? $champ[$key_champ]["text"] : "Envoyer");
                        echo '<button type="submit" class="btn btn-'.$class_submit.' top30">'.$text_submit.'</button>';
                        echo '</div></div>';
                        break;

                }

            }  

        }
        
        echo '<input type="hidden" name="array_champ" value="'.str_replace("-submit::no::", "", $array_champ).'" />';
        echo '<input type="hidden" name="send" value="'.$id_form.'" />';
        echo '<input type="hidden" name="ip_form" value="'.$_SERVER["REMOTE_ADDR"].'" />';
        echo '</form>';
        
    }

}

?>