<?php get_header() ?>
<div class="blog">
    <div class="container">
       
        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
        
            <?php $category = get_the_category();
            
            $cat_name = $category[0]->name;
        
            $cat_id = $category[0]->cat_ID;
        
            $cat_link = get_category_link($cat_id);
        
            ?>
            
            <h3 class="blog__title title"><a href="<?php echo $cat_link ?>"><?php echo $cat_name ?></a></h3>
        
        <?php endwhile; ?>
        <?php endif; ?>
        
        <div class="blog__content content">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <main class="posts blog__posts">
                        <div class="posts__post post">
                        
                        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                        
                            <div class="post__info">

                                <?php the_title('<h3 class="post__title">', '</h3>') ?>

                                <div class="post__content">
                                    <?php the_content('') ?>
                                </div>
                                <div class="post__more d-flex justify-content-end align-items-end">
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
                            
                            <div class="comments">
                        
                                <?php comments_template(); ?>
                            
                            </div>
                        
                        <?php endwhile; ?>
                        <?php endif; ?>
                        
                    </main>
                </div>
                
                <?php get_sidebar() ?>

            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>