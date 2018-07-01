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
<?php get_footer() ?>