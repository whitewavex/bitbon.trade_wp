<?php
/*
Template Name: Вопросы
*/
?>
<?php get_header() ?>
<main class="main-page main-page_pb">
    <div class="container">
        <h3 class="main-page__title title">Часто задаваемые вопросы</h3>
        <div class="main-page__content">
            <div id="accordion" class="main-page__accordion accordion">
            
            <?php

                $args = array(
                    'post_type' => 'questions_accordion',
                    'posts_per_page' => -1,
                    'order' => 'ASC'
                );

                $questions = new WP_Query($args);

            ?>

            <?php if ($questions->have_posts()) :  while ($questions->have_posts()) : $questions->the_post(); ?>
                
                <?php $id = $post->ID; ?>

                <div class="accordion__card">
                    <div class="accordion__title" id="heading-<?php echo $id ?>">
                        <h5>
                           
                            <?php the_title('<button class="accordion__button" data-toggle="collapse" data-target="#collapse-' . $id . '" aria-expanded="true" aria-controls="#collapse-' . $id . '">', '</button>') ?>
                            
                        </h5>
                    </div>
                    <div id="collapse-<?php echo $id ?>" class="accordion__body collapse" aria-labelledby="heading-<?php echo $id ?>">
                        <div class="accordion__content">
                            
                            <?php the_content() ?>
                            
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
            <?php endif; ?>

            </div>
            <p class="main-page__questions">Ещё "Частые вопросы" есть на <a href="https://www.bit.trade/14639" target="_blank">Бирже Цифровых Активов</a>.</p>
        </div>
    </div>
    <div class="feedback">
        <div class="container">
            
                <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                
                    <div class="feedback__explain">
                        
                        <?php the_content() ?>
                        
                    </div>
                
                <?php endwhile; ?>
                <?php endif; ?>
            
        </div>
    </div>
</main>
<?php get_footer() ?>