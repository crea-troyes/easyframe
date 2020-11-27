<?php

function show_menu($menuHeader, $headHTML, $pageSecure) {
    
    $menu_color = ( empty($menuHeader["info"]["color"]) ? "navbar-light bg-faded" : $menuHeader["info"]["color"]);

    echo '<nav class="navbar navbar-expand-lg '.$menuHeader["info"]["placement"].' '.$menu_color.' '.$menuHeader["info"]["class"].'">
            <a class="navbar-brand" href="'.$headHTML["adresse_site"].'">';

            if(!empty($headHTML["logo"])) {echo '<img src="img/'.$headHTML["logo"].'" width="30" height="30" class="d-inline-block align-top right5" alt="'.$headHTML["titre"].'">'; }

            echo $headHTML["titre"].'</a>
            
            <button class="navbar-toggler hidden-lg-up right" type="button" data-toggle="collapse" data-target="#'.$menuHeader["info"]["id"].'" aria-controls="'.$menuHeader["info"]["id"].'" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="clearRight"> </div>
            <div class="container collapse navbar-toggleable-md" id="'.$menuHeader["info"]["id"].'">
            <ul class="nav navbar-nav">';

    $i_menu = 1;
    
    foreach($menuHeader as $menu) {

        $key_info = array_search ($menu, $menuHeader);
        if($key_info != "info") {
            
            $active_menu_header = ( $pageSecure == $key_info ? "active" : "" );
        
            if(!is_array($menu)) {
                $key = array_search ($menu, $menuHeader);
                echo '<li class="nav-item '.$active_menu_header.'"><a class="nav-link" href="'.$menu.'">'.$key.'</a></li>';
            } 
            else {
                $key2 = array_search ($menu, $menuHeader);
                echo ' <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="menuH'.$i_menu.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$key2.'</a><div class="dropdown-menu" aria-labelledby="menuH'.$i_menu.'"> ';
                $i_menu++;

                foreach($menu as $menuSS) {
                    $key = array_search ($menuSS, $menu);
                    if(!empty($menuSS)) { echo '<a class="dropdown-item" href="'.$menuSS.'">'.$key.'</a>'; }
                }
                echo '</div></li>';
            }        

        }

    }
    
    echo '</ul></div></nav>';
    
}


?>