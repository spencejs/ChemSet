<?php

/**
 * Get Theme Customizer Fields
 *
 * @package		Theme_Customizer_Boilerplate
 * @copyright	Copyright (c) 2013, Slobodan Manic
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 * @author		Slobodan Manic
 *
 * @since		Theme_Customizer_Boilerplate 1.0
 */


/**
 * Helper function that holds array of theme options.
 *
 * @return	array	$options	Array of theme options
 * @uses	thsp_get_theme_customizer_fields()	defined in customizer/helpers.php
 */
function thsp_cbp_get_fields() {

	/*
	 * Using helper function to get default required capability
	 */
	$thsp_cbp_capability = thsp_cbp_capability();

	$options = array(

		// Section ID
		'analytics_section' => array(

			/*
			 * We're checking if this is an existing section
			 * or a new one that needs to be registered
			 */
			'existing_section' => false,
			/*
			 * Section related arguments
			 * Codex - http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
			 */
			'args' => array(
				'title' => __( 'Analytics', 'chemset' ),
				'description' => __( 'Add Analytics Code', 'chemset' ),
				'priority' => 2
			),

			/*
			 * This array contains all the fields that need to be
			 * added to this section
			 */
			'fields' => array(

				//Analytics field
				'chemset_analytics_code' => array(
					'setting_args' => array(
						'default' => '',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),
					'control_args' => array(
						'label' => __( 'Analytics Code', 'chemset' ),
						'type' => 'textarea', // Textarea control
						'priority' => 7
					)
				)

			),

		),

		/*
		 * Add fields to an existing Customizer section
		 */
		'colors' => array(
			'existing_section' => true,
			'fields' => array(

				/*
				 * ==============
				 * ==============
				 * Color field
				 * ==============
				 * ==============
				 */
				'new_checkbox_field_colors' => array(
					'setting_args' => array(
						'default' => '',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),
					'control_args' => array(
						'label' => __( 'New color field label', 'chemset' ),
						'type' => 'color', // Checkbox field control
						'priority' => 3
					)
				)

			)
		)

	);

	/*
	 * 'thsp_cbp_options_array' filter hook will allow you to
	 * add/remove some of these options from a child theme
	 */
	return apply_filters( 'thsp_cbp_options_array', $options );

}