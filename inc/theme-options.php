<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options() {
    Container::make( 'theme_options', __('Theme Options', 'crb') )
        ->add_tab( 'Social', array(
            Field::make( 'text', 'crb_social_url_facebook', 'Facebook Page URL' )
                ->set_help_text( 'Enter your Facebook page URL' )
                ->set_attribute( 'type', 'url' ),
            Field::make( 'text', 'crb_social_url_instagram', 'Instagram URL' )
                ->set_help_text( 'Enter your Instagram URL' )
                ->set_attribute( 'type', 'url' ),
            Field::make( 'text', 'crb_social_url_twitter', 'Twitter Profile URL' )
                ->set_help_text( 'Enter your Twitter profile URL' )
                ->set_attribute( 'type', 'url' ),
            Field::make( 'text', 'crb_info_email', 'Info Email' )
                ->set_help_text( 'Enter your email for public access' )
                ->set_attribute( 'type', 'email' ),
        ))
        ->add_tab( 'Other', array(
            Field::make( 'date_time', 'crb_event_start', 'Event Start' )
                ->set_help_text( 'Enter date and time of the start of the event' ),
            Field::make( 'image', 'crb_page_header_image', 'Default Page Header Image' )
                ->set_help_text( 'Choose the image that will be the header for all page headers' ),
        ));
}