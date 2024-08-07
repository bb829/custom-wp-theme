<?php

add_action('acf/init', 'register_dynamic_cpts', 10, 4);
function register_dynamic_cpts()
{
    $cpts = get_field('cpt', 'option');
    if ($cpts) {
        foreach ($cpts as $cpt) {
            $cpt_name = $cpt['cpt_name'];
            $cpt_label = $cpt['cpt_label'];
            $args = array(
                'label' => $cpt_label,
                'public' => true,
                'publicly_queryable' => true,
                'show_in_rest' => true,
                'query_var' => true,
                'rewrite' => ['slug' => $cpt_name],
                'has_archive' => true,
                'hierarchical' => false,
                'supports' => array('title', 'editor', 'thumbnail')
            );

            register_post_type($cpt_name, $args);

            register_acf_fields_for_cpts($cpt_name);

            $taxonomies = $cpt['taxonomies'];

            if ($taxonomies) {
                foreach ($taxonomies as $tax) {
                    $taxonomy_name = $tax['taxonomy_name'];
                    $taxonomy_label = $tax['taxonomy_label'];

                    $taxonomy_labels = array(
                        'name' => _x($taxonomy_label, 'taxonomy general name'),
                    );
                    
                    // FIND A WAY TO ADD AN IMAGE TO THE TAXONOMY
                    $taxonomy_args = array(
                        'hierarchical' => true,
                        'labels' => $taxonomy_labels,
                        'show_ui' => true,
                        'show_in_rest' => true,
                        'query_var' => true,
                        'rewrite' => array('slug' => $taxonomy_name)
                    );

                    register_taxonomy($taxonomy_name, $cpt_name, $taxonomy_args);

                    register_image_taxonomies($taxonomy_name, $taxonomy_label);
                }

            }
        }
    }
}

function register_acf_fields_for_cpts($cpt_identifier)
{

    $CPTFields = new StoutLogic\AcfBuilder\FieldsBuilder('cpt_' . $cpt_identifier . '_options');
    $CPTFields
        ->addTab('cpt_header', [
            'label' => 'CPT Header',
            'layout' => 'block'
        ])
        ->addText('cpt_title', [
            'label' => 'CPT Title',
            'wrapper' => [
                'width' => '100%',
            ]
        ])
        ->addSelect('header_image_type', [
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
    
        ->addTrueFalse('full_height', [
            'label' => 'Full height',
        ])
        ->addWysiwyg('header_content', [
            'label' => 'Header content',
            'wrapper' => [
                'width' => '100%',
            ]
        ])
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
                'button--alternative' => 'Alternative',
                'button--alternative-1' => 'Alternative two'
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
        ->addTrueFalse('text_full_height', [
            'label' => 'Full height',
        ])
        ->addTrueFalse('in_focus', [
            'label' => 'In focus',
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
        ->addWysiwyg('text', [
            'label' => 'Text',
            'wrapper' => [
                'width' => '100%',
            ]
        ])
        ->addImage('image', [
            'label' => 'Image',
            'wrapper' => [
                'width' => '50%',
            ]
        ])
        ->addSelect('content_image_type', [
            'label' => 'Image type',
            'required' => 0,
            'choices' => [
                '' => 'Default',
                'textImage__image--rounded' => 'Rounded',
                'textImage__image--squared' => 'Squared',
                'textImage__image--fullHeight' => 'Squared full height',
            ],
            'wrapper' => [
                'width' => '50%',
            ],
            'return_format' => 'value',
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
                'button--alternative' => 'Alternative',
                'button--alternative-1' => 'Alternative two'
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
                'button--alternative' => 'Alternative',
                'button--alternative-1' => 'Alternative two'
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
        ->addTab('featured_posts', [
            'label' => 'Featured posts',
            'layout' => 'block'
        ])
        ->addTrueFalse('featured_full_height', [
            'label' => 'Full height',
        ])
        ->addSelect('featured_posts_card_type', [
            'label' => 'Card type',
            'choices' => [
                'icon-image' => 'Icon image',
                'small-image' => 'Small image',
                'large-image' => 'Large image',
            ],
            'default' => 'small-image',
            'wrapper' => [
                'width' => '100%',
            ],
            'return_format' => 'value',
        ])
        ->addSelect('featured_posts_background_color', [
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
        ])
        ->addText('featured_posts_background_video', [
            'label' => 'Background video url',
            'required' => 0,
            'wrapper' => [
                'width' => '50%'
            ],
        ])
        ->addImage('featured_posts_background_image', [
            'label' => 'Background image',
            'required' => 0,
            'wrapper' => [
                'width' => '50%'
            ],
        ])
        ->addWysiwyg('featured_posts_content')
        ->addRelationship('featured_posts_select', [
            'label' => 'Select CPT',
            'max' => 3,
            'return_format' => 'id'
        ])
        ->setLocation('post_type', '==', $cpt_identifier);
    acf_add_local_field_group($CPTFields->build());
}

function register_image_taxonomies($taxonomy_name, $taxonomy_label)
{
    $TAXFields = new StoutLogic\AcfBuilder\FieldsBuilder($taxonomy_name . '_options', [
        'title' => '',
        'style' => 'seamless',
    ]);
    $TAXFields
        ->addImage('taxonomy_image', [
            'label' => 'Image',
            'wrapper' => [
                'width' => '100%',
            ],
            'return_value' => 'id'
        ])
        ->addWysiwyg('taxonomy_content', [
            'label' => 'Content',
            'wrapper' => [
                'width' => '100%',
            ]
        ])
        ->setLocation('taxonomy', '==', $taxonomy_name);
    acf_add_local_field_group($TAXFields->build());

}

add_filter('acf/load_field/key=field_cpt_overview_taxonomy_select', 'editTaxonomySelectChoices');
function editTaxonomySelectChoices($field)
{
    $taxonomies = get_taxonomies(['_builtin' => false], 'objects');

    $custom_taxonomies = [];
    $taxName = [];
    $taxLabel = [];
    foreach ($taxonomies as $taxonomy) {
        if (strpos($taxonomy->name, 'category') === false && strpos($taxonomy->name, 'post_tag') === false) {
            $taxName[] = $taxonomy->name;
            $taxLabel[] = $taxonomy->label;
        }
    }

    $choices = array_combine($taxName, $taxLabel);
    $field['choices'] = $choices;

    return $field;
}

add_filter('acf/load_field/key=field_cpt_overview_terms_select', 'editTermsSelectChoices');

function editTermsSelectChoices($field)
{
    $taxonomy = get_field('taxonomy_select');

    $terms = get_terms([
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
        'number' => 0,
    ]);

    $choices = [];

    foreach ($terms as $term) {
        $choices[$term->slug] = $term->name;
    }

    $field['choices'] = $choices;

        
    return $field;
}