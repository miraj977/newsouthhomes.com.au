<br/>
<table class="wp-list-table widefat">
    <thead>
    <tr>
    	<th colspan="2"><strong>General Settings</strong></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    	<td colspan="2"><strong>This plugin should work with default settings, however if you begin to get spam, update the field name below.</strong></td>
    </tr>	

    <form method="post" action="">
    <tr>
    	<td width="250">Honey Pot Field Name</td>
        <td>
             <input name="wpa_field_name" style="width:300px;" value="<?php echo get_option('wpa_field_name');?>" type="text" /><br/>
                <em>Changing the field name regularly is a good idea. Please do it if you are getting spam.</em>
        </td>
    </tr>    
    <tr>
        <td>Honey Pot Error Message</td>
        <td>
            <input name="wpa_error_message" style="width:300px;" value="<?php echo get_option('wpa_error_message');?>" type="text" /><br/><em>Mesage for bots. No average human users will see though.</em>
        </td>
    </tr>
       
    <tr>        
    	<td colspan="2"><input type="submit" name="submit-wpa-general-settings" class="button-primary" value="Save General Settings" /></td>
	</tr>
    </form>
    
    </tbody>
</table><br/>