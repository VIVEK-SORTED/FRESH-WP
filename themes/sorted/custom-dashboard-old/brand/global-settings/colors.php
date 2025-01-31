<h1>Color Settings</h1>
<p>Configure your brand's color palette here.</p>
<form method="post" action="options.php">
    <?php
    settings_fields('color_settings_group');
    do_settings_sections('color_settings_group');
    ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">Primary Color</th>
            <td><input type="text" name="primary_color" value="<?php echo esc_attr(get_option('primary_color')); ?>" class="color-picker" /></td>
        </tr>
        <tr valign="top">
            <th scope="row">Secondary Color</th>
            <td><input type="text" name="secondary_color" value="<?php echo esc_attr(get_option('secondary_color')); ?>" class="color-picker" /></td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
<script>
    jQuery(document).ready(function($) {
        $('.color-picker').wpColorPicker();
    });
</script>
