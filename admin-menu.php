<?php

function create_paypalku_options_page() {
   add_options_page('PaypalKu', 'PaypalKu', 'administrator', __FILE__, 'options_page_fn');
}

add_action('admin_menu', 'create_paypalku_options_page');


function register_and_build_fields() {
   register_setting('plugin_options', 'plugin_options');

   add_settings_section('main_section', 'Main Settings', 'section_cb', __FILE__);

   add_settings_field('email_paypalku', 'Email Paypal ', 'email_paypalku_setting', __FILE__, 'main_section');
   add_settings_field('harga_dollar', 'Dollar', 'harga_dollar_setting', __FILE__, 'main_section');
   add_settings_field('currency_code', 'Currency', 'currency_code_setting', __FILE__, 'main_section');
}

add_action('admin_init', 'register_and_build_fields');
/*admin_init di gunakan untuk mengakses admin area 
register_and_build_fields adalah isi dari fungsi akses*/


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
   echo "<input type='text' name='plugin_options[email_paypalku]' value='{$options['email_paypalku']}'/>
   contoh test.@gmail.com ";
}
//Harga Dollar
function harga_dollar_setting(){
   $options = get_option('plugin_options');
   echo "<input type='number' name='plugin_options[harga_dollar]' value='{$options['harga_dollar']}' />
   contoh : 13333 jangan menggunakan tanda koma ( , )";

}
//Currency
function currency_code_setting(){
   $options = get_option('plugin_options');

   ?>
   <select name='plugin_options[currency_code]'>
      <option value='1' <?php selected( $options['currency_code'], 1 ); ?>>USD</option>
      <option value='2' <?php selected( $options['currency_code'], 2 ); ?>>EUR</option>
   </select>

<?php
   /*echo "<input type='text' maxlength='3' name='plugin_options[currency_code]' value='{$options['currency_code']}' />
   contoh : USD, EUR dll.";*/
}


/*function validate_setting($plugin_options) {
   $keys = array_keys($_FILES);
   $i = 0;

   return $plugin_options;
}*/

function section_cb() {}

// Add stylesheet
add_action('admin_head', 'admin_register_head');

function admin_register_head() {
   $url = get_bloginfo('template_directory') . '/functions/options_page.css';
   echo "<link rel='stylesheet' href='$url' />\n";
}


