<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       hanyseyedy.ir
 * @since      1.0.0
 *
 * @package    Offer_Out_Stock
 * @subpackage Offer_Out_Stock/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

<form method="post" name="cleanup_options" action="options.php">

<?php settings_fields($this->plugin_name); ?>



<?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>

</form>

</div>
