<?php

$banner = new StoutLogic\AcfBuilder\FieldsBuilder('banner');
$banner
    ->addAccordion('banner')
    ->addText('title')
    ->addTextarea('content')
    ->setLocation('block', '==', 'acf/banner');

add_action('acf/init', function () use ($banner) {
    acf_add_local_field_group($banner->build());
});

$hero = new StoutLogic\AcfBuilder\FieldsBuilder('hero');
$hero
    ->addAccordion('hero', [
        'label' => 'Hero',
        'layout' => 'block'
    ])
    ->addSelect('asset_type', [
        'label' => 'Asset type',
        'required' => 0,
        'choices' => [
            'image' => 'Image',
            'animation' => 'Animation',
        ],
        'default_value' => [
            'image' => 'Image'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('animation', [
        'label' => 'Animation',
        'required' => 0,
        'choices' => [
            'lady-summer' => 'Lady Summer',
            'carrots' => 'Carrots',
            'rocket' => 'Rocket'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'allow_null' => 1,
        'multiple' => 0,
        'return_format' => 'value',
        'placeholder' => '',
        'conditional_logic' => [
            [
                [
                    'field' => 'asset_type',
                    'operator' => '==',
                    'value' => 'animation',
                ],
            ],
        ],
    ])
    ->addImage('image', [
        'wrapper' => [
            'width' => '30%'
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'asset_type',
                    'operator' => '==',
                    'value' => 'image',
                ],
            ],
        ],
    ])
    ->addSelect('font_color', [
        'label' => 'Font color',
        'required' => 0,
        'choices' => [
            'section--light' => 'Primary',
            'section--dark' => 'Secondary',
        ],
        'default_value' => [
            'button--primary' => 'Primary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addColorPicker('background_color', [
        'label' => 'Background color',
        'required' => 0,
        'wrapper' => [
            'width' => '50%',
        ],
        'conditional_logic' => [],
        'enable_opacity' => 0,
        'return_format' => 'string',
        'default_value' => '',
    ])
    ->addText('background_video', [
        'label' => 'Background video',
        'required' => 0,
        'wrapper' => [
            'width' => '50%'
        ],
    ])
    ->addWysiwyg('content')
    ->addGroup('buttons')
    ->addLink('button_left', [
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addLink('button_right', [
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addSelect('button_left_style', [
        'label' => 'Button left style',
        'required' => 0,
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--alternative' => 'Alternative'
        ],
        'default_value' => [
            'button--primary' => 'Primary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('button_right_style', [
        'label' => 'Button right style',
        'required' => 0,
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--alternative' => 'Alternative'
        ],
        'default_value' => [
            'button--secondary' => 'Secondary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])

    ->endGroup()
    ->setLocation('block', '==', 'acf/hero');

add_action('acf/init', function () use ($hero) {
    acf_add_local_field_group($hero->build());
});

$textImage = new StoutLogic\AcfBuilder\FieldsBuilder('text_and_image');
$textImage
    ->addAccordion('text_and_image', [
        'label' => 'Text and image',
        'layout' => 'block'
    ])
    ->addColorPicker('background_color', [
        'label' => 'Background color',
        'required' => 0,
        'wrapper' => [
            'width' => '50%',
        ],
        'conditional_logic' => [],
        'enable_opacity' => 0,
        'return_format' => 'string',
        'default_value' => '',
    ])
    ->addText('background_video', [
        'label' => 'Background video',
        'required' => 0,
        'wrapper' => [
            'width' => '50%'
        ],
    ])
    ->addSelect('layout', [
        'label' => 'Layout',
        'required' => 0,
        'choices' => [
            'text-left' => 'Text left, image right',
            'text-right' => 'Text right, image left',
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'allow_null' => 0,
    ])
    ->addSelect('font_color', [
        'label' => 'Font color',
        'required' => 0,
        'choices' => [
            'section--light' => 'Primary',
            'section--dark' => 'Secondary',
        ],
        'default_value' => [
            'button--primary' => 'Primary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])

    ->addWysiwyg('content', [
        'wrapper' => [
            'width' => '70%'
        ]
    ])
    ->addImage('image', [
        'wrapper' => [
            'width' => '30%'
        ]
    ])
    ->addGroup('buttons')
    ->addLink('button_left', [
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addLink('button_right', [
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addSelect('button_left_style', [
        'label' => 'Button left style',
        'required' => 0,
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--tertiary' => 'Tertiary',
            'button--alternative' => 'Alternative'
        ],
        'default_value' => [
            'button--primary' => 'Primary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('button_right_style', [
        'label' => 'Button right style',
        'required' => 0,
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--tertiary' => 'Tertiary',
            'button--alternative' => 'Alternative'
        ],
        'default_value' => [
            'button--secondary' => 'Secondary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])

    ->endGroup()
    ->setLocation('block', '==', 'acf/text-and-image');

add_action('acf/init', function () use ($textImage) {
    acf_add_local_field_group($textImage->build());
});


$showcase = new StoutLogic\AcfBuilder\FieldsBuilder('showcase');
$showcase
    ->addAccordion('showcase', [
        'label' => 'Showcase',
        'layout' => 'block'
    ])
    ->addSelect('font_color', [
        'label' => 'Font color',
        'required' => 0,
        'choices' => [
            'section--light' => 'Primary',
            'section--dark' => 'Secondary',
        ],
        'default_value' => [
            'button--primary' => 'Primary'
        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'return_format' => 'value',
    ])

    ->addColorPicker('background_color', [
        'label' => 'Background color',
        'required' => 0,
        'wrapper' => [
            'width' => '50%',
        ],
        'conditional_logic' => [],
        'enable_opacity' => 0,
        'return_format' => 'string',
        'default_value' => '',
    ])
    ->addText('background_video', [
        'label' => 'Background video',
        'required' => 0,
        'wrapper' => [
            'width' => '50%'
        ],
    ])
    ->addSelect('case_type', [
        'label' => 'Case type',
        'required' => 0,
        'choices' => [
            '--responsive-website' => 'Responsive website',
            '--desktop-website' => 'Desktop website',
            '--mobile-website' => 'Mobile website',
            '--tablet-website' => 'Tablet website',
            '--video' => 'Video',
            '--image' => 'Image'
        ],
        'default_value' => [
            'button--primary' => 'Primary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('case_layout', [
        'label' => 'Case layout',
        'required' => 0,
        'choices' => [
            '--textleft' => 'Text left, content right',
            '--textright' => 'Text right, content left',
            '--row' => 'Seperate rows'
        ],
        'default_value' => [
            'button--primary' => 'Primary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addText('video_url', [
        'wrapper' => [
            'width' => '50%'
        ]
    ])
    ->conditional('case_type', '==', '--video')
    ->or('case_type', '==', '--desktop-website')
    ->or('case_type', '==', '--responsive-website')
    ->addText('iframe_url', [
        'wrapper' => [
            'width' => '50%'
        ]
    ])
    ->conditional('case_type', '==', '--mobile-website')
    ->or('case_type', '==', '--tablet-website')
    ->addImage('image', [
        'wrapper' => [
            'width' => '50%'
        ]
    ])
    ->conditional('case_type', '==', '--image')
    ->or('case_type', '==', '--responsive-website')
    ->or('case_type', '==', '--mobile-website')
    ->or('case_type', '==', '--tablet-website')
    ->addWysiwyg('content')
    ->addGroup('buttons')
    ->addLink('button_left', [
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addLink('button_right', [
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addSelect('button_left_style', [
        'label' => 'Button left style',
        'required' => 0,
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--alternative' => 'Alternative'
        ],
        'default_value' => [
            'button--primary' => 'Primary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('button_right_style', [
        'label' => 'Button right style',
        'required' => 0,
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--alternative' => 'Alternative'
        ],
        'default_value' => [
            'button--secondary' => 'Secondary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])

    ->endGroup()
    ->setLocation('block', '==', 'acf/showcase');

add_action('acf/init', function () use ($showcase) {
    acf_add_local_field_group($showcase->build());
});

$cptOverview = new StoutLogic\AcfBuilder\FieldsBuilder('cpt_overview');
$cptOverview
    ->addAccordion('cpt_overview', [
        'label' => 'CPT overview',
        'layout' => 'block'
    ])
    ->addColorPicker('background_color', [
        'label' => 'Background color',
        'required' => 0,
        'wrapper' => [
            'width' => '50%',
        ],
        'conditional_logic' => [],
        'enable_opacity' => 0,
        'return_format' => 'string',
        'default_value' => '',
    ])
    ->addText('background_video', [
        'label' => 'Background video url',
        'required' => 0,
        'wrapper' => [
            'width' => '50%'
        ],
    ])
    ->addWysiwyg('content')
    ->addRelationship('cpt_select', [
        'label' => 'Select CPT',
        'max' => 3,
        'return_format' => 'id'
    ])
    ->setLocation('block', '==', 'acf/cpt-overview');

add_action('acf/init', function () use ($cptOverview) {
    acf_add_local_field_group($cptOverview->build());
});

add_action('acf/init', function () {

});

$themeOptions = new StoutLogic\AcfBuilder\FieldsBuilder('theme_options');
$themeOptions
    ->addTab('general', [
        'placement' => 'left',
        'label' => 'General'
    ])
    ->addText('site_logo', [
        'label' => 'Site Logo',
    ])
    ->addGroup('site_colors', [
        'label' => 'Site colors',
        'layout' => 'block',
    ])
    ->addColorPicker('primary_color', [
        'label' => 'Primary color',
        'wrapper' => array(
            'width' => '33%',
        ),
    ])
    ->addColorPicker('secondary_color', [
        'label' => 'Secondary color',
        'wrapper' => array(
            'width' => '33%',
        ),
    ])
    ->addColorPicker('tertiary_color', [
        'label' => 'Tertiary color',
        'wrapper' => array(
            'width' => '33%',
        ),
    ])
    ->endGroup()
    ->addTab('cpt_detail', [
        'placement' => 'left',
        'label' => 'CPT Detail'
    ])
    ->addGroup('cpt_header', [
        'label' => 'CPT Header',
        'layout' => 'block',
    ])
    ->addSelect('header_background_color', [
        'label' => 'Header background color',
        'choices' => [
            'singleCPT--primaryBG' => 'Primary Color',
            'singleCPT--secondaryBG' => 'Secondary Color',
            'singleCPT--tertiaryBG' => 'Tertiary Color'
        ],
        'default_value' => [
            'button--primary' => 'Primary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addColorPicker('header_image_background_color', [
        'label' => 'Header image background color',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->endGroup()
    ->addTab('cpt_settings', [
        'placement' => 'left',
        'label' => 'Custom post types',
    ])
    ->addRepeater('cpt', [
        'label' => 'CPT',
        'layout' => 'block',
        'button_label' => 'Add CPT',
        'min' => 0,
        'max' => 5,
        'wrapper' => [
            'width' => '100%',
        ]
    ])
    ->addText('cpt_name', [
        'label' => 'CPT name',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->addText('cpt_label', [
        'label' => 'CPT label',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->addRepeater('taxonomies', [
        'label' => 'Taxonomies',
        'layout' => 'block',
        'button_label' => 'Add Taxonomy',
        'min' => 0,
        'max' => 5,
        'wrapper' => [
            'width' => '100%',
        ]
    ])
    ->addText('taxonomy_name', [
        'label' => 'Taxonomy name',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->addText('taxonomy_label', [
        'label' => 'Taxonomy label',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->endRepeater()
    ->endRepeater();


$themeOptions
    ->setLocation('options_page', '==', 'theme-options');


add_action('acf/init', function () use ($themeOptions) {
    acf_add_local_field_group($themeOptions->build());
});