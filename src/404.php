<?php get_header() ?>
<main class="main-page">
    <div class="container">
        <h3 class="main-page__title title">Такой страницы не существует</h3>
        <div class="line main-page__line"></div>
        <div class="main-page__content text-center">
            <h6>Используйте меню для навигации по сайту.</h6>
            <img src="images/404.jpg" alt="">
        </div>
    </div>
</main>
<section class="welcome">
    <div class="container">
    
        <?php $args = array(
            'post_type' => 'buy_video',
            'posts_per_page' => 1,
            'order' => 'ASC'
        );  ?>

        <?php $video = new WP_Query($args) ?>

        <?php if ($video->have_posts()) :  while ($video->have_posts()) : $video->the_post(); ?>
            
            <?php the_title('<h3 class="welcome__title d-none">', '</h3>') ?>
            
            <?php $id = $post->ID; ?>
                            
            <?php $custom = get_post_meta($id, 'code_video') ?>

            <?php if ( $custom[0] ) : ?>
            
            <div class="welcome__video">

                <?php echo $custom[0] ?>
                
            </div>
            
            <?php endif; ?>
            
            <div class="welcome__content">
                
                <?php the_content() ?>
                
            </div>
                
            <?php $id = $post->ID; ?>
                            
            <?php $custom = get_post_meta($id, 'button') ?>
                
            <?php if ( $custom[0] ) : ?>

                <a href="index.html" class="welcome__button button"><?php echo $custom[0] ?></a>
                
            <?php endif; ?>

        <?php endwhile; ?>
        <?php endif; ?>
    
    </div>
</section>
<?php get_footer() ?>