<?php
function {%= prefix %}_full_address_shortcode( $atts ) {
	$street_address = get_option("street_address");
    $street_address_2 = get_option("street_address_2");
    $city = get_option("city");
    $state = get_option("state");
    $zip = get_option("zip");
    $phone = get_option("phone");
    $fax = get_option("fax");
    ?>
    <div itemscope itemtype="http://schema.org/LocalBusiness">
	  <link itemprop="url" href="<?php echo site_url();?>" />
	  <h2><span itemprop="name"><?php echo get_bloginfo('name');?></span></h2>
	  <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
	    <p><span itemprop="streetAddress"><?php echo $street_address; if($street_address_2){echo '<br />'.$street_address_2;}?></span>,<br />
	      <span itemprop="addressLocality"><?php echo $city;?></span>, <span itemprop="addressRegion"> <?php echo $state;?> </span> <span itemprop="postalCode"><?php echo $zip; ?></span> <br />
	      Phone: <span itemprop="telephone"><?php echo $phone; ?></span><?php if($fax){?> <br />
	      Fax: <span itemprop="faxNumber"><?php echo $fax;?></span><?php } ?></p>
	  </div>
	</div>
<?php
}
add_shortcode( 'full-address', '{%= prefix %}_full_address_shortcode' );

function {%= prefix %}_street_address_shortcode( $atts ) {
	$street_address = get_option("street_address");
    $street_address_2 = get_option("street_address_2");
    $city = get_option("city");
    $state = get_option("state");
    $zip = get_option("zip");
    ?>

		<?php echo $street_address; if($street_address_2){echo '<br />'.$street_address_2;}?><br />
		<?php echo $city;?>, <?php echo $state;?> <?php echo $zip; ?>

<?php
}
add_shortcode( 'full-address', '{%= prefix %}_street_address_shortcode' );

function {%= prefix %}_phone_shortcode( $atts ){
	$phone = get_option("phone");
	echo $phone;
}
add_shortcode( 'full-address', '{%= prefix %}_phone_shortcode' );
?>