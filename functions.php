<?php
/**
 * calplus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package calplus
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
function calplus_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on calplus, use a find and replace
		* to change 'calplus' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'calplus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');

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
			'menu-1' => esc_html__( 'Primary', 'calplus' ),
			'menu-2' => esc_html__(' Offcanvas', 'calplus'),
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
			'calplus_custom_background_args',
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
add_action( 'after_setup_theme', 'calplus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function calplus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'calplus_content_width', 640 );
}
add_action( 'after_setup_theme', 'calplus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function calplus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'calplus' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'calplus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'calplus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function calplus_scripts() {
	wp_enqueue_style( 'calplus-style', get_template_directory_uri(). '/assets/css/main.css', array(), _S_VERSION );

	wp_enqueue_script( 'calplus-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	/*wp_enqueue_script( 'calplus/dark-mode-switcher', get_template_directory_uri(). '/assets/js/dark-mode-switcher.js', array('jquery'), _S_VERSION );*/
	wp_enqueue_script( 'calplus/logo-carousel', get_template_directory_uri(). '/assets/js/logo-carousel.js', array('jquery'), _S_VERSION );
	wp_enqueue_script( 'calplus/products-per-page', get_template_directory_uri(). '/assets/js/products-per-page.js', array('jquery'), _S_VERSION );
	wp_enqueue_script( 'calplus/header-mobile-sub-menu', get_template_directory_uri(). '/assets/js/header-mobile-sub-menu.js', array('jquery'), _S_VERSION );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'calplus_scripts' );

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
require_once get_template_directory() . '/inc/acf.php';

 
add_shortcode ('woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
        <li><a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
	    <?php
        if ( $cart_count > 0 ) {
       ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
        </a></li>
        <?php
	        
    return ob_get_clean();
 
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php            
    }
        ?></a>
    <?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}

/* Custom Post Type Start */

function create_posttype() {
  
    register_post_type( 'messe',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Messen' ),
                'singular_name' => __( 'Messe' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'messen'),
            'show_in_rest' => true,
  
        )
    );
	register_post_type( 'seminar',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Seminare' ),
                'singular_name' => __( 'Seminar' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'seminare'),
            'show_in_rest' => true,
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

// Change the delimiter for WooCommerce breadcrumbs
function change_breadcrumb_delimiter($defaults) {
    $defaults['delimiter'] = ' > '; // Replace '>' with your desired delimiter
    return $defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'change_breadcrumb_delimiter');

// Remove WooCommerce breadcrumbs from shop header
function remove_woocommerce_breadcrumbs() {
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
}
add_action('wp', 'remove_woocommerce_breadcrumbs');

function theme_register_woocommerce_sidebar() {
    register_sidebar( array(
        'name'          => 'WooCommerce Sidebar',
        'id'            => 'woocommerce-sidebar',
        'description'   => 'Widgets in this area will be displayed in the WooCommerce sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'theme_register_woocommerce_sidebar' );

function get_product_subcategories($product_id) {
    $subcategories = array();

    $product_terms = wp_get_post_terms($product_id, 'product_cat');
    if (!empty($product_terms)) {
        foreach ($product_terms as $product_term) {
            if ($product_term->parent == 0) {
                continue;
            }
            $term_link = get_term_link($product_term, 'product_cat');
            $subcategories[] = array(
                'name' => $product_term->name,
                'url' => $term_link,
            );
        }
    }

    return $subcategories;
	
}



// Modify the number of products per page based on the query parameter
add_action('pre_get_posts', 'custom_modify_products_per_page');
function custom_modify_products_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    $products_per_page = isset($_GET['products-per-page']) ? intval($_GET['products-per-page']) : get_option('posts_per_page');
    $query->set('posts_per_page', $products_per_page);
}


add_filter( 'gettext', function( $translated_text ) {
    if ( 'This might also interest you' === $translated_text ) {
        $translated_text = 'Das könnte Sie auch interessieren';
    }
    return $translated_text;
} );


function woo_related_products_limit() {
	global $product;

	$args['posts_per_page'] = 6;
	return $args;
	}
	add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
	function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 6; // 4 related products
	$args['columns'] = 2; // arranged in 2 columns
	return $args;
	}

	class Custom_Range_Slider_Widget extends WP_Widget {
		// Constructor
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'custom_range_slider_widget',
				'description' => 'Custom Range Slider Widget for Attribute Filters',
			);
			parent::__construct( 'custom_range_slider_widget', 'Custom Range Slider Widget', $widget_ops );
		}
	
		// Widget frontend display
		public function widget( $args, $instance ) {
			$attribute = ! empty( $instance['attribute'] ) ? $instance['attribute'] : ''; // Get selected attribute from widget settings
	
			// Check if the selected attribute exists
			if ( $attribute && taxonomy_exists( 'pa_' . $attribute ) ) {
				$terms = get_terms( 'pa_' . $attribute, array( 'hide_empty' => false ) );
	
				// Get the minimum and maximum values from attribute terms
				$min_value = PHP_INT_MAX;
				$max_value = PHP_INT_MIN;
				foreach ( $terms as $term ) {
					$term_value = intval( $term->name );
					$min_value  = min( $min_value, $term_value );
					$max_value  = max( $max_value, $term_value );
				}
				echo '
					<div class="w-block-filter-wrapper">
						<h3 class="wp-block-heading text-capitalize">'. esc_html( $attribute ) .'</h3>
						<div class="wp-block-woocommerce-attribute-range-filter is-loading">
							<div class="wc-block-attribute-range-slider">
								<div class="wc-block-attribute-range-filter wc-block-components-attribute-range-slider wc-block-attribute-range-filter--has-input-fields wc-block-components-attribute-range-slider--has-input-fields wc-block-components-attribute-range-slider--is-input-inline">
									<div class="wc-block-attribute-range-filter__range-input-wrapper wc-block-components-attribute-range-slider__range-input-wrapper">
										<div aria-hidden="true">
											<div class="wc-block-attribute-range-filter__range-input-progress wc-block-components-attribute-range-slider__range-input-progress" style="--low:-0.5%; --high:100.5%;display: none;"></div>
											<input type="range" class="wc-block-attribute-range-filter__range-input wc-block-attribute-range-filter__range-input--min wc-block-components-attribute-range-slider__range-input wc-block-components-attribute-range-slider__range-input--min" aria-label="Attribut nach Mindestwert filtern" aria-valuetext="'. $min_value .'" step="1" min="'. $min_value .'" max="'. $max_value .'" tabindex="-1" value="'. $min_value .'" style="z-index: 21;display: none;">
											<input type="range" class="wc-block-attribute-range-filter__range-input wc-block-attribute-range-filter__range-input--max wc-block-components-attribute-range-slider__range-input wc-block-components-attribute-range-slider__range-input--max" aria-label="Attribut nach Höchstwert filtern" aria-valuetext="'. $max_value .'" step="1" min="'. $min_value .'" max="'. $max_value .'" tabindex="-1" value="'. $max_value .'" style="z-index: 20;display: none!important;">
										</div>
									</div>
									<div class="wc-block-attribute-range-filter__controls wc-block-components-attribute-range-slider__controls">
										<input class="wc-block-form-text-input wc-block-components-attribute-range-slider__amount wc-block-components-attribute-range-slider__amount--min" aria-label="Attribut nach Mindestwert filtern" type="text" value="'. $min_value .'" inputmode="numeric">
										<input class="wc-block-form-text-input wc-block-components-attribute-range-slider__amount wc-block-components-attribute-range-slider__amount--max" aria-label="Attribut nach Höchstwert filtern" type="text" value="'. $max_value .'" inputmode="numeric">
									</div>
									<div class="wc-block-components-attribute-range-slider__actions">
										<button class="wc-block-components-filter-reset-button">
											<span aria-hidden="true">Zurücksetzen</span>
											<span class="screen-reader-text">Preisfilter zurücksetzen</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				';
				// Output the range slider HTML and JavaScript with the attribute values
				echo '
					<div class="wc-blocks-filter-wrapper">
						<h3 class="wp-block-heading text-capitalize">'. esc_html( $attribute ) .'</h3>
						<div class="wp-block-woocommerce-price-filter is-loading">
							<div class="wc-block-price-slider">
								<div class="wc-block-price-filter wc-block-components-price-slider wc-block-price-filter--has-input-fields wc-block-components-price-slider--has-input-fields wc-block-components-price-slider--is-input-inline">
									<div class="wc-block-price-filter__range-input-wrapper wc-block-components-price-slider__range-input-wrapper">
										<div aria-hidden="true">
											<div class="wc-block-price-filter__range-input-progress wc-block-components-price-slider__range-input-progress" style="--low:-0.5%; --high:100.5%;display: none;"></div>
											<input type="range" class="wc-block-price-filter__range-input wc-block-price-filter__range-input--min wc-block-components-price-slider__range-input wc-block-components-price-slider__range-input--min" aria-label="Attribut nach Mindestwert filtern" aria-valuetext="'. $min_value .'" step="1" min="'. $min_value .'" max="'. $max_value .'" tabindex="-1" value="'. $min_value .'" style="z-index: 21;display: none;">
											<input type="range" class="wc-block-price-filter__range-input wc-block-price-filter__range-input--max wc-block-components-price-slider__range-input wc-block-components-price-slider__range-input--max" aria-label="Attribut nach Höchstwert filtern" aria-valuetext="'. $max_value .'" step="1" min="'. $min_value .'" max="'. $max_value .'" tabindex="-1" value="'. $max_value .'" style="z-index: 20;display: none!important;">
										</div>
									</div>
									<div class="wc-block-price-filter__controls wc-block-components-price-slider__controls">
										<input class="wc-block-form-text-input wc-block-components-price-slider__amount wc-block-components-price-slider__amount--min" aria-label="Attribut nach Mindestwert filtern" type="text" value="'. $min_value .'" inputmode="numeric">
										<input class="wc-block-form-text-input wc-block-components-price-slider__amount wc-block-components-price-slider__amount--max" aria-label="Attribut nach Höchstwert filtern" type="text" value="'. $max_value .'" inputmode="numeric">
									</div>
									<div class="wc-block-components-price-slider__actions">
										<button class="wc-block-components-filter-reset-button">
											<span aria-hidden="true">Zurücksetzen</span>
											<span class="screen-reader-text">Preisfilter zurücksetzen</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				';
	
				// Output the JavaScript for filtering products based on the attribute value
				echo '
					<script>
						document.addEventListener("DOMContentLoaded", function() {
							var slider = document.querySelector(".wc-block-price-filter__range-input--min");
	
							slider.addEventListener("input", function() {
								var minValue = parseInt(this.value);
								var maxValue = parseInt(document.querySelector(".wc-block-price-filter__range-input--max").value);
	
								// Code to update the products based on the selected attribute value range
								// Replace this code with your own logic to update the products
	
								console.log("Min Value: " + minValue);
								console.log("Max Value: " + maxValue);
							});
						});
					</script>
				';
			}
		}
	
		// Widget backend form
		public function form( $instance ) {
			$attribute = ! empty( $instance['attribute'] ) ? $instance['attribute'] : '';
	
			// Output the attribute selection field
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'attribute' ) ); ?>">Select Attribute:</label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'attribute' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'attribute' ) ); ?>">
					<?php
					// Get all product attributes
					$attributes = wc_get_attribute_taxonomies();
					if ( ! empty( $attributes ) ) {
						foreach ( $attributes as $attribute ) {
							echo '<option value="' . esc_attr( $attribute->attribute_name ) . '" ' . selected( $attribute->attribute_name, $instance['attribute'], false ) . '>' . esc_html( $attribute->attribute_label ) . '</option>';
						}
					}
					?>
				</select>
			</p>
			<?php
		}
	
		// Widget update
		public function update( $new_instance, $old_instance ) {
			$instance              = array();
			$instance['attribute'] = sanitize_text_field( $new_instance['attribute'] );
	
			return $instance;
		}
	}
	
	// Register the custom widget
	function register_custom_range_slider_widget() {
		register_widget( 'Custom_Range_Slider_Widget' );
	}
	add_action( 'widgets_init', 'register_custom_range_slider_widget' );
	
