<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		// test if the ID is unique
		function is_unique($new_ID, $pages){
			foreach($pages as $page){
				if ($page->ID == $new_ID){
					return false;
				}
			}
			return true;
		}

		// finds a new page unique page ID
		function get_new_page_id(){

			$min = 0;
			$max = 1000;
			$new_ID = rand($min,$max);
			$new_ID_found = false;
			$pages = get_pages();

			// repeats until its find a unique ID
			while(true){
				if(is_unique($new_ID, $pages)){
					break;
				}
				else{
					$new_ID = rand($min,$max);
				}
			}
			return $new_ID;
		}
		
		// adds a custom page
		function add_my_custom_page() {
			// Create post object
			$ID = get_new_page_id();
			$my_post = array(
			  'ID' => $ID,
			  'post_title'    => wp_strip_all_tags( 'chess' ),
			  'post_content'  => 'chess',
			  'post_status'   => 'publish',
			  'post_author'   => 1,
			  'post_type'     => 'page'
			);
		
			// Insert the post into the database
			wp_insert_post( $my_post );
		}

		add_my_custom_page();
	}

}
