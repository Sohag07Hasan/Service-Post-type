<?php
	global $post;
	$action = get_permalink($post->ID);
	
?>


<div class="search-form">
	<form action="<?php echo $action; ?>" method="get">
		<table>
			<tr>				
				<td>Search Services<td> <td><input type="text" name="qstring" value="<?php echo $_REQUEST['qstring']; ?>" ><td>
			</td>
		</table>
		Filter your search result
		<table>
				
				<?php
					if(class_exists('CustomPostTypes_wp')) :
						$count = 0;
						echo "<tr>";
						foreach(CustomPostTypes_wp::$booleans as $key => $value) :							
						?>
							<td><input type="checkbox" name="<?php echo 'services-'.$key; ?>" <?php checked("Y", $_REQUEST['services-'.$key]) ?> value="Y" /> <?php echo $value; ?> </td>
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
		<input type="submit" value="Search" />
	</form>
</div>
