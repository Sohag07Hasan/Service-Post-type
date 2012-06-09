<?php
/*
 * creates a custom post type service
 */

class CustomPostTypes_wp{
	const posttype = 'services';
	const menu = 'Services';
	const name = 'Services';
	const singular = 'Service';
	
	
	//meta keys different groups
	
	
	static function init(){
		add_action('init', array(get_class(), 'add_new_posttype'));
		add_action('add_meta_boxes',array(get_class(), 'add_metaboxes'));
		add_action('save_post', array(get_class(), 'saveMetaBoxesData'), 100, 2);
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
		
		include SERVICE_POST_TYPE_dir . '/metaboxes/metabox-content.php';
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
