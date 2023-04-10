<?php

namespace Assignment2\Includes;

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Assignment2
 * @subpackage Assignment2/includes
 * @author     Mrinal Haque <mrinalhaque99@gmail.com>
 */
class Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		$object = new self();
		$object->take_off_notice();
	}

	public function take_off_notice() {
		set_transient('my_deactivation_transient', 'My plugin is being deactivated', 100);
		$this->sample_admin_notice__success();
	}

	/**
	 * Admin notice on deactivation
	 */
	function sample_admin_notice__success() {
		$message = get_transient('my_deactivation_transient');

    	if (empty($message)) return;

    	echo "<div class='error'><p>$message</p></div>";
	}

}
