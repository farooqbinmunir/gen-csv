<?php
    // session_start();
	function gen_csv_activation(){
        // $uploads_dir = trailingslashit( wp_upload_dir()['basedir'] ) . 'gen_csv_data';
        // wp_mkdir_p( $uploads_dir );
        // $uploadDir = wp_upload_dir();
        // $dir = $uploadDir['basedir'] . '/gen_csv_data';
        // // if(!is_dir($dir)){
        // //     mkdir($dir);
        // //     $_SESSION['gen_csv_default_dir'] = 'gen_csv_data';
        // // }else{
        // //     $_SESSION['gen_csv_default_dir'] = 'gen_csv_data';
        // // }
        flush_rewrite_rules();
    }
    register_activation_hook( __FILE__, 'gen_csv_activation' );
?>