<?php

add_action('init', 'create_project_post_type');
function create_project_post_type() {
    $labels = array(
        'name'               => _x('Projects', 'post type general name'),
        'singular_name'      => _x('Project', 'post type singular name'),
        'search_name'        => __('Project'),
        'add_new'            => _x('Add New', 'article'),
        'add_new_item'       => __('Add New Project'),
        'edit_item'          => __('Edit Project'),
        'new_item'           => __('New Project'),
        'all_items'          => __('All Projects'),
        'view_item'          => __('View Project'),
        'search_items'       => __('Search Projects'),
        'not_found'          => __('No projects found'),
        'not_found_in_trash' => __('No projects found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Projects'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Bodies of work by this author.',
        'public'             => true,
        'publicly_queryable' => true,
        'menu_position'      => 4,
        'supports'           => array('title', 'editor', 'thumbnail'),
        'has_archive'        => true,
        'show_ui'            => true,
        'capability_type'    => 'post',
        'rewrite'            => true,
        'taxonomies'         => array('project_categories'),
    );

    register_post_type('project', $args);
}

add_action('init', 'project_init');
function project_init() {
    register_taxonomy(
        'project_categories',
        'project',
        array(
            'hierarchical' => true,
            'label'        => 'Project Categories',
            'rewrite'      => array(
                'slug' => 'project-category'
            )
        )
    );
}
