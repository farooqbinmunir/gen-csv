<?php
	function gen_csv_deactivation(){
        flush_rewrite_rules();
    }
    register_deactivation_hook( __FILE__, 'gen_csv_deactivation' );
?>