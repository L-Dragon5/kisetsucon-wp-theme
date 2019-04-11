<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Home Page Meta
add_action( 'carbon_fields_register_fields', 'crb_attach_home_meta');
function crb_attach_home_meta() {
    Container::make( 'post_meta', __( 'Carousel Options', 'crb' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_id', '=', get_option( 'page_on_front' ) )
        ->add_fields( array(
            Field::make( 'complex', 'crb_slides', 'Slides' )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( array(
                Field::make( 'image', 'image', 'Image' ),
                Field::make( 'text', 'title', 'Title' ),
                Field::make( 'textarea', 'content', 'Content' ),
                Field::make( 'text', 'button_url', 'Button URL' ),
                Field::make( 'text', 'button_text', 'Button Text' ),
            ))
        ));
}

// About Page Meta
add_action( 'carbon_fields_register_fields', 'crb_attach_about_meta');
function crb_attach_about_meta() {
    Container::make( 'post_meta', __( 'Staff List', 'crb' ) )
        ->where( 'post_type', '=', 'page' )
        ->show_on_template('page-templates/page-about.php')
        ->add_fields(array(
            Field::make( 'complex', 'crb_staff_list', 'Staff List' )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( array(
                Field::make( 'text', 'name', 'Name' ),
                Field::make( 'text', 'position', 'Position' ),
                Field::make( 'textarea', 'description', 'Description' ),
                Field::make( 'image', 'image', 'Image'),
            ))
        ));
}

// Google Forms Page Meta
add_action( 'carbon_fields_register_fields', 'crb_attach_google_form_embed_meta');
function crb_attach_google_form_embed_meta() {
    Container::make( 'post_meta', __( 'Google Form Embed Options', 'crb' ) )
        ->where( 'post_type', '=', 'page' )
        ->show_on_template('page-templates/page_google-form-embed.php')
        ->add_fields(array(
            Field::make( 'text', 'google_form_url', 'Google Form URL' ),
            Field::make( 'rich_text', 'page_additional_info', 'Additional Information')
        ));
}

// Accordion Page Meta
add_action( 'carbon_fields_register_fields', 'crb_attach_accordion_meta');
function crb_attach_accordion_meta() {
    Container::make( 'post_meta', __( 'Accordion List', 'crb' ) )
        ->where( 'post_type', '=', 'page' )
        ->show_on_template('page-templates/page_accordion.php')
        ->add_fields(array(
            Field::make( 'complex', 'accordion_list', 'Accordion List' )
            ->set_layout( 'tabbed-vertical' )
            ->add_fields( array(
                Field::make( 'text', 'accordion_header', 'Accordion Header' ),
                Field::make( 'complex', 'accordion_body', 'Accordion Body List' )
                ->set_layout( 'tabbed-vertical' )
                ->add_fields( array(
                    Field::make( 'text', 'heading', 'Heading' ),
                    Field::make( 'rich_text', 'body', 'Body' ),
                ))
            ))
        ));
}

// Location Page Meta
add_action( 'carbon_fields_register_fields', 'crb_attach_location_meta' );
function crb_attach_location_meta() {
    Container::make( 'post_meta', __('Location Information', 'crb') )
        ->where( 'post_type', '=', 'page' )
        ->show_on_template('page-templates/page-location.php')
        ->add_fields(array(
            Field::make( 'image', 'image', 'Image' ),
            Field::make( 'text', 'embed_map', 'Map HTML Code' ),
        ));
}

// Guests Meta
add_action( 'carbon_fields_register_fields', 'crb_attach_guests_meta');
function crb_attach_guests_meta() {
    Container::make ('post_meta', __('Additional Info', 'crb') )
        ->where( 'post_type', '=', 'guests' )
        ->add_Fields(array(
            Field::make( 'image', 'image', 'Image' ),
            Field::make( 'rich_text', 'notable_roles', 'Notable Roles'),
        ));
}