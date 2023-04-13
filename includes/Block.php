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

		$this->enqueue_block_script();
	}

    public function enqueue_block_script() {
		
		// Register JavasScript File build/index.js
		wp_register_script(
			'my-custom-block',
			plugins_url( 'build/index.js', __DIR__ ),
			array( 'wp-blocks', 'wp-element', 'wp-editor' ),
			filemtime( plugin_dir_path( __DIR__ ) . 'build/index.js' )
		);

		// Register quote block
		register_block_type( 'movie/quote-block', array(
			'editor_script' => 'my-custom-block',
			'render_callback' => array( $this, 'fav_quote_dynamic_render_callback' ),
		) );
    }
	
	public function fav_quote_dynamic_render_callback( $block_attributes, $content ) {
		ob_start();
		echo $content;
		return ob_get_clean();
	}
}