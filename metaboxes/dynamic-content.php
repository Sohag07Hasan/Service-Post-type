<div class="wrap">
	<table class="form-table">
		
		
		<?php 
			foreach(self::$text_keys as $key=>$value) :
				if($key == 'orgLogo') :
				
				?>
				
				<tr>
					<td> <label for="<?php echo 'sservices-'.$key; ?>"> <?php echo $value; ?> </label> </td>
					<td> 
						<input type="text" id="<?php echo 'sservices-'.$key; ?>" name="<?php echo 'services-'.$key; ?>" size="50" value="<?php echo $meta_values['services-'.$key][0]; ?>" /> 
						<input type="button" id="wp_add_meta_image" value="Media Libray"/>
					</td>
				</tr>
				
				
				<?php 
				
				else:
				?>
				
				<tr>
					<td> <label for="<?php echo 'sservices-'.$key; ?>"> <?php echo $value; ?> </label> </td>
					<td> <input id="<?php echo 'sservices-'.$key; ?>" type="text" id="<?php echo 'sservices-'.$key; ?>" name="<?php echo 'services-'.$key; ?>" size="50" value="<?php echo $meta_values['services-'.$key][0]; ?>" /> </td>
				</tr>
				
				<?php
				endif;
			endforeach;
		?>
		
		<?php 
			foreach(self::$booleans as $key=>$value) :
				?>
				
				<tr>
					<td> <input id="<?php echo 'sservices-'.$key; ?>" type="checkbox" name="<?php echo 'services-'.$key; ?>" <?php checked('Y', $meta_values['services-'.$key][0]); ?> value="Y" /></td>
					<td> <label for="<?php echo 'sservices-'.$key; ?>"> <?php echo $value; ?> </label> </td>
					
				</tr>
				
				<?php 
			endforeach;
		?>
		
		<?php 
			foreach(self::$text_areas as $key=>$value) :
				?>
				
				<tr>
					<td> <label for="<?php echo 'sservices-'.$key; ?>"> <?php echo $value; ?> </label> </td>
					<td><textarea rows="3" cols="70" id="<?php echo 'sservices-'.$key; ?>" name="<?php echo 'services-'.$key; ?>"><?php echo $meta_values['services-'.$key][0]; ?></textarea></td>
				</tr>
				
				<?php 
			endforeach;
		?>
				
	</table>
</div>