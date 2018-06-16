<?php 
require 'class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ko_band_register_required_plugins' );

function ko_band_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
        

        array(
			'name'               => 'Koband Modules', // The plugin name.
			'slug'               => 'ko-band-modules', // The plugin slug (typically the folder name).
			'source'             => 'http://koband.kolabor.net/ko-band-modules.zip', // The plugin source.
			'external_url'       => 'http://koband.kolabor.net/ko-band-modules.zip', // If set, overrides default API 
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific
		),

		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		array(
			'name'         => 'Contact Form 7', // The plugin name.
			'slug'         => 'contact_form_7', // The plugin slug (typically the folder name).
			'source'       => 'https://downloads.wordpress.org/plugin/contact-form-7.5.0.2.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://github.com/wp-plugins/contact-form-7', // If set, overrides default API URL and points to an external URL.
		),
        // This is an example of how to include a plugin from an arbitrary external source in your theme.
		array(
			'name'         => 'Customizer Export/Import', // The plugin name.
			'slug'         => 'customizer_export_import', // The plugin slug (typically the folder name).
			'source'       => 'https://downloads.wordpress.org/plugin/customizer-export-import.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://github.com/fastlinemedia/customizer-export-import', // If set, overrides default API URL and points to an external URL.
		),
		

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'koband',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'koband' ),
			'menu_title'                      => __( 'Install Plugins', 'koband' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'koband' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'koband' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'koband' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'koband'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'koband'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'koband'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'koband'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'koband'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'koband'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'koband'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'koband'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'koband'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'koband' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'koband' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'koband' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'koband' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'koband' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'koband' ),
			'dismiss'                         => __( 'Dismiss this notice', 'koband' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'koband' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'koband' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

?>