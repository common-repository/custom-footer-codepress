<?php

function codepress_enqueue_scripts(){
    wp_register_style(
        'codepress_style', 
        plugins_url('/assets/css/style.css', CODEPRESS_PLUGIN_URL)
    );

    wp_register_style(
        'codepress_fontawesome', 
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css',
    );

    wp_register_script(
        'codepress_script',
        plugins_url('/assets/js/script.js', CODEPRESS_PLUGIN_URL),
        array('jquery'),
        '1.0',
        true
    );
    
    wp_enqueue_style('codepress_style');//css
    wp_enqueue_style('codepress_fontawesome' );//css
    wp_enqueue_script('codepress_script');//js
}