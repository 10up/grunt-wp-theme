<?php
function {%= prefix %}_setup_theme_admin_menus() {
    add_submenu_page('themes.php', 'Theme Options', 'Theme Options', 'manage_options', 'theme-options', '{%= prefix %}_theme_options_page');
}
add_action("admin_menu", "{%= prefix %}_setup_theme_admin_menus");

$socialMedia = array('facebook_link', 'twitter_link', 'google_plus_link', 'you_tube_link', 'pinterest_link', 'yelp_link', 'linked_in_link');
$addressInfo = array("street_address", "street_address_2", "city", "state", "zip", "phone", "fax");

function {%= prefix %}_theme_options_page() {
	// Check that the user is allowed to update options
	if (!current_user_can('manage_options')) {
    	wp_die('You do not have sufficient permissions to access this page.');
	}
	global $socialMedia;
	global $addressInfo;
    $i = 0;
    foreach($socialMedia as $social) {
        $socialValue[$i] = get_option($social);
        $i++;
    }
    $i = 0;
    foreach($addressInfo as $info) {
        $addressValue[$i] = get_option($info);
        $i++;
    }
	?>
	<div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Common Elements</h2>
        <h3>Social Links</h3>
        <form method="POST" action="">
            <table class="form-table">
                <?php 
                $i=0; 
                foreach($socialValue as $value){?>
                    <tr valign="top">
                        <th scope="row">
                            <label for="<?php echo $socialMedia[$i];?>">
                                <?php echo $socialMedia[$i];?>
                            </label> 
                        </th>
                        <td>
                            <input type="text" name="<?php echo $socialMedia[$i];?>" value="<?php echo $value;?>" size="100" />
                        </td>
                    </tr>

                <?php $i++;}?>
            </table>
            <h3>Business Information</h3>
            <table class="form-table">
                <?php 
                $i=0; 
                foreach($addressValue as $value){?>
                    <tr valign="top">
                        <th scope="row">
                            <label for="<?php echo $addressInfo[$i];?>">
                                <?php echo $addressInfo[$i];?>
                            </label> 
                        </th>
                        <td>
                            <input type="text" name="<?php echo $addressInfo[$i];?>" value="<?php echo $value;?>" size="100" />
                        </td>
                    </tr>

                <?php $i++;}?>
            </table>
            <input type="hidden" name="update_settings" value="Y" />
            <p><input type="submit" value="Save settings" class="button-primary"/></p>
        </form>
    </div>
	<?php
}
if (isset($_POST["update_settings"])) {
    $i=0; 
    foreach($socialValue as $value){
        $update = esc_attr($_POST[$socialMedia[$i]]);
        update_option($socialMedia[$i], $update);
        $i++;
    }
    $i=0; 
    foreach($addressValue as $value){
        $update = esc_attr($_POST[$addressMedia[$i]]);
        update_option($addressMedia[$i], $update);
        $i++;
    }
	?>
	<div id="message" class="updated">Settings saved</div>
	<?php
}
?>