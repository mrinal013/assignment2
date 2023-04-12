<?php
namespace Movie\Includes;

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
        
	}

    public function enqueue_script() {
        wp_enqueue_script(
            'fav-quote-block', 
            plugins_url( 'build/index.js', __DIR__ ),
            array( 'wp-edit-post' ),
            filemtime( plugin_dir_path( __DIR__ ) . 'build/index.js' ),
            false
        );
    }    
}