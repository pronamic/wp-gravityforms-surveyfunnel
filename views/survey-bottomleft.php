<div id="gravity-forms-survey-funnel-form">
	<input type="hidden" id="form-id" value="<?php echo $surveyId; ?>" />
	<input type="hidden" id="form-minimalized" value="<?php echo $minimalized; ?>" />
	
	<div id="header">
		<div id="close"></div>
		<div id="title"><?php _e('Survey', 'gravity-forms-survey-funnel-plugin'); ?></div>
		<div class="clear"></div>
	</div>
	
	<div id="form">
		<?php echo $form; ?>
	</div>
</div>