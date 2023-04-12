<?php

namespace Movie\Includes;

use Movie\Includes\Loader as Loader;
use Movie\Includes\I18n as I18n;
use Movie\Admin\Admin as Admin;
use Movie\Frontend\Frontend as Frontend;
use Movie\Includes\Block as Block;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Movie
 * @subpackage Movie/includes
 * @author     Mrinal Haque <mrinalhaque99@gmail.com>
 */
class Controller {


	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Movie_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->assignment2_operation();
		if ( defined( 'MOVIE_VERSION' ) ) {
			$this->version = MOVIE_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'movie';
	}

	public function assignment2_operation() {
		if ( defined( 'Movie_Plugin_Loaded' ) ) { 
			return; 
		}
		define( 'Movie_Plugin_Loaded', true );
		$this->autoload();
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->register_blocks();
		$this->run();
	}

	/**
	 * Autoload all files depend on demand
	 * 
	 * @since 1.0.0
	 */
	public function autoload() {
		require_once dirname( __DIR__ ) . "/vendor/autoload.php";
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		$this->loader = new Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Assignment2_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'init', $plugin_admin, 'register_movie_cpt' );



	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Frontend( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$this->loader->add_action( 'wp_ajax_q_symphony_skeleton_api_cb', $plugin_public, 'q_symphony_skeleton_api_cb' );
		$this->loader->add_action( 'wp_ajax_nopriv_q_symphony_skeleton_api_cb', $plugin_public, 'q_symphony_skeleton_api_cb' );

	}

	public function register_blocks() {
		$plugin_blocks = new Block( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'init', $plugin_blocks, 'register_panel' );

		$this->loader->add_action( 'enqueue_block_editor_assets', $plugin_blocks, 'enqueue_script' );


		
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Assignment2_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
