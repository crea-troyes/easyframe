<?php

function show_footer($headHTML, $controleur,$pageSecure) {
 
    echo '<hr class="top50">';
    
    if(!empty($headHTML["copyright"])) { 
        echo '<footer class="container"><p class="text-sm-center gris font12"><small>'.$headHTML["titre"].' - '.$headHTML["copyright"].' - Tous droits réservés '.date("Y", time()).'</small></p></footer>'; 
    }
    
    // CSS
    $arrayCSS = explode(",", $controleur[$pageSecure]["cssasync"]);
    foreach($arrayCSS as $css_link) {
        if(!empty($css_link)) {  echo '<script>loadCSS("css/'.$headHTML["$css_link"].'");</script>'; }
    }
    
    // JS
    $arrayJSfoot = explode(",", $controleur[$pageSecure]["jsfoot"]);
    foreach($arrayJSfoot as $js_link_foot) {
        if(!empty($js_link_foot)) { echo '<script src="js/'.$headHTML["$js_link_foot"].'"></script>'; }
    }
    	
    echo '</body></html>';
    
}


?>








