<?php

add_action('acf/init', 'register_blocks');
function register_blocks()
{

    acf_register_block(
        array(
            'name' => 'hero',
            'title' => __('Hero'),
            'description' => __('Every websites needs a hero.'),
            'render_callback' => 'hero_init',
            'category' => 'formatting',
            'icon' => 'admin-comments',
        )
    );

    acf_register_block(
        array(
            'name' => 'text_and_image',
            'title' => __('Text and Image'),
            'render_callback' => 'textimage_init',
            'category' => 'formatting',
            'icon' => 'admin-comments'
        )
    );

    acf_register_block(
        array(
            'name' => 'showcase',
            'title' => __('Showcase'),
            'render_callback' => 'showcase_init',
            'category' => 'formatting',
            'icon' => 'admin-comments'
        )
    );

    acf_register_block(
        array(
            'name' => 'cpt_overview',
            'title' => __('CPT overview'),
            'render_callback' => 'cpt_init',
            'category' => 'formatting',
            'icon' => 'carrot'
        )
    );

    acf_register_block(
        array(
            'name' => 'form',
            'title' => __('Form'),
            'render_callback' => 'form_init',
            'category' => 'formatting',
            'icon' => 'carrot'
        )
    );
}

function hero_init($block, $content = '', $is_preview = false)
{
    $context = Timber::context();
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    Timber::render('organisms/hero.twig', $context);
}

function textimage_init($block, $content = '', $is_preview = false)
{
    $context = Timber::context();
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    Timber::render('organisms/text-image.twig', $context);
}

function showcase_init($block, $content = '', $is_preview = false)
{
    $context = Timber::context();
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    Timber::render('organisms/showcase.twig', $context);
}

function cpt_init($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

    $args = array(
        'post_type' => 'carrots',
        'posts_per_page' => -1,
        'post__in' => get_field('carrots'),
        'orderby' => 'post__in'
    );
    
    $context['posts'] = Timber::get_posts( $args );
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    Timber::render('organisms/carrot_overview.twig', $context);
}

function form_init($block, $content = '', $is_preview = false)
{
    $context = Timber::context();
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    Timber::render('organisms/form.twig', $context);
}