<?php
	/**
	 * Gen CSV ========= ENQUEUES
	 * @package Gen CSV
	*/

	function gen_csv_enqueues(){
		wp_enqueue_style('gen_csv_styles', plugins_url('gen-csv') . '/assets/css/style.css');

		wp_enqueue_script('gen_csv_script', plugins_url('gen-csv') . '/assets/js/script.js');

		wp_localize_script('gen_csv_script', 'gen_csv_AJAX', [
			'gen_csv_URL' => admin_url('admin-ajax.php')
		]);
	}
	add_action('admin_enqueue_scripts', 'gen_csv_enqueues');