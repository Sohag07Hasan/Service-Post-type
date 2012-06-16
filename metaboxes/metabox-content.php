<div class="wrap">
	<table class="form-table">
		
		<!-- Organization data staart-->
		<tr>
			<th> <label for "org-name"> Organization </label> </th>
			<td> <input type="text" name="services-services-org-name" size="50" value="<?php echo $meta_values['services-services-org-name'][0]; ?>" /> </td>
		</tr>
		<tr>
			<th> <label for "org-twitter"> Organization Twitter </label> </th>
			<td> <input type="text" name="services-org-twitter" size="50" value="<?php echo $meta_values['services-org-twitter'][0]; ?>" /> </td>
		</tr>
		<tr>
			<th> <label for "org-facebook"> Organization Facebook </label> </th>
			<td> <input type="text" name="services-org-facebook" size="50" value="<?php echo $meta_values['services-org-facebook'][0]; ?>" /> </td>
		</tr>
		<tr>
			<th> <label for "org-logo"> Organization Logo </label> </th>
			<td> <input type="text" name="services-org-logo" size="50" value="<?php echo $meta_values['services-org-logo'][0]; ?>" /> </td>
		</tr>
		<!-- Organization data end -->
		
		
		<!-- address data start-->
		<tr>
			<th> <label for "addr-1"> Address 1 </label> </th>
			<td> <input type="text" name="services-addr-1" value="<?php echo $meta_values['services-addr-1'][0]; ?>" size="50" /> </td>
		</tr>
		<tr>
			<th> <label for "addr-2"> Address 2 </label> </th>
			<td> <input type="text" name="services-addr-2" value="<?php echo $meta_values['services-addr-2'][0]; ?>" size="50" /> </td>
		</tr>
		<tr>
			<th> <label for "city"> City </label> </th>
			<td> <input type="text" name="services-city" value="<?php echo $meta_values['services-city'][0]; ?>" size="50" /> </td>
		</tr>
		<tr>
			<th> <label for "state"> State </label> </th>
			<td> <input type="text" name="services-state" value="<?php echo $meta_values['services-state'][0]; ?>" size="50" /> </td>
		</tr>
		<tr>
			<th> <label for "zip"> Zip </label> </th>
			<td> <input type="text" name="services-zip" value="<?php echo $meta_values['services-zip'][0]; ?>" size="50" /> </td>
		</tr>
		<!-- end address data -->
		
		
		<!-- Personal Info start -->
		<tr>
			<th> <label for "name-first"> First Name </label> </th>
			<td> <input type="text" name="services-name-first" value="<?php echo $meta_values['services-name-first'][0]; ?><?php echo $meta_values[''][0]; ?>" size="50" /> </td>
		</tr>
		<tr>
			<th> <label for "name-last"> Last Name </label> </th>
			<td> <input type="text" name="services-name-last" value="<?php echo $meta_values['services-name-last'][0]; ?>" size="50" /> </td>
		</tr>
		<tr>
			<th> <label for "phone-1"> Phone 1 </label> </th>
			<td> <input type="text" name="services-phone-1" value="<?php echo $meta_values['services-phone-1'][0]; ?>" size="50" /> </td>
		</tr>
		<tr>
			<th> <label for "phone-2"> Phone 2 </label> </th>
			<td> <input type="text" name="services-phone-2" value="<?php echo $meta_values['services-phone-2'][0]; ?>" size="50" /> </td>
		</tr>
		<tr>
			<th> <label for "email"> Email </label> </th>
			<td> <input type="text" name="services-email" value="<?php echo $meta_values['services-email'][0]; ?>" size="50" /> </td>
		</tr>
		<!-- end personal info -->
		
		
		<!-- Meta data start-->
		<tr>
			<th> <label for "country-govt"> Country Government </label> </th>
			<td>
				<select name="services-country-govt" style="width: 110px;">
					<option <?php selected('Y', $meta_values['services-country-govt'][0]);?> value="Y"> Available </option>
					<option <?php selected('N', $meta_values['services-country-govt'][0]);?> value="N"> Unavailable </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "affiliation"> Affiliation </label> </th>
			<td> <input type="text" name="services-affiliation" value="<?php echo $meta_values['services-affiliation'][0];  ?>" size="50" /> </td>
		</tr>
		<tr>
			<th> <label for "education"> Education </label> </th>
			<td>
				<select name="services-education" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-education'][0]);?> value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-education'][0]);?> value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "faith-based"> Faith Based </label> </th>
			<td>
				<select name="services-faith-based" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-faith-based'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-faith-based'][0]);?>  <?php selected('Y', $meta_values['services-country-govt'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "state-govt"> State Government </label> </th>
			<td>
				<select name="services-state-govt" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-country-govt'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-country-govt'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "non-profit"> Non Profit </label> </th>
			<td>
				<select name="services-non-profit" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-non-profit'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-non-profit'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "fed-govt"> Federal Government </label> </th>
			<td>
				<select name="services-fed-govt" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-fed-govt'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-fed-govt'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "priv-service"> Private</label> </th>
			<td>
				<select name="services-private" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-private'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-private'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "priv-service"> Services </label> </th>
			<td>
				<select name="services-services" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-services'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-services'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "h-finance"> Housing</label> </th>
			<td>
				<select name="services-house" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-house'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-house'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "h-finance"> Finance </label> </th>
			<td>
				<select name="services-finance" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-finance'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-finance'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "employment"> Employment </label> </th>
			<td>
				<select name="services-employment" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-employment'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-employment'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "fin-aid"> Financial Aid </label> </th>
			<td>
				<select name="services-fin-aid" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-fin-aid'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-fin-aid'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "transport"> Transportation </label> </th>
			<td>
				<select name="services-transport" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-transport'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-transport'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "health-care"> Health Care </label> </th>
			<td>
				<select name="services-health-care" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-health-care'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-health-care'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "edu-service"> Education Service </label> </th>
			<td>
				<select name="services-edu-service" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-edu-service'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-edu-service'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "child-service"> Child Care </label> </th>
			<td>
				<select name="services-child-service" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-child-service'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-child-service'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "recreation"> Recreation </label> </th>
			<td>
				<select name="services-recreation" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-recreation'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-recreation'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "food"> Food </label> </th>
			<td>
				<select name="services-food" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-food'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-food'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "legal-aid"> Legal Aid </label> </th>
			<td>
				<select name="services-legal-aid" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-legal-aid'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-legal-aid'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "disability-service"> Disability Service </label> </th>
			<td>
				<select name="services-disabilitly-service" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-disabilitly-service'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-disabilitly-service'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "senior-assistance"> Senior Assistance </label> </th>
			<td>
				<select name="services-senior-assistance" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-senior-assistance'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-senior-assistance'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "esl"> ESL </label> </th>
			<td>
				<select name="services-esl" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-esl'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-esl'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "utility-assistance"> Utility Assistance </label> </th>
			<td>
				<select name="services-util-assistance" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-util-assistance'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-util-assistance'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "tricare"> TriCare </label> </th>
			<td>
				<select name="services-tricare" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-tricare'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-tricare'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "service-inquery"> Service Inquery </label> </th>
			<td>
				<select name="services-service-inquery" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-service-inquery'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-service-inquery'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "currently-serve"> Currently Serve </label> </th>
			<td>
				<select name="services-currently-serve" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-currently-serve'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-currently-serve'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "department"> Department/Program </label> </th>
			<td> <input type="text" name="services-department" value="<?php echo $meta_values['services-department'][0]; ?>" size="50" /> </td>
		</tr>
		<tr>
			<th> <label for "counselling"> Counselling </label> </th>
			<td>
				<select name="services-counselling" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-counselling'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-counselling'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "substance-abusing"> SUbstance Abusing </label> </th>
			<td>
				<select name="services-substance-abusing" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-substance-abusing'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-substance-abusing'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "pi-supporting"> Program Information </label> </th>
			<td>
				<select name="services-program-info" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-pi-supporing'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-pi-supporing'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "pi-supporting"> Support Group </label> </th>
			<td>
				<select name="services-support-group" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-pi-supporing'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-pi-supporing'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "youth-services"> Youth Services </label> </th>
			<td>
				<select name="services-youth-services" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-youth-services'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-youth-services'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "com-events"> Community Events </label> </th>
			<td>
				<select name="services-com-events" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-com-events'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-com-events'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "pub-safety"> Public Safety </label> </th>
			<td>
				<select name="services-pub-safety" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-pub-safety'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-pub-safety'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "volunteer"> Volunteer </label> </th>
			<td>
				<select name="services-volunteer" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-volunteer'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-volunteer'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "b-assistance"> Benefit Assistance </label> </th>
			<td>
				<select name="services-b-assistance" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-b-assistance'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-b-assistance'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "add-service"> Additional Services </label> </th>
			<td>
				<select name="services-add-service" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-add-service'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-add-service'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "active-only"> Active Only </label> </th>
			<td>
				<select name="services-active-only" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-active-only'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-active-only'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "guard-reserve"> Guard </label> </th>
			<td>
				<select name="services-guard" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-guard'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-guard'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "guard-reserve"> Reserve </label> </th>
			<td>
				<select name="services-reserve" style="width: 75px;">
					<option <?php selected('Y', $meta_values['services-reserve'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['services-reserve'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "veteran"> Veteran </label> </th>
			<td>
				<select name="services-veteran" style="width: 75px;">
					<option <?php selected('Y', $meta_values['ervices-veteran'][0]);?>  value="Y"> Yes </option>
					<option <?php selected('N', $meta_values['ervices-veteran'][0]);?>  value="N"> No </option>
				</select>
			</td>
		</tr>
		<tr>
			<th> <label for "cfs"> Conditions for Services  </label> </th>
			<td> <textarea rows="3" cols="70" name="services-cfs"><?php echo $meta_values['services-cfs'][0]; ?></textarea> </td>
		</tr>
		<!-- Meta data end-->
		
	</table>
</div>
