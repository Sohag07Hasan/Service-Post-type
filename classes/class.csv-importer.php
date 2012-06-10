<?php

/*
 * Parse csv for the service type post and it's data
 * */

class CustomPostTypes_csvParser{
	
	static $message = array();
	static $csvkeys = array('id', 'services-org-twitter', 'services-org-facebook', 'services-org-logo', 'services-category', 'services-services-org-name', 'services-addr-1', 'services-addr-2', 'services-city', 'services-state', 'services-zip', 'services-prefix', 'services-name-first', 'services-name-last', 'services-title', 'services-phone-1', 'services-phone-2', 'services-email', 'services-description', 'services-country-govt', 'services-affiliation', 'services-education', 'services-faith-based', 'services-state-govt', 'services-non-profit', 'services-fed-govt', 'services-private', 'services-services', 'services-house', 'services-finance', 'services-employment', 'services-fin-aid', 'services-transport', 'services-recreation', 'services-tranition-support', 'services-health-care', 'services-edu-service', 'services-child-service', 'services-food', 'services-legal-aid', 'services-disabilitly-service', 'services-senior-assistance', 'services-esl', 'services-util-assistance', 'services-tricare', 'services-service-inquery', 'services-currently-serve', 'services-department', 'services-counselling', 'services-substance-abusing', 'services-program-info', 'services-support-group', 'services-youth-services', 'services-com-events', 'services-pub-safety', 'services-volunteer', 'services-b-assistance', 'services-add-service', 'services-population-served', 'services-active', 'services-guard', 'services-reserve', 'services-veteran', 'services-cfs');
	
	static function init(){
		add_action('admin_menu', array(get_class(), 'subMenuForCsv'));
		add_action('init', array(get_class(), 'upload_handler'));
	}
	
	
	/*
	 * handling the uploaded file
	 * */
	static function upload_handler(){
		if($_POST['services-csv-importer-submit'] == 'Y') :
			if(empty($_FILES['service-csv']['tmp_name'])){
				self::$message['error'][] = 'No csv file is selected. aborting.....';						
			}
						
			if(self::is_csv($_FILES['service-csv'])){
				return self::csv_uploader();
			}
			else{
				self::$message['error'][] = 'Selected File is not a csv. aborting...';			
			}
			
			
		endif;
	}
	
	
	static function subMenuForCsv(){
		add_submenu_page('edit.php?post_type=services', 'Import CSV', 'Import Services', 'manage_options', 'services_import',array(get_class(), 'importForm'));
	}
	
	static function importForm(){
		echo count(self::$csvkeys);
		include SERVICE_POST_TYPE_dir . '/includes/csv-uploader-form.php';
	}
	
	static function set_message($key, $message = ''){
		self::$message[$key][] = $message;
	}
	
	static function get_csvkeys_as_string(){
		$str = '';
		foreach (self::$csvkeys as $key){
			$str .= $key . ', ';
		}
		//return count(self::$csvkeys);
		return $str;
	}
	
	
	//checking if the file is csv type
	static function is_csv($file = array()){
		return (strpos($file['name'], 'csv')) ? true : false;
	}
	
	
	// this is the original csv uploader
	static function csv_uploader(){
		$file = $_FILES['service-csv']['tmp_name'];		
		include dirname(__FILE__) . '/class.csv-parser.php';
		
		$time_start = microtime(true);
		$csv = new File_CSV_DataSource();
		self::stripBOM($file);
		
		//now loading file
		if (!$csv->load($file)) {
			self::$message['error'][] = 'Failed to load file, aborting...';
			return;
		}
		
		//uploading started
		$skipped = 0;
		$imported = 0;
		$csv->symmetrize();
		var_dump(self::$csvkeys);						
		foreach ($csv->getRawArray() as $key_index=>$csv_data) {
			
		//	if($key_index == 0) continue;
			var_dump($csv_data);
			
			/*		
			if(self::create_service($csv_data)){
				$imported ++;
			}
			else{
				$skipped ++;
			}
			*/
		}

		$exec_time = microtime(true) - $time_start;
		if ($skipped) {
			self::$message['notice'][] = "<b>Skipped {$skipped}names (most likely due to empty content).</b>";
		}
		self::$message['notice'][] = sprintf("<b>Imported {$imported} names in %.2f seconds.</b>", $exec_time);
		
		exit;
	}
	
	//stip boom
	static function stripBOM($fname){
		 $res = fopen($fname, 'rb');
		if (false !== $res) {
			$bytes = fread($res, 3);
			if ($bytes == pack('CCC', 0xef, 0xbb, 0xbf)) {
				self::$message['notice'][] = 'Getting rid of byte order mark...';
				fclose($res);

				$contents = file_get_contents($fname);
				if (false === $contents) {
					trigger_error('Failed to get file contents.', E_USER_WARNING);
				}
				$contents = substr($contents, 3);
				$success = file_put_contents($fname, $contents);
				if (false === $success) {
					trigger_error('Failed to put file contents.', E_USER_WARNING);
				}
			} else {
				fclose($res);
			}
		} 
		else {
			slef::$message['error'][] = 'Failed to open file, aborting.';
		}
		
	}
	
}
