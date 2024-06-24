<?php
use ScssPhp\ScssPhp\Compiler;

add_action('acf/init', function () {
    $primaryColor = '';
    $secondaryColor = '';
    $siteColors = '';

    try {
        $siteColors = get_field('site_colors', 'option');

        if ($siteColors && isset($siteColors['primary_color'])) {
            $primaryColor = $siteColors['primary_color'];
            $secondaryColor = $siteColors['secondary_color'];
            $tertiaryColor = $siteColors['tertiary_color'];
        }

        $scssContent = ":root { --primary-color: $primaryColor; --secondary-color: $secondaryColor; --tertiary-color: $tertiaryColor;}";

        $scssCompiler = new Compiler();

        $compiledCss = $scssCompiler->compile($scssContent);

        $cssFilePath = get_template_directory() . '/assets/options.css';

        if (file_put_contents($cssFilePath, $compiledCss) === false) {
            throw new Exception('Failed to save compiled CSS.');
        }
    } catch (Exception $e) {
        error_log('Error in SCSS processing: ' . $e->getMessage());
    }
});