//Function to show a funcion dropdown of active lenguajes whit the [custom_wpml_language_dropdown] shortcode

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


// //Function to show a HORIZONTAL CUSTOM LIST
function custom_horizontal_language_list() {
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );

    if (!empty($languages)) {
        $output = '<div class="custom-horizontal-language-list">';
        
      
        $total_languages = count($languages);
        $current = 1;
        
        foreach ($languages as $code => $language) {
            // bold selected lenguage
            if ($language['active']) {
                $output .= '<strong>' . strtoupper($language['language_code']) . '</strong>';
            } else {
                $output .= '<a href="' . $language['url'] . '">' . strtoupper($language['language_code']) . '</a>';
            }
            
            // Add separator "|" 
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
