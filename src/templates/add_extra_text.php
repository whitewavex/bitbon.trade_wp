<?php

add_action( 'admin_init', 'bitbon_settings_init' );

function bitbon_settings_init() {

    add_settings_section( 'bitbon_setting_section', 'Текст под слайдером',
    'bitbon_setting_section', 'general' );

    add_settings_field( 'bitbon_saved_setting_name_id', 'Введите текст для поля под слайдером',
    'bitbon_setting_name', 'general', 'bitbon_setting_section' );

    register_setting( 'general', 'bitbon_setting_values', 'bitbon_sanitize_settings' );
    
    function prowp_sanitize_settings( $input ) {
        $input['name'] = sanitize_text_field( $input['name'] );
        return $input;
    }
    
    function bitbon_setting_section() {
        echo '<p>Введите текст, который отображается в поле под слайдером</p>';
    }
    
    function bitbon_setting_name() {
        $bitbon_options = get_option( 'bitbon_setting_values' );
        echo '<textarea type="text" name="bitbon_setting_values" style="width: 70%;">' . $bitbon_options . '</textarea>';
    }

}