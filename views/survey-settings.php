<?php if( ! is_plugin_active('gravityforms/gravityforms.php') ): ?>
	<h3><?php _e('Gravity Forms plugin is inactive', 'gravity-forms-survey-funnel-plugin'); ?></h3>
	<p><?php _e('The Gravity Forms plugin doesn\'t seem to be active yet. Please activate it now.', 'gravity-forms-survey-funnel-plugin'); ?></p>
<?php 
return;
endif;
?>

<h3><?php _e('Gravity Forms Survey Settings', 'gravity-forms-survey-funnel-plugin'); ?></h3>
<form method="post" action="options.php">
	<?php settings_fields('gravity-forms-survey-funnel-survey-settings'); ?>
	
	<table class="wide-fat">
		<tr>
			<td><?php _e('Survey', 'gravity-forms-survey-funnel-plugin'); ?></td>
			<td>
				<select name="gravity-forms-survey-funnel-survey-id">
					<option 
						value="-1"
						<?php selected( get_option('gravity-forms-survey-funnel-survey-id'), -1 ); ?>
					>
						<?php _e('Don\'t show any survey', 'gravity-forms-survey-funnel-plugin'); ?>
					</option>
					<?php foreach($surveys as $survey): ?>
					<option 
						value="<?php echo $survey->id; ?>"
						<?php selected( get_option('gravity-forms-survey-funnel-survey-id'), $survey->id ); ?>
					>
						<?php echo $survey->title; ?>
					</option>
					<?php endforeach; ?>
				</select>
			</td>
			<td><i><?php _e('Select a survey', 'gravity-forms-survey-funnel-plugin'); ?></i></td>
		</tr>
		<tr>
			<td><?php _e('Position', 'gravity-forms-survey-funnel-plugin'); ?></td>
			<td>
				<select name="gravity-forms-survey-funnel-survey-position">
					<option 
						value="bottomleft"
						<?php selected( get_option('gravity-forms-survey-funnel-survey-position'), 'bottomleft' ); ?>
					>
						<?php _e('Bottom-Left', 'gravity-forms-survey-funnel-plugin'); ?>
					</option>
					<option 
						value="popup"
						<?php selected( get_option('gravity-forms-survey-funnel-survey-position'), 'popup' ); ?>
					>
						<?php _e('Popup', 'gravity-forms-survey-funnel-plugin'); ?>
					</option>
				</select>
			</td>
			<td><i><?php _e('Select how the survey should be shown.', 'gravity-forms-survey-funnel-plugin'); ?></i></td>
		</tr>
		<?php if( get_option('gravity-forms-survey-funnel-survey-position') != 'popup'): ?>
		<tr>
			<td><?php _e('Minimalized', 'gravity-forms-survey-funnel-plugin'); ?></td>
			<td>
				<input
					type="checkbox"
					name="gravity-forms-survey-funnel-survey-minimalized"
					value="1"
					<?php checked( get_option('gravity-forms-survey-funnel-survey-minimalized'), 1 ); ?>
				/>
			</td>
			<td><i><?php _e('Check to start surveys minimized.', 'gravity-forms-survey-funnel-plugin'); ?></i></td>
		</tr>
		<?php endif; ?>
	</table>
	
	<?php submit_button(); ?>
</form>