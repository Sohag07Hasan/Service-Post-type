<?php
	global $post;
	$action = get_permalink($post->ID);
	//var_dump($action);
?>

<div class="search-form">
	<form action="<?php echo $action; ?>" method="get">
		
		Search Services <input type="text" name="qstring" value="<?php echo $_REQUEST['qstring']; ?>" >
		<input type="submit" value="Search" />
	</form>
</div>
