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
            'name' => 'text-and-image',
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
            'name' => 'cpt-overview',
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

    acf_register_block(
        array(
            'name' => 'banner',
            'title' => __('Banner'),
            'render_callback' => 'banner_init',
            'category' => 'formatting',
            'icon' => 'carrot'
        )
    );

    acf_register_block(
        array(
            'name' => 'pricing-table',
            'title' => __('Pricing table'),
            'render_callback' => 'pricing_table_init',
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

function pricing_table_init($block, $content = '', $is_preview = false)
{
    $context = Timber::context();
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    Timber::render('organisms/pricing-table.twig', $context);
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
        'post_type' => 'any',
        'post__in' => get_field('cpt_select'),
        'orderby' => 'post__in',
        'posts_per_page' => -1,
    );

    $context['posts'] = Timber::get_posts( $args );
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    $context['viewmodel'] = new CptTopListViewModel();
    Timber::render('organisms/cpt-top-list.twig', $context);
}

function form_init($block, $content = '', $is_preview = false)
{
    $context = Timber::context();
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    Timber::render('organisms/form.twig', $context);
}

function banner_init($block, $content = '', $is_preview = false)
{
    $context = Timber::context();
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    Timber::render('organisms/banner.twig', $context);
}