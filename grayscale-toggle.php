<?php
/*
Plugin Name: Grayscale Toggle
Description: Додає кнопку у верхню панель та дозволяє включати або вимикати режим градації кольорів.
Version: 1.0
Author: Kot Oleksii
*/

// Add script
function grayscale_toggle_scripts() {
    wp_enqueue_script('grayscale-toggle-script', plugin_dir_url(__FILE__) . 'js/grayscale-toggle.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'grayscale_toggle_scripts');

// Add topbar menu link
function add_grayscale_toggle_to_menu($items, $args) {
    if ($args->theme_location == 'topbar') {
        $toggle_text = 'Людям з порушеннями зору';
        if(isset($_COOKIE['toggle_state']) && $_COOKIE['toggle_state'] === 'grayscale_enabled') {
            $toggle_text = 'Звичайна версія';
        }
        $grayscale_toggle = '<li class="menu-item"><a id="grayscaleToggle" class="nav__link" href="#"><span class="nav__title"><i class="fa fa-eye"></i> '.$toggle_text.'</span></a></li>';
        $items .= $grayscale_toggle;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_grayscale_toggle_to_menu', 10, 2);
