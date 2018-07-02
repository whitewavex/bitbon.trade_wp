<?php
/*
Template Name: Контакты
*/
?>
<?php get_header() ?>
<main class="contacts">
    <div class="container">
        <h3 class="title contacts__title"><?php wp_title('') ?></h3>
           
            <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

                    <?php the_content() ?>

            <?php endwhile; ?>
            <?php endif; ?>
            
    </div>
</main>
<?php get_footer() ?>