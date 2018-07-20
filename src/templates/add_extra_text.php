<?php

add_action( 'admin_init', 'bitbon_settings_init' );

function bitbon_settings_init() {

    add_settings_section( 'bitbon_setting_section', 'Область под слайдером',
    'bitbon_setting_section', 'general' );

    add_settings_field( 'bitbon_saved_setting_name_id', 'Введите текст для поля под слайдером',
    'bitbon_setting_name', 'general', 'bitbon_setting_section' );
    add_settings_field( 'bitbon_saved_setting_video_id', 'Вставьте код видео',
    'bitbon_setting_video', 'general', 'bitbon_setting_section' );
    add_settings_field( 'bitbon_saved_setting_button_id', 'Введите текст кнопки',
    'bitbon_setting_button', 'general', 'bitbon_setting_section' );

    register_setting( 'general', 'bitbon_setting_values', 'bitbon_sanitize_settings' );
    
    function bitbon_sanitize_settings( $input ) {
        $input['name'] = sanitize_text_field( $input['name'] );
        $input['button'] = sanitize_text_field( $input['button'] );
        return $input;
    }
    
    function bitbon_setting_section() {
        echo '<p>Введите информацию, которая отображается в поле под слайдером</p>';
    }
    
    function bitbon_setting_name() {
        $bitbon_options = get_option( 'bitbon_setting_values' );
        echo '<textarea type="text" name="bitbon_setting_values[name]" style="width: 70%;">' . $bitbon_options['name'] . '</textarea>';
    }
    
    function bitbon_setting_video() {
        $bitbon_options = get_option( 'bitbon_setting_values' );
        echo '<textarea type="text" name="bitbon_setting_values[video]" style="width: 70%;">' . $bitbon_options['video'] . '</textarea>';
    }
    
    function bitbon_setting_button() {
        $bitbon_options = get_option( 'bitbon_setting_values' );
        echo '<textarea type="text" name="bitbon_setting_values[button]" style="width: 70%;">' . $bitbon_options['button'] . '</textarea>';
    }

}