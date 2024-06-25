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
    ->addRelationship('cpt', [
        'label' => 'CPT',
        'post_type' => 'carrots',
        'max' => 3,
        'return_format' => 'id'
    ])
    ->setLocation('block', '==', 'acf/cpt-overview');

add_action('acf/init', function () use ($cptOverview) {
    acf_add_local_field_group($cptOverview->build());
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
            'width' => '33%', // Adjust the width as necessary
        ),
    ])
    ->addColorPicker('secondary_color', [
        'label' => 'Secondary color',
        'wrapper' => array(
            'width' => '33%', // Adjust the width as necessary
        ),
    ])
    ->addColorPicker('tertiary_color', [
        'label' => 'Tertiary color',
        'wrapper' => array(
            'width' => '33%', // Adjust the width as necessary
        ),
    ])
    ->endGroup()
    ->addTab('cpt_detail', [
        'placement' => 'left',
        'label' => 'CTP Detail'
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

    ->setLocation('options_page', '==', 'theme-options');

add_action('acf/init', function () use ($themeOptions) {
    acf_add_local_field_group($themeOptions->build());
});


$cptOptions = new StoutLogic\AcfBuilder\FieldsBuilder('cpt_options');
$cptOptions
    ->addTab('cpt_header', [
        'label' => 'CPT Header',
        'layout' => 'block'
    ])
    ->addTrueFalse('show_options', [
        'label' => 'Show options',
        'wrapper' => [
            'width' => '25%',
        ]
    ])
    ->addWysiwyg('header_content', [
        'label' => 'Header content',
        'wrapper' => [
            'width' => '100%',
        ]
    ])
    ->addRepeater('options', [
        'label' => 'CPT options',
        'layout' => 'block',
        'button_label' => 'Add option',
        'min' => 0,
        'max' => 5,
        'wrapper' => [
            'width' => '75%',
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'show_options',
                    'operator' => '==',
                    'value' => '1',
                ],
            ],
        ],
    ])
    ->addImage('option_image', [
        'label' => 'Option image',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->addText('option_name', [
        'label' => 'Option name',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->endRepeater()
    ->addRepeater('buttons', [
        'label' => 'Buttons',
        'layout' => 'block',
        'button_label' => 'Add button',
        'min' => 0,
        'max' => 2,
        'wrapper' => [
            'width' => '100%',
        ]
    ])
    ->addLink('button', [
        'label' => 'Header button',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->addSelect('button_style', [
        'label' => 'Button style',
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--tertiary' => 'Tertiary',
            'button--alternative' => 'Alternative'
        ],
        'default_value' => [
            'button--primary' => 'Primary'
        ],
        'return_format' => 'value',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->endRepeater()
    ->addTab('cpt_content', [
        'label' => 'CPT Content',
        'layout' => 'block'
    ])
    ->addRepeater('content', [
        'label' => 'CPT content',
        'layout' => 'block',
        'button_label' => 'Add content',
        'min' => 0,
        'max' => 5,
        'wrapper' => [
            'width' => '100%',
        ]
    ])
    ->addWysiwyg('text', [
        'label' => 'Text',
        'wrapper' => [
            'width' => '60%',
        ]
    ])
    ->addImage('image', [
        'label' => 'Image',
        'wrapper' => [
            'width' => '40%',
        ]
    ])
    ->addLink('button_left', [
        'label' => 'Button left',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->addSelect('button_left_style', [
        'label' => 'Button left style',
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--tertiary' => 'Tertiary',
            'button--alternative' => 'Alternative'
        ],
        'default_value' => [
            'button--primary' => 'Primary'
        ],
        'return_format' => 'value',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->addLink('button_right', [
        'label' => 'Button right',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->addSelect('button_right_style', [
        'label' => 'Button right style',
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--tertiary' => 'Tertiary',
            'button--alternative' => 'Alternative'
        ],
        'default_value' => [
            'button--secondary' => 'Secondary'
        ],
        'return_format' => 'value',
        'wrapper' => [
            'width' => '50%',
        ]
    ])
    ->addSelect('layout', [
        'label' => 'Layout',
        'required' => 0,
        'choices' => [
            'text-left' => 'Text left, image right',
            'text-right' => 'Text right, image left',
        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'allow_null' => 0,
    ])
    ->endRepeater()
    ->setLocation('post_type', '==', 'carrots');
add_action('acf/init', function () use ($cptOptions) {
    acf_add_local_field_group($cptOptions->build());
});