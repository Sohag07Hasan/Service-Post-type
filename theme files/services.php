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
		//var_dump($where);
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
	 function posts_request($query, $wp_query){
		var_dump($query);
		exit;
	 }
	   
	
	//filters are added here
	add_filter('posts_where_paged', 'query_changing',10,2);
	add_filter('posts_join_paged', 'inner_join', 100, 2);	
	//add_filter('posts_request', 'posts_request', 100, 2);	
 endif;
 
 
 //end of the search feature
 
 
 $args = array( 
		'post_type' => 'services',
		'posts_per_page' => 50,
		'post_status' => 'publish'				
	);
 
 
 
 $wp_query = new WP_Query( $args );
 while ( $wp_query->have_posts() ) : $wp_query->the_post();
	get_template_part( 'content','services'); 
 endwhile;
 

 
 get_footer();
?>
