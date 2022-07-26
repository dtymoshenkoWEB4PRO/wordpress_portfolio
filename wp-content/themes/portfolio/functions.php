<?php
/**
 * portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package portfolio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function portfolio_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on portfolio, use a find and replace
		* to change 'portfolio' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'portfolio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'portfolio' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'portfolio_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'portfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'portfolio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'portfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'portfolio' ),
			'id'            => 'sidebar-blog',
			'description'   => esc_html__( 'Add widgets here.', 'portfolio' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar', 'portfolio' ),
			'id'            => 'sidebar-footer',
			'description'   => esc_html__( 'Add widgets here.', 'portfolio' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Social Networks Sidebar', 'portfolio' ),
			'id'            => 'social-networks',
			'description'   => esc_html__( 'Add widgets here.', 'portfolio' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}

add_action( 'widgets_init', 'portfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function portfolio_scripts() {
	wp_style_add_data( 'portfolio-style', 'rtl', 'replace' );
	wp_enqueue_style( 'portfolio-ie7', get_stylesheet_uri() );
	wp_enqueue_style( 'portfolio-reset', get_template_directory_uri().'/assets/css/reset.css', array(), _S_VERSION );
	wp_enqueue_style( 'portfolio-style', get_template_directory_uri().'/assets/css/style.css', array(), _S_VERSION );
	wp_enqueue_style( 'portfolio-light', get_template_directory_uri().'/assets/css/light.css', array(), _S_VERSION );
	wp_enqueue_style( 'portfolio-flexslider', get_template_directory_uri().'/assets/css/flexslider.css', array(), _S_VERSION );
	wp_enqueue_style( 'portfolio-prettyPhoto', get_template_directory_uri().'/assets/css/prettyPhoto.css', array(), _S_VERSION );
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
	wp_enqueue_script( 'portfolio-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'portfolio-jquery.min', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'portfolio-jquery.ui.min', get_template_directory_uri() . '/assets/js/jquery.ui.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'portfolio-jquery.flexslider.min', get_template_directory_uri() . '/assets/js/jquery.flexslider.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'portfolio-jquery.prettyphoto.min', get_template_directory_uri() . '/assets/js/jquery.prettyphoto.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'portfolio-jquery.stylesheettoggle', get_template_directory_uri() . '/assets/js/jquery.stylesheettoggle.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'portfolio-onload', get_template_directory_uri() . '/assets/js/onload.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'portfolio-html5', get_template_directory_uri() . '/assets/js/html5.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/options-panel.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Widgets settings
 */
require get_template_directory() . '/widgets/widget-about-us.php';
require get_template_directory() . '/widgets/widget-all-categories.php';
require get_template_directory() . '/widgets/widget-recent-posts.php';
require get_template_directory() . '/widgets/widget-contact-us.php';

function ajax_filter_posts_scripts() {
	// Enqueue script
	wp_register_script( 'afp_script', get_template_directory_uri() .
	                                  '/assets/js/ajax-filter-posts.js', false, null, false );
	wp_enqueue_script( 'afp_script' );

	wp_localize_script( 'afp_script', 'afp_vars', array(
			'afp_nonce'    => wp_create_nonce( 'afp_nonce' ),
			// Create nonce which we later will use to verify AJAX request
			'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);
}

add_action( 'wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100 );

function ajax_filter_get_posts( $portfolio_categories ) {

	$portfolio_categories = $_POST['portfolio_categories'];
	$args                 = array(
		'portfolio_categories' => $portfolio_categories,
		'post_type'            => 'portfolio',
		'posts_per_page'       => - 1,
	);
	if ( ! $portfolio_categories ) {
		unset( $args['portfolio_categories'] );
	}
	$query = new WP_Query( $args );
	?>
    <div class="portfolio_items_container">
        <ul class="portfolio_items columns">
			<?php
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					$image       = get_field( 'pretty_photo', get_the_ID() );
					$small_image = get_field( 'small_image', get_the_ID() );
					if ( $image && $small_image ):
						$result .= '<li data-type="branding" data-id="id-6" class="column column33">
                                    <a href="' . ( $image['url'] ) . '" data-rel="prettyPhoto[gallery]"
                               class="portfolio_image lightbox">
                                <div class="inside">
                                    <img alt="" src="' . $small_image['url'] . '">
                                    <div class="mask"></div>
                                </div>
                            </a>
                            <h1>' . the_title() . '</h1>
                            <p>' . the_content() . '</p>
                            <a class="button button_small button_orange" href="' . get_permalink() . '"><span
                                    class="inside">' . _e( 'read more' ) . '</span></a>';
					endif;
				endwhile;
			else:
				$result['response'] = '<h2>No posts found</h2>';
			endif;
			wp_reset_postdata();
			echo $result; ?>
        </ul>
    </div>
	<?php
}

add_action( 'wp_ajax_filter_posts', 'ajax_filter_get_posts' );
add_action( 'wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts' );

function get_work_filters() {
	$portfolio_categories = get_terms( 'portfolio_categories' );
	$count                = count( $portfolio_categories );
	if ( $count > 0 ):
		?>
        <ul id="portfolio_categories" class="portfolio_categories">
			<?php
			foreach ( $portfolio_categories as $category ) {
				$filters_html .= '<li class="segment-1"><a href="' .
				                 get_term_link( $category ) .
				                 '" class="btn portfolio-filter" title="' .
				                 $category->slug . '">' . $category->name . '</a></li>';
			}
			echo $filters_html;
			?>
        </ul>
	<?php
	endif;
}