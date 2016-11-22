<?php

function show_header($headHTML, $controleur, $pageSecure) {
 
    echo '<!doctype html><html lang="fr"><head>';
    
    echo $headHTML["charset"];
    echo '<meta http-equiv="x-ua-compatible" content="ie=edge">';
    echo $headHTML["viewport"];
    echo $headHTML["phone"];
    
    $title = ( empty($controleur[$pageSecure]["title"]) ? $controleur[$pageSecure]["nom"] : $controleur[$pageSecure]["title"]);
    echo '<title>'.$title.'</title>';
    
    echo '<meta name="description" content="'.$controleur[$pageSecure]["description"].'" />';
    echo '<meta name="author" content="'.$headHTML["auteur"].'">';
    
    echo '<link rel="shortcut icon" type="image/x-icon" href="img/'.$headHTML["favicon"].'" />';
    echo '<link rel="icon" type="image/vnd.microsoft.icon" href="img/'.$headHTML["favicon"].'">';
    
    echo '<script>function loadCSS(a,d,f,g){var b=window.document.createElement("link");var c=d||window.document.getElementsByTagName("script")[0];var e=window.document.styleSheets;b.rel="stylesheet";b.href=a;b.media="only x";if(g){b.onload=g}c.parentNode.insertBefore(b,c);b.onloadcssdefined=function(h){var k;for(var j=0;j<e.length;j++){if(e[j].href&&e[j].href.indexOf(a)>-1){k=true}}if(k){h()}else{setTimeout(function(){b.onloadcssdefined(h)})}};b.onloadcssdefined(function(){b.media=f||"all"});return b};</script>';
    
    // CSS
    $arrayCSS = explode(",", $controleur[$pageSecure]["css"]);
    foreach($arrayCSS as $css_link) {
        if(!empty($css_link)) {  echo '<link rel="stylesheet" type="text/css" href="css/'.$headHTML["$css_link"].'">'; }
    }
    
    // JS
    $arrayJS = explode(",", $controleur[$pageSecure]["jshead"]);
    foreach($arrayJS as $js_link) {
        if(!empty($js_link)) { echo '<script src="js/'.$headHTML["$js_link"].'"></script>'; }
    }
    	
    echo '</head><body>';    
    
}


?>