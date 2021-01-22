<div class="wrap">
      <h2><?php echo esc_html(__( 'Tipu Scroll To Top', 'tipu-scroll-to-top' )); ?></h2>
<div id="poststuff" class="metabox-holder has-right-sidebar">
    <div class="inner-sidebar">
        <div id="side-sortables" class="meta-box-sortables ui-sortable">
            <!-- BOXES -->
            <div class="postbox">
				<h3 class="stt-title">How to use?</h3>
				<div class="inside">
				<p>Customize "Scroll to Top" button by using the options.  </p>
				</div>
			</div>

        </div>
    </div>

    <div id="post-body">
        <div id="post-body-content">
            <div id="titlediv"></div>
            <div id="postdivrich" class="postarea"></div>
            <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                <!-- BOXES -->
                <div class="postbox">
					<h3 class="stt-title"><?php echo esc_html( __('Button Appearance', 'tipu-scroll-to-top')); ?></h3>				
					<div class="inside">

<form method="post" action="options.php">
  <?php settings_fields( 'Tipu_Scroll_To_Top_Setting-group' );
  
		// get all options
		$hover_text  		= get_option( 'hover_text', 'Go to Top' );
		$button_width  		= get_option( 'button_width', '38' );
		$button_height 		= get_option( 'button_height', '38' );

		$bg_color 			= get_option( 'bg_color', '#81d742' );
		$bg_color_hover 	= get_option( 'bg_color_hover', '#eeee22' );

		$border_radius 		= get_option( 'border_radius', '4' );
		$icon_image 		= get_option( 'icon_image', 'fa-caret-square-o-up' );
		
		
		$icon_color 		= get_option( 'icon_color', '#ffffff' );
		$icon_hover_color 	= get_option( 'icon_hover_color', '#cc6428' );	
		
		$button_alignment 	= get_option( 'button_alignment', 'right' );			
													

?>
  <table class="form-table tz-form-table">
    <tr>
      <th><?php echo esc_html( __('Button Alignment', 'tipu-scroll-to-top')); ?></th>
      <td><label>
        <input type="radio" name="button_alignment" value="left" <?php checked('left', $button_alignment); ?> />
        Left</label>
        <label>
        <input type="radio" name="button_alignment" value="right" <?php checked('right', $button_alignment); ?> />
        Right</label>
      </td>
    </tr>
    <tr>
      <th><label><?php echo esc_html( __('Mouse Hover Text', 'tipu-scroll-to-top')); ?> </label></th>
      <td><input type="text" name="hover_text" value="<?php echo esc_html( __($hover_text, 'tipu-scroll-to-top')); ?>
	  " size="10"/></td>
    </tr>
    <tr>
      <th><label><?php echo esc_html( __('Width', 'tipu-scroll-to-top')); ?> </label></th>
      <td><input type="text" name="button_width" value="<?php echo $button_width; ?>" size="2"/>
        px</td>
    </tr>
    <tr>
      <th><?php echo esc_html( __('Height', 'tipu-scroll-to-top')); ?></th>
      <td><input type="text" name="button_height" value="<?php echo $button_height; ?>" size="2"/>
        px</td>
    </tr>
    <tr>
      <th><?php echo esc_html( __('Background Color', 'tipu-scroll-to-top')); ?></th>
      <td><input type="text" name="bg_color" value="<?php echo $bg_color; ?>" class="wp-color-field"/></td>
    </tr>
    <tr>
      <th><?php echo esc_html( __('Background Hover Color', 'tipu-scroll-to-top')); ?> </th>
      <td><input type="text" name="bg_color_hover" value="<?php echo $bg_color_hover; ?>" class="wp-color-field"/></td>
    </tr>
    <tr>
      <th><?php echo esc_html( __('Border Radius', 'tipu-scroll-to-top')); ?></th>
      <td><input type="text" name="border_radius" value="<?php echo $border_radius; ?>"  size="2" />
        px</td>
    </tr>
    <tr>
      <th><?php echo esc_html( __('Choose Button', 'tipu-scroll-to-top')); ?></th>

      <td><input type="radio" name="icon_image" value="fa-angle-up" <?php checked('fa-angle-up', $icon_image); ?> />
        <i class="fa fa-angle-up fa-lg"></i>
        <input type="radio" name="icon_image" value="fa-long-arrow-up" <?php checked('fa-long-arrow-up', $icon_image); ?> />
        <i class="fa fa-level-up fa-lg"></i>
        <input type="radio" name="icon_image" value="fa-long-level-up" <?php checked('fa-long-level-up', $icon_image); ?> />
        <i class="fa fa-long-arrow-up fa-lg"></i>
        <input type="radio" name="icon_image" value="fa-angle-double-up " <?php checked('fa-angle-double-up ', $icon_image); ?> />
        <i class="fa fa-angle-double-up fa-lg"></i>
        <input type="radio" name="icon_image" value="fa-arrow-up" <?php checked('fa-arrow-up', $icon_image); ?> />
        <i class="fa fa-arrow-up fa-lg"></i>
        <input type="radio" name="icon_image" value="fa-arrow-circle-o-up" <?php checked('fa-arrow-circle-o-up', $icon_image); ?> />
        <i class="fa fa-arrow-circle-o-up fa-lg"></i>
        <input type="radio" name="icon_image" value="fa-arrow-circle-up" <?php checked('fa-arrow-circle-up', $icon_image); ?> />
        <i class="fa fa-arrow-circle-up fa-lg"></i>
        <input type="radio" name="icon_image" value="fa-caret-square-o-up" <?php checked('fa-caret-square-o-up', $icon_image); ?> />
        <i class="fa fa-caret-square-o-up fa-lg"></i>
        <input type="radio" name="icon_image" value="fa-chevron-up" <?php checked('fa-chevron-up', $icon_image); ?> />
        <i class="fa fa-chevron-up fa-lg"></i>
        <input type="radio" name="icon_image" value="fa-chevron-circle-up" <?php checked('fa-chevron-circle-up', $icon_image); ?> />
        <i class="fa fa-chevron-circle-up fa-lg"></i>
        <input type="radio" name="icon_image" value="fa-hand-o-up" <?php checked('fa-hand-o-up', $icon_image); ?> />
        <i class="fa fa-hand-o-up fa-lg"></i></td>
    </tr>
    <tr>
      <th><?php echo esc_html( __('Button Color', 'tipu-scroll-to-top')); ?> </th>
      <td><input type="text" name="icon_color" value="<?php echo $icon_color; ?>" class="wp-color-field"/></td>
    </tr>
    <tr>
      <th><?php echo esc_html( __('Button Hover Color', 'tipu-scroll-to-top')); ?></th>
      <td><input type="text" name="icon_hover_color" value="<?php echo $icon_hover_color; ?>" class="wp-color-field"/></td>
    </tr>
    <tr>
	   <td>&nbsp;</td>
      <td><input type="submit" class="button-primary" value="<?php echo esc_html(__( 'Save settings', 'tipu-scroll-to-top')); ?>" /></td>
    </tr>
  </table>
</form>

					</div>
				</div>
            </div>
 
        </div>
    </div>
    <br class="clear">
</div>

</div>
