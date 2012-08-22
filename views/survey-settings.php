<?php if( ! is_plugin_active('gravityforms/gravityforms.php') ): ?>
	<h3><?php _e('Gravity Forms plugin is inactive', 'gravityforms-surveyfunnel-plugin'); ?></h3>
	<p><?php _e('The Gravity Forms plugin doesn\'t seem to be active yet. Please activate it now.', 'gravityforms-surveyfunnel-plugin'); ?></p>
<?php 
return;
endif;
?>

<h3><?php _e('Gravity Forms Survey Settings', 'gravityforms-surveyfunnel-plugin'); ?></h3>
<form method="post" action="options.php">
	<?php settings_fields('gravityforms-surveyfunnel-survey-settings'); ?>
	
	<table class="wide-fat">
		<tr>
			<td><?php _e('Survey', 'gravityforms-surveyfunnel-plugin'); ?></td>
			<td>
				<select name="survey-id">
					<option value="-1">
						<?php _e('No survey selected', 'gravityforms-surveyfunnel-plugin'); ?>
					</option>
					<?php foreach($surveys as $survey): ?>
						<option 
							value="<?php echo $survey->id; ?>"
							<?php selected( get_option('survey-id'), $survey->id ); ?>
						>
							<?php echo $survey->title; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</td>
			<td><i><?php _e('Select a survey', 'gravityforms-surveyfunnel-plugin'); ?></i></td>
		</tr>
		<tr>
			<td><?php _e('', 'gravityforms-surveyfunnel-plugin'); ?></td>
			<td>
				<select>
					<?php foreach($survey_positions as $survey_position): ?>
						<option value="<?php echo $survey_position; ?>">
							<?php echo $survey_position; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</td>
			<td><i><?php _e('', 'gravityforms-surveyfunnel-plugin'); ?></i></td>
		</tr>
		<tr>
			<td>Show when?</td>
		</tr>
		<tr>
			<td>Show where?</td>
		</tr>
	</table>
	
	<?php submit_button(); ?>
</form>