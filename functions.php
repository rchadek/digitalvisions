<?php
/**
 * Functions for the Powder theme for WordPress.
 *
 * @package	Powder
 * @author	Brian Gardner
 * @license	GNU General Public License v3
 * @link	https://briangardner.com/powder/
 */

if ( ! function_exists( 'powder_setup' ) ) {

	/**
	 * Initialize theme defaults and add support for WordPress features.
	 */
	function powder_setup() {

		// Enqueue editor stylesheet.
		add_editor_style( get_template_directory_uri() . '/style.css' );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

	}
}
add_action( 'after_setup_theme', 'powder_setup' );

/**
 * Enqueue theme stylesheet and script.
 */
function powder_enqueue_stylesheet_script() {

	// Enqueue theme stylesheet.
	wp_enqueue_style( 'powder', get_template_directory_uri() . '/style.css', array(), wp_get_theme( 'powder' )->get( 'Version' ) );

}
add_action( 'wp_enqueue_scripts', 'powder_enqueue_stylesheet_script' );

/**
 * Register block styles.
 */
function powder_register_block_styles() {

	$block_styles = array(
		'core/list' => array(
			'no-style' => __( 'No Style', 'powder' ),
		),
		'core/social-links' => array(
			'outline' => __( 'Outline', 'powder' ),
		),
	);

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style(
				$block,
				array(
					'name'  => $style_name,
					'label' => $style_label,
				)
			);
		}
	}

}
add_action( 'init', 'powder_register_block_styles' );

/**
 * Register pattern category.
 */
function powder_register_pattern_category( $slug, $label, $description ) {
	register_block_pattern_category(
		'powder-' . $slug,
		array(
			'label'       => __( $label, 'powder' ),
			'description' => __( $description, 'powder' ),
		)
	);
}

/**
 * Register pattern categories.
 */
function powder_register_pattern_categories() {
	$categories = array(
		'about'          => array( __( 'About', 'powder' ), __( 'A collection of about patterns for Powder.', 'powder' ) ),
		'call-to-action' => array( __( 'Call to Action', 'powder' ), __( 'A collection of call to action patterns for Powder.', 'powder' ) ),
		'content'        => array( __( 'Content', 'powder' ), __( 'A collection of content patterns for Powder.', 'powder' ) ),
		'faq'            => array( __( 'FAQs', 'powder' ), __( 'A collection of FAQ patterns for Powder.', 'powder' ) ),
		'featured'       => array( __( 'Featured', 'powder' ), __( 'A collection of featured patterns for Powder.', 'powder' ) ),
		'footer'         => array( __( 'Footers', 'powder' ), __( 'A collection of footer patterns for Powder.', 'powder' ) ),
		'gallery'        => array( __( 'Gallery', 'powder' ), __( 'A collection of gallery patterns for Powder.', 'powder' ) ),
		'header'         => array( __( 'Headers', 'powder' ), __( 'A collection of header patterns for Powder.', 'powder' ) ),
		'hero'           => array( __( 'Hero', 'powder' ), __( 'A collection of hero patterns for Powder.', 'powder' ) ),
		'posts'          => array( __( 'Posts', 'powder' ), __( 'A collection of posts patterns for Powder.', 'powder' ) ),
		'pricing'        => array( __( 'Pricing', 'powder' ), __( 'A collection of pricing patterns for Powder.', 'powder' ) ),
		'team'           => array( __( 'Team', 'powder' ), __( 'A collection of team patterns for Powder.', 'powder' ) ),
		'testimonials'   => array( __( 'Testimonials', 'powder' ), __( 'A collection of testimonials patterns for Powder.', 'powder' ) ),
	);

	foreach ( $categories as $slug => $details ) {
		powder_register_pattern_category( $slug, $details[0], $details[1] );
	}
}
add_action( 'init', 'powder_register_pattern_categories' );

/**
 * Check for theme updates.
 */
function powder_theme_updates( $transient ) {
    $update_url = 'https://briangardner.com/powder-updates.json';

    $response = wp_remote_get( $update_url );
    if ( is_wp_error( $response ) ) {
        return $transient;
    }

    $data = json_decode( wp_remote_retrieve_body( $response ) );
    if ( ! $data ) {
        return $transient;
    }

    $theme = wp_get_theme( 'powder' );
    $current_version = $theme->get( 'Version' );

    if ( version_compare( $current_version, $data->version, '<' ) ) {
        $transient->response['powder'] = array(
            'theme'       => 'powder',
            'new_version' => $data->version,
            'url'         => 'https://briangardner.com/powder/changelog/',
            'package'     => $data->download_url,
        );
    }

    return $transient;
}
add_filter( 'pre_set_site_transient_update_themes', 'powder_theme_updates' );

/**
 * Enqueue WebAwesome stylesheets and script.
 */
function powder_enqueue_webawesome() {
    // Enqueue WebAwesome stylesheets
    wp_enqueue_style(
        'webawesome-default',
        'https://early.webawesome.com/webawesome@3.0.0-alpha.13/dist/styles/themes/default.css',
        array(),
        '3.0.0-alpha.13'
    );
    
    wp_enqueue_style(
        'webawesome-main',
        'https://early.webawesome.com/webawesome@3.0.0-alpha.13/dist/styles/webawesome.css',
        array(),
        '3.0.0-alpha.13'
    );
    
    // Enqueue WebAwesome script
    wp_enqueue_script(
        'webawesome-loader',
        'https://early.webawesome.com/webawesome@3.0.0-alpha.13/dist/webawesome.loader.js',
        array(),
        '3.0.0-alpha.13',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'powder_enqueue_webawesome' );

// Modify the script tag to include type="module"
function powder_add_module_type_to_webawesome( $tag, $handle, $src ) {
	if ('webawesome-loader' === $handle) {
        return '<script type="module" src="' . esc_url($src) . '" data-webawesome="https://early.webawesome.com/webawesome@3.0.0-alpha.13/dist"></script>';
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'powder_add_module_type_to_webawesome', 10, 3 );


// The proper way to enqueue GSAP script in WordPress

// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
function theme_gsap_script(){
    // The core GSAP library
    wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), false, true );
    // ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js', array('gsap-js'), false, true );
    // Your animation code file - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . 'js/app.js', array('gsap-js'), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );


function theme_enqueue_custom_gsap_script() {
    // Enqueue GSAP from CDN if not already loaded
    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js',
        array(),
        '3.12.2',
        true
    );

    // Enqueue your custom script
    wp_enqueue_script(
        'custom-gsap',
        get_template_directory_uri() . '/assets/js/custom-gsap.js',
        array('gsap'), // Load after GSAP
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_custom_gsap_script');
