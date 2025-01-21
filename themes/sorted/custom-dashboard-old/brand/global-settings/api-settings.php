<h1>API Settings</h1>
<p>Configure API keys and endpoints for your brand here.</p>
<form method="post" action="options.php">
    <?php
    settings_fields('api_settings_group');
    do_settings_sections('api_settings_group');
    ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">API Key</th>
            <td><input type="text" name="api_key" value="<?php echo esc_attr(get_option('api_key')); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row">API Endpoint</th>
            <td><input type="url" name="api_endpoint" value="<?php echo esc_attr(get_option('api_endpoint')); ?>" /></td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
