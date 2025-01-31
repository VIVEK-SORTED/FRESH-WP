<?php
// Hook to ACF save_post to handle the saving of ACF option fields
add_action('acf/save_post', function($post_id) {
    // Only proceed if saving from the options page
    if ($post_id === 'options') {
        error_log('Saving ACF Options page');

        // Debug the $_POST data to see if the fields are being submitted
        error_log('$_POST data: ' . print_r($_POST, true));

        // Check if field values are saved correctly
        $primary_color = get_field('primary_color', 'option');
        error_log('Saved Primary Color: ' . print_r($primary_color, true));

        $secondary_color = get_field('secondary_color', 'option');
        error_log('Saved Secondary Color: ' . print_r($secondary_color, true));

        $tertiary_color = get_field('tertiary_color', 'option');
        error_log('Saved Tertiary Color: ' . print_r($tertiary_color, true));

        $quadrant_color = get_field('quadrant_color', 'option');
        error_log('Saved Quadrant Color: ' . print_r($quadrant_color, true));

        $additional_colors = get_field('additional_colors', 'option');
        error_log('Saved Additional Colors: ' . print_r($additional_colors, true));
    }
});

// Fetching ACF options values for color settings
add_action('acf/init', function() {
    $primary_color = get_field('primary_color', 'option') ?: '#00CDE6'; // Default value if not set
    $secondary_color = get_field('secondary_color', 'option') ?: '#142837'; // Default value if not set
    $tertiary_color = get_field('tertiary_color', 'option') ?: '#FF4B5A'; // Default value if not set
    $quadrant_color = get_field('quadrant_color', 'option') ?: '#8C1EE6'; // Default value if not set

    // Repeater field (additional_colors) is an array of color values (hex strings)
    $additional_colors = get_field('additional_colors', 'option');
    if (!$additional_colors) {
        $additional_colors = []; // Fallback empty array if no data exists
    }

    // Log the fetched values to the error log for debugging
    error_log('Primary Color (Fetched): ' . $primary_color);
    error_log('Secondary Color (Fetched): ' . $secondary_color);
    error_log('Tertiary Color (Fetched): ' . $tertiary_color);
    error_log('Quadrant Color (Fetched): ' . $quadrant_color);
    error_log('Additional Colors (Fetched): ' . print_r($additional_colors, true));

    // Store the colors in a JavaScript-friendly format
    ?>
    <script>
        // Wait for the ACF JS to be loaded and initialized
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof acf !== 'undefined') {
                // Function to fetch and log the color values
                function logColorValues() {
                    // JavaScript variables holding the ACF color values (Hex Strings)
                    const primaryColor = "<?php echo esc_js($primary_color); ?>";
                    const secondaryColor = "<?php echo esc_js($secondary_color); ?>";
                    const tertiaryColor = "<?php echo esc_js($tertiary_color); ?>";
                    const quadrantColor = "<?php echo esc_js($quadrant_color); ?>";
                    const additionalColors = <?php echo json_encode($additional_colors); ?>; // For repeater field, it's an array of Hex Strings

                    // Log the color values to the console
                    console.log("Primary Color: ", primaryColor);
                    console.log("Secondary Color: ", secondaryColor);
                    console.log("Tertiary Color: ", tertiaryColor);
                    console.log("Quadrant Color: ", quadrantColor);
                    console.log("Additional Colors: ", additionalColors);
                }

                // Log the color values when the page loads
                logColorValues();

                // Listen for the ACF save_post event to log the updated values
                acf.addAction('save_post', function(response) {
                    if (response.post_id === 'options') {
                        console.log('ACF Options saved. Fetching updated values...');
                        logColorValues();
                    }
                });
            } else {
                console.log('ACF JS not loaded.');
            }
        });
    </script>
    <?php
});
?>