<?php

add_action('admin_menu', 'create_paypalku_options_page');
add_action('admin_init', 'register_and_build_fields');
/*admin_init di gunakan untuk mengakses admin area 
register_and_build_fields adalah isi dari fungsi akses*/

function create_paypalku_options_page() {
   add_options_page('PaypalKu', 'PaypalKu', 'administrator', __FILE__, 'options_page_fn');
}

function register_and_build_fields() {
   register_setting('plugin_options', 'plugin_options', 'validate_setting');

   add_settings_section('main_section', 'Main Settings', 'section_cb', __FILE__);

   add_settings_field('adverting_information', 'Email Paypal : ', 'email_paypalku_setting', __FILE__, 'main_section');
}

function options_page_fn() {
?>
   <div id="theme-options-wrap" class="widefat">
      <div class="icon32" id="icon-tools"></div>

      <h2>PaypalKu Options</h2>
      <p>Take control of your PayapalKu, by overriding the default settings with your own specific preferences.</p>

      <form method="post" action="options.php" enctype="multipart/form-data">
         <?php settings_fields('plugin_options'); ?>
         <?php do_settings_sections(__FILE__); ?>
         <p class="submit">
            <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
         </p>
   </form>
</div>
<?php
}

// Email Paypal
function email_paypalku_setting() {
   $options = get_option('plugin_options');
   echo "<input type='text' name='plugin_options'>{$options['email_paypalku']}</input>";
}


function validate_setting($plugin_options) {
   $keys = array_keys($_FILES);
   $i = 0;

   return $plugin_options;
}

function section_cb() {}

// Add stylesheet
add_action('admin_head', 'admin_register_head');

function admin_register_head() {
   $url = get_bloginfo('template_directory') . '/functions/options_page.css';
   echo "<link rel='stylesheet' href='$url' />\n";
}