<?php
namespace Movie\Admin;

trait Login {
    /**
     * Create template for login
     */

    public function login_template() {
        // Add a filter to the page attributes metabox to inject our template into the page template cache.
		add_filter( 'theme_page_templates', array( $this, 'add_login_template' ) );

        $this->templates = array(
			'template-login.php'     => __( 'Login Page Template', 'movie' ),
		);

        // Add a filter to the template include to determine if the page has login page template assigned and return it's path
		add_filter( 'template_include', array( $this, 'view_project_template' ) );

    }

    /**
	 * Adds our template to the page dropdown for v4.7+
	 *
	 */
	public function add_login_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}

    /**
	 * Checks if the template is assigned to the page
	 */
	public function view_project_template( $template ) {
		// Return the search template if we're searching (instead of the template for the first result)
		if ( is_search() ) {
			return $template;
		}

		// Get global post
		global $post;

		// Return template if post is empty
		if ( ! $post ) {
			return $template;
		}

		// Return default template if we don't have a custom one defined
		if ( ! isset( $this->templates[get_post_meta(
			$post->ID, '_wp_page_template', true
		)] ) ) {
			return $template;
		}

		// Allows filtering of file path
		$filepath = apply_filters( 'page_templater_plugin_dir_path', plugin_dir_path( __FILE__ ) );

		$file =  $filepath . get_post_meta(
			$post->ID, '_wp_page_template', true
		);

		// Just to be safe, we check if the file exist first
		if ( file_exists( $file ) ) {
			return $file;
		} else {
			echo $file;
		}

		// Return template
		return $template;

	}

}