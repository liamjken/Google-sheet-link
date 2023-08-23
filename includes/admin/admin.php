<?php 

add_action('admin_menu', 'av_plugin_create_menu');

  
function av_plugin_create_menu() {

  //create new top-level menu
  add_menu_page(
    'GSL Plugin Settings',       // Page Title
    'Sheet Setting',            // Menu Title
    'administrator',            // Capability required to access
    __FILE__,                   // Menu Slug
    'gsl_plugin_settings_page',  // Function to render the page content
    'dashicons-media-spreadsheet'           // Custom icon class from style.css
);


  //call register settings function
  add_action( 'admin_init', 'register_gsl_plugin_settings' );
}

function register_gsl_plugin_settings() {
  //register our settings
  register_setting( 'gsl-plugin-settings-group', 'sheet_id' );
  register_setting( 'gsl-plugin-settings-group', 'api_key' );
  register_setting( 'gsl-plugin-settings-group', 'range' );
}


//content within the av Settings tab
function gsl_plugin_settings_page() {

  ob_start();
  ?> 

<div class="wrap">
<h1>Google Sheet List Settings</h1>

<form method="post" action="options.php">
  <?php settings_fields( 'gsl-plugin-settings-group' ); ?>
  <?php do_settings_sections( 'gsl-plugin-settings-group' ); ?>
  <table class="form-table">
      <tr valign="top">
      <th scope="row">Sheet Id</th>
      <td><input type="text" name="sheet_id" value="<?php echo esc_attr( get_option('sheet_id') ); ?>" /></td>
      </tr>
      <tr valign="top">
      <th scope="row">API Key</th>
      <td><input type="text" name="api_key" value="<?php echo esc_attr( get_option('api_key') ); ?>" /></td>
      </tr>
      <tr valign="top">
      <th scope="row">Range</th>
      <td><input type="text" name="range" value="<?php echo esc_attr( get_option('range') ); ?>" /></td>
      </tr>
  </table>
  
  <?php submit_button(); ?>

</form>
</div>
 <?php
  echo ob_get_clean();
}
