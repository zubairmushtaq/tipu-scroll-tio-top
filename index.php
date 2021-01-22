<?php
/*  
Plugin Name: Tipu Scroll To Top
Plugin URI: http://www.phpclicks.com/WordPress/plugins/tipu-scroll-to-top
Description: This Plugin adds a scroll to top button in your site
Version: 5.0
License: GPL
Author: Zubair Mushtaq
Author URI: http://www.phpclicks.com/
Text Domain: tipu-scroll-to-top
Domain Path: /languages/
  
  
    Copyright 2016  Zubair Mushtaq  (email : zubairmushtaq@hotmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

	// Adding WordPress plugin meta links
	add_filter( 'plugin_row_meta', 'ts_plugin_meta_links', 10, 2 );
	function ts_plugin_meta_links( $links, $file ) {
		$plugin = plugin_basename(__FILE__);
		// create link
		if ( $file == $plugin ) {
			return array_merge(
				$links,
				array( '<a target="_blank" href="https://www.phpclicks.com/wordpress-scroll-to-top-plugin/">Read More</a>' )
			);
		}
		return $links;
	}

class Tipu_Scroll_To_Top {
    /**
     * Construct the plugin object
     */
    public function __construct() {
		
        // Initialize Settings
        require_once( dirname(__FILE__) . '/settings-class.php' );
        $Tipu_Scroll_To_Top_Settings = new Tipu_Scroll_To_Top_Setting();
		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'plugin_settings_link' ) );
		add_action( 'plugins_loaded', array( &$this, 'load_tipu_translation_files' ) );

    } // END public function __construct
    
	public function load_tipu_translation_files() {
	  load_plugin_textdomain( 'tipu-scroll-to-top', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
	
	/**
    * Add settings link on plugin page
    */
    function plugin_settings_link($links) {
	$url = get_admin_url() . 'options-general.php?page=tipu_scroll_to_top';
	$settings_link = '<a href="'.$url.'">' . __( 'Settings', 'tipu-scroll-to-top' ) . '</a>';
	array_unshift( $links, $settings_link );
	return $links;
	}
	 
    /**
     * Activate the plugin
     */
    public static function activate_me( $networkwide ) {
        // Do nothing    
    } // END public static function activate_me

    /**
     * Deactivate the plugin
     */        
    public static function deactivate_me() {
        // Do nothing
    } // END public static function deactivate_me
} // END class Tipu_Scroll_To_Top

// Installation and uninstallation hooks
register_activation_hook( __FILE__, array( 'Tipu_Scroll_To_Top', 'activate_me' ) );
register_deactivation_hook( __FILE__, array( 'Tipu_Scroll_To_Top', 'deactivate_me' ) );

// instantiate the plugin class
$Tipu_Scroll_To_Top_plugin = new Tipu_Scroll_To_Top();
