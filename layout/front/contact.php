<!--  PAGE CONTACT  -->   

<div class="container top50">
    
    <?php
    
        /********  Génér un formulaire ********/
        $arrayForm = array(
            
            "info" => array (
                // ID du formulaire, doit etre différent pour chaque formulaire, tres important !
                'id' => 'formContact',
                // Ajoutez une class CSS à votre formulaire ou laissez la valeur vide
                'class' => 'top50',
                // Message de confirmation
                'confirmation' => '<h4><strong>Votre formulaire a bien été receptionné...</strong></h4>
                <p>Vous recevrez une réponse très rapidement !</p>',
                // GET ou POST (choix par defaut si champ vide : POST)
                'method' => 'post',
                // Adresse de destination. Laissez vide pour envoyer le formulaire sur la même page
                'action' => 'contact.html'
            ),
            
            // Champ INPUT
            
            // Vous pouvez ajouter autant de champs que vous souhaitez à votre formulaire
            // ID du champ, doit etre différent pour chaque champ, tres important !
            "field1" => array (
                // Element INPUT
                "input" => array (
                    // Type du champ INPUT : text/email/hidden/number/date ... 
                    'type' => 'text',
                    // Attribut NAME du champ INPUT
                    'name' => 'nom',
                    // Chiffre pour une vérification basée sur un nombre de caractere minimum
                    // ou vérification au choix : mail/obligatoire/name/pseudo/number/password/phone_fr/same=NOMINPUT
                    'verif' => 'obligatoire',
                    // Message d'aide relatif au champ. Texte situé sous ce champ.
                    'help' => '',
                    // Attribut VALUE du champ INPUT. Valeur par défaut ou laissez vide.
                    'value' => '',
                    // Attribut PLACEHOLDER du champ INPUT. Laissez vide ou entrez une valeur
                    'placeholder' => 'Votre nom',
                    // LABEL du champ INPUT
                    'label' => 'Nom',
                    // Attribut CLASS du champ INPUT
                    'class' => ''
                )
            ),
            
            // Vous pouvez ajouter autant de champs que vous souhaitez à votre formulaire
            // ID du champ, doit etre différent pour chaque champ, tres important !
            "field2" => array (
                // Element INPUT
                "input" => array (
                    'type' => 'number',
                    'name' => 'age',
                    'verif' => 'number',
                    'help' => '',
                    'value' => '',
                    'placeholder' => 'Votre age',
                    'label' => 'Age',
                    'class' => ''
                ) 
            ),
            
            // Vous pouvez ajouter autant de champs que vous souhaitez à votre formulaire
            // ID du champ, doit etre différent pour chaque champ, tres important !
            "field3" => array (
                // Element INPUT
                "input" => array (
                    'type' => 'date',
                    'name' => 'date',
                    'verif' => '',
                    'help' => '',
                    'value' => '2016-12-25',
                    'label' => 'Anniversaire',
                    'class' => ''
                ) 
            ),
            
            // Vous pouvez ajouter autant de champs que vous souhaitez à votre formulaire
            // ID du champ, doit etre différent pour chaque champ, tres important !
            "field4" => array (
                // Element INPUT
                "input" => array (
                    'type' => 'password',
                    'name' => 'motdepasse',
                    'verif' => 'password',
                    'help' => '',
                    'value' => '',
                    'placeholder' => 'Votre mot de passe',
                    'label' => 'Password',
                    'class' => ''
                ) 
            ),
            
            // Vous pouvez ajouter autant de champs que vous souhaitez à votre formulaire
            // ID du champ, doit etre différent pour chaque champ, tres important !
            "field5" => array (
                // Element INPUT
                "input" => array (
                    'type' => 'password',
                    'name' => 'motdepassebis',
                    'verif' => 'same=motdepasse',
                    'help' => '',
                    'value' => '',
                    'placeholder' => 'Retaper votre mot de passe',
                    'label' => 'Password bis',
                    'class' => ''
                ) 
            ),
            
            // Champ SELECT
            
            // Vous pouvez ajouter autant de champs que vous souhaitez à votre formulaire
            // ID du champ, doit etre différent pour chaque champ, tres important !
            "field6" => array (
                // Element SELECT
                "select" => array (
                    'name' => 'sexe',
                    'help' => '',
                    'label' => 'Sexe',
                    'class' => '',
                    // Laissez le champ SELECTED vide si aucune préselection / valeur d'un champ OPTION
                    'selected' => 'femme',
                    // Entrez autant de champ 'cle' => 'valeur' que vous souhaitez
                    'option' => array (
                        'homme' => 'Je suis un homme',
                        'femme' => 'Je suis une femme',
                        'animal' => 'Je suis un animal'
                    )
                )
            ),
            
            // Champ CHECKBOX
            
            // Vous pouvez ajouter autant de champs que vous souhaitez à votre formulaire
            // ID du champ, doit etre différent pour chaque champ, tres important !
            "field7" => array (
                // Element CHECKBOX
                "checkbox" => array (
                    'name' => 'langage',
                    'help' => '',
                    // Verif pour les checkbox, option : vide ou 'obligatoire'
                    'verif' => '',
                    'label' => 'Langage',
                    'class' => 'top30',
                    // Liste des INPUT type CHECKBOX /  'valeur' => 'description' OU 'valeur,checked' => 'description'
                    'input' => array (
                        'html,checked' => 'Je maitrise le HTML et le CSS',
                        'php,checked' => 'Je maitrise le PHP',
                        'js' => 'Je maitrise le JavaScript'
                    )
                )
            ),
            
            // Champ RADIO
            
            // Vous pouvez ajouter autant de champs que vous souhaitez à votre formulaire
            // ID du champ, doit etre différent pour chaque champ, tres important !
            "field8" => array (
                // Element RADIO
                "radio" => array (
                    'name' => 'experience',
                    'help' => '',
                    'label' => 'Experience',
                    'class' => '',
                    // Laissez le champ CHECKED vide si aucune préselection / valeur d'un ou plusieurs CHECKED (séparés par une virgule) 
                    'checked' => 'passionne', 
                    // Liste des INPUT type RADIO : 'valeur' => 'description'
                    'input' => array (
                        'debutant' => 'Je découvre la programmation',
                        'passionne' => 'Je suis un passionné avec quelques experiences',
                        'pro' => 'Je suis un professionnel'
                    )
                )
            ),
            
            // Champ TEXTAREA
            
            // Vous pouvez ajouter autant de champs que vous souhaitez à votre formulaire
            // ID du champ, doit etre différent pour chaque champ, tres important !
            "field9" => array (
                // Element TEXTAREA
                "textarea" => array (
                    'name' => 'message',
                    'help' => '',
                    'label' => 'Message',
                    'class' => '',
                    'row' => '10',
                    // Verif pour les TEXTAREA, option : vide ou 'obligatoire'
                    'verif' => 'obligatoire',
                    'placeholder' => '',
                    'value' => ''
                )
            ),
            
            // Champ SUBMIT
            
            // Vous pouvez ajouter autant de champs que vous souhaitez à votre formulaire
            // ID du champ, doit etre différent pour chaque champ, tres important !
            "field10" => array (    
                // Bouton SUBMIT
                "submit" => array (
                    'text' => 'Soumettre',
                    'class' => 'primary'
                )
            )
            
        );
    
        // Appel de la fonction affichant le formulaire
        formulaire($arrayForm, $pageSecure);
    
    ?>
    
</div>