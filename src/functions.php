<?php

//    ADD SCRIPTS

add_action( 'wp_enqueue_scripts', 'bitbon_trade_scripts' );

function bitbon_trade_scripts(){
    
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'libs', get_template_directory_uri() . '/libs/libs.min.js', '', 3.3 );
//    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/libs/bootstrap.js', array('jquery'), 4.1 , true);
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.min.js', array('libs'), '1', true);
    
}

//    REGISTER MENUS

register_nav_menus(array(
    'main_menu' => 'Главное меню'
));

//    ADD THUMBNAILS

add_theme_support( 'post-thumbnails' );

//    SLIDER MAIN

add_action( 'init', 'slider_index' );

function slider_index() {
    
    $args = array(
        'public' => true,
        'supports' => array( 'title', 'thumbnail', 'editor' ),
        'menu_icon' => get_template_directory_uri() . '/images/slider.png',
        'labels' => array(
            'name' => 'Слайдер',
            'all_items' => 'Все слайды',
            'add_new' => 'Добавить слайд',
            'add_new_item' => 'Новый слайд',
            'edit_item' => 'Редактировать слайд',
            'search_items' => 'Поиск слайдов',
            'featured_image' => 'Изображение'
        )
    );
    
    register_post_type( 'slider_index', $args );
}

//    INFO MAIN

add_action( 'init', 'info_main' );

function info_main() {
    
    $args = array(
        'public' => true,
        'supports' => array( 'title', 'editor' ),
        'menu_icon' => get_template_directory_uri() . '/images/info-main.png',
        'labels' => array(
            'name' => 'Информация на главной',
            'all_items' => 'Вся информация',
            'add_new' => 'Добавить информацию',
            'add_new_item' => 'Новоя информация',
            'edit_item' => 'Редактировать информацию',
            'search_items' => 'Поиск информации'
        )
    );
    
    register_post_type( 'info_main', $args );
}

//    BUY VIDEO

add_action( 'init', 'buy_video' );

function buy_video() {
    
    $args = array(
        'public' => true,
        'supports' => array( 'title', 'editor'),
        'menu_icon' => get_template_directory_uri() . '/images/video.png',
        'labels' => array(
            'name' => 'Блок "Видео"',
            'all_items' => 'Вся информация',
            'add_new' => 'Добавить информацию',
            'add_new_item' => 'Новоя информация',
            'edit_item' => 'Редактировать информацию',
            'search_items' => 'Поиск информации'
        )
    );
    
    register_post_type( 'buy_video', $args );
}

//    META BOX FOR VIDEO

add_action('add_meta_boxes', 'extra_fields_video', 1);

function extra_fields_video() {
	add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_video', 'buy_video', 'normal', 'high'  );
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

//    INFO FOOTER 1

    register_sidebar( array(
        'name' => 'Виджет в подвале слева',
        'id' => 'info_phone',
        'description' => 'Добавьте сюда виджет текст, в который добавьте свой адрес и телефоны',
        'before_widget' => '',
        'after_widget' => ''
    ) );

//    INFO FOOTER 2

    register_sidebar( array(
        'name' => 'Виджет в подвале справа',
        'id' => 'info_address',
        'description' => 'Добавьте сюда виджет текст, в который добавьте свой e-mail адрес. Сделайте e-mail ссылкой',
        'before_widget' => '',
        'after_widget' => ''
    ) );

//    FOOTER SOCIAL

    register_sidebar( array(
        'name' => 'Виджет соц. сетей',
        'id' => 'social_footer',
        'description' => 'Добавьте сюда виджет HTML-код, в который добавьте HTML-код соц. сетей  формата <a class="social__button" href="ссылка">иконка fontawesome</a>. Для facebook добавьте класс social__button_facebook, а для youtube класс social__button_youtube. Сервис иконок https://fontawesome.com/v4.7.0/',
        'before_widget' => '',
        'after_widget' => ''
    ) );

//    LOGO

    register_sidebar( array(
        'name' => 'Логотип',
        'id' => 'logo',
        'description' => 'Добавьте сюда виджет изображение.',
        'before_widget' => '',
        'after_widget' => ''
    ) );

//    QUESTIONS

add_action( 'init', 'questions_accordion' );

function questions_accordion() {
    
    $args = array(
        'public' => true,
        'supports' => array( 'title', 'editor'),
        'menu_icon' => get_template_directory_uri() . '/images/questions.png',
        'labels' => array(
            'name' => 'Вопросы',
            'all_items' => 'Все вопросы',
            'add_new' => 'Добавить вопрос',
            'add_new_item' => 'Новый вопрос',
            'edit_item' => 'Редактировать вопрос',
            'search_items' => 'Поиск вопросов'
        )
    );
    
    register_post_type( 'questions_accordion', $args );
}

//    ADD CLASS THUMBNAIL POST

add_filter ( 'post_thumbnail_html', 'add_class_thumbnail_post' ) ; 

function add_class_thumbnail_post ( $html ) { 
    
    if( $html ) {
        
        $pos = strpos($html, 'class');

        $html = substr_replace($html, 'post__img ', $pos + 7, 0);
        
    }

    return  $html ; 
}

//    SIDEBAR

    register_sidebar( array(
        'name' => 'Боковая колонка',
        'id' => 'sidebar',
        'description' => 'Добавьте сюда виджеты, которые вы хотите разместить в боковой колонке',
        'before_widget' => '<div class="widget sidebar__widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget__title">',
        'after_title' => '</h4>'
    ) );

//    WIDGET SEARCH

add_filter( 'get_search_form', 'searchform_html' );

function searchform_html( $form ){
	
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '"><input type="text" name="s" class="input" placeholder="Поиск..."></form>';

	return $form;
}

//  SEARCH

add_filter('pre_get_posts','bitbon_search_filter');

function bitbon_search_filter( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array('post') );
    }
    return $query;
}

//    ADD TEXT EXTRA MENU

add_action( 'admin_init', 'bitbon_settings_init' );

function bitbon_settings_init() {

    add_settings_section( 'bitbon_setting_section', 'Название дополнительного меню',
    'bitbon_setting_section', 'general' );

    add_settings_field( 'bitbon_saved_setting_name_id', 'Введите текст для дополнительного меню',
    'bitbon_setting_name', 'general', 'bitbon_setting_section' );

    register_setting( 'general', 'bitbon_setting_values', 'bitbon_sanitize_settings' );
    
    function prowp_sanitize_settings( $input ) {
        $input['name'] = sanitize_text_field( $input['name'] );
        return $input;
    }
    
    function bitbon_setting_section() {
        echo '<p>Введите название дополнительного меню, которое отображается после слайдера</p>';
    }
    
    function bitbon_setting_name() {
        $bitbon_options = get_option( 'bitbon_setting_values' );
        echo '<textarea type="text" name="bitbon_setting_values" style="width: 70%;">' . $bitbon_options . '</textarea>';
    }

}