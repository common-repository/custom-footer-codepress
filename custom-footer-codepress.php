<?php

/**
 * Plugin Name: Custom Footer - CodePress
 * Plugin URI: http://plugins.svn.wordpress.org/codepress-custom-footer
 * Description: The plugin Codepress Custom Footer is useful for add custom footer in your site. This plugin add description of you Wordpress and the current year, simple and easy. Know us www.codepress.dev
 * Version: 1.0
 * Requires at least: 6.1
 * Author: Team Codepress
 * Author URI: https://www.codepress.dev
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: codepress-custom-footer
 * Domain Path: /languages
 */

 /*
Codepress Custom Footer is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
Codepress Custom Footer is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with Codepress Custom Footer. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/
if(!function_exists('add_action')){
    echo __('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

class CODEPRESS_custom_panel{

    private static $instance;

    public static function getInstance(){

        if(self::$instance == NULL){
            self::$instance = new self();
        }

    }

    private function __construct(){
        // Setup
        define( 'CODEPRESS_VERSION', '1.0.0' );
        define( 'CODEPRESS_MINIMUM_WP_VERSION', '6.1' );
        define( 'CODEPRESS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
        define( 'CODEPRESS_PLUGIN_URL', __FILE__);

        //Includes
        include( 'includes/enqueue.php' );
        include( 'includes/activate_plugin.php' );
        include( 'includes/dashboard_welcome.php' );

        //Hooks
        register_activation_hook( CODEPRESS_PLUGIN_URL, 'codepress_activate_plugin' );
        remove_action('welcome_panel', 'wp_welcome_panel');
        add_action('welcome_panel', 'codepress_welcome_panel');
        add_action('admin_head', 'codepress_enqueue_scripts',100);//Style dashboard admin
        add_action('wp_footer', 'codepress_custom_footer');


        function codepress_custom_footer(){
            ?>
                <footer style="background-color: #ccc; width:100%; padding:10px 0; display: flex; justify-content: center; align-items: center" >
                    <p style="color:#fff; font-size:16px;">
                        <?php 
                            echo 'Todos os direitos reservados - ';
                            esc_attr( bloginfo('description') );
                            echo ' - ';
                            echo "<strong>" . esc_attr( Date('Y') ) . "</strong>";
                        ?>
                    </p>
                </footer>
            <?php
        }
    }
}

CODEPRESS_custom_panel::getInstance();