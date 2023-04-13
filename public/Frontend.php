<?php

namespace Movie\Frontend;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Movie
 * @subpackage Movie/public
 * @author     Mrinal Haque <mrinalhaque99@gmail.com>
 */
class Frontend {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_register_script( 'movie-script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js', array( 'jquery' ), filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/script.js' ), true );

		wp_enqueue_script( 'movie-script' );

		// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value.
		wp_localize_script( 'script', 'ajax_object', array( 
			'ajax_url'	=> admin_url( 'admin-ajax.php' ),
			'nonce'		=> wp_create_nonce( 'movie-nonce' ),
		) );

	}

	public function q_symphony_skeleton_api_cb() {
		// nonce verification.
		if ( ! wp_verify_nonce( $_POST['nonce'], 'movie-nonce' ) ) {
			wp_die ( 'You are not allow to request!');
		}
        $email = $_POST['email'];
		$password = $_POST['password'];

		$endpoint = 'https://symfony-skeleton.q-tests.com/api/v2/token';

		$body = [
			'email'  	=> $email,
			'password' 	=> $password,
		];

		$body = wp_json_encode( $body );

		$options = [
			'body'        => $body,
			'headers'     => [
				'Content-Type' => 'application/json',
			],
		];

		$api_response = wp_remote_post( $endpoint, $options );
		$response_code = wp_remote_retrieve_response_code( $api_response );
		if ( 200 === $response_code ) {
			$api_body     = json_decode( wp_remote_retrieve_body( $api_response ) );
			// print_r($api_body);
			$token = $api_body->token_key;
			wp_send_json_success( array( 'token'=>$token ) );
		}

        wp_die();
    }

}
