<?php

function siteName_assets()
{
    wp_enqueue_style('reset', get_template_directory_uri() . '/assets/css/reset.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css');
    wp_enqueue_style('maincss', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/app.js', array(), 1, true);
    wp_enqueue_script('player', get_template_directory_uri() . '/assets/js/playerjs.js');
    wp_enqueue_script('knigorai-ajax-search', get_template_directory_uri() . '/assets/js/ajax-search.js', array(), '', true);
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/functions/node_modules/jquery/dist/jquery.min.js', array(), '', true);
}

add_action('wp_enqueue_scripts', 'siteName_assets');



//Добавление меню
add_action('after_setup_theme', function () {
    add_theme_support('menus');
});



//Добавить картинки к посту
add_theme_support('post-thumbnails');
add_theme_support('post-thumbnails', array('portfolio'));



//AJAX search
require get_template_directory() . '/assets/functions/ajax-search.php';

add_filter("pre_get_posts", "include_search_filter");
function include_search_filter($query)
{
    if (!is_admin() && $query->is_main_query() && $query->is_search) {
        $query->set("post_type", "post");
    }
    return $query;
}
