<div class="wrap">
	<table class="form-table">
		
		
		<?php 
			foreach(self::$text_keys as $key=>$value) :
				if($key == 'orgLogo') :
				
				?>
				
				<tr>
					<th> <label for "<?php echo $value; ?>"> <?php echo $value; ?> </label> </th>
					<td> 
						<input type="text" id="<?php echo 'services-'.$key; ?>" name="<?php echo 'services-'.$key; ?>" size="50" value="<?php echo $meta_values['services-'.$key][0]; ?>" /> 
						<input type="button" id="wp_add_meta_image" value="Media Libray"/>
					</td>
				</tr>
				
				
				<?php 
				
				else:
				?>
				
				<tr>
					<th> <label for "<?php echo $value; ?>"> <?php echo $value; ?> </label> </th>
					<td> <input type="text" name="<?php echo 'services-'.$key; ?>" size="50" value="<?php echo $meta_values['services-'.$key][0]; ?>" /> </td>
				</tr>
				
				<?php
				endif;
			endforeach;
		?>
		
		<?php 
			foreach(self::$booleans as $key=>$value) :
				?>
				
				<tr>
					<th> <label for "<?php echo $value; ?>"> <?php echo $value; ?> </label> </th>
					<td> <input type="checkbox" name="<?php echo 'services-'.$key; ?>" <?php checked('Y', $meta_values['services-'.$key][0]); ?> value="Y" /> available?</td>
				</tr>
				
				<?php 
			endforeach;
		?>
		
		<?php 
			foreach(self::$text_areas as $key=>$value) :
				?>
				
				<tr>
					<th> <label for "<?php echo $value; ?>"> <?php echo $value; ?> </label> </th>
					<td><textarea rows="3" cols="70" name="<?php echo 'services-'.$key; ?>"><?php echo $meta_values['services-'.$key][0]; ?></textarea></td>
				</tr>
				
				<?php 
			endforeach;
		?>
				
	</table>
</div>