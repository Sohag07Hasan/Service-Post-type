<?php

/*
 * Parse csv for the service type post and it's data
 * */

class CustomPostTypes_csvParser{
	
	static $message = array();
	//static $csvkeys = array('id', 'services-org-twitter', 'services-org-facebook', 'services-org-logo', 'category', 'services-services-org-name', 'services-addr-1', 'services-addr-2', 'services-city', 'services-state', 'services-zip', 'services-prefix', 'services-name-first', 'services-name-last', 'title', 'services-phone-1', 'services-phone-2', 'services-email', 'description', 'services-country-govt', 'services-affiliation', 'services-education', 'services-faith-based', 'services-state-govt', 'services-non-profit', 'services-fed-govt', 'services-private', 'services-services', 'services-house', 'services-finance', 'services-employment', 'services-fin-aid', 'services-transport', 'services-recreation', 'services-tranition-support', 'services-health-care', 'services-edu-service', 'services-child-service', 'services-food', 'services-legal-aid', 'services-disabilitly-service', 'services-senior-assistance', 'services-esl', 'services-util-assistance', 'services-tricare', 'services-service-inquery', 'services-currently-serve', 'services-department', 'services-counselling', 'services-substance-abusing', 'services-program-info', 'services-support-group', 'services-youth-services', 'services-com-events', 'services-pub-safety', 'services-volunteer', 'services-b-assistance', 'services-add-service', 'services-population-served', 'services-active', 'services-guard', 'services-reserve', 'services-veteran', 'services-cfs');
	static $csv_headers = array('ID', 'Organization Twitter Handle', 'Organization Facebook Page', 'Organization Logo', 'Category', 'Organization', 'Address', 'Address 2', 'City', 'State', 'Zip', 'Prefix', 'First', 'Last', 'Title', 'Phone', 'Phone 2', 'Email', 'Service Description', 'County Government', 'Affiliation', 'Education', 'Faith-Based', 'State Government', 'Non Profit', 'Federal Government', 'Private', 'Services', 'Housing', 'Financial', 'Employment', 'Financial Aid', 'Transportation', 'Recreation', 'Transition Support', 'Health Care', 'Education Service', 'Child Care', 'Food', 'Legal Aid', 'Disability Services', 'Senior Assistance', 'ESL', 'Utilities Assistance', 'TRICARE', 'Service Inquiry', 'Currently Serve', 'Department/Program', 'Counseling', 'Substance Abuse', 'Program Information', 'Support Group', 'Youth Services', 'Community Events', 'Public Safety', 'Volunteer', 'Benefits Assistance', 'Additional Services', 'Population Served', 'Active Only', 'Guard', 'Reserve', 'Veteran', 'Conditions for Service');
	
	static $csvkeys = array('services-id', 'services-orgTwitter', 'services-orgFb', 'services-orgLogo', 'category', 'services-orgName', 'services-addr1', 'services-addr2', 'services-city', 'services-state', 'services-zip', 'services-prefix', 'services-fName', 'services-lName', 'title', 'services-phone1', 'services-phone2', 'services-email', 'description', 'services-countryGovt', 'services-affiliation', 'services-edu', 'services-faith', 'services-stateGovt', 'services-nonProfit', 'services-fedGovt', 'services-private', 'services-addServices', 'services-housing', 'services-fin', 'services-employment', 'services-finAid', 'services-transport', 'services-recreation', 'services-transition', 'services-health', 'services-eduService', 'services-child', 'services-food', 'services-legalAid', 'services-disServ', 'services-senAssist', 'services-esl', 'services-utilAssist', 'services-tricare', 'services-serInq', 'services-currServe', 'services-dept', 'services-counseling', 'services-subAbuse', 'services-progInfo', 'services-supGroup', 'services-youthServe', 'services-ComEvent', 'services-pubSafety', 'services-volunteer', 'services-benAssistance', 'services-addServe', 'services-Population', 'active', 'services-guard', 'services-reserve', 'services-veteran', 'services-condition');
	
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
		//echo count(self::$csvkeys);
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
		$updated = 0;
		
		$csv->symmetrize();

		$headers = $csv->getHeaders();

		$csv_keys = self::get_correct_ordered_keys($headers);
									
		foreach ($csv->getRawArray() as $key_index=>$csv_data) {
			//skipping the first row
			if($key_index == 0) continue;		
			
			$post_data = array_combine($csv_keys, $csv_data);
					

			$existing_post_id = self::get_postId($post_data['services-id']);
			
			//checking if it is an update or new  service
			if($existing_post_id){
				if(empty($post_data['title']) || empty($post_data['description'])){
					$skipped ++;
				}
				else{
					$post_ID = self::update_post($post_data, $existing_post_id);
					if($post_ID){
						$updated ++;
						self::create_post_meta($post_ID, $post_data);
						self::set_category($post_ID, $post_data);
					}
					else{
						$skipped ++;
					}
				}
				
			}
			else{
				
				if(empty($post_data['title']) || empty($post_data['description'])){
						$skipped ++;
				}
				else{
					$post_ID = self::create_post($post_data);							
					
					if($post_ID){
						$imported ++;
						self::create_post_meta($post_ID, $post_data);
						self::set_category($post_ID, $post_data);
					}
					else{
						$skipped ++;
					}
				}			
			}
			
		}
		
		
		
		$exec_time = microtime(true) - $time_start;
		
		if ($skipped) {
			self::$message['notice'][] = "<b>Skipped {$skipped} services (most likely due to empty content or empty title).</b>";
		}
		self::$message['notice'][] = sprintf("<b>Imported {$imported} services in %.2f seconds.</b>", $exec_time);
		self::$message['notice'][] = sprintf("<b>Updated {$updated} services in %.2f seconds.</b>", $exec_time);
				
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
	
	
	/*
	 * create the post and return the post id
	 * */
	static function create_post($post_data){
		$data = array(
				'post_title' => $post_data['title'],
				'post_type' => CustomPostTypes_wp::posttype,
				'post_status' => ($post_data['active'] == 'Y') ? 'publish' : 'draft',
				'post_content' => $post_data['description']
			);
						
		return wp_insert_post($data);
	}
	
	//update the post
	static function update_post($post_data, $post_id){
		$data = array(
				'ID' => $post_id,
				'post_title' => $post_data['title'],
				'post_type' => CustomPostTypes_wp::posttype,
				'post_status' => ($post_data['active'] == 'Y') ? 'publish' : 'draft',
				'post_content' => $post_data['description']
			);
		
		return wp_update_post($data);
	}
	
	
	//set the category of the post
	static function set_category($post_id, $post_data){
		return wp_set_object_terms($post_id, array($post_data['category']), 'category', false);
	}
	
	
	//create meta data for the post
	static function create_post_meta($post_id, $data){
		foreach ($data as $key=>$value){
			if(strstr($key, 'services')){
				update_post_meta($post_id, $key, $value);
			}
		}
	}
	
	/*
	 * print messages
	 * */
	static function print_message(){
		if(empty(self::$message)) return '';
		
		$msg = '';
		
		if(count(self::$message['error']) > 0){
			$msg .= '<div class="error">';
			foreach(self::$message['error'] as $value){
				$msg .= '<p>' . $value . '</p>';
			}
			
			$msg .= '</div>';
		}
		
		if(count(self::$message['notice']) > 0){
		$msg .= '<div class="updated">';
			foreach(self::$message['notice'] as $value){
				$msg .= '<p>' . $value . '</p>';
			}
			
			$msg .= '</div>';
		}
		
		return $msg;
	}
		
	//returns the ids of the existing services
	
	static function get_existing_services_ID(){
		global $wpdb;
		$post_type = CustomPostTypes_wp::posttype;
		
		return $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE post_type = '$post_type'");
	}
	
	
	static function get_postId($service_id = null){
		if($service_id){
			global $wpdb;
			return $wpdb->get_var("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'services-id' AND meta_value = '$service_id'");
		}
		
		return false;
	}
	
	
	//return correct ordered csv keys
	static function get_correct_ordered_keys($headers = array()){
		if(empty($headers)) return self::$csvkeys;
		
		$sanitized_headers = self::sanitize_keys($headers);
		$keys_with_headers = self::get_headers_withKeys();
		
		$ordered_keys = array();
		
		foreach($sanitized_headers as $key => $value){
			$ordered_keys[$key] = $keys_with_headers[$value];
		}
		
		return $ordered_keys;
	}
	
	static function sanitize_keys($keys = array()){
		if(empty($keys)) return $keys;
		
		$sanitized = array();
		foreach($keys as $key => $value){
			$sanitized[$key] = strtoupper(preg_replace('#[ ]#', '', $value));
		}
		
		return $sanitized;
	}
	
	//reurn the csv keys with headers
	static function get_headers_withKeys(){
		$headers = self::sanitize_keys(self::$csv_headers);
		return array_combine($headers, self::$csvkeys);
	}
}
