<?php
add_action('acf/init', 'add_cpt_tabs_to_theme_options');
function add_cpt_tabs_to_theme_options() {
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
                    'key' => $field_key . '_wysiwyg_intro',
                    'label' => $cpt['cpt_label'] . ' Archive Intro',
                    'name' => strtolower($cpt['cpt_name']) . '_archive_intro',
                    'type' => 'wysiwyg',
                ];
                $fields[] = [
                    'key' => $field_key . '_card_type',
                    'label' => $cpt['cpt_label'] . ' Archive card type',
                    'name' => strtolower($cpt['cpt_name']) . '_archive_card_type',
                    'type' => 'select',
                    'choices' => [
                        'small-image' => 'Small image',
                        'large-image' => 'Large image',
                    ],
                    'default_value' => 'small-image'
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