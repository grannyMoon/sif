<?php

/* 
 * Run this each time a new blog is created
 * 
 * What happens is: 
 * 
 * Set blogID to the new blog. I assume this script is going to be
 * run from another blogId most times
 * 
 * Create catId (Dokumenter), we use this to show documents in a widget
 * 
 * Update site options, set correct theme and insert catId
 * 
 * Create default pages, thats one mainpage right now
 * 
 * Create a menu, and insert the page(s) we just made
 * 
 * Activate widgets that we need
 * 
 * This can be run more than once without breaking stuff
 * 
 */


// Set theme
function SIFSetOptions($blogId, $catId) {
  global $wpdb;
  $queries = array(
      "UPDATE wp_" . $blogId . "_options SET "
      . "option_value = 'sif' WHERE option_name = 'template';", 
      "UPDATE wp_" . $blogId . "_options SET "
      . "option_value = 'sif' WHERE option_name = 'stylesheet';", 
      "UPDATE wp_" . $blogId . "_options SET "
      . "option_value = 'Sverresborg Idrettsforening' "
      . "WHERE option_name = 'current_theme';");
  if (!get_option('catId')) {
    $queries[] = "INSERT INTO wp_" . $blogId . "_options SET "
      . "option_value = '" . $catId . "', option_name = 'catId';";

  } else {
    $queries[] = "UPDATE wp_" . $blogId . "_options SET "
      . "option_value = '" . $catId . "' WHERE option_name = 'catId';";
    
  }
  foreach ($queries as $query){
    print $wpdb->query($query);
  }
}


// Set blog
$blogId = 11;

global $switched;
switch_to_blog($blogId);
echo 'You switched from blog ' . $switched . ' to ' . $blogId . "<br />\n";

var_dump(get_theme_mods());
//remove_theme_mod("nav_menu_locations");
//var_dump(get_theme_mods());


// Create cat "Dokumenter"
$term = "Dokumenter"; $taxonomy = "category";
if(!term_exists($term, $taxonomy)) {
  print "ex: 1<br />\n";
  $term = wp_insert_term($term, $taxonomy);
  $catId = $term['term_id'];
} else {
  print "ex: 2<br />\n";
  $catId = get_cat_ID($term); 
}

// Get catId
print "catId: ";
print_r($catId);
print "<br />";

if ($catId > 0) {
  SIFSetOptions($blogId, $catId);
}

// Make main page - Create post object

$blogName = get_blog_details( $blogId )->blogname;

print "blogName: ";
print_r($blogName);
print "<br />";

// Blogname can be fotball, or fotball something. If it's fotball, keep it, 
// if it's more, like fotball somthing, keep the something.
if (strstr(trim($blogName), " ")) {
  $blogName = preg_replace ('/Fotball |Allidrett |Håndball |Basketball /', 
          "", $blogName);
}

print "blogName: ";
print_r($blogName);
print "<br />";


// is it alrady there? 
$posts = get_posts( array(
    'post_type'   => 'page',
    'meta_key'    => 'startpage', 
    'meta_value'  => 'true',
    'post_status' => 'publish',
));

print "posts: ";
print_r($posts);
print "<br />";

if (count($posts) > 0) {
  
  // Startpage does exist
  $startpageId = $posts[0]->ID;
} else {
  
  // Create startpage
  $my_post = array(
    'post_title'    => wp_strip_all_tags( $blogName ),
    'post_type'     => 'page',
    'post_status'   => 'publish',
    'post_author'   => 1,
    'page_template' => 'page-main.php'
  );
  
  // Insert the post into the database
  $startpageId = wp_insert_post( $my_post, true );
  var_dump($startpageId);
  
  // Tag page as start page
  add_post_meta($startpageId, 'startpage', 'true');

}

// die();

// Use pages to create a menu
$menuName = 'Lagsidemeny';

// Register Navigation Menu
function sif_custom_navigation_menus() {

	$locations = array(
		'Lag meny' => __( $menuName ),
	);
	register_nav_menus( $locations );

}

// Hook into the 'init' action
add_action( 'init', 'sif_custom_navigation_menus' );

var_dump("Lagsidemeny: ", has_nav_menu( strtolower($menuName) ));
// Does menu exist
if (!has_nav_menu( $menuName )) {
  print "har ikke meny";
  // No, create the menu
  $hdr_menu = array(
      'menu-name'     => $menuName
      , 'description' => 'Hovedmeny for lagsidene'
  );
  
  $headerMenuId = wp_update_nav_menu_object( 0, $hdr_menu );
  
  if (!is_a($headerMenuId, "WP_Error")) {
    // Set up default menu items
    wp_update_nav_menu_item($headerMenuId, 0, array(
        'menu-item-title'     =>  __($blogName),
        'menu-item-classes'   => 'home',
  //      'menu-item-url' => home_url( '/' ), 
        'menu-item-object-id' => $startpageId,
        'menu-item-parent-id' => 0,
        'menu-item-position'  => 1,
        'menu-item-object'    => 'page',
        'menu-item-type'      => 'post_type',
        'menu-item-status'    => 'publish'));

    update_option( 'page_on_front', $startpageId );
    update_option( 'show_on_front', 'page' );
  }
  
} else {
  // ###########Remove
  print "har meny";
  return;
  // Yes, get the ID for the menu
  $term = get_term_by('name', $menuName, 'nav_menu');
  $headerMenuId = $term->term_id;
  }

// Set the menus to appear in the proper theme locations
$teamMenu = get_theme_mod('nav_menu_locations');
//var_dump("teamMenu: ", $teamMenu);
if (!$teamMenu) {
  $locations[strtolower($menuName)] = $teamMenu;
  set_theme_mod('nav_menu_locations', $locations);
}



restore_current_blog();
echo 'You switched back.';


//Activate widgets

