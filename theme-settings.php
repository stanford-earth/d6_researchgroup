<?
/**
 * Implementation of researchgroup_settings() function.
 * http://drupal.org/node/177868
 *
 * @param $saved_settings
 *   array An array of saved settings for this theme.
 * @return
 *   array A form array.
 */

function researchgroup_settings($saved_settings) {
	
	$defaults = array(
		'homepage_columns' => 'grid-333',
	);
	
	// Merge the saved variables and their default values
	$settings = array_merge($defaults, $saved_settings);
	
	// Create the form widgets using Forms API
	$form['homepage_columns'] = array(
		'#type' => 'radios',
		'#title' => t('Homepage Columns'),
		'#description' => t('Layout used for columns set in percentages.'),
		'#default_value' => $settings['homepage_columns'],
		'#options' => array(
				'grid-333' => t('3-3-3'),
				'grid-63' => t('6-3'),
				'' => t('Full')),
		);

		return $form;
}	
?>
