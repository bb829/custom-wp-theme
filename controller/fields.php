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

$pricingTable = new StoutLogic\AcfBuilder\FieldsBuilder('pricing_table');
$pricingTable
    ->addAccordion('pricing_table')
    ->addTrueFalse('in_focus', [
        'label' => 'In focus',
    ])
    ->addSelect('type', [
        'label' => 'Type',
        'choices' => [
            'default' => 'Default',
            'tabs' => 'Tabs',
            'cards' => 'Cards',

        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
        'default_value' => 'default'
    ])
    ->addTrueFalse('full_height', [
        'label' => 'Full height',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addSelect('card_type', [
        'label' => 'Card type',
        'choices' => [
            'icon-image' => 'Icon image',
            'small-image' => 'Small image',
            'large-image' => 'Large image',
            'image-rounded' => 'Small image rounded'
        ],
        'default' => 'small-image',
        'wrapper' => [
            'width' => '100%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'cards',
                ],
            ],
        ],
    ])
    ->addSelect('card_background', [
        'label' => 'Card background color',
        'choices' => [
            '' => 'None',
            '--primaryBG' => 'Primary Color',
            '--secondaryBG' => 'Secondary Color',
            '--tertiaryBG' => 'Tertiary Color',
            '--accentBG' => 'Accent Color'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'cards',
                ],
            ],
        ],

    ])
    ->addSelect('button_type', [
        'label' => 'Button type in card',
        'required' => 0,
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--tertiary' => 'Tertiary',
            'button--alternative' => 'Alternative',
            'button--alternative-1' => 'Alternative two'
        ],
        'default_value' => 'button--primary',
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'cards',
                ],
            ],
        ],
    ])
    ->addSelect('button_type_cta', [
        'label' => 'Button type under cards',
        'required' => 0,
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--tertiary' => 'Tertiary',
            'button--alternative' => 'Alternative',
            'button--alternative-1' => 'Alternative two'
        ],
        'default_value' => 'button--primary',
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'cards',
                ],
            ],
        ],

    ])
    ->addText('cta_button_text', [
        'label' => 'CTA button text',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addText('card_button_link', [
        'label' => 'Card button link',
        'wrapper' => [
            'width' => '50%',
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'cards',
                ],
            ],
        ],

    ])
    ->addSelect('background_color', [
        'label' => 'Background color',
        'choices' => [
            '' => 'None',
            'section--primaryBG' => 'Primary Color',
            'section--secondaryBG' => 'Secondary Color',
            'section--tertiaryBG' => 'Tertiary Color',
            'section--accentBG' => 'Accent Color'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'cards',
                ],
            ],
        ],

    ])
    ->addSelect('font_color', [
        'label' => 'Font color',
        'required' => 0,
        'choices' => [
            '' => 'Default',
            'section--primaryFont' => 'Primary Color',
            'section--secondaryFont' => 'Secondary Color',
            'section--tertiaryFont' => 'Tertiary Color'
        ],
        'default_value' => [
            '' => 'Default'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addWysiwyg('content', [
        'label' => 'Content',
        'wrapper' => [
            'width' => '100%',
        ],

    ])
    ->addRepeater('pricing_table_table', [
        'label' => 'Pricing table content',
        'layout' => 'block',
        'button_label' => 'Add pricing table',
    ])
    ->addSelect('background_color', [
        'label' => 'Background color',
        'choices' => [
            '' => 'None',
            'section--primaryBG' => 'Primary Color',
            'section--secondaryBG' => 'Secondary Color',
            'section--tertiaryBG' => 'Tertiary Color',
            'section--accentBG' => 'Accent Color'
        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'return_format' => 'value',
    ])

    ->addImage('image', [
        'label' => 'Item image',
        'wrapper' => [
            'width' => '50%',
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'new_row',
                    'operator' => '==',
                    'value' => '1',
                ],
            ],
        ],
    ])
    ->addText('title', [
        'label' => 'Title',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addRepeater('table_row', [
        'label' => 'Table row',
        'layout' => 'block',
        'button_label' => 'Add row',
    ])
    ->addImage('row_image', [
        'label' => 'Row image',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addText('item')
    ->addWysiwyg('description')
    ->addNumber('price')
    ->endRepeater()
    ->endRepeater()
    ->addRepeater('item_row', [
        'label' => 'Item',
        'layout' => 'block',
        'button_label' => 'Add item',
        'conditional_logic' => [
            [
                [
                    'field' => 'type',
                    'operator' => '==',
                    'value' => 'cards',
                ],
            ],
        ],
    ])
    ->addImage('row_image', [
        'label' => 'Item image',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addText('title')
    ->addWysiwyg('description')
    ->addNumber('price')
    ->endRepeater()

    ->setLocation('block', '==', 'acf/pricing-table');

add_action('acf/init', function () use ($pricingTable) {
    acf_add_local_field_group($pricingTable->build());
});

$hero = new StoutLogic\AcfBuilder\FieldsBuilder('hero');
$hero
    ->addAccordion('hero', [
        'label' => 'Hero',
        'layout' => 'block'
    ])
    ->addTrueFalse('full_height', [
        'label' => 'Full height',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addSelect('font_color', [
        'label' => 'Font color',
        'required' => 0,
        'choices' => [
            '' => 'Default',
            'section--primaryFont' => 'Primary Color',
            'section--secondaryFont' => 'Secondary Color',
            'section--tertiaryFont' => 'Tertiary Color',

        ],
        'default_value' => [
            '' => 'Default'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('asset_type', [
        'label' => 'Asset type',
        'required' => 0,
        'choices' => [
            'image' => 'Image',
            'animation' => 'Animation',
            'form' => 'Form',
            'video' => 'Video',
        ],
        'default_value' => [
            'image' => 'Image'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('form_software', [
        'label' => 'Form software',
        'required' => 0,
        'choices' => [
            'forms' => 'Forms',
            'gravityforms' => 'GravityForms',
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'asset_type',
                    'operator' => '==',
                    'value' => 'form',
                ],
            ],
        ],
    ])
    ->addText('form_id', [
        'label' => 'Form ID',
        'wrapper' => [
            'width' => '50%',
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'form_software',
                    'operator' => '==',
                    'value' => 'forms',
                ],
            ],
        ],
    ])
    ->addText('gravityforms_shortcode', [
        'label' => 'GravityForms shortcode',
        'wrapper' => [
            'width' => '50%',
        ],
        'conditional_logic' => [

            [
                [
                    'field' => 'form_software',
                    'operator' => '==',
                    'value' => 'gravityforms',
                ],
            ],
        ],
    ])
    ->addSelect('form_type', [
        'label' => 'Form type',
        'required' => 0,
        'choices' => [
            'form--primary' => 'Primary',
            'form--secondary' => 'Secondary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'allow_null' => 1,
        'multiple' => 0,
        'return_format' => 'value',
        'default_value' => [
            'form--primary' => 'Primary'
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'asset_type',
                    'operator' => '==',
                    'value' => 'form',
                ],
            ],
        ],
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
            'width' => '100%',
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
            'width' => '50%'
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
    ->addSelect('image_type', [
        'label' => 'Asset style',
        'required' => 0,
        'choices' => [
            '' => 'Default',
            'hero__image--rounded' => 'Rounded',
            'hero__image--squared' => 'Squared',
            'hero__image--fullHeight' => 'Squared full height',
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'field_1',
                    'operator' => '==',
                    'value' => 'image',
                ],
            ],
            [
                [
                    'field' => 'field_1',
                    'operator' => '==',
                    'value' => 'video',
                ],
            ],
        ],
    ])
    ->addTrueFalse('gradient', [
        'label' => 'Background gradient',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addTrueFalse('background_paint', [
        'label' => 'Background Color',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addSelect('background_gradient', [
        'label' => 'Background gradient',
        'choices' => [
            'section--primaryGradient' => 'Primary Gradient',
            'section--secondaryGradient' => 'Secondary Gradient'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'gradient',
                    'operator' => '==',
                    'value' => '1',
                ],
            ],
        ],
    ])
    ->addTrueFalse('animate_gradient', [
        'label' => 'Animate gradient',
        'wrapper' => [
            'width' => '50%',
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'gradient',
                    'operator' => '==',
                    'value' => '1',
                ],
            ],
        ],
    ])
    ->addSelect('gradient_animation', [
        'label' => 'Background gradient animation',
        'choices' => [
            'animatePrimaryGradient' => 'Primary Gradient',
            'animateSecondaryGradient' => 'Secondary Gradient'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'animate_gradient',
                    'operator' => '==',
                    'value' => '1',
                ],
            ],
        ],
    ])
    ->addText('video_asset', [
        'wrapper' => [
            'label' => 'Video URL',
            'width' => '50%'
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'asset_type',
                    'operator' => '==',
                    'value' => 'video',
                ],
            ],
        ],
    ])
    ->addSelect('background_color', [
        'label' => 'Background color',
        'choices' => [
            'section--primaryBG' => 'Primary Color',
            'section--secondaryBG' => 'Secondary Color',
            'section--tertiaryBG' => 'Tertiary Color',
            'section--accentBG' => 'Accent Color',
            'section--accentTwoBG' => 'Accent two Color',
            'section--accentThreeBG' => 'Accent three Color'
        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'background_paint',
                    'operator' => '==',
                    'value' => '1',
                ],
            ],
        ],
    ])
    ->addTrueFalse('video', [
        'label' => 'Background video',
        'wrapper' => [
            'width' => '100%',
        ],
    ])
    ->addText('background_video', [
        'label' => 'Background video',
        'required' => 0,
        'wrapper' => [
            'width' => '50%'
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'video',
                    'operator' => '==',
                    'value' => '1',
                ],
            ],
        ],
    ])
    ->addSelect('video_overlay', [
        'label' => 'Video overlay',
        'required' => 0,
        'choices' => [
            'none' => 'None',
            'overlay-dark' => 'Dark',
            'overlay-light' => 'Light',
        ],
        'default_value' => [
            'none' => 'None'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'video',
                    'operator' => '==',
                    'value' => '1',
                ],
            ],
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
            'button--tertiary' => 'Tertiary',
            'button--alternative' => 'Alternative',
            'button--alternative-1' => 'Alternative two'
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
            'button--alternative' => 'Alternative',
            'button--alternative-1' => 'Alternative two'

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
    ->addTrueFalse('in_focus', [
        'label' => 'In focus',
    ])
    ->addTrueFalse('full_height', [
        'label' => 'Full height',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addSelect('background_color', [
        'label' => 'Background color',
        'choices' => [
            '' => 'None',
            'section--primaryBG' => 'Primary Color',
            'section--secondaryBG' => 'Secondary Color',
            'section--tertiaryBG' => 'Tertiary Color',
            'section--accentBG' => 'Accent Color',
            'section--accentTwoBG' => 'Accent Two Color'

        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('title_color', [
        'label' => 'Title color',
        'required' => 0,
        'choices' => [
            '' => 'Default',
            'section--primaryTitle' => 'Primary Color',
            'section--secondaryTitle' => 'Secondary Color',
            'section--tertiaryTitle' => 'Tertiary Color'
        ],
        'default_value' => [
            '' => 'Default'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('font_color', [
        'label' => 'Font color',
        'required' => 0,
        'choices' => [
            '' => 'Default',
            'section--primaryFont' => 'Primary Color',
            'section--secondaryFont' => 'Secondary Color',
            'section--tertiaryFont' => 'Tertiary Color'
        ],
        'default_value' => [
            '' => 'Default'
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
    ->addSelect('layout', [
        'label' => 'Layout',
        'required' => 0,
        'choices' => [
            'text-left' => 'Text left, image right',
            'text-right' => 'Text right, image left',
            'text-top' => 'Text top, image bottom',
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'allow_null' => 0,
    ])
    ->addSelect('asset_type', [
        'label' => 'Asset type',
        'required' => 0,
        'choices' => [
            'image' => 'Image',
            'animation' => 'Animation',
            'form' => 'Form',
            'video' => 'Video',
        ],
        'default_value' => [
            'image' => 'Image'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('form_software', [
        'label' => 'Form software',
        'required' => 0,
        'choices' => [
            'forms' => 'Forms',
            'gravityforms' => 'GravityForms',
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'asset_type',
                    'operator' => '==',
                    'value' => 'form',
                ],
            ],
        ],
    ])
    ->addText('form_id', [
        'label' => 'Form ID',
        'wrapper' => [
            'width' => '50%',
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'form_software',
                    'operator' => '==',
                    'value' => 'forms',
                ],
            ],
        ],
    ])
    ->addText('gravityforms_shortcode', [
        'label' => 'GravityForms shortcode',
        'wrapper' => [
            'width' => '50%',
        ],
        'conditional_logic' => [

            [
                [
                    'field' => 'form_software',
                    'operator' => '==',
                    'value' => 'gravityforms',
                ],
            ],
        ],
    ])
    ->addSelect('form_type', [
        'label' => 'Form type',
        'required' => 0,
        'choices' => [
            'form--primary' => 'Primary',
            'form--secondary' => 'Secondary'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'allow_null' => 1,
        'multiple' => 0,
        'return_format' => 'value',
        'default_value' => [
            'form--primary' => 'Primary'
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'asset_type',
                    'operator' => '==',
                    'value' => 'form',
                ],
            ],
        ],
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
            'width' => '100%',
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
            'width' => '50%'
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
    ->addText('video_asset', [
        'wrapper' => [
            'label' => 'Video URL',
            'width' => '50%'
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'asset_type',
                    'operator' => '==',
                    'value' => 'video',
                ],
            ],
        ],
    ])
    ->addWysiwyg('content', [
        'wrapper' => [
            'width' => '100%'
        ]
    ])
    ->addSelect('image_type', [
        'label' => 'Image type',
        'required' => 0,
        'choices' => [
            '' => 'Default',
            'textImage__image--rounded' => 'Rounded',
            'textImage__image--squared' => 'Squared',
            'textImage__image--fullHeight' => 'Squared full height',
        ],
        'wrapper' => [
            'width' => '30%',
        ],
        'return_format' => 'value',
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
            'button--alternative' => 'Alternative',
            'button--alternative-1' => 'Alternative two'
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
            'button--alternative' => 'Alternative',
            'button--alternative-1' => 'Alternative two'
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
    ->addTrueFalse('full_height', [
        'label' => 'Full height',
        'wrapper' => [
            'width' => '50%',
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
    ->addTrueFalse('show_taxonomies', [
        'label' => 'Show taxonomies',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addTrueFalse('full_height', [
        'label' => 'Full height',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addSelect('font_color', [
        'label' => 'Font color',
        'required' => 0,
        'choices' => [
            '' => 'Default',
            'section--primaryFont' => 'Primary Color',
            'section--secondaryFont' => 'Secondary Color',
            'section--tertiaryFont' => 'Tertiary Color'
        ],
        'default_value' => [
            '' => 'Default'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('card_type', [
        'label' => 'Card type',
        'choices' => [
            'icon-image' => 'Icon image',
            'small-image' => 'Small image',
            'large-image' => 'Large image',
            'image-rounded' => 'Small image rounded'
        ],
        'default' => 'small-image',
        'wrapper' => [
            'width' => '100%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('card_background', [
        'label' => 'Card background color',
        'choices' => [
            '' => 'None',
            '--primaryBG' => 'Primary Color',
            '--secondaryBG' => 'Secondary Color',
            '--tertiaryBG' => 'Tertiary Color',
            '--accentBG' => 'Accent Color'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('image_background', [
        'label' => 'Image background color',
        'required' => 0,
        'choices' => [
            '' => 'None',
            '--primaryBG' => 'Primary Color',
            '--secondaryBG' => 'Secondary Color',
            '--tertiaryBG' => 'Tertiary Color',
            '--accentBG' => 'Accent Color'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('button_type', [
        'label' => 'Button type in card',
        'required' => 0,
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--tertiary' => 'Tertiary',
            'button--alternative' => 'Alternative',
            'button--alternative-1' => 'Alternative two'
        ],
        'default_value' => 'button--primary',
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('button_type_cta', [
        'label' => 'Button type under cards',
        'required' => 0,
        'choices' => [
            'button--primary' => 'Primary',
            'button--secondary' => 'Secondary',
            'button--tertiary' => 'Tertiary',
            'button--alternative' => 'Alternative',
            'button--alternative-1' => 'Alternative two'
        ],
        'default_value' => 'button--primary',
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('background_color', [
        'label' => 'Background color',
        'choices' => [
            '' => 'None',
            'section--primaryBG' => 'Primary Color',
            'section--secondaryBG' => 'Secondary Color',
            'section--tertiaryBG' => 'Tertiary Color'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addText('background_video', [
        'label' => 'Background video url',
        'required' => 0,
        'wrapper' => [
            'width' => '50%'
        ],
    ])
    ->addText('cta_button_text', [
        'label' => 'CTA button text',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addWysiwyg('content')
    ->addSelect('relationship_type', [
        'label' => 'Relationship type',
        'choices' => [
            'cpt_select' => 'Post item',
            'cpt_taxonomy' => 'Taxonomy',
        ],
        'default' => 'cpt_select',
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addRelationship('cpt_select', [
        'label' => 'Select CPT',
        'max' => 3,
        'return_format' => 'id',
        'conditional_logic' => [
            [
                [
                    'field' => 'relationship_type',
                    'operator' => '==',
                    'value' => 'cpt_select',
                ],
            ],
        ],
    ])
    ->addSelect('taxonomy_select', [
        'label' => 'Select taxonomy',
        'choices' => [
            'category' => 'Category',
        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'return_format' => 'value',
        'conditional_logic' => [
            [
                [
                    'field' => 'relationship_type',
                    'operator' => '==',
                    'value' => 'cpt_taxonomy',
                ],
            ],
        ],
    ])
    ->addSelect('terms_select', [
        'label' => 'Select terms',
        'choices' => [
            'option1' => 'Option 1',
        ],
        'multiple' => true,
        'ui' => true,
        'return_format' => 'value',
        'wrapper' => [
            'width' => '100%',
        ],
        'conditional_logic' => [
            [
                [
                    'field' => 'relationship_type',
                    'operator' => '==',
                    'value' => 'cpt_taxonomy',
                ],
            ],
        ],
    ])->setLocation('block', '==', 'acf/cpt-overview');

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
    ->addImage('logo', [
        'label' => 'Logo',
        'return_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'mime_types' => 'png,svg',
        'wrapper' => [
            'width' => '50%',
        ],
    ])
    ->addSelect('navigation', [
        'label' => 'Site navigation',
        'choices' => [
            'fullscreen' => 'fullscreen',
            'traditional' => 'traditional',
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('footer_background_color', [
        'label' => 'Footer background color',
        'choices' => [
            'section--primaryBG' => 'Primary Color',
            'section--secondaryBG' => 'Secondary Color',
            'section--tertiaryBG' => 'Tertiary Color'
        ],
        'wrapper' => [
            'width' => '100%',
        ],
        'return_format' => 'value',
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
    ->addColorPicker('accent_color', [
        'label' => 'Accent color',
        'wrapper' => array(
            'width' => '33%',
        ),
    ])
    ->addColorPicker('accent_color_two', [
        'label' => 'Accent color 2',
        'wrapper' => array(
            'width' => '33%',
        ),
    ])
    ->addColorPicker('accent_color_three', [
        'label' => 'Accent color 3',
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
    ->addSelect('single_cpt_header_type', [
        'label' => 'Header background color',
        'choices' => [
            'singleCPT--primaryBG' => 'Primary Color',
            'singleCPT--secondaryBG' => 'Secondary Color',
            'singleCPT--tertiaryBG' => 'Tertiary Color'
        ],
        'wrapper' => [
            'width' => '50%',
        ],
        'return_format' => 'value',
    ])
    ->addSelect('header_background_color', [
        'label' => 'Header background color',
        'choices' => [
            'singleCPT--primaryBG' => 'Primary Color',
            'singleCPT--secondaryBG' => 'Secondary Color',
            'singleCPT--tertiaryBG' => 'Tertiary Color'
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
    ->addImage('taxonony_image', [
        'label' => 'Taxonomy image',
        'wrapper' => [
            'width' => '33%',
        ]
    ])
    ->addText('taxonomy_name', [
        'label' => 'Taxonomy name',
        'wrapper' => [
            'width' => '33%',
        ]
    ])
    ->addText('taxonomy_label', [
        'label' => 'Taxonomy label',
        'wrapper' => [
            'width' => '33%',
        ]
    ])
    ->endRepeater()
    ->endRepeater();


$themeOptions
    ->setLocation('options_page', '==', 'theme-options');


add_action('acf/init', function () use ($themeOptions) {
    acf_add_local_field_group($themeOptions->build());
});