<?php
	/**
	 * Gen CSV ========= MENU
	 * @package Gen CSV
	*/
	function gen_csv_menu(){
		add_menu_page( 
			__('Gen CSV', 'gen_csv'),
			__('Gen CSV', 'gen_csv'), 
			'manage_options', 
			'gen_csv', 
			'gen_csv_menu_clbk', 
			'dashicons-media-spreadsheet', 
			6
		);
	}

	function gen_csv_menu_clbk(){ ?>
		<h1 class="gen_csv_page_main_heading"><?php echo __(get_admin_page_title(), 'gen_csv'); ?></h1>
		<div class="gen_csv_playground">
			<div class="gen_csv_playground_wrap">
				<div class="gen_csv_page_content">
					<div class="gen_csv_form_wrap">
						<form>
							<div class="gen_csv_form_inner_wrap">
								<div class="label_indicator">

								<div class="gen_csv_form_group">
									<label>Export All products to CSV file.</label>
								<?php
									function export_csv($destinationDirectory, $filename, $data, $fields, $fieldKeys, $headers = []){
										$path = wp_upload_dir();
										$file = $path['basedir'] . '/' . $destinationDirectory . '/' . $filename . '.csv';
										$fileURL = '';
										if(!file_exists($file)){
											mkdir($path['basedir'] . '/' . $destinationDirectory);
											$fileURL = $path['baseurl'] . '/'.$destinationDirectory.'/'.$filename.'.csv';
										}else{
											$fileURL = $path['baseurl'] . '/'.$destinationDirectory.'/'.$filename.'.csv';
										}
										$openedFile = fopen($file, "w");
										fputcsv($openedFile, $fields); // First row / Headings
										$row = array();
										foreach($data as $single){
											foreach($fieldKeys as $fieldKey){
												$row[$fieldKey] = $single->$fieldKey;
											}
											fputcsv($openedFile, $row); // Filling data one row at a time
										}
										fclose($openedFile);
										echo '<a href="'. $fileURL .'" id="gen_csv_export_csv_btn" class="gen_csv_export_csv_btn button" type="button">Export CSV</a>';


									}

									global $wpdb;
								    $prodsQuery = 'SELECT * FROM ' . $wpdb->prefix . 'posts WHERE post_type = "product"';
								    $products = $wpdb->get_results($prodsQuery);
									export_csv('gen_csv_Data', 'gen_csv_Data_File', $products, ['Id', 'Title', 'Name'], ['ID', 'post_title', 'post_name']);
								?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
<?php }
	add_action('admin_menu', 'gen_csv_menu');