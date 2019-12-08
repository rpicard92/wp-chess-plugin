<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		// find and remove pages
		function remove_my_custom_page() {
			$chess_ID;
			$pages = get_pages();
			foreach($pages as $page){
				$page->post_title;
				if($page->post_title == 'chess'){
					$chess_ID = $page->ID;
				}
			}
			// remove the post from the database
			wp_delete_post( $chess_ID, true );
		}
		remove_my_custom_page();
	}

}
