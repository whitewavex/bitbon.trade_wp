<?php

//    ADD SCRIPTS

add_action( 'wp_enqueue_scripts', 'bitbon_trade_scripts' );

function bitbon_trade_scripts(){
    
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/libs/jquery.min.js', '', 3.3 );
    wp_enqueue_script( 'libs', get_template_directory_uri() . '/libs/libs.min.js', array('jquery') );
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

//    META BOX FOR VIDEO

include 'templates/meta_box_for_video.php';

//    INFO FOOTER LEFT

    register_sidebar( array(
        'name' => 'Виджет в подвале слева',
        'id' => 'info_phone',
        'description' => 'Добавьте сюда виджет текст, в который добавьте телефоны. Сделайте телефоны ссылкой формата "tel: номер телефона"',
        'before_widget' => '',
        'after_widget' => ''
    ) );

//    INFO FOOTER RIGHT

    register_sidebar( array(
        'name' => 'Виджет в подвале справа',
        'id' => 'info_address',
        'description' => 'Добавьте сюда виджет текст, в который добавьте адрес и свой e-mail. Сделайте e-mail ссылкой',
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

//    WIDGET LOGO

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

//  SEARCH FILTER

add_filter('pre_get_posts','bitbon_search_filter');

function bitbon_search_filter( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array('post') );
    }
    return $query;
}

//    ADD TEXT EXTRA MENU

include 'templates/add_extra_text.php';

//    CALLBACK

include 'templates/callback.php';