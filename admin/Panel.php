<?php
namespace Movie\Admin;

trait Panel {
    /**
     * Create movie custom post type
     */

    public function register_movie_title() {
        register_post_meta( 'movie', '_movie_title', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ] );
    }

    public function enqueue_panel_script() {
        wp_enqueue_script(
            'movie-title-meta', 
            plugin_dir_url( __FILE__ ) . 'build/index.js', 
            [ 'wp-edit-post', 'wp-element', 'wp-components', 'wp-plugins', 'wp-data' ],
            false,
            false
        );
    }

    
}