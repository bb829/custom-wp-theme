<?php
add_action('tgmpa_register', 'register_required_plugins');

function register_required_plugins() {
    $plugins = array(
        array(
            'name'               => 'Advanced Custom Fields Pro',
            'slug'               => 'advanced-custom-fields-pro',
            'source'             => get_stylesheet_directory() . '/plugins/acfpro.zip',
            'required'           => true,
            'version'            => '', 
            'force_activation'   => true,
            'force_deactivation' => false,
            'external_url'       => '',
        ),
    );

    $config = array(
        'id'           => 'tgmpa',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa($plugins, $config);
}