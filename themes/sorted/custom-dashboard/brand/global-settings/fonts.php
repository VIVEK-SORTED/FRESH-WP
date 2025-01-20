<h1>Font Settings</h1>
<p>Configure your brand's font preferences here.</p>
<form method="post" action="options.php">
    <?php
    settings_fields('font_settings_group');
    do_settings_sections('font_settings_group');
    ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">Primary Font</th>
            <td><input type="text" name="primary_font" value="<?php echo esc_attr(get_option('primary_font')); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row">Secondary Font</th>
            <td><input type="text" name="secondary_font" value="<?php echo esc_attr(get_option('secondary_font')); ?>" /></td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
