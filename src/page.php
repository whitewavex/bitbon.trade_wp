<?php get_header() ?>
<main class="main-page">
    <div class="container">
    
        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
        
              <?php the_title('<h3 class="main-page__title title">', '</h3>') ?>
              
              <div class="main-page__content">
                  
                  <?php the_content()  ?>
                  
              </div>
        
        <?php endwhile; ?>
        <?php endif; ?>
        
    </div>
</main>
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