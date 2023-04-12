<?php
namespace Movie\Admin;

trait CPT {
    /**
     * Create movie custom post type
     */

    public function register_movie_cpt() {
        $args = array(
            'public' => true,
            'label'  => __( 'Movies', 'assignment2' ),
            'show_in_rest'          => true,
        );
        register_post_type( 'movie', $args );
    }

    
}