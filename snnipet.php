///funcion para mostrar un dropdown de idiomas con WPML shortcode [custom_wpml_language_dropdown]

function custom_wpml_language_dropdown() {
    ob_start();
    ?>
    <div class="custom-language-dropdown">
        <select onchange="if (this.value) window.location.href=this.value">
            <?php
            $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
            foreach ($languages as $code => $language) {
                $selected = ($code == ICL_LANGUAGE_CODE) ? 'selected="selected"' : '';
                echo '<option value="' . $language['url'] . '" ' . $selected . '>' . $language['native_name'] . '</option>';
            }
            ?>
        </select>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_wpml_language_dropdown', 'custom_wpml_language_dropdown');
