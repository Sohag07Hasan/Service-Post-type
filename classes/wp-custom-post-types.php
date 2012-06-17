<?php
/*
 * creates a custom post type service
 */

class CustomPostTypes_wp{
	const posttype = 'services';
	const menu = 'Services';
	const name = 'Services';
	const singular = 'Service';
	
	//different keys
	static $text_keys = array('orgName'=>'Organization', 'orgTwitter'=>'Organization Twitter', 'orgFb'=>'Organization Facebook', 'orgLogo'=>'Organization Logo', 'addr1'=>'Address 1', 'addr2'=>'Address 2', 'city'=>'City', 'state'=>'State', 'zip'=>'Zip', 'prefix'=>'Prefix', 'fName'=>'FirstName', 'lName'=>'Last Name', 'phone1'=>'Phone 1', 'phone2'=>'Phone 2', 'email'=>'Email', 'affiliation'=>'Affiliation', 'dept'=>'Department/Program');
	static $booleans = array('countryGovt'=>'Country Govenment', 'edu'=>'Education', 'faith'=>'Faith Based', 'stateGovt'=>'State Government', 'nonProfit'=>'Non Profilt', 'fedGovt'=>'Federal Government', 'private'=>'Private Services', 'housing'=>'Housing', 'fin'=>'Financial', 'employment'=>'Employment', 'finAid'=>'Financial Aid', 'transport'=>'Transportation', 'health'=>'Health Care', 'eduService'=>'Education Service', 'child'=>'Child Care', 'recreation'=>'Recreation', 'food'=>'Food', 'leagalAid'=>'Legal Aid', 'disServ'=>'Disability Service', 'senAssist'=>'Senior Assistance', 'esl'=>'ESL', 'utilAssist'=>'Utililty Assistance', 'tricare'=>'Tri Care', 'serInq'=>'service Inquery', 'currServe'=>'Currently Serve', 'counceling'=>'Counselling', 'subAbuse'=>'Substance Abusing', 'progInfo'=>'Program Information', 'supGroup'=>'Support Group', 'youthServe'=>'Youth Services', 'ComEvent'=> 'Community Events', 'pubSafety'=>'Public Safety', 'volunteer'=> 'Volunteer', 'benAssistance'=>'Benefit Assistance', 'addServe'=>'Additional Services', 'guard'=>'Guard', 'reserve'=>'Reserve', 'veteran'=>'Veteran');
	static $text_areas = array('condition'=>'Conditions for Services');
	
	
	//meta keys different groups
	
	
	static function init(){
		add_action('init', array(get_class(), 'add_new_posttype'));
		add_action('add_meta_boxes',array(get_class(), 'add_metaboxes'));
		add_action('save_post', array(get_class(), 'saveMetaBoxesData'), 100, 2);
		
		add_action('admin_enqueue_scripts', array(get_class(), 'js_add'));
	}
	
	/*
	 * css and js add for default media uploader
	 * */
	static function js_add(){
		wp_enqueue_style('thickbox');
		wp_enqueue_script('jquery');
		wp_enqueue_script('media-uploader-services', SERVICE_POST_TYPE_url . '/js/media-uploader.js', array('jquery', 'media-upload', 'thickbox'));
	}
	
	
	
	/*
	 * creates a new post type
	 */
	static function add_new_posttype(){
		$labels = array(
			'name' => _x(self::name, 'post type general name'),
			'singular_name' => _x(self::singular, 'post type singular name'),
			'add_new' => _x('Add New', 'book'),
			'add_new_item' => __('Add New ' . self::singular),
			'edit_item' => __('Edit ' . self::singular),
			'new_item' => __('New ' . self::singular),
			'all_items' => __('All ' . self::name),
			'view_item' => __('View ' . self::singular),
			'search_items' => __('Search ' . self::singular),
			'not_found' =>  __('No ' . self::name .' found'),
			'not_found_in_trash' => __('No ' . self::name . ' found in Trash'), 
			'parent_item_colon' => '',
			'menu_name' => self::menu

		);
		$args = array(
			'labels' => $labels,
			'exclude_from_search' => true,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true, 
			'hierarchical' => true,
			'menu_position' => 5,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail' ),
			'taxonomies' => array('category')
		); 
		register_post_type(self::posttype, $args);	
	}
	
	/*
	 * add metaboxes
	 */
	static function add_metaboxes(){		
				
		add_meta_box('service-meta-information', __('Service Description'), array(get_class(), 'metabox_content'), self::posttype, 'normal', 'high');
	}
	
	//metabox content
	static function metabox_content(){
		global $post;		
		$meta_values = self::getPostMeta($post->ID);
		
		//include SERVICE_POST_TYPE_dir . '/metaboxes/metabox-content.php';
		include SERVICE_POST_TYPE_dir . '/metaboxes/dynamic-content.php';
	}
	
	
	//save the metabox data
	static function saveMetaBoxesData($post_ID, $post){
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
		if($post->post_type == 'services') :
			foreach($_POST as $key => $value){
				if(strstr($key, 'services')){
					update_post_meta($post_ID, $key, trim($value));
				}
			}
		endif;
	}
	
	//return the post meta vlues
	static function getPostMeta($post_id){
		return get_post_custom($post_id);
	}
}
