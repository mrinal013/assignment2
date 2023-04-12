<?php
namespace Assignment2\Includes;

class Block {

    /**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

    /**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        $this->register_panel();


	}
    /**
     * Register movie_title post meta in panel
     */
    public function register_panel() {
        register_post_meta( 'movie', '_movie_title', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ] );
        register_post_meta( 'post', '_my_custom_text', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ] );
    }

    public function enqueue_script() {
        wp_enqueue_script(
            'movie-title-meta', 
            plugins_url( 'build/index.js', __DIR__ ),
            array( 'wp-edit-post' ),
            filemtime( plugin_dir_path( __DIR__ ) . 'build/index.js' ),
            false
        );
    }

    // /**
    //  * Register movie quote block
    //  */
    // public function register_movie_quote_block() {
    //     // Register JavasScript File build/index.js
    //     wp_register_script(
    //         'movie-quote',
    //         plugins_url( 'build/index.js', __DIR__ ),
    //         array( 'wp-blocks', 'wp-element', 'wp-editor' ),
    //         filemtime( plugin_dir_path( __DIR__ ) . 'build/index.js' )
    //     );
    //    // Register movie quote block
    //     register_block_type( 'assignment2/test-block', array(
    //         'editor_script' => 'movie-quote',
    //     ) );

    // }

    

    
}