<?php
	/**
	 * Plugin Name: Gen CSV
	 * Plugin URI: http://localhost/CTD/
	 * Version: 1.0
	 * Author: Farooq Bin Munir
	 * Author URI: http://localhost/CTD/
	 * Description: Easily get your data in a CSV file format on single click.
	 * Text Domain: gen_csv
	*/

	/**
	 * @package Gen CSV
	 * @author Farooq Bin Munir
	*/
	session_start();
	ob_start();

	if(!defined('ABSPATH')){ 
		exit;
	}

	// Defining Constants
	define('GEN_CSV_VERSION', '1.0.0');
	define('GEN_CSV_FILE', __FILE__);

	// Will run on activation
	function gen_csv_activation(){
        $gen_csv_upload_dir = trailingslashit( wp_upload_dir()['basedir'] ) . 'gen_csv_data';
        if(!is_dir($gen_csv_upload_dir)){
            wp_mkdir_p( $gen_csv_upload_dir );
            $_SESSION['gen_csv_default_dir'] = 'gen_csv_data';
        }else{
            $_SESSION['gen_csv_default_dir'] = 'gen_csv_data';
        }
        flush_rewrite_rules();
    }
    register_activation_hook( __FILE__, 'gen_csv_activation' ); // will refresh permalinks on activation

	// Will run on deactivation
    function gen_csv_deactivation(){
        flush_rewrite_rules();
    }
    register_deactivation_hook( __FILE__, 'gen_csv_deactivation' ); // will refresh permalinks on deactivation

	require_once(plugin_dir_path( __FILE__ ) . '/inc/enqueues.php');
	require_once(plugin_dir_path( __FILE__ ) . '/inc/menu.php');