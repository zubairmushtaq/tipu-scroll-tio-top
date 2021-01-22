<?php
class Tipu_Scroll_To_Top_Setting
 {
    /**
     * Construct the plugin object
     */
    public function __construct() {
		
        // register actions
        add_action( 'admin_menu', array( &$this, 'add_in_menu' ) );
        add_action( 'admin_init', array( &$this, 'tipu_register_settings' ) );
        add_action( 'wp_head', array( &$this, 'tipu_create_button' ) );
        add_action( 'wp_enqueue_scripts', array( &$this, 'tipu_enqueue_scripts' ) );
        add_action( 'admin_enqueue_scripts', array( &$this, 'tipu_admin_enqueue_scripts' ) );
        add_action( 'wp_footer', array( &$this, 'tipu_display_scroll_button' ) );	

    } // END public function __construct
	
    /**
    * Create an options page for setting
    * 
    */
    public function add_in_menu() {
        add_options_page( 
            __( 'Scroll to Top', 'tipu-scroll-to-top' ), 
            __( 'Scroll to Top', 'tipu-scroll-to-top' ), 
            'manage_options', 
            'tipu_scroll_to_top', 
            array( &$this, 'tipu_settings_page' ) 
        );
    } // END public function add_in_menu

    /**
    * Register Settings
    */
    public function tipu_register_settings() {
         
		register_setting( 'Tipu_Scroll_To_Top_Setting-group', 'hover_text' );    
        register_setting( 'Tipu_Scroll_To_Top_Setting-group', 'button_width' );
        register_setting( 'Tipu_Scroll_To_Top_Setting-group', 'button_height' );
		
        register_setting( 'Tipu_Scroll_To_Top_Setting-group', 'bg_color' );
        register_setting( 'Tipu_Scroll_To_Top_Setting-group', 'bg_color_hover' );
			
        register_setting( 'Tipu_Scroll_To_Top_Setting-group', 'border_radius' );
        register_setting( 'Tipu_Scroll_To_Top_Setting-group', 'icon_image' );

        register_setting( 'Tipu_Scroll_To_Top_Setting-group', 'icon_color' );
        register_setting( 'Tipu_Scroll_To_Top_Setting-group', 'icon_hover_color' );
       
        register_setting( 'Tipu_Scroll_To_Top_Setting-group', 'button_alignment' );		
        
    } // END public function register_settings

  public function tipu_create_button() {
	  
			$css_content = '<style>';
			
            $css_content .= '.stt-icon {';  
            $button_height = get_option( 'button_height', '38px' );
            $css_content  .= 'height: ' . $button_height . 'px;';
			
			$button_width = get_option( 'button_width', '38px' );
            $css_content  .= 'width: ' . $button_width . 'px;';			
			$css_content  .= 'line-height: ' . $button_height . 'px;';		
			$css_content  .= 'text-align: center;';		
			$css_content  .= 'cursor: pointer;';		
	
			$bg_color = get_option( 'bg_color', '#81d742' );
            $css_content  .= 'background-color: ' . $bg_color . '!important;';
			
			
			$border_radius = get_option( 'border_radius', '5px' );
            $css_content  .= 'border-radius: ' . $border_radius . 'px;';	
						
			$icon_color = get_option( 'icon_color', '#ffffff' );
            $css_content  .= 'color: ' . $icon_color . '!important;';	
			
			$css_content .= '}';
			
			$css_content .= '.stt-icon:hover {';			
			$bg_color_hover = get_option( 'bg_color_hover', '#eeee22' );
            $css_content  .= 'background-color: ' . $bg_color_hover . '!important;';
			
			$icon_hover_color = get_option( 'icon_hover_color', '#cc6428' );
            $css_content  .= 'color: ' . $icon_hover_color . '!important;';				
            $css_content .= '}'; 

			$css_content .= '#tipu_wrapper {';	
					
			$button_alignment = get_option( 'button_alignment', 'right' );
            $css_content  	 .=  $button_alignment . ': 0%;';
					
            $css_content .= '}'; 	   

			$css_content .= '#tipu_wrapper { margin: 10px; max-width: 180px; max-height: 175px; position: fixed; bottom: 0%; z-index: 99999; display: block; } #stt_container { display: none; } #smoothup { display: none; }';

			$css_content .= '</style>';
			
		echo $css_content;
        
    } // END public function write_css


    /**
    * Display a settings page
    */
    public function tipu_settings_page() {

        // Render the tools template
        include( dirname(__FILE__) . '/settings-form.php' );
        
    } // END public function settings_page

    /**
    * Enqueue scripts. 
    */
    public function tipu_enqueue_scripts() {
		
		wp_enqueue_style( 'tz-load-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
		wp_enqueue_script( 'scroller-js', plugin_dir_url( __FILE__ ) . ('js/scroll-to-top-sripts.js'), array('jquery'),'',TRUE);
			
    } // END public function enqueue_scripts
    
    public function tipu_admin_enqueue_scripts(  ) {
        
		wp_enqueue_style( 'tz-load-font-awesome-admin', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
		wp_enqueue_style('tz-admin-options-css',plugins_url('/css/stt-admin-styles.css', __FILE__ ), array(), null, 'all' );		

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'custom-script-handle', plugins_url( '/js/color-picker-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
    
    } // END public function tipu_admin_enqueue_scripts
    
    
    public function tipu_display_scroll_button(){
  ?>

<div id="tipu_wrapper"> <span id="stt_container"><i title="<?php echo  get_option('hover_text'); ?>" class="stt-icon fa fa-2x <?php echo  get_option('icon_image'); ?> "></i></span> <!-- Wp Plugin: Tipu Scroll To Top --> </div>
<?php

    } // END public function tipu_display_scroll_button
} // END class Tipu_Scroll_To_Top_Setting
