<?php

function show_menu($menuHeader, $headHTML, $pageSecure) {
    
    $menu_color = ( empty($menuHeader["info"]["color"]) ? "navbar-light bg-faded" : $menuHeader["info"]["color"]);

    echo '<nav class="navbar navbar-expand-lg '.$menuHeader["info"]["placement"].' '.$menu_color.' '.$menuHeader["info"]["class"].'">
            
            <div class="container-fluid">
            
                <a class="navbar-brand" href="'.$headHTML["adresse_site"].'">';

                if(!empty($headHTML["logo"])) {echo '<img src="img/'.$headHTML["logo"].'" width="30" height="30" class="d-inline-block align-top right5" alt="'.$headHTML["titre"].'">'; }

                echo $headHTML["titre"].'</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#'.$menuHeader["info"]["id"].'" aria-controls="'.$menuHeader["info"]["id"].'" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

              
                <div class="collapse navbar-collapse" id="'.$menuHeader["info"]["id"].'">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">';

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
                        <a class="nav-link dropdown-toggle" href="#" id="menuH'.$i_menu.'" role="button" data-bs-toggle="dropdown" aria-expanded="false">'.$key2.'</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                $i_menu++;

                foreach($menu as $menuSS) {
                    $key = array_search ($menuSS, $menu);
                    if(!empty($menuSS)) { echo '<li><a class="dropdown-item" href="'.$menuSS.'">'.$key.'</a></li>'; }
                }
                echo '</ul></li>';
            
            }        

        }

    }
    
    echo '</ul></div>
  </div>
</nav>';
    
}


?>