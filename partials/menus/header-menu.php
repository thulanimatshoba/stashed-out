<?php

if ( !has_nav_menu('top-menu') ) {
    return;
}

wp_nav_menu(
    [
        'theme_location' => 'top-menu',
        'container_class' => 'ninjah-menu',
//        'menu_class' => 'uk-visible@s',
        'link_before' => '',
        'link_after' => '',
    ]
);