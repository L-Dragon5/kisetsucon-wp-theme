<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    global $content_width;
    if (!isset($content_width))
        $content_width = 640;
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'blankslate')
    ));
}

add_action('wp_enqueue_scripts', 'blankslate_load_scripts');
function blankslate_load_scripts()
{
    wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/style.css', false, filemtime(get_stylesheet_directory() . '/style.css') );
}

add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_filter('the_title', 'blankslate_title');
function blankslate_title($title)
{
    if ($title == '') {
        return '&rarr;';
    } else {
        return $title;
    }
}

add_filter('wp_title', 'blankslate_filter_wp_title');
function blankslate_filter_wp_title($title)
{
    return $title . esc_attr(get_bloginfo('name'));
}

add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar Widget Area', 'blankslate'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}

function blankslate_custom_pings($comment)
{
    $GLOBALS['comment'] = $comment;
    ?>

    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID();?>">
        <?php echo comment_author_link();?>
    </li>
<?php
}

add_filter('get_comments_number', 'blankslate_comments_number');
function blankslate_comments_number($count)
{
    if (!is_admin()) {
        global $id;
        $comments_by_type =& separate_comments(get_comments('status=approve&post_id=' . $id));
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}

// Add custom options to theme
require_once('inc/custom-posts.php');
require_once('inc/custom-fields.php');
require_once('inc/theme-options.php');
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

// Add custom menu
add_action('init', 'custom_theme_menu');
function custom_theme_menu() {
    register_nav_menus( array(
        'kc-header-menu' => __( 'Kisetsucon Header Menu', 'kisetsucon' ),
    ));
}

// Add Custom Navigation Walker
require_once('inc/class-wp-bootstrap-navwalker.php');
