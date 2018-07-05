<?php

add_action('add_meta_boxes', 'extra_fields_video', 1);

function extra_fields_video() {
	add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_video', 'page', 'normal', 'high'  );
}

//    CODE META VIDEO

function extra_fields_box_video( $post ){
	?>

	<p>Код видео:
		<textarea type="text" name="extra[code_video]" style="width:60%; margin-left: 25px;"><?php echo get_post_meta($post->ID, 'code_video', 1); ?></textarea>
	</p>
    <p>Текст кнопки:
		<textarea type="text" name="extra[button]" style="width:60%; margin-left: 10px;"><?php echo get_post_meta($post->ID, 'button', 1); ?></textarea>
	</p>

	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<?php
}

//    UPDATE META VIDEO

add_action('save_post', 'extra_fields_video_update', 0);

//    SAVE DATA VIDEO

function extra_fields_video_update( $post_id ){
	if ( !isset($_POST['extra_fields_nonce']) || !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false;
	if ( !current_user_can('edit_post', $post_id) ) return false;

	if( !isset($_POST['extra']) ) return false; 

	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) ){
			delete_post_meta($post_id, $key);
			continue;
		}

		update_post_meta($post_id, $key, $value);
	}
	return $post_id;
}