<?php
	global $post;
	$action = get_permalink($post->ID);
	
?>


<div class="search-form">
	<form action="<?php echo $action; ?>" method="get">
		<table>
			<tr>				
				<td>Search Services</td>
				<td><input type="text" name="qstring" value="<?php echo $_REQUEST['qstring']; ?>" ></td>
				<td><input type="submit" value="Search" /></td>				
			</tr>
		</table>
		<br/>
		Filter your search result
		<table>
				
				<?php
					if(class_exists('CustomPostTypes_wp')) :
						$count = 0;
						echo "<tr>";
						foreach(CustomPostTypes_wp::$booleans as $key => $value) :							
						?>
							<td><input id="<?php echo 'services-'.$key; ?>" type="checkbox" name="<?php echo 'services-'.$key; ?>" <?php checked("Y", $_REQUEST['services-'.$key]) ?> value="Y" /> <label for="<?php echo 'services-'.$key; ?>"><?php echo $value; ?></label> </td>
						<?php
						
						if(fmod($count, 5) == 0 && $count != 0){
							echo '</tr><tr>';
						}							
						
						$count ++;
						endforeach;
						echo '</tr>';
					endif;
				?>
		
		</table>
		
		<br/>
		Sort the Search Result 
		<select name="sort_by">
			<option value=''> select </option>
			<option <?php selected('title', $_REQUEST['sort_by']); ?> value="title">By Title</option>
			<option  <?php selected('views', $_REQUEST['sort_by']); ?> value="views">By Most Viewed</option>
		</select>	
		
	</form>
</div>
