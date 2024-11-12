<?php
/*
Plugin Name: Location Post Generator
Description: A plugin to create posts dynamically for selected locations with custom titles, content, tags, and meta descriptions.
Version: 1.1
Author: Firoz
Author URI: https://github.com/CodeFiroz
*/

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Add admin menu
add_action('admin_menu', 'location_post_generator_menu');
function location_post_generator_menu() {
    add_menu_page(
        'Location Post Generator',
        'Location Posts',
        'manage_options',
        'location-post-generator',
        'location_post_generator_page',
        'dashicons-location-alt'
    );
}

// Create the admin page with TinyMCE editor for content
function location_post_generator_page() {
    ?>
    <div class="wrap">
        <h1>Location Post Generator</h1>
        <form method="post" action="">
            <label for="locations">Enter Locations (comma-separated):</label><br>
            <input type="text" id="locations" name="locations" style="width: 100%;" placeholder="e.g., New York, Los Angeles, Chicago"><br><br>
            <label for="post_template">Post Content Template:</label><br>
            
            <?php
            // Use WordPress's wp_editor for rich text content editing
            $content = isset($_POST['post_template']) ? wp_kses_post($_POST['post_template']) : "Welcome to our store in {location}!";
            $editor_id = 'post_template';
            $settings = array(
                'textarea_name' => 'post_template',
                'media_buttons' => true,
                'textarea_rows' => 10,
                'tinymce'       => true,
            );
            wp_editor($content, $editor_id, $settings);
            ?>
            
            <br><br>
            <input type="submit" name="generate_posts" value="Generate Posts" class="button button-primary">
        </form>
    </div>
    <?php

    if (isset($_POST['generate_posts'])) {
        location_post_generator_create_posts();
    }
}

// Function to generate posts
function location_post_generator_create_posts() {
    if (!current_user_can('manage_options')) return;

    // Get form data
    $locations = explode(',', sanitize_text_field($_POST['locations']));
    $post_template = wp_kses_post($_POST['post_template']); // Use wp_kses_post to sanitize rich content

    foreach ($locations as $location) {
        $location = trim($location);
        $post_content = str_replace('{location}', $location, $post_template);
        $post_title = "Kashmir Tour & Travels agent packages from  $location";
        $post_tags = " 10 days itinerary for jammu and kashmir from $location, 10 days kashmir itinerary from $location, 10 days kashmir tour package from $location, 12 days kashmir package from $location, 2 days in gulmarg from $location, 2 days in pahalgam from $location, 2 days itinerary for srinagar from $location, 2 days kashmir tour from $location, 2 days trip to kashmir from $location, 2 nights pahalgam itinerary from $location, 3 day itinerary for kashmir from $location, 3 day itinerary for srinagar from $location, 3 day kashmir trip from $location, 3 day trip to kashmir from $location, 3 day trip to srinagar from $location, 3 days in kashmir from $location, 3 days in srinagar from $location, 3 days kashmir tour from $location, 3 days trip to kashmir from $location, 3 nights 4 days kashmir package from $location, 3 nights 4 days srinagar itinerary from $location, 3 nights 4 days srinagar package from $location, 4 day trip to kashmir from $location, 4 days in kashmir from $location, 4 days itinerary for srinagar from $location, 4 days itinerary kashmir from $location, 4 days kashmir tour from $location, 4 days kashmir trip from $location, 4 night 5 days kashmir itinerary from $location, 4 night 5 days kashmir tour package from $location, 4 nights 5 days kashmir package from $location, 4 nights 5 days kashmir tour itinerary from $location, 4 nights 5 days srinagar itinerary from $location, 4 nights kashmir itinerary from $location, 4n 5d kashmir package from $location, 5 day kashmir trip from $location, 5 day trip to kashmir from $location, 5 days in kashmir from $location, 5 days itinerary for srinagar from $location, 5 days kashmir itinerary from $location, 5 night 6 days srinagar itinerary from $location, 5 nights 6 days kashmir itinerary from $location, 5 nights 6 days kashmir tour itinerary from $location, 5 nights 6 days srinagar itinerary from $location, 5 nights 6 days srinagar package from $location, 5 nights kashmir itinerary from $location";


        $meta_description = "Want to enjoy heaven on Earth? Contact luckyflower for best sightseeing in Gulmarg, Srinagar . Best Houseboat Provider. Reasonable rates from $location";

        // Prepare post data
        $post_data = array(
            'post_title'   => $post_title,
            'post_content' => $post_content,
            'post_status'  => 'publish',
            'post_author'  => get_current_user_id(),
            'post_type'    => 'post',
        );

        // Insert the post into the database
        $post_id = wp_insert_post($post_data);

        if (!is_wp_error($post_id)) {
            // Set tags and meta description
            wp_set_post_tags($post_id, $post_tags);
            update_post_meta($post_id, '_meta_description', $meta_description);
        }
    }

    echo '<div class="notice notice-success"><p>Posts created successfully!</p></div>';
}
