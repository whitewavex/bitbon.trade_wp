<?php

add_action('admin_menu', 'bitbon_create_menu_callback');

function bitbon_create_menu_callback() {
    add_menu_page('Обратный звонок', 'Обратный звонок', 'manage_options', 'bitbon_callback', 'bitbon_callback_settings_page', 'dashicons-phone', 30);
    add_action('admin_init', 'bitbon_register_settings');
}


function bitbon_register_settings() {
    register_setting('bitbon_callback_settings_group', 'bitbon_callback_options', 'bitbon_callback_args');
}

$bitbon_callback_args = array(
	'type'              => 'string',
	'group'             => 'bitbon_callback_settings_group',
	'description'       => '',
	'sanitize_callback' => '',
	'show_in_rest'      => false,
);

function bitbon_callback_settings_page() {
?>
<div class="wrap">
    <h2>Обратный звонок</h2>
    <form method="post" action="options.php">
    <?php settings_fields( 'bitbon_callback_settings_group' ); ?>
    <?php $callback_options = get_option( 'bitbon_callback_options' ); ?>
    <p>Вставьте шорткод формы обратного звонка</p>
    <input type="text" name="bitbon_callback_options" value="<?php echo esc_attr( $callback_options ); ?>" />
    <p class="submit">
        <input type="submit" class="button-primary" value="Сохранить" />
    </p>
    </form>
</div>
<?php
}