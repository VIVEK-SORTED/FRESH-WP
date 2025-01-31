<?php
// Retrieve font settings from ACF fields
$font_id = get_field('font_id', 'option');
$primary_font = get_field('primary_font', 'option');
$secondary_font = get_field('secondary_font', 'option');
$tertiary_font = get_field('tertiary_font', 'option');
$quadrant_font = get_field('quadrant_font', 'option');

// Prepare font-face rules
$font_css = "";
$font_variants = [
    'primary_font' => $primary_font,
    'secondary_font' => $secondary_font,
    'tertiary_font' => $tertiary_font,
    'quadrant_font' => $quadrant_font,
];

foreach ($font_variants as $key => $font) {
    if ($font && isset($font['url'])) {
        $font_url = esc_url($font['url']);
        $font_name = ucfirst(str_replace('_', ' ', $key));
        
        // Extract file extension
        $ext = pathinfo($font_url, PATHINFO_EXTENSION);
        
        if (in_array($ext, ['ttf', 'woff2'])) {
            $format = $ext === 'ttf' ? 'truetype' : 'woff2';
            $font_css .= "@font-face {\n";
            $font_css .= "    font-family: '{$font_name}';\n";
            $font_css .= "    src: url('{$font_url}') format('{$format}');\n";
            $font_css .= "    font-weight: normal;\n";
            $font_css .= "    font-style: normal;\n";
            $font_css .= "}\n\n";
        }
    }
}

// Save styles to theme's CSS file
$css_file = get_template_directory() . '/style.css';
if (!empty($font_css)) {
    file_put_contents($css_file, "\n/* Dynamic Fonts */\n" . $font_css, FILE_APPEND);
}
