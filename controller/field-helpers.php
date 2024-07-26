<?php
add_action('acf/init', 'add_cpt_tabs_to_theme_options');
function add_cpt_tabs_to_theme_options()
{
    if (function_exists('acf_add_local_field_group')) {
        $custom_post_types = get_field('cpt', 'option');
        if ($custom_post_types) {
            $fields = [];
            foreach ($custom_post_types as $cpt) {
                $field_key = 'tab_' . sanitize_title($cpt['cpt_name']);

                $fields[] = [
                    'key' => 'field_' . $field_key,
                    'label' => $cpt['cpt_label'],
                    'name' => strtolower($cpt['cpt_name']) . '_tab',
                    'type' => 'tab',
                    'placement' => 'left',
                ];
                $fields[] = [
                    'key' => $field_key . '_header_type',
                    'label' => $cpt['cpt_label'] . ' single header type',
                    'name' => strtolower($cpt['cpt_name']) . '_single_header_type',
                    'type' => 'select',
                    'choices' => [
                        'default' => 'Type 1',
                        'minimal' => 'Type 2'
                    ],
                    'default_value' => 'default'
                ];
                $fields[] = [
                    'key' => $field_key . '_enable_filters',
                    'label' => 'Enable filters for ' . $cpt['cpt_label'] . '?',
                    'name' => strtolower($cpt['cpt_name']) . '_filters',
                    'type' => 'true_false',
                    'wrapper' => [
                        'width' => '50%',
                    ]
                ];
                $fields[] = [
                    'key' => $field_key . '_enable_card_taxonomies',
                    'label' => 'Enable card taxonomies for ' . $cpt['cpt_label'] . '?',
                    'name' => strtolower($cpt['cpt_name']) . '_taxonomies',
                    'type' => 'true_false',
                    'wrapper' => [
                        'width' => '50%',
                    ]
                ];
                $fields[] = [
                    'key' => $field_key . '_video_asset_intro',
                    'label' => $cpt['cpt_label'] . ' archive video asset',
                    'name' => strtolower($cpt['cpt_name']) . '_archive_video_asset',
                    'type' => 'text',
                ];
                $fields[] = [
                    'key' => $field_key . '_intro_background_color',
                    'label' => $cpt['cpt_label'] . ' intro background color',
                    'name' => strtolower($cpt['cpt_name']) . '_intro_background_color',
                    'type' => 'select',
                    'choices' => [
                        '' => 'None',
                        'archiveCPT__header--primaryBG' => 'Primary Color',
                        'archiveCPT__header--secondaryBG' => 'Secondary Color',
                        'archiveCPT__header--tertiaryBG' => 'Tertiary Color',
                        'archiveCPT__header--accentBG' => 'Accent Color'
                    ],
                    'default_value' => 'small-image'
                ];
                $fields[] = [
                    'key' => $field_key . '_intro_font_color',
                    'label' => $cpt['cpt_label'] . ' intro font color',
                    'name' => strtolower($cpt['cpt_name']) . '_intro_font_color',
                    'type' => 'select',
                    'choices' => [
                        '' => 'Default',
                        'archiveCPT__header--primaryFont' => 'Primary Color',
                        'archiveCPT__header--secondaryFont' => 'Secondary Color',
                        'archiveCPT__header--tertiaryFont' => 'Tertiary Color',

                    ],
                    'default_value' => 'small-image'
                ];
                $fields[] = [
                    'key' => $field_key . '_wysiwyg_intro',
                    'label' => $cpt['cpt_label'] . ' Archive Intro',
                    'name' => strtolower($cpt['cpt_name']) . '_archive_intro',
                    'type' => 'wysiwyg',
                ];
                $fields[] = [
                    'key' => $field_key . '_card_type',
                    'label' => $cpt['cpt_label'] . ' archive card type',
                    'name' => strtolower($cpt['cpt_name']) . '_archive_card_type',
                    'type' => 'select',
                    'choices' => [
                        'icon-image' => 'Icon image',
                        'small-image' => 'Small image',
                        'large-image' => 'Large image',
                        'image-rounded' => 'Small image rounded'
                    ],
                    'default_value' => 'small-image'
                ];
                $fields[] = [
                    'key' => $field_key . '_card_background',
                    'label' => $cpt['cpt_label'] . ' archive card background',
                    'name' => strtolower($cpt['cpt_name']) . '_archive_card_background',
                    'type' => 'select',
                    'choices' => [
                        '' => 'None',
                        '--primaryBG' => 'Primary Color',
                        '--secondaryBG' => 'Secondary Color',
                        '--tertiaryBG' => 'Tertiary Color',
                        '--accentBG' => 'Accent Color'
                    ],
                ];
                $fields[] = [
                    'key' => $field_key . '_single_title_color',
                    'label' => $cpt['cpt_label'] . ' single title color',
                    'name' => strtolower($cpt['cpt_name']) . '_single_title_color',
                    'type' => 'select',
                    'choices' => [
                        '' => 'Default',
                        'section--primaryTitle' => 'Primary Color',
                        'section--secondaryTitle' => 'Secondary Color',
                        'section--tertiaryTitle' => 'Tertiary Color'
                    ],
                ];
                $fields[] = [
                    'key' => $field_key . '_single_image_type',
                    'label' => $cpt['cpt_label'] . ' single image type',
                    'name' => strtolower($cpt['cpt_name']) . '_single_image_type',
                    'type' => 'select',
                    'choices' => [
                        '' => 'Default',
                        'cptHeader__image--rounded' => 'Rounded',
                        'cptHeader__image--squared' => 'Squared',
                        'cptHeader__image--fullHeight' => 'Squared full height',
                    ],
                ];
                $fields[] = [
                    'key' => $field_key . '_card_link_text',
                    'label' => $cpt['cpt_label'] . ' archive card link text',
                    'name' => strtolower($cpt['cpt_name']) . '_card_link_text',
                    'type' => 'text',
                ];
                $fields[] = [
                    'key' => $field_key . '_single_image_type',
                    'label' => $cpt['cpt_label'] . ' single image type',
                    'name' => strtolower($cpt['cpt_name']) . '_single_image_type',
                    'type' => 'select',
                    'choices' => [
                        '' => 'Default',
                        'cptHeader__image--rounded' => 'Rounded',
                        'cptHeader__image--squared' => 'Squared',
                        'cptHeader__image--fullHeight' => 'Squared full height',
                    ],
                ];
                $fields[] = [
                    'key' => $field_key . '_card_button_type',
                    'label' => $cpt['cpt_label'] . ' card button type',
                    'name' => strtolower($cpt['cpt_name']) . '_card_button_type',
                    'type' => 'select',
                    'choices' => [
                        'button--primary' => 'Primary',
                        'button--secondary' => 'Secondary',
                        'button--tertiary' => 'Tertiary',
                        'button--alternative' => 'Alternative',
                        'button--alternative-1' => 'Alternative two'
                    ],
                ];
            }
            acf_add_local_field_group([
                'key' => 'group_theme_option_tabs',
                'title' => 'CPT Options',
                'fields' => $fields,
                'location' => [
                    [
                        [
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'theme-options'
                        ],
                    ],
                ],
            ]);
        }
    }
}