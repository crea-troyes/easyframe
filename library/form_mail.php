<?php

// Envoie d'un formulaire
function envoi_formulaire($MailTo, $contenu_form, $MailSubject) {
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    $MailBody = "
        <html>
            <head>
                <meta charset=\"UTF-8\">
                <title>".$MailSubject."</title>
                <style type=\"text/css\">
                    body { padding:10px;font-family:'Helvetica', Arial;font-size:16px; }
                    h1 { color:#fff;background:#555;padding:20px;idth:100%;font-size:1.5em; }
                    ul { list-style-type:none;font-size:14px;color:#777;margin:0;padding:20px;border:1px solid #ccc;background:#f1f1f1; }
                    ul li { margin-bottom:5px; }
                    ul li strong { font-weight:bold; color:#111;margin-left:5px; }
                </style>
            </head>
            <body>".$contenu_form."</body>
        </html>";

    mail($MailTo, $MailSubject, $MailBody, $headers);    
    
}

?>