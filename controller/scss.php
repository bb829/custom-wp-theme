<?php
use ScssPhp\ScssPhp\Compiler;

add_action('acf/init', function () {
    try {
        $siteColors = get_field('site_colors', 'option');

        if ($siteColors && isset($siteColors['primary_color'])) {
            $primaryColor = $siteColors['primary_color'];
            $secondaryColor = $siteColors['secondary_color'];
            $tertiaryColor = $siteColors['tertiary_color'];
            $accentColor = $siteColors['accent_color'];
            $accentColorTwo = $siteColors['accent_color_two'];
            $accentColorThree = $siteColors['accent_color_three'];
        }

        $scssContent = ":root { --primary-color: $primaryColor; --secondary-color: $secondaryColor; --tertiary-color: $tertiaryColor; --accent-color: $accentColor; --accent-color-two: $accentColorTwo; --accent-color-three: $accentColorThree;}";

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