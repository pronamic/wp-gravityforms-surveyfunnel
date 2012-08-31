<div id="gravity-forms-survey-funnel">
	<input type="hidden" id="gravity-forms-survey-funnel-form-id" value="<?php echo $surveyId; ?>" />
	<input type="hidden" id="gravity-forms-survey-funnel-form-minimalized" value="<?php echo $minimalized; ?>" />
	
	<div id="gravity-forms-survey-funnel-header">
		<div id="gravity-forms-survey-funnel-close"></div>
		<div id="gravity-forms-survey-funnel-title"><?php _e('Survey', 'gravity-forms-survey-funnel-plugin'); ?></div>
		<div class="gravity-forms-survey-funnel-clear"></div>
	</div>
	
	<div id="gravity-forms-survey-funnel-form">
		<?php echo $form; ?>
	</div>
</div>