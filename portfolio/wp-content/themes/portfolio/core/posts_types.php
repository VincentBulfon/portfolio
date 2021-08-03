<?php
add_theme_support('post-thumbnails');


register_post_type('project', [
    'label' => 'Projects',
    'labels' => [
        'name' => 'Projects',
        'singular_name' => 'Project',
        'add_new' => 'Add new',
        'add_new_item' => 'Add a new project',
    ],
    'description'=>'The projects you made',
    'public' => true,
    'menu_position' => 3,
    'menu_icon' => 'dashicons-hammer',
    'supports'=>['title','custom-fields']

]);
