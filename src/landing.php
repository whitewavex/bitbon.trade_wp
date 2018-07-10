<?php
/*
Template Name: Главная страница
*/
?>
<?php get_header() ?>
<section class="slider-section page__slider-section">
    <canvas id="canvas" class="canvas slider-section__canvas"></canvas>
    <div class="slider-section__wrapper">
        <div class="slider">
           
            <?php

                $args = array(
                    'post_type' => 'slider_index',
                    'order' => 'ASC'
                );

                $slider_index = new WP_Query($args);

                ?>

                <?php if ($slider_index->have_posts()) :  while ($slider_index->have_posts()) : $slider_index->the_post(); ?>

                    <div class="slider__item">
                        <div class="row slide justify-content-center">
                            <div class="slide__content col-xl-7 col-lg-7 col-md-12 col-12">
                               
                                <?php the_title( '<h3 class="slide__title">', '</h3>') ?>
                                
                                <div class="line"></div>
                                
                                <?php the_content() ?>
                                
                            </div>
                            <div class="slide__img col-xl-4 col-lg-5 col-md-12">
                                
                                <?php the_post_thumbnail() ?>
                                
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php endif; ?>
         
        </div>
    </div>
</section>
<section class="bitbon-info">
    <div class="rectangle bitbon-info__rectangle"></div>
    <div class="triangle bitbon-info__triangle"></div>
    <div class="triangle bitbon-info__triangle bitbon-info__triangle_right"></div>
    <div class="rectangle bitbon-info__rectangle bitbon-info__rectangle_right"></div>  
    <div class="bitbon-info__container">
        <h4 class="bitbon-info__title"><?php echo get_option( 'bitbon_setting_values' ); ?></h4>
    </div>
</section>
<section class="info-main">
    <div class="container">

        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

            <div class="info-main__content">
            
            <?php the_content() ?>
            
            </div>       

        <?php endwhile; ?>
        <?php endif; ?>
        
    </div>
</section>

<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'order' => 'ASC'
);  ?>

<?php $posts = new WP_Query($args) ?>

<?php if ($posts->have_posts()): ?>

<section class="news">
    <div class="container">
        <h3 class="title news__title">Последние публикации</h3>
        <div class="line news__line"></div>
        <div class="news__carousel carousel">

            <?php while ($posts->have_posts()) : $posts->the_post(); ?>

                <a href="<?php the_permalink() ?>" class="carousel__item">
                    
                    <?php if (get_the_post_thumbnail()): ?>

                    <?php the_post_thumbnail() ?>
                    
                    <?php else: ?>
                    
                        <img width="469" height="327" src="<?php bloginfo('template_url') ?>/images/bitbon_post_img.jpg" class="post__img attachment-post-thumbnail size-post-thumbnail wp-post-image"/> 
                    
                    <?php endif; ?>

                    <p class="carousel__date"><?php echo get_the_date('d.m.y') ?></p>

                    <?php the_title('<h4 class="carousel__title">', '</h4>') ?>

                </a>

            <?php endwhile; ?>

        </div>
    </div>
</section>

<?php endif; ?>
<?php wp_reset_postdata() ?>
    
<?php

    $post_id = get_queried_object_id();

    $args = array(
        'post_type' => 'page',
        'page_id' => $post_id
    );
?>

<?php $video = new WP_Query($args) ?>

<?php if ($video->have_posts()) :  while ($video->have_posts()) : $video->the_post(); ?>

<?php $id = $post->ID; ?>

<?php 

$custom_video = get_post_meta($id, 'code_video');

$custom_button = get_post_meta($id, 'button');

?>

<?php if( $custom_video[0] || $custom_button[0] ) : ?>

<section class="welcome">
    <div class="container">

<?php endif; ?>

<?php if ( $custom_video[0] ) : ?>

    <div class="welcome__video">

        <?php echo $custom_video[0] ?>

    </div>

<?php endif; ?>

<?php if ( $custom_button[0] ) : ?>

    <a href="https://www.bit.trade/14639" target="_blank" class="welcome__button button button_sm"><?php echo $custom_button[0] ?></a>

<?php endif; ?>

<?php if( $custom_video[0] || $custom_button[0] ) : ?>

    </div>
</section>

<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer() ?>