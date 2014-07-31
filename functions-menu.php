<?php

/* 
 * Site wide custom menu
 * July 2014 Arve Gulbrandsen arve@arve.no
 */


add_action('wp_update_nav_menu', 'my_get_menu_items');
function my_get_menu_items($nav_menu_selected_id) {
    set_sitewide_menu();
}


function set_sitewide_menu() {
  
  $menu = array();
  
  $sites = wp_get_sites();
  foreach ($sites as $site) {
    $cat =  get_blog_option($site['blog_id'], 'site_category');
    $site['cat'] = $cat;
    $modSites[] = $site;
  }
  
  foreach ($modSites as $site) {
    
    if ($site['cat'] == "") {
      continue;
    }
    
    if (preg_match("/master$/", $site['cat'])) {
      $blogInfo = get_blog_details( array( 'blog_id' => $site['blog_id'] ) );
      $strippedCat = str_replace(" master", "", $site['cat']);
      $menu[$strippedCat] = array("display" => "$blogInfo->blogname", 
          "url" => "$blogInfo->path", 
          "sub" => array());
      if ($sites['cat'] == $blogInfo->blogname) {
        
      }
    }
  }
  
  foreach ($modSites as $site) {
    
    if ($site['cat'] == "") {
      continue;
    }
    
    if (!preg_match("/master$/", $site['cat'])) {
      $blogInfo = get_blog_details( array( 'blog_id' => $site['blog_id'] ) );
      $strippedName = str_replace($site['cat'] . " ", "", $blogInfo->blogname);
      $subArr = array("display" => $strippedName, 
                    "url" => "$blogInfo->path");
      array_push($menu[$site['cat']]['sub'], $subArr); 
    }
  }
  
  update_site_option('sitewide_menu', serialize($menu));
  
}

function print_sitewide_menu($menu_array) {
 
  /**
   * Add custom items to array
   */
  $custom_array = array('display' => 'Utvikling', 
                        'url' => '/utvikling/',
                        'sub' => array(
                            array(
                            'display' => 'test1',
                            'url' => '/utvikling/1',
                            'sub' => array(
                                array(
                                'display' => 'test2',
                                'url' => '/utvikling/2',
                            ))
                        ))
  );
  
  array_push($menu_array, $custom_array);

//  print "<pre>";
//  var_dump($menu_array);
//  print "</pre>";
  
  print get_sitewide_menu($menu_array);
  
}

function get_sitewide_menu($menu_array, $is_sub=FALSE) {

  /*
	 * If the supplied array is part of a sub-menu, add the
	 * sub-menu class instead of the menu ID for CSS styling
	 */
	$attr = (!$is_sub) ? ' id="sif-menu"' : ' class="sif-submenu"';
	$menu = "<ul$attr>\n"; // Open the menu container
	/*
	 * Loop through the array to extract element values
	 */
	foreach($menu_array as $id => $properties) {

		/*
		 * Because each page element is another array, we
		 * need to loop again. This time, we save individual
		 * array elements as variables, using the array key
		 * as the variable name.
		 */
		foreach($properties as $key => $val) {

			/*
			 * If the array element contains another array,
			 * call the get_sitewide_menu() function recursively to
			 * build the sub-menu and store it in $sub
			 */
			if(is_array($val))
			{
        $link = "<span class='glyphicon glyphicon-chevron-left"
                . " pull-right sif-menu-link'></span>";
				$sub = get_sitewide_menu($val, TRUE);
			}

			/*
			 * Otherwise, set $sub to NULL and store the
			 * element's value in a variable
			 */
			else
			{
				$sub = NULL;
				$$key = $val;
			}
		}

		/*
		 * If no array element had the key 'url', set the
		 * $url variable equal to the containing element's ID
		 */
		if(!isset($url)) {
			$url = $id;
		}

    /**
     * Mark active element as active
     */
    if (strstr($_SERVER['REQUEST_URI'], $url)) {
      $active = " class='active'";
    }
    
		/*
		 * Use the created variables to output HTML
		 */
		$menu .= "<li><a href='$url'$active>$display</a>$link$sub</li>\n";

		/*
		 * Destroy the variables to ensure they're reset
		 * on each iteration
		 */
		unset($url, $display, $sub, $active, $link);
	}

	/*
	 * Close the menu container and return the markup for output
	 */
	return $menu . "</ul>\n";
}