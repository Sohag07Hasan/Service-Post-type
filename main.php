<?php
/*
 * Plugin name: Service Post type Manipulation
 * author: Mahibul Hasan Sohag
 * plugin uri: http://google.com
 * author uri: http://sohag07hasan.elance.com
 */

define('SERVICE_POST_TYPE_dir', dirname(__FILE__));
define('SERVICE_POST_TYPE_url', plugins_url('', __FILE__));

include SERVICE_POST_TYPE_dir . '/classes/wp-custom-post-types.php';
CustomPostTypes_wp::init();

?>