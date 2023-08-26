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

$universal_content = new StoutLogic\AcfBuilder\FieldsBuilder('universal_content');
$universal_content
    ->addAccordion('universal_content', [
        'label' => 'Universal content',
        'layout' => 'block',
        'wrapper' => [
            'width' => '100%'
        ]
    ])
    ->addGroup('block_options')
    ->addTrueFalse('is_hero', [
        'label' => 'Is hero?',
        'wrapper' => [
            'width' => '50%'
        ]
    ])
    ->addSelect('incoming_animation', [
        'label' => 'Incoming animation',
        'required' => 0,
        'choices' => [
            'fade-in' => 'Fade in',
            'fade-in-top' => 'Fade in top',
            'fade-in-right' => 'Fade in right',
            'fade-in-bottom' => 'Fade in bottom',
            'fade-in-left' => 'Fade in left'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'allow_null' => 1,
    ])
    ->endGroup()
    ->addGroup('layout_options')
        ->addTrueFalse('padding', [
            'label' => 'Custom padding?',
            'wrapper' => [
                'width' => '50%'
            ]
        ])
        ->addTrueFalse('margin', [
            'label' => 'Custom margin?',
            'wrapper' => [
                'width' => '50%'
            ]
        ])
        ->addGroup('padding_settings', [
            'wrapper' => [
                'width' => '100%'
            ]
        ])
        ->conditional('padding', '==', '1')
        ->addNumber('p_top', [
            'label' => 'Padding top',
            'wrapper' => [
              'width' => '25%'
            ],
            'min' => '0',
            'max' => '100'
        ])
        ->addNumber('p_right', [
            'label' => 'Padding right',
            'wrapper' => [
                'width' => '25%'
            ],
            'min' => '0',
            'max' => '100'
        ])
        ->addNumber('p_bottom', [
            'label' => 'Padding bottom',
            'wrapper' => [
                'width' => '25%'
            ],
            'min' => '0',
            'max' => '100'
        ])
        ->addNumber('p_left', [
            'label' => 'Padding left',
            'wrapper' => [
                'width' => '25%'
            ],
            'min' => '0',
            'max' => '100'
        ])
        ->endGroup()
        ->addGroup('margin_settings', [
            'wrapper' => [
                'width' => '100%'
            ]
        ])
        ->conditional('margin', '==', '1')
        ->addNumber('m_top', [
            'label' => 'Margin top',
            'wrapper' => [
              'width' => '25%'
            ],
            'min' => '0',
            'max' => '100'
        ])
        ->addNumber('m_right', [
            'label' => 'Margin right',
            'wrapper' => [
                'width' => '25%'
            ],
            'min' => '0',
            'max' => '100'
        ])
        ->addNumber('m_bottom', [
            'label' => 'Margin bottom',
            'wrapper' => [
                'width' => '25%'
            ],
            'min' => '0',
            'max' => '100'
        ])
        ->addNumber('m_left', [
            'label' => 'Margin left',
            'wrapper' => [
                'width' => '25%'
            ],
            'min' => '0',
            'max' => '100'
        ])
        ->endGroup()
        ->addSelect('layout', [
            'label' => 'Layout',
            'required' => 0,
            'choices' => [
                'text-left' => 'Text left, image right',
                'text-right' => 'Text right, image left',
                'row' => 'Row layout'
            ],
            'wrapper' => [
                'width' => '50%',
            ],
            'allow_null' => 0,
        ])
        ->addSelect('row_layout', [
            'label' => 'Mobile layout',
            'required' => 0,
            'choices' => [
                'text-top' => 'Text top, media bottom',
                'text-bottom' => 'Text bottom, media top',
            ],
            'wrapper' => [
                'width' => '50%',
            ],
            'allow_null' => 0,
        ])
    ->endGroup()
    ->addGroup('style_options')
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
    ->addText('background_video', [
        'label' => 'Background video',
        'required' => 0,
        'wrapper' => [
            'width' => '100%'
        ],
    ])
    ->endGroup()
    ->addGroup('content', [
        'wrapper' => [
            'width' => '60%'
        ]
    ])
    ->addWysiwyg('text')
    ->addSelect('incoming_animation', [
        'label' => 'Incoming animation',
        'required' => 0,
        'choices' => [
            'fade-in' => 'Fade in',
            'fade-in-top' => 'Fade in top',
            'fade-in-right' => 'Fade in right',
            'fade-in-bottom' => 'Fade in bottom',
            'fade-in-left' => 'Fade in left',
            'scale-in-center' => 'Scale in center'

        ],
        'allow_null' => 1,
    ])
    ->addSelect('animation_delay', [
        'label' => 'Animation delay',
        'required' => 0,
        'choices' => [
            'delay-2' => '400ms',
            'delay-3' => '600ms',
            'delay-4' => '800ms',
            'delay-5' => '1000ms',
            'delay-6' => '1500ms',
            'delay-7' => '2000ms',
            'delay-8' => '2500ms',
        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'allow_null' => 1,
    ])
    ->endGroup()
    ->addGroup('media', [
        'wrapper' => [
            'width' => '40%'
        ]
    ])
    ->addSelect('asset_type', [
        'label' => 'Media type',
        'required' => 0,
        'choices' => [
            '--html' => 'HTML',
            '--image' => 'Image',
            '--video' => 'Video',
        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'allow_null' => 1,
        'multiple' => 0,
        'return_format' => 'value',
        'placeholder' => '',
    ])
    ->addImage('image', [
        'label' => 'Image',
        'wrapper' => [
            'width' => '100%'
        ]
    ])
    ->conditional('asset_type', '==', '--image')
    ->addUrl('video', [
        'label' => 'Video',
        'wrapper' => [
            'width' => '100%'
        ]
    ])
    ->conditional('asset_type', '==', '--video')
    ->addGroup('video_options', [
        'label' => 'Video options'
    ])
    ->conditional('asset_type', '==', '--video')
    ->addTrueFalse('autoplay', [
        'label' => 'Autoplay',
        'wrapper' => [
            'width' => '50%'
        ]
    ])
    ->addTrueFalse('mute', [
        'label' => 'Mute',
        'wrapper' => [
            'width' => '50%'
        ]
    ])
    ->addTrueFalse('loop', [
        'label' => 'Loop',
        'wrapper' => [
            'width' => '50%'
        ]
    ])
    ->addTrueFalse('controls', [
        'label' => 'Controls',
        'wrapper' => [
            'width' => '50%'
        ]
    ])
    ->endGroup()
    ->addRepeater('html', [
         'label' => 'Multi layered html',
         'required' => 0,
         'wrapper' => [
           'width' => '100%'
         ],
        'max' => 3,
        'layout' => 'block',
        'button_label' => '',
    ])
     ->conditional('asset_type', '==', '--html')
    ->addTextarea('html_code', [
        'label' => 'Layer'
    ])
    ->addRange('layer_width', [
        'label' => 'Width (%)',
        'min' => '0',
        'max' => '100',
    ])
    // ->addSelect('animation', [
    //     'label' => 'Animation',
    //     'required' => 0,
    //     'choices' => [
    //         'vibrate-1' => 'Vibrate',
    //         'vibrate-1-reverse' => 'Vibrate reverse',
    //     ],
    //     'wrapper' => [
    //         'width' => '100%',
    //     ],
    //     'allow_null' => 1,
    // ])
    ->addSelect('incoming_animation', [
        'label' => 'Incoming animation',
        'required' => 0,
        'choices' => [
            'fade-in' => 'Fade in',
            'fade-in-top' => 'Fade in top',
            'fade-in-right' => 'Fade in right',
            'fade-in-bottom' => 'Fade in bottom',
            'fade-in-left' => 'Fade in left',
            'scale-in-center' => 'Scale in center'

        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'allow_null' => 1,
    ])
    ->addSelect('animation_delay', [
        'label' => 'Animation delay',
        'required' => 0,
        'choices' => [
            'delay-2' => '400ms',
            'delay-3' => '600ms',
            'delay-4' => '800ms',
            'delay-5' => '1000ms',
            'delay-6' => '1500ms',
            'delay-7' => '2000ms',
            'delay-8' => '2500ms',
        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'allow_null' => 1,
    ])
    ->endRepeater()
    ->addRange('border_radius', [
        'label' => 'Border radius (px)',
        'min' => '0',
        'max' => '100',
    ])
    ->conditional('asset_type', '==', '--image')
        ->or('asset_type', '==', '--video')
    ->addSelect('image_shape', [
        'label' => 'Shape',
        'required' => 0,
        'choices' => [
            'circle' => 'Circle',
        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'allow_null' => 1,
    ])
    ->conditional('asset_type', '==', '--image')
        ->or('asset_type', '==', '--video')
    ->addSelect('filter', [
        'label' => 'CSS filter',
        'required' => 0,
        'choices' => [
            'gray' => 'Grayscale'
        ],
        'wrapper' => [
            'width' => '100%',
          ],
          'allow_null' => 1,
     ])
     ->conditional('asset_type', '==', '--image')
        ->or('asset_type', '==', '--video')
    ->addSelect('incoming_animation', [
        'label' => 'Incoming animation',
        'required' => 0,
        'choices' => [
            'fade-in' => 'Fade in',
            'fade-in-top' => 'Fade in top',
            'fade-in-right' => 'Fade in right',
            'fade-in-bottom' => 'Fade in bottom',
            'fade-in-left' => 'Fade in left',
            'scale-in-center' => 'Scale in center'

        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'allow_null' => 1,
    ])
    ->conditional('asset_type', '!=', '--html')
    ->addSelect('animation_delay', [
        'label' => 'Animation delay',
        'required' => 0,
        'choices' => [
            'delay-2' => '400ms',
            'delay-3' => '600ms',
            'delay-4' => '800ms',
            'delay-5' => '1000ms',
            'delay-6' => '1500ms',
            'delay-7' => '2000ms',
            'delay-8' => '2500ms',
        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'allow_null' => 1,
    ])
    ->conditional('asset_type', '!=', '--html')
    ->endGroup()
    ->addGroup('buttons', [
        'wrapper' => [
            'width' => '100%'
        ]
    ])
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
    ->addSelect('incoming_animation', [
        'label' => 'Incoming animation',
        'required' => 0,
        'choices' => [
            'fade-in' => 'Fade in',
            'fade-in-top' => 'Fade in top',
            'fade-in-right' => 'Fade in right',
            'fade-in-bottom' => 'Fade in bottom',
            'fade-in-left' => 'Fade in left',
            'scale-in-center' => 'Scale in center'

        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'allow_null' => 1
    ])
    ->addSelect('animation_delay', [
        'label' => 'Animation delay',
        'required' => 0,
        'choices' => [
            'delay-2' => '400ms',
            'delay-3' => '600ms',
            'delay-4' => '800ms',
            'delay-5' => '1000ms',
            'delay-6' => '1500ms',
            'delay-7' => '2000ms',
            'delay-8' => '2500ms',
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'allow_null' => 1
    ])
    ->endGroup()
    ->setLocation('block', '==', 'acf/universal-content');

add_action('acf/init', function () use ($universal_content) {
    acf_add_local_field_group($universal_content->build());
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