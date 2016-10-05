<?php
/**
 * Plugin name: Expression Engine
 * Description: loads data that's already been exported from EE into WordPress
 * Author: Kael
 */

if( !defined( 'ABSPATH' ) ) :
    die;
endif;

new EEImport();

class EEImport{
    
    
    public function __construct() {
        $this->add_hooks();
    }
    
    public function add_hooks() {
        add_action( 'admin_menu', array( $this, 'create_admin_menu' ) );
    }
    
    
    
    public static function do_import(){
        include_once 'script.php';
    }
    
    function create_admin_menu(){
        add_menu_page('EE Import', 'EE Import', 'manage_options', 'ee_import', array( $this, 'create_menu' ) );
    }
    
    function create_menu(){
        
        include_once 'settings.php';
    }
    
    
    
}


