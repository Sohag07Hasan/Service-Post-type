<?php

/*
 * template name: Services
 * */
 

get_header();
  
get_template_part( 'services','searchform'); 
 
 /*
  * this block is for the search feathture
  * */
 if(isset($_REQUEST['qstring'])) :
 
	 function query_changing($where, &$wp_query){
		
		global $wpdb;
		$qstring = $_REQUEST['qstring'];
		if($qstring == '') return $where;
		
		$where = ' AND ' . '(((' . $wpdb->posts . '.post_title LIKE ' . "'%$qstring%'" . ') OR (' . $wpdb->posts . '.post_content LIKE ' . "'%$qstring%'" . ') OR (' . $wpdb->postmeta . '.meta_value LIKE ' . "'%$qstring%'" . ')))' . ' AND ' . $wpdb->posts . '.post_type IN ' . "('services')" . ' AND ' . $wpdb->posts . '.post_status = ' . "'publish'";
		return $where;
	 }
	 
	 function inner_join($join, $query){
		global $wpdb;
		if(empty($join)) :
			$join = ' INNER JOIN ' . $wpdb->postmeta . ' ON (' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id)';
		endif;
		return $join;
	 }
	 
	 //over all request
	 function posts_request($query, &$wp_query){
		var_dump($query);
		exit;
	 }	 
	
	 
	 function the_posts($posts){
		$intake = $posts;
		$sanitize = array();
		$modified_postlists = array();
		
		foreach($posts as $key=>$post){
			$sanitize[$key] = $post->ID;
		}
		$unique = array_unique($sanitize);
		
		foreach($unique as $key=>$value){
			$modified_postlists[] = $intake[$key];
		}
		
		return $modified_postlists;
		
	 }
	
	//filters are added here
	add_filter('posts_where', 'query_changing',10,2);
	add_filter('posts_join', 'inner_join', 100, 2);	
	//add_filter('posts_request', 'posts_request', 100, 2);	
	
	add_filter('the_posts', 'the_posts', 100);
		
 endif;
 
  
 function post_limits($limit, &$wp_query){
	if(isset($_REQUEST['qstring'])){
		return $limit;
	}
	return "LIMIT 50";
 }
 add_filter('post_limits', 'post_limits', 100, 2);
 
 //end of the search feature
 
 
 $args = array( 
		'post_type' => 'services',
		'posts_per_page' => -1,				
	);
 
 

 if(isset($_REQUEST['qstring'])) :
  $meta_query = array('relation'=>'AND');
 
	foreach($_GET as $key=>$value){
		if(strstr($key, 'services')){
			$meta_query[] = array(
				'key' => $key,
				'value' => $value
			);
		}
	}
	
   $args['meta_query'] = $meta_query;
 endif;
 
 $wp_query = new WP_Query( $args );
 
 while ( $wp_query->have_posts() ) : $wp_query->the_post();
	get_template_part( 'content','services'); 
 endwhile;
 

 
 get_footer();
?>
