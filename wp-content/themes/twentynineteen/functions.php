<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'twentynineteen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function twentynineteen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

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
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'twentynineteen' ),
				'footer' => __( 'Footer Menu', 'twentynineteen' ),
				'social' => __( 'Social Links Menu', 'twentynineteen' ),
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
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'twentynineteen' ),
					'shortName' => __( 'S', 'twentynineteen' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'twentynineteen' ),
					'shortName' => __( 'M', 'twentynineteen' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'twentynineteen' ),
					'shortName' => __( 'L', 'twentynineteen' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'twentynineteen' ),
					'shortName' => __( 'XL', 'twentynineteen' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'twentynineteen' ),
					'slug'  => 'primary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'twentynineteen' ),
					'slug'  => 'secondary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'twentynineteen' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'twentynineteen' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'twentynineteen' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'twentynineteen_setup' );
//
//function prefix_change_category_cpt_posts_per_page( $query ) {
//
//    if ( ! is_admin() && post_type_exists( 'news' ) ) {
//        $query->set( 'posts_per_page', '10' );
//    }
//
//}
//add_action( 'pre_get_posts', 'prefix_change_category_cpt_posts_per_page' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'twentynineteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function twentynineteen_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twentynineteen_content_width', 640 );
}
add_action( 'after_setup_theme', 'twentynineteen_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function twentynineteen_scripts() {

    //  Bootstrap
    wp_enqueue_style(
            'bootstrap',
            get_template_directory_uri() . '/libs/bootstrap/bootstrap.min.css');

    //  Range
    wp_enqueue_style(
        'range-css',
        get_template_directory_uri() . '/libs/ion.rangeSlider.min.css');

    wp_enqueue_style('main-style', get_stylesheet_uri() );

    //  Actual jQuery ver.
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script(
            'jquery',
            "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js",
            false,
            '3.4.0');
        wp_enqueue_script('jquery');
    }

    //  Sliders init And options
    wp_enqueue_script(
            'sliders-init',
            get_stylesheet_directory_uri() . '/js/sliders.js', array('jquery'),
            '1.0',
            true
    );

    //  Common Scripts
    wp_enqueue_script(
        'range-plugin',
        get_stylesheet_directory_uri() . '/js/ion.rangeSlider.min.js', array('jquery'),
        '1.0',
        true
    );

    //  Common Scripts
    wp_enqueue_script(
        'common-scripts',
        get_stylesheet_directory_uri() . '/js/common.js', array('jquery'),
        '1.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'twentynineteen_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentynineteen_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twentynineteen_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function twentynineteen_editor_customizer_styles() {

	wp_enqueue_style( 'twentynineteen-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'twentynineteen-editor-customizer-styles', twentynineteen_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'twentynineteen_editor_customizer_styles' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

//  Hide Admin Bar on Web-site
show_admin_bar( false );

//  Post Type
add_action('init', 'news_reg');
function news_reg() {
    //  News
    $labels = array(
        'name' => 'Новости',
        'singular_name' => 'Новость',
        'add_new' => 'Добавить новость',
        'add_new_item' => 'Добавить новую новость',
        'edit_item' => 'Редактировать новость',
        'menu_name' => 'Новости'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-rss',
        'menu_position' => 5,
//        'has_archive' => true,
//        'show_in_rest' => true,
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );
    register_post_type('news',$args);
}


add_action( 'init', 'true_register_products' );

function true_register_products() {

    //  Header Contacts
    $labels = array(
        'name' => 'Контакты',
        'singular_name' => 'Контакт', // админ панель Добавить->Функцию
        'add_new' => 'Добавить контакты',
        'add_new_item' => 'Добавить новые контактные данные', // заголовок тега <title>
        'edit_item' => 'Редактировать контакты',
        'menu_name' => 'Контакты (Header)' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true, // благодаря этому некоторые параметры можно пропустить
        'menu_icon' => 'dashicons-location',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title')
    );
    register_post_type('header-contacts',$args);

    //  Header Social
    $labels = array(
        'name' => 'Соц сети',
        'singular_name' => 'Соц сеть',
        'add_new' => 'Добавить соц сеть',
        'add_new_item' => 'Добавить новую соц сесть',
        'edit_item' => 'Редактировать соц сеть',
        'menu_name' => 'Соц сети (Header)'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-facebook-alt',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title', 'editor')
    );
    register_post_type('header-social',$args);

    //  Home Slider
    $labels = array(
        'name' => 'Слайдер (Главная)',
        'singular_name' => 'Слайдер (Главная)',
        'add_new' => 'Добавить слайд',
        'add_new_item' => 'Добавить новый слайд',
        'edit_item' => 'Редактировать слайд',
        'menu_name' => 'Слайдер (Главная)'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-image-flip-horizontal',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title', 'thumbnail')
    );
    register_post_type('home-slider',$args);

    //  Avto
    $labels = array(
        'name' => 'Автомобили',
        'singular_name' => 'Автомобиль',
        'add_new' => 'Добавить автомобиль',
        'add_new_item' => 'Добавить новый автомобиль',
        'edit_item' => 'Редактировать автомобиль',
        'menu_name' => 'Автомобили'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-image-flip-horizontal',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );
    register_post_type('avto',$args);

    //  How We Work
    $labels = array(
        'name' => 'Как мы работаем',
        'singular_name' => 'Как работаем',
        'add_new' => 'Добавить пункт',
        'add_new_item' => 'Добавить новый пункт',
        'edit_item' => 'Редактировать пункт',
        'menu_name' => 'Как мы работаем'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-businessman',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail')
    );
    register_post_type('how-we-working',$args);


    //  FAQ
    $labels = array(
        'name' => 'FAQ',
        'singular_name' => 'FAQ',
        'add_new' => 'Добавить пункт',
        'add_new_item' => 'Добавить новый пункт',
        'edit_item' => 'Редактировать пункт',
        'menu_name' => 'FAQ'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-lightbulb',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title', 'editor')
    );
    register_post_type('faq',$args);


    //  Pages title and description
    $labels = array(
        'name' => 'Инфо страниц',
        'singular_name' => 'Инфо старницы',
        'add_new' => 'Добавить инфу страницы',
        'add_new_item' => 'Добавить новую инфу страницы',
        'edit_item' => 'Редактировать инфо страницы',
        'menu_name' => 'Инфо страниц'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-format-aside',
        'menu_position' => 2,
//        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail')
    );
    register_post_type('page-info',$args);

    //  Reviews
    $labels = array(
        'name' => 'Отзывы',
        'singular_name' => 'Отзыв',
        'add_new' => 'Добавить отзыв',
        'add_new_item' => 'Добавить новуый отзыв',
        'edit_item' => 'Редактировать отзыв',
        'menu_name' => 'Отзывы'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-format-status',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail')
    );
    register_post_type('reviews',$args);

    //  Video Reviews
    $labels = array(
        'name' => 'Видео отзывы',
        'singular_name' => 'Видео отзыв',
        'add_new' => 'Добавить видео отзыв',
        'add_new_item' => 'Добавить новый видео отзыв',
        'edit_item' => 'Редактировать видео отзыв',
        'menu_name' => 'Видео отзывы'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-format-video',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title', 'editor' )
    );
    register_post_type('video-reviews',$args);

    //  Logistic Calculator Manheim
    $labels = array(
        'name' => 'Маршруты Manheim',
        'singular_name' => 'Маршрут Manheim',
        'add_new' => 'Добавить маршрут Manheim',
        'add_new_item' => 'Добавить новуый маршрут Manheim',
        'edit_item' => 'Редактировать маршрут Manheim',
        'menu_name' => 'Калькулятор Manheim'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-location-alt',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title')
    );
    register_post_type('calculator-manheim',$args);

    //  Logistic Calculator Adesa
    $labels = array(
        'name' => 'Маршруты Adesa',
        'singular_name' => 'Маршрут Adesa',
        'add_new' => 'Добавить маршрут Adesa',
        'add_new_item' => 'Добавить новуый маршрут Adesa',
        'edit_item' => 'Редактировать маршрут Adesa',
        'menu_name' => 'Калькулятор Adesa'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-location-alt',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title')
    );
    register_post_type('calculator-adesa',$args);

    //  Logistic Calculator Copart
    $labels = array(
        'name' => 'Маршруты Copart',
        'singular_name' => 'Маршрут Copart',
        'add_new' => 'Добавить маршрут Copart',
        'add_new_item' => 'Добавить новуый маршрут Copart',
        'edit_item' => 'Редактировать маршрут Copart',
        'menu_name' => 'Калькулятор Copart'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-location-alt',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title')
    );
    register_post_type('calculator-copart',$args);


    //  Logistic Calculator IAAI
    $labels = array(
        'name' => 'Маршруты IAAI',
        'singular_name' => 'Маршрут IAAI',
        'add_new' => 'Добавить маршрут IAAI',
        'add_new_item' => 'Добавить новуый маршрут IAAI',
        'edit_item' => 'Редактировать маршрут IAAI',
        'menu_name' => 'Калькулятор IAAI'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-location-alt',
        'menu_position' => 5,
//        'has_archive' => true,
        'supports' => array( 'title')
    );
    register_post_type('calculator-iaai',$args);
}

// Allow SVG
add_filter( 'upload_mimes', 'my_myme_types', 1, 1 );
function my_myme_types( $mime_types ) {
    $mime_types['svg'] = 'image/svg+xml';     // Adding .svg extension
    $mime_types['json'] = 'application/json'; // Adding .json extension

    return $mime_types;
}

function fix_svg_thumb_display() {
    echo '
    td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
      width: 100% !important; 
      height: auto !important; 
    }
  ';
}
add_action('admin_head', 'fix_svg_thumb_display');

function my_endpoint( $request_data ) {

    $car_list = json_decode('[{"brand": "Seat", "models": ["Alhambra", "Altea", "Altea XL", "Arosa", "Cordoba", "Cordoba Vario", "Exeo", "Ibiza", "Ibiza ST", "Exeo ST", "Leon", "Leon ST", "Inca", "Mii", "Toledo"]},
{"brand": "Renault", "models": ["Captur", "Clio", "Clio Grandtour", "Espace", "Express", "Fluence", "Grand Espace", "Grand Modus", "Grand Scenic", "Kadjar", "Kangoo", "Kangoo Express", "Koleos", "Laguna", "Laguna Grandtour", "Latitude", "Mascott", "Mégane", "Mégane CC", "Mégane Combi", "Mégane Grandtour", "Mégane Coupé", "Mégane Scénic", "Scénic", "Talisman", "Talisman Grandtour", "Thalia", "Twingo", "Wind", "Zoé"]},
{"brand": "Peugeot", "models": ["1007", "107", "106", "108", "2008", "205", "205 Cabrio", "206", "206 CC", "206 SW", "207", "207 CC", "207 SW", "306", "307", "307 CC", "307 SW", "308", "308 CC", "308 SW", "309", "4007", "4008", "405", "406", "407", "407 SW", "5008", "508", "508 SW", "605", "806", "607", "807", "Bipper", "RCZ"]},
{"brand": "Dacia", "models": ["Dokker", "Duster", "Lodgy", "Logan", "Logan MCV", "Logan Van", "Sandero", "Solenza"]},
{"brand": "Citroën", "models": ["Berlingo", "C-Crosser", "C-Elissée", "C-Zero", "C1", "C2", "C3", "C3 Picasso", "C4", "C4 Aircross", "C4 Cactus", "C4 Coupé", "C4 Grand Picasso", "C4 Sedan", "C5", "C5 Break", "C5 Tourer", "C6", "C8", "DS3", "DS4", "DS5", "Evasion", "Jumper", "Jumpy", "Saxo", "Nemo", "Xantia", "Xsara"]},
{"brand": "Opel", "models": ["Agila", "Ampera", "Antara", "Astra", "Astra cabrio", "Astra caravan", "Astra coupé", "Calibra", "Campo", "Cascada", "Corsa", "Frontera", "Insignia", "Insignia kombi", "Kadett", "Meriva", "Mokka", "Movano", "Omega", "Signum", "Vectra", "Vectra Caravan", "Vivaro", "Vivaro Kombi", "Zafira"]},
{"brand": "Alfa Romeo", "models": ["145", "146", "147", "155", "156", "156 Sportwagon", "159", "159 Sportwagon", "164", "166", "4C", "Brera", "GTV", "MiTo", "Crosswagon", "Spider", "GT", "Giulietta", "Giulia"]},
{"brand": "Škoda", "models": ["Favorit", "Felicia", "Citigo", "Fabia", "Fabia Combi", "Fabia Sedan", "Felicia Combi", "Octavia", "Octavia Combi", "Roomster", "Yeti", "Rapid", "Rapid Spaceback", "Superb", "Superb Combi"]},
{"brand": "Chevrolet", "models": ["Alero", "Aveo", "Camaro", "Captiva", "Corvette", "Cruze", "Cruze SW", "Epica", "Equinox", "Evanda", "HHR", "Kalos", "Lacetti", "Lacetti SW", "Lumina", "Malibu", "Matiz", "Monte Carlo", "Nubira", "Orlando", "Spark", "Suburban", "Tacuma", "Tahoe", "Trax"]},
{"brand": "Porsche", "models": ["911 Carrera", "911 Carrera Cabrio", "911 Targa", "911 Turbo", "924", "944", "997", "Boxster", "Cayenne", "Cayman", "Macan", "Panamera"]},
{"brand": "Honda", "models": ["Accord", "Accord Coupé", "Accord Tourer", "City", "Civic", "Civic Aerodeck", "Civic Coupé", "Civic Tourer", "Civic Type R", "CR-V", "CR-X", "CR-Z", "FR-V", "HR-V", "Insight", "Integra", "Jazz", "Legend", "Prelude"]},
{"brand": "Subaru", "models": ["BRZ", "Forester", "Impreza", "Impreza Wagon", "Justy", "Legacy", "Legacy Wagon", "Legacy Outback", "Levorg", "Outback", "SVX", "Tribeca", "Tribeca B9", "XV"]},
{"brand": "Mazda", "models": ["121", "2", "3", "323", "323 Combi", "323 Coupé", "323 F", "5", "6", "6 Combi", "626", "626 Combi", "B-Fighter", "B2500", "BT", "CX-3", "CX-5", "CX-7", "CX-9", "Demio", "MPV", "MX-3", "MX-5", "MX-6", "Premacy", "RX-7", "RX-8", "Xedox 6"]},
{"brand": "Mitsubishi", "models": ["3000 GT", "ASX", "Carisma", "Colt", "Colt CC", "Eclipse", "Fuso canter", "Galant", "Galant Combi", "Grandis", "L200", "L200 Pick up", "L200 Pick up Allrad", "L300", "Lancer", "Lancer Combi", "Lancer Evo", "Lancer Sportback", "Outlander", "Pajero", "Pajeto Pinin", "Pajero Pinin Wagon", "Pajero Sport", "Pajero Wagon", "Space Star"]},
{"brand": "Lexus", "models": ["CT", "GS", "GS 300", "GX", "IS", "IS 200", "IS 250 C", "IS-F", "LS", "LX", "NX", "RC F", "RX", "RX 300", "RX 400h", "RX 450h", "SC 430"]},
{"brand": "Toyota", "models": ["4-Runner", "Auris", "Avensis", "Avensis Combi", "Avensis Van Verso", "Aygo", "Camry", "Carina", "Celica", "Corolla", "Corolla Combi", "Corolla sedan", "Corolla Verso", "FJ Cruiser", "GT86", "Hiace", "Hiace Van", "Highlander", "Hilux", "Land Cruiser", "MR2", "Paseo", "Picnic", "Prius", "RAV4", "Sequoia", "Starlet", "Supra", "Tundra", "Urban Cruiser", "Verso", "Yaris", "Yaris Verso"]},
{"brand": "BMW", "models": ["i3", "i8", "M3", "M4", "M5", "M6", "Rad 1", "Rad 1 Cabrio", "Rad 1 Coupé", "Rad 2", "Rad 2 Active Tourer", "Rad 2 Coupé", "Rad 2 Gran Tourer", "Rad 3", "Rad 3 Cabrio", "Rad 3 Compact", "Rad 3 Coupé", "Rad 3 GT", "Rad 3 Touring", "Rad 4", "Rad 4 Cabrio", "Rad 4 Gran Coupé", "Rad 5", "Rad 5 GT", "Rad 5 Touring", "Rad 6", "Rad 6 Cabrio", "Rad 6 Coupé", "Rad 6 Gran Coupé", "Rad 7", "Rad 8 Coupé", "X1", "X3", "X4", "X5", "X6", "Z3", "Z3 Coupé", "Z3 Roadster", "Z4", "Z4 Roadster"]},
{"brand": "Volkswagen", "models": ["Amarok", "Beetle", "Bora", "Bora Variant", "Caddy", "Caddy Van", "Life", "California", "Caravelle", "CC", "Crafter", "Crafter Van", "Crafter Kombi", "CrossTouran", "Eos", "Fox", "Golf", "Golf Cabrio", "Golf Plus", "Golf Sportvan", "Golf Variant", "Jetta", "LT", "Lupo", "Multivan", "New Beetle", "New Beetle Cabrio", "Passat", "Passat Alltrack", "Passat CC", "Passat Variant", "Passat Variant Van", "Phaeton", "Polo", "Polo Van", "Polo Variant", "Scirocco", "Sharan", "T4", "T4 Caravelle", "T4 Multivan", "T5", "T5 Caravelle", "T5 Multivan", "T5 Transporter Shuttle", "Tiguan", "Touareg", "Touran"]},
{"brand": "Suzuki", "models": ["Alto", "Baleno", "Baleno kombi", "Grand Vitara", "Grand Vitara XL-7", "Ignis", "Jimny", "Kizashi", "Liana", "Samurai", "Splash", "Swift", "SX4", "SX4 Sedan", "Vitara", "Wagon R+"]},
{"brand": "Mercedes-Benz", "models": ["100 D", "115", "124", "126", "190", "190 D", "190 E", "200 - 300", "200 D", "200 E", "210 Van", "210 kombi", "310 Van", "310 kombi", "230 - 300 CE Coupé", "260 - 560 SE", "260 - 560 SEL", "500 - 600 SEC Coupé", "Trieda A", "A", "A L", "AMG GT", "Trieda B", "Trieda C", "C", "C Sportcoupé", "C T", "Citan", "CL", "CL", "CLA", "CLC", "CLK Cabrio", "CLK Coupé", "CLS", "Trieda E", "E", "E Cabrio", "E Coupé", "E T", "Trieda G", "G Cabrio", "GL", "GLA", "GLC", "GLE", "GLK", "Trieda M", "MB 100", "Trieda R", "Trieda S", "S", "S Coupé", "SL", "SLC", "SLK", "SLR", "Sprinter"]},
{"brand": "Saab", "models": ["9-3", "9-3 Cabriolet", "9-3 Coupé", "9-3 SportCombi", "9-5", "9-5 SportCombi", "900", "900 C", "900 C Turbo", "9000"]},
{"brand": "Audi", "models": ["100", "100 Avant", "80", "80 Avant", "80 Cabrio", "90", "A1", "A2", "A3", "A3 Cabriolet", "A3 Limuzina", "A3 Sportback", "A4", "A4 Allroad", "A4 Avant", "A4 Cabriolet", "A5", "A5 Cabriolet", "A5 Sportback", "A6", "A6 Allroad", "A6 Avant", "A7", "A8", "A8 Long", "Q3", "Q5", "Q7", "R8", "RS4 Cabriolet", "RS4/RS4 Avant", "RS5", "RS6 Avant", "RS7", "S3/S3 Sportback", "S4 Cabriolet", "S4/S4 Avant", "S5/S5 Cabriolet", "S6/RS6", "S7", "S8", "SQ5", "TT Coupé", "TT Roadster", "TTS"]},
{"brand": "Kia", "models": ["Avella", "Besta", "Carens", "Carnival", "Cee`d", "Cee`d SW", "Cerato", "K 2500", "Magentis", "Opirus", "Optima", "Picanto", "Pregio", "Pride", "Pro Cee`d", "Rio", "Rio Combi", "Rio sedan", "Sephia", "Shuma", "Sorento", "Soul", "Sportage", "Venga"]},
{"brand": "Land Rover", "models": ["109", "Defender", "Discovery", "Discovery Sport", "Freelander", "Range Rover", "Range Rover Evoque", "Range Rover Sport"]},
{"brand": "Dodge", "models": ["Avenger", "Caliber", "Challenger", "Charger", "Grand Caravan", "Journey", "Magnum", "Nitro", "RAM", "Stealth", "Viper"]},
{"brand": "Chrysler", "models": ["300 C", "300 C Touring", "300 M", "Crossfire", "Grand Voyager", "LHS", "Neon", "Pacifica", "Plymouth", "PT Cruiser", "Sebring", "Sebring Convertible", "Stratus", "Stratus Cabrio", "Town & Country", "Voyager"]},
{"brand": "Ford", "models": ["Aerostar", "B-Max", "C-Max", "Cortina", "Cougar", "Edge", "Escort", "Escort Cabrio", "Escort kombi", "Explorer", "F-150", "F-250", "Fiesta", "Focus", "Focus C-Max", "Focus CC", "Focus kombi", "Fusion", "Galaxy", "Grand C-Max", "Ka", "Kuga", "Maverick", "Mondeo", "Mondeo Combi", "Mustang", "Orion", "Puma", "Ranger", "S-Max", "Sierra", "Street Ka", "Tourneo Connect", "Tourneo Custom", "Transit", "Transit", "Transit Bus", "Transit Connect LWB", "Transit Courier", "Transit Custom", "Transit kombi", "Transit Tourneo", "Transit Valnik", "Transit Van", "Transit Van 350", "Windstar"]},
{"brand": "Hummer", "models": ["H2", "H3"]},
{"brand": "Hyundai", "models": ["Accent", "Atos", "Atos Prime", "Coupé", "Elantra", "Galloper", "Genesis", "Getz", "Grandeur", "H 350", "H1", "H1 Bus", "H1 Van", "H200", "i10", "i20", "i30", "i30 CW", "i40", "i40 CW", "ix20", "ix35", "ix55", "Lantra", "Matrix", "Santa Fe", "Sonata", "Terracan", "Trajet", "Tucson", "Veloster"]},
{"brand": "Infiniti", "models": ["EX", "FX", "G", "G Coupé", "M", "Q", "QX"]},
{"brand": "Jaguar", "models": ["Daimler", "F-Pace", "F-Type", "S-Type", "Sovereign", "X-Type", "X-type Estate", "XE", "XF", "XJ", "XJ12", "XJ6", "XJ8", "XJ8", "XJR", "XK", "XK8 Convertible", "XKR", "XKR Convertible"]},
{"brand": "Jeep", "models": ["Cherokee", "Commander", "Compass", "Grand Cherokee", "Patriot", "Renegade", "Wrangler"]},
{"brand": "Nissan", "models": ["100 NX", "200 SX", "350 Z", "350 Z Roadster", "370 Z", "Almera", "Almera Tino", "Cabstar E - T", "Cabstar TL2 Valnik", "e-NV200", "GT-R", "Insterstar", "Juke", "King Cab", "Leaf", "Maxima", "Maxima QX", "Micra", "Murano", "Navara", "Note", "NP300 Pickup", "NV200", "NV400", "Pathfinder", "Patrol", "Patrol GR", "Pickup", "Pixo", "Primastar", "Primastar Combi", "Primera", "Primera Combi", "Pulsar", "Qashqai", "Serena", "Sunny", "Terrano", "Tiida", "Trade", "Vanette Cargo", "X-Trail"]},
{"brand": "Volvo", "models": ["240", "340", "360", "460", "850", "850 kombi", "C30", "C70", "C70 Cabrio", "C70 Coupé", "S40", "S60", "S70", "S80", "S90", "V40", "V50", "V60", "V70", "V90", "XC60", "XC70", "XC90"]},
{"brand": "Daewoo", "models": ["Espero", "Kalos", "Lacetti", "Lanos", "Leganza", "Lublin", "Matiz", "Nexia", "Nubira", "Nubira kombi", "Racer", "Tacuma", "Tico"]},
{"brand": "Fiat", "models": ["1100", "126", "500", "500L", "500X", "850", "Barchetta", "Brava", "Cinquecento", "Coupé", "Croma", "Doblo", "Doblo Cargo", "Doblo Cargo Combi", "Ducato", "Ducato Van", "Ducato Kombi", "Ducato Podvozok", "Florino", "Florino Combi", "Freemont", "Grande Punto", "Idea", "Linea", "Marea", "Marea Weekend", "Multipla", "Palio Weekend", "Panda", "Panda Van", "Punto", "Punto Cabriolet", "Punto Evo", "Punto Van", "Qubo", "Scudo", "Scudo Van", "Scudo Kombi", "Sedici", "Seicento", "Stilo", "Stilo Multiwagon", "Strada", "Talento", "Tipo", "Ulysse", "Uno", "X1/9"]},
{"brand": "MINI", "models": ["Cooper", "Cooper Cabrio", "Cooper Clubman", "Cooper D", "Cooper D Clubman", "Cooper S", "Cooper S Cabrio", "Cooper S Clubman", "Countryman", "Mini One", "One D"]},
{"brand": "Rover", "models": ["200", "214", "218", "25", "400", "414", "416", "620", "75"]},
{"brand": "Smart", "models": ["Cabrio", "City-Coupé", "Compact Pulse", "Forfour", "Fortwo cabrio", "Fortwo coupé", "Roadster"]}]');

    return $car_list;

}

add_action( 'rest_api_init', function () {
    register_rest_route( 'my_endpoint/v1', '/car-models/', array(
            'methods' => 'GET',
            'callback' => 'my_endpoint',
        )
    );
});

// Get list from custom_field
function get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {

    global $wpdb;

    if( empty( $key ) )
        return;

    $r = $wpdb->get_col( $wpdb->prepare( "
        SELECT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = '%s' 
        AND p.post_status = '%s' 
        AND p.post_type = '%s'
    ", $key, $status, $type ) );

    return $r;
}

// Rest Api for Auto Catalog Page
function get_model_list() {
    $brand = $_GET['brand'];
    $brand = strtolower($brand);

    $models_list = array_unique(get_meta_values('car-' . $brand, 'avto'));
    return $models_list;
}
add_action( 'rest_api_init', function () {
    register_rest_route('get_cars', '/models/', array(
        'methods' => 'GET',
        'callback' => 'get_model_list',
    ));
});

//if( 'disable_gutenberg' ){
//    add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
//
//    // отключим подключение базовых css стилей для блоков
//    // ВАЖНО! когда выйдут виджеты на блоках или что-то еще, эту строку нужно будет комментировать
//    remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );
//
//    // Move the Privacy Policy help notice back under the title field.
//    add_action( 'admin_init', function(){
//        remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
//        add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
//    } );
//}

// AJAX Functions
function get_models(){
    $brand = $_POST['brand'];
    $brand = strtolower($brand);

    $models_list = array_unique(get_meta_values('car-' . $brand, 'avto'));
    echo json_encode($models_list);
    die();
}

// wp_ajax_ - только для зарегистрированных пользователей
add_action('wp_ajax_get-models', 'get_models'); // wp_ajax_{значение параметра action}

// wp_ajax_nopriv_ - только для незарегистрированных, т е для залогиненных он работать не будет (результатом выполнения запроса будет 0)
add_action('wp_ajax_nopriv_get-model', 'get_models'); // wp_ajax_nopriv_{значение параметра action}


// Rest Api for Auto Catalog Page
function get_cars() {
    // setup query argument
    $tab = array('ukraine', 'usa', 'georgia', 'in-road');
    $tab = $_GET['tab'] == 'all' ? $tab : $_GET['tab'];
    $posts_per_page = $_GET['posts_per_page'];
    $paged = isset($_GET['paged']) ? $_GET['paged'] : 1;
    $car_brand = isset($_GET['car_brand']) ? $_GET['car_brand'] : false;
    $car_model_field = isset($_GET['car_model_field']) ? $_GET['car_model_field'] : false;
    $car_model = isset($_GET['car_model']) ? $_GET['car_model'] : false;
    $price_from = isset($_GET['price_from']) ? $_GET['price_from'] : 10;
    $price_to = isset($_GET['price_to']) ? $_GET['price_to'] : 200000;
    $year_from = $_GET['year_from'] != 0 ? $_GET['year_from'] : 0;
    $year_to = $_GET['year_to'] != 0 ? $_GET['year_to'] : 2050;
    $engine_capacity = $_GET['engine_capacity'] != 0 ? $_GET['engine_capacity'] : false;
    $fuel_type = isset($_GET['fuel_type']) ? $_GET['fuel_type'] : false;
    $transmission_type = isset($_GET['transmission_type']) ? $_GET['transmission_type'] : false;

    $args = array(
        'post_type' => 'avto',
        'order' => 'DESC',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'	 	=> 'auto-location',
                'value'	  	=> $tab,
                'compare'   => 'IN',
            ),
            array(
                'key'	 	=> 'current-auto-price',
                'value'	  	=> $price_from,
                'type'      => 'numeric',
                'compare' => '>=',
            ),
            array(
                'key'	 	=> 'current-auto-price',
                'value'	  	=> $price_to,
                'type'      => 'numeric',
                'compare' => '<=',
            ),
            array(
                'key'	 	=> 'current-auto-year',
                'value'	  	=> $year_from,
                'type'      => 'numeric',
                'compare' => '>=',
            ),
            array(
                'key'	 	=> 'current-auto-year',
                'value'	  	=> $year_to,
                'type'      => 'numeric',
                'compare' => '<=',
            ),
        )
    );

    $car_brand_array = array(
        'key'	 	=> 'car-brand',
        'value'	  	=> $car_brand,
        'compare' => 'IN',
    );

    $car_model_array = array(
        'key'	 	=> $car_model_field,
        'value'   => $car_model,
        'compare' => 'IN',
    );

    $engine_capacity_array = array(
        'key'	 	=> 'current-auto-engine-capacity',
        'value'   => $engine_capacity,
        'type'      => 'numeric',
        'compare' => 'IN',
    );

    $fuel_type_array = array(
        'key'	 	=> 'current-auto-fuel-type',
        'value'   => $fuel_type,
        'compare' => 'IN',
    );

    $transmission_type_array = array(
        'key'	 	=> 'current-auto-transmission',
        'value'   => $transmission_type,
        'compare' => 'IN',
    );


    $car_brand ? array_push($args['meta_query'], $car_brand_array) : null;
    $car_model ? array_push($args['meta_query'], $car_model_array) : null;
    $engine_capacity > 0 ? array_push($args['meta_query'], $engine_capacity_array) : null;
    $fuel_type ? array_push($args['meta_query'], $fuel_type_array) : null;
    $transmission_type ? array_push($args['meta_query'], $transmission_type_array) : null;


    // get posts
    $posts = get_posts($args);
    // add custom field data to posts array
    foreach ($posts as $key => $post) {
        $posts[$key]->acf = get_fields($post->ID);
        $posts[$key]->link = get_permalink($post->ID);
        $posts[$key]->image = get_the_post_thumbnail_url($post->ID);
        $posts[$key]->gallery = get_post_meta($post->ID, 'avto-photos');
    }
    return $posts;
}
add_action( 'rest_api_init', function () {
    register_rest_route('get_cars', '/catalog/', array(
        'methods' => 'GET',
        'callback' => 'get_cars',
    ));
});

// Get Port From
function get_city() {
    $auction = isset($_GET['auction']) ? $_GET['auction'] : false;
    $auction = strtolower($auction);

    $post_type = 'calculator-'. $auction;
    $city_key = 'city-' . $auction;

    $city_list = array_unique(get_meta_values($city_key, $post_type));
    echo json_encode($city_list);
    die();
}
add_action( 'rest_api_init', function () {
    register_rest_route('logistic', '/city/', array(
        'methods' => 'GET',
        'callback' => 'get_city',
    ));
});


// API port from
function get_port_from() {
    $auction = $_GET['auction'];
    $auction = strtolower($auction);
    $post_type = 'calculator-' . $auction;
    $city = $_GET['city'];
    $city_key = 'city-' . $auction;
    $post_from_key = 'port-from-' . $auction;

    $args = array(
        'post_type' => $post_type,
        'order' => 'ASC',
        'orderby' => 'title',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'	 	=> $city_key,
                'value'	  	=> $city,
                'compare'   => 'IN',
            )
        )
    );


    // get posts
    $posts = get_posts($args);
    // add custom field data to posts array
    foreach ($posts as $key => $post) {
        $posts[$key]->port_from = get_fields($post->ID)[$post_from_key];
    }
    return $posts;
}
add_action( 'rest_api_init', function () {
    register_rest_route('logistic', '/port-from/', array(
        'methods' => 'GET',
        'callback' => 'get_port_from',
    ));
});

// API port to
function get_port_to() {
    $auction = $_GET['auction'];
    $auction = strtolower($auction);
    $post_type = 'calculator-' . $auction;
    $city = $_GET['city'];
    $city = str_replace(' ', '', $city);
    $port_from = $_GET['port_from'];
    $city_key = 'city-' . $auction;
    $post_from_key = 'port-from-' . $auction;
    $port_to_key = 'port-to-' . $auction;

    $args = array(
        'post_type' => $post_type,
        'order' => 'ASC',
        'orderby' => 'title',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'	 	=> $city_key,
                'value'	  	=> $city,
                'compare'   => 'IN',
            ),
            array(
                'key'	 	=> $post_from_key,
                'value'	  	=> $port_from,
                'compare'   => 'IN',
            ),
        )
    );


    // get posts
    $posts = get_posts($args);
    // add custom field data to posts array
    foreach ($posts as $key => $post) {
        $posts[$key]->port_to = get_fields($post->ID)[$port_to_key];
    }
    return $posts;
}
add_action( 'rest_api_init', function () {
    register_rest_route('logistic', '/port-to/', array(
        'methods' => 'GET',
        'callback' => 'get_port_to',
    ));
});

// API port to
function get_price() {
    $auction = $_GET['auction'];
    $auction = strtolower($auction);
    $post_type = 'calculator-' . $auction;
    $city = $_GET['city'];
    $city = str_replace(' ', '', $city);
    $port_from = $_GET['port_from'];
    $port_to = $_GET['port_to'];
    $city_key = 'city-' . $auction;
    $post_from_key = 'port-from-' . $auction;
    $port_to_key = 'port-to-' . $auction;
    $first_price_key = 'first-price-' . $auction;
    $second_price_key = 'final-price-' . $auction;

    $args = array(
        'post_type' => $post_type,
        'order' => 'ASC',
        'orderby' => 'title',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'	 	=> $city_key,
                'value'	  	=> $city,
                'compare'   => 'IN',
            ),
            array(
                'key'	 	=> $post_from_key,
                'value'	  	=> $port_from,
                'compare'   => 'IN',
            ),
            array(
                'key'	 	=> $port_to_key,
                'value'	  	=> $port_to,
                'compare'   => 'IN',
            ),
        )
    );


    // get posts
    $posts = get_posts($args);
    // add custom field data to posts array
    foreach ($posts as $key => $post) {
        $posts[$key]->first_price = get_fields($post->ID)[$first_price_key];
        $posts[$key]->second_price = get_fields($post->ID)[$second_price_key];
    }
    return $posts;
}
add_action( 'rest_api_init', function () {
    register_rest_route('logistic', '/price/', array(
        'methods' => 'GET',
        'callback' => 'get_price',
    ));
});


// Search
function my_search_form( $form ) {
    $form = '<form action="/?post_type=avto&s" class="search__form" id="header-search-form" method="get">
                        <input type="text" class="search__input" name="s" id="s" placeholder="Поиск авто..." value="">
                        <button type="submit" class="search__btn" id="search-btn">
                            <svg version="1.1" class="search__icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13 13" style="enable-background:new 0 0 13 13;" xml:space="preserve">
                                <path d="M12.8,11.2c0.1,0.1,0.2,0.3,0.2,0.4c0,0.2-0.1,0.3-0.2,0.4l-0.7,0.7C12,12.9,11.8,13,11.7,13c-0.2,0-0.3-0.1-0.4-0.2
	l-2.5-2.5C8.6,10.2,8.5,10,8.5,9.9V9.4c-1,0.8-2,1.1-3.3,1.1c-1,0-1.9-0.2-2.7-0.7C1.8,9.4,1.2,8.8,0.7,7.9C0.2,7.1,0,6.2,0,5.3
	s0.2-1.8,0.7-2.6c0.5-0.8,1.1-1.4,1.9-1.9C3.4,0.3,4.3,0,5.3,0s1.8,0.3,2.6,0.7c0.8,0.5,1.4,1.1,1.9,1.9c0.5,0.8,0.7,1.7,0.7,2.6
	c0,1.2-0.4,2.3-1.1,3.3h0.4c0.2,0,0.3,0.1,0.4,0.2L12.8,11.2z M5.3,8.5c0.6,0,1.1-0.1,1.6-0.4c0.5-0.3,0.9-0.7,1.2-1.2
	c0.3-0.5,0.4-1,0.4-1.7c0-0.6-0.2-1.1-0.4-1.6C7.8,3.1,7.4,2.8,6.9,2.5C6.4,2.2,5.9,2,5.3,2C4.7,2,4.1,2.2,3.6,2.5
	C3.1,2.8,2.7,3.1,2.5,3.7C2.2,4.2,2,4.7,2,5.3c0,0.6,0.1,1.1,0.4,1.7c0.3,0.5,0.7,0.9,1.2,1.2C4.1,8.4,4.7,8.5,5.3,8.5z"/>
                            </svg>
                        </button>
                        <input type="hidden" name="post_type[]" value="avto" />
                    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form' );