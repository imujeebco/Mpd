<?php

include( TEMPLATEPATH.'/constants.php' );
include( TEMPLATEPATH.'/classes.php' );
include( TEMPLATEPATH.'/widgets.php' );

/**
 * Disable automatic general feed link outputting.
 */
automatic_feed_links( false );

//remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');

$before_widget = '<div class="widget %2$s">';
$after_widget = '</div>';
$before_title = '<h3>';
$after_title = '</h3>';

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Default Sidebar',
		'before_widget' => '<div class="section %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' =>'</h3></div>'
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Subscribe Sidebar',
		'before_widget' => '<div class="subscribe">',
		'after_widget' => '</div>',
		'before_title' => '<strong class="title">',
		'after_title' => '</strong>'
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Experts Sidebar',
		'before_widget' => '<div class="section">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(	 
		'name' => 'Default Right Sidebar',
		'before_widget' => '<div class="section">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
}

register_nav_menus( array('main' => 'Main Navigation') );
register_nav_menus( array('top' => 'Top Navigation') );
register_nav_menus( array('bottom' => 'Bottom Navigation') );

/***/
add_theme_support('post-thumbnails');
add_image_size('front',902,326);
add_image_size('top',902,151);
add_image_size('experts',224,148);
add_image_size('post',569,137);

/***/
function filter_template_url($text) {
return str_replace('[template-url]',get_bloginfo('template_url'), $text);
}
add_filter('the_content', 'filter_template_url');
add_filter('get_the_content', 'filter_template_url');
add_filter('widget_text', 'filter_template_url');

/***/
function get_ancestors2 ($p) {
    $parent = $p->post_parent;
  $ancestors = array ();
  if($parent==0) $ancestors[0] = $p->ID;
    while ($parent != '0') {
    if ($parent) {
      $ancestors[] = $parent;
    }
        $p = get_post ($parent);
        $parent = $p->post_parent;
    }
    return $ancestors;
}
/* Replace Standart WP Menu Classes */
function change_menu_classes($css_classes, $item) {
        $css_classes = str_replace("current-menu-item", "active", $css_classes);
        $css_classes = str_replace("current-menu-parent", "active", $css_classes);
        $css_classes = str_replace("current-menu-ancestor", "active", $css_classes);
        return $css_classes;
}
add_filter('nav_menu_css_class', 'change_menu_classes', 10, 2);

add_filter('page_css_class', 'replace_active_class');
function replace_active_class($classes){
    $key = array_search("current_page_item", $classes);
    if(!$key) $key = array_search("current_page_parent", $classes);
    if(!$key) $key = array_search("current_page_ancestor", $classes);
    if($key) $classes[$key] = "active";
    return $classes;
}
/***/
add_action('init','create_post_type');
function create_post_type() {
 register_post_type('experts',
  array(
   'labels' => array(
    'name' => _x('Experts', 'post type general name'),
    'singular_name' => _x('Experts', 'post type singular name'),
    'add_new' => _x('Add New', 'experts'),
    'add_new_item' => __('Add New Experts'),
    'edit_item' => __('Edit Experts'),
    'new_item' => __('New Experts'),
    'view_item' => __('View Experts'),
    'search_items' => __('Search Experts'),
    'not_found' =>  __('No experts found'),
    'not_found_in_trash' => __('No experts found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Experts'
   ),
   'public' => true,
   'supports' => array(
    'title','editor','custom-fields','thumbnail','excerpt','page-attributes'
   ),
	'taxonomies' => array('category', 'experts-category')
  )
 );
}

/****/

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_book_taxonomies', 0 );

//create two taxonomies, genres and writers for the post type "book"
function create_book_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Experts', 'taxonomy general name' ),
    'singular_name' => _x( 'Experts', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Experts' ),
    'all_items' => __( 'All Experts' ),
    'parent_item' => __( 'Parent Experts' ),
    'parent_item_colon' => __( 'Parent Experts:' ),
    'edit_item' => __( 'Edit Experts' ), 
    'update_item' => __( 'Update Experts' ),
    'add_new_item' => __( 'Add New Experts' ),
    'new_item_name' => __( 'New Expert Name' ),
    'menu_name' => __( 'Experts' ),
  ); 	

/*  register_taxonomy('experts-category',array('experts'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'experts-category' ),
  ));
*/

  register_taxonomy('experts-category',array('experts-category'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'experts-category'),
  ));

}
$filters = array('pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description');
foreach ( $filters as $filter ) {
    remove_filter($filter, 'wp_filter_kses');
}

/*Wordpress Login Logo*/
add_action("login_head", "my_login_head");
function my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('".get_bloginfo('template_url')."/images/wordpress-logo.png') no-repeat scroll center top transparent;
		height: 82px;
		width: 326px;
	}
	</style>
	";
}

?>