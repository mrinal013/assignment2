<?php
namespace Movie\Admin;

trait Metabox {
    /**
     * Create movie custom post type
     */

    public function register_movie_title_meta_box() {
        add_meta_box(
            'meta_fields_meta_box', 
            __( 'Movie Title', 'movie' ), 
            array( $this, 'meta_fields_build_meta_box_callback' ), 
            'movie',
            'side',
            'default'
         );
    }

    public function meta_fields_build_meta_box_callback( $post ) {
          wp_nonce_field( 'meta_fields_save_meta_box_data', 'meta_fields_meta_box_nonce' );
          $movie_title = get_post_meta( $post->ID, '_movie_title', true );
          ?>
          <div class="inside">
              <p><input type="text" id="_movie_title" name="_movie_title" value="<?php echo esc_attr( $movie_title ); ?>" /></p>	
          </div>
          <?php
    }

    // save metadata
    public function meta_fields_save_meta_box_data( $post_id ) {
        if ( ! isset( $_POST['meta_fields_meta_box_nonce'] ) )
            return;
        if ( ! wp_verify_nonce( $_POST['meta_fields_meta_box_nonce'], 'meta_fields_save_meta_box_data' ) )
            return;
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return;
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;

        if ( ! isset( $_POST['_movie_title'] ) )
            return;

        $movie_title = sanitize_text_field( $_POST['_movie_title'] );

        update_post_meta( $post_id, '_movie_title', $movie_title );
    }
    

    
}