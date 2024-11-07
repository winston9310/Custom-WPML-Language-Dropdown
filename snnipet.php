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


//HORIZONTAL CUSTOM LIST
function custom_horizontal_language_list() {
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );

    if (!empty($languages)) {
        $output = '<div class="custom-horizontal-language-list">';
        
      
        $total_languages = count($languages);
        $current = 1;
        
        foreach ($languages as $code => $language) {
            // idioma es el actual en negrita
            if ($language['active']) {
                $output .= '<strong>' . strtoupper($language['language_code']) . '</strong>';
            } else {
                $output .= '<a href="' . $language['url'] . '">' . strtoupper($language['language_code']) . '</a>';
            }
            
            // Agregar el separador "|" si no es el último idioma
            if ($current < $total_languages) {
                $output .= ' | ';
            }
            $current++;
        }
        
        $output .= '</div>';
        
        return $output;
    }
}
add_shortcode('custom_horizontal_language_list', 'custom_horizontal_language_list');
