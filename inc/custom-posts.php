<?php
add_action( 'init', 'kisetsucon_guests_post_type');
function kisetsucon_guests_post_type() {
    register_post_type('guests',
        array(
            'labels' => array(
                'name' => __('Guests'),
                'singular_name' => __('Guest')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'guests'),
        )
    );

    register_taxonomy('type', 'guests', array(
        'label' => __('Type'),
        'rewrite' => array('slug' => 'type'),
        'hierarchical' => true,
    ));
}