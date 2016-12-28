<?php

/*Ini akan tampil di PostContent*/
function rh_paypal() { 
  // email_paypalku_setting();
   ob_start();
   $options = get_option('plugin_options');

   
   ?>

   <form name="input" method="post" action="#">
      <br>
      Harga Rp  <input type="number" name="harga"  id="harga" value="<?= $harga = $_POST['harga']; ?>">
      <br>
      <input type="submit" name="submit_item">
   </form>
   <?php 
   
   if (isset($_POST['submit_item'] ) ) {
       $dollar = $options['harga_dollar'];
       $harga = $_POST['harga'];

       $harga2 = $harga/$dollar;
      ?>
      <form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_BLANK">
         <input type="hidden" name="cmd" value="_xclick">
         <input type="hidden" name="business" value="<?= $options['email_paypalku']; ?>">
         <input type="hidden" name="currency_code" value="<?= strtoupper($options['plugin_options[currency_code]']); ?>">
         <input type="hidden" name="item_name" value="<?php the_title(); ?>">
         <input type="hidden" name="amount" value="<?= $harga2; ?>">
         <input src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" name="Submit" type="image" value="pruchase" alt="Purchase" />
      </form>

      <?php
   } elseif (isset($_POST['nm_item']) && $_POST['harga'] == '') {
      echo 'Silahkan isi semua field';
   }

return ob_get_clean();

}

add_shortcode('paypal', 'rh_paypal');



/*Ini akan tampil di PostContent*/
/*function rh_paypal() { 
	ob_start(); ?>

	<form name="input" method="post" action="#">
		<br>
		Nama Item <input type="Text" name="nm_item"  id="nm_item" value="<?php the_title(); ?>">
		<br>
		Harga Rp  <input type="number" name="harga"  id="harga" value="<?= $options; ?>">
		<br>
		<input type="submit" name="submit_item">
	</form>
	<?php 
	if (isset($_POST['submit_item'] ) ) {
		$item = $_POST['nm_item'];
		$harga = $_POST['harga'];
		?>
		<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_BLANK">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="business" value="{$options['email_paypalku']}">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="item_name" value="<?php echo $item; ?>">
			<input type="hidden" name="amount" value="<?= $harga; ?>">
			<input src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" name="Submit" type="image" value="pruchase" alt="Purchase" />
		</form>

		<?php
		//echo $options;
	} elseif (isset($_POST['nm_item']) && $_POST['harga'] == '') {
		echo 'Silahkan isi semua field';
		echo $options;
	}

	return ob_get_clean();

}

add_filter('the_content', 'rh_paypal');*/

?>