<?php

add_action('acf/init', 'register_dynamic_cpts', 10 , 4);
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

            if($taxonomies) {
                foreach($taxonomies as $tax) {
                    $taxonomy_name = $tax['taxonomy_name'];
                    $taxonomy_label = $tax['taxonomy_label'];
                    $taxonomy_labels = array(
                        'name' => _x($taxonomy_label, 'taxonomy general name'),
                    );
                    
                    $taxonomy_args = array(
                        'hierarchical' => true,
                        'labels' => $taxonomy_labels,
                        'show_ui' => true,
                        'show_in_rest' => true,
                        'query_var' => true,
                        'rewrite' => array('slug' => $taxonomy_name),
                    );
                    
                    register_taxonomy($taxonomy_name, $cpt_name, $taxonomy_args);
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
        ->addTrueFalse('in_focus', [
            'label' => 'In focus',
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
        ->addTab('featured_posts', [
            'label' => 'Featured posts',
            'layout' => 'block'
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