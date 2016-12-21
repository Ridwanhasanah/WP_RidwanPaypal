<?php
/*Ini akan tampil di PostContent*/
function rh_paypal() { 
	ob_start(); ?>

	<form name="input" method="post" action="#">
		<br>
		Nama Item <input type="Text" name="nm_item"  id="nm_item" value="<?php the_title(); ?>">
		<br>
		Harga Rp  <input type="number" name="harga"  id="harga" value="<?= $harga=$_POST['harga']; ?>">
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
			<input type="hidden" name="business" value="sun.rieagain@gmail.com">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="item_name" value="<?= $item; ?>">
			<input type="hidden" name="amount" value="<?= $harga; ?>">
			<input src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" name="Submit" type="image" value="pruchase" alt="Purchase" />
		</form>

		<?php
	} elseif (isset($_POST['nm_item']) && $_POST['harga'] == '') {
		echo 'Silahkan isi semua field';
	}

	return ob_get_clean();

}

add_shortcode('paypal', 'rh_paypal');