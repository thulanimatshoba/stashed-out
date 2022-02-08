<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'stashed_out_post_meta');
function stashed_out_post_meta()
{
    // Home Page Post Meta
    Container::make('post_meta', __('My Services', 'stashed_out'))
        ->show_on_page('home')
        ->add_fields(array(
            Field::make('text', 'services_title'),
            Field::make('complex', 'stashed_out_services', '')
                ->set_layout('tabbed-vertical')
                ->add_fields(array(
                    Field::make('text', 'service_title', 'Title')->set_width(50),
                    Field::make('image', 'service_image', 'Image Icon')->set_width(50),
                    Field::make('textarea', 'service_description', 'Description'),

                ))
                ->set_header_template('
            <% if (service_title) { %>
                <%- service_title %>
            <% } else { %>
                empty
            <% } %> '
                ),
        ));
}