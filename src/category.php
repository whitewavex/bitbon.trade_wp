<?php get_header() ?>
<div class="blog">
    <div class="container">
        <h3 class="blog__title title"><span class="title__name">Рубрика "</span><?php single_cat_title() ?>"</h3>
        <div class="blog__content content">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <main class="posts blog__posts">
                
                    <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

                        <div class="posts__post post">

                            <a class="post__link" href="<?php the_permalink() ?>">
                                <?php if( get_the_post_thumbnail() ): ?>
                                <?php the_post_thumbnail() ?>
                                <?php else: ?>
                                <img class="post__img attachment-post-thumbnail size-post-thumbnail wp-post-image" src="<?php bloginfo( 'template_url' ) ?>/images/bitbon_post_img.jpg" alt="">
                                <?php endif; ?>
                            </a>
                            <div class="post__info">

                                <a class="post__link" href="<?php the_permalink() ?>">
                                    <?php the_title('<h3 class="post__title">', '</h3>') ?>
                                </a>
                                <div class="post__content">
                                    <?php the_content('') ?>
                                </div>
                                <div class="post__more d-flex justify-content-between align-items-end">
                                    <a href="<?php the_permalink() ?>" class="button-blue">Прочитать</a>
                                    <p class="post__date"><?php echo get_the_date('d.m.y') ?></p>
                                </div>

                            </div>
                            <div class="post__taxonony taxonomy">
                                <p class="taxonomy__cat">
                                    <span class="taxonomy__name">Категории:</span>
                                    <span>
                                        <?php the_category( ', ' ); ?>
                                    </span>
                                </p>
                                <?php if( get_the_tags() ): ?>
                                <p class="taxonomy__cat justify-content-end">
                                    <span class="taxonomy__name">Метки:</span>
                                    <span>
                                        <?php the_tags( '', ', ' ); ?>
                                    </span>
                                </p>
                                <?php endif; ?>
                            </div>

                        </div>

                    <?php endwhile; ?>
                    <?php endif; ?>
                
                <div class="pagination">
                
                    <?php 
                    
                        $args = array(
                            'end_size'     => 1,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => __('Предыдущая'),
                            'next_text'    => __('Следующая')
                        );
                    
                    ?>
                
                    <?php echo paginate_links($args) ?>
                
                </div>
                 
                <?php wp_reset_postdata() ?>
            
                    </main>
                </div>
                
                <?php get_sidebar() ?>
                
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>