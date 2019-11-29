<?php

/** 
* @package ChessPlugin
*/


/*
 Plugin Name: WP Chess Plugin
 Plugin URI: https://ronpicard.com
 Description: WP Chess Plugin
 Version: 1.0.0
 Aurthor: https://ronpicard.com
 Lincense: MIT License 
 */

defined('ABSPATH') or die('nope.');

class ChessPlugin
{
    function __construct(){
        add_action( 'init', array( $this, 'custom_post_type' ) );
    }

    function activate(){
        // call just incase
        $this->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate(){
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function unistall(){

    }

    function custom_post_type(){
        register_post_type( 'book', ['public' => true, 'label' => 'books'] );
    }

}

if (class_exists( 'ChessPlugin' ) ) {
    $chessPlugin = new ChessPlugin();
}


//built in hooks
register_activation_hook( __file__ , array($chessPlugin, 'activate') );
register_activation_hook( __file__ , array($chessPlugin, 'dectivate') );

