<footer class="footer">
    <div class="rectangle footer__rectangle"></div>
    <div class="triangle footer__triangle"></div>
    <div class="logo footer__logo">
        <a href="<?php echo home_url() ?>" class="logo__link d-inline-block">
           
            <?php dynamic_sidebar('logo') ?>
            
        </a>
    </div>
    <div class="logo footer__logo footer__logo_bt">
        <a href="<?php echo home_url() ?>" class="logo__link d-inline-block">
           
            <img src="<?php bloginfo(template_url) ?>/images/ubk_markets_logo.png" alt="">
            
        </a>
    </div>
    
        <?php 
            
            wp_nav_menu( array(
                'theme_location'  => 'main_menu', 
                'container'       => 'nav', 
                'container_class' => 'navigation footer__navigation', 
                'menu_class'      => 'navigation__list navigation__list_small', 
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
            ) );

        ?>
        
    <div class="footer__info">
        <?php  
        
            if( date('Y') <= 2018 ) {
                $copy = '';
            }
            else {
                $copy = ' - ' . date('Y');
            }
        
        ?>
        <p class="copyright footer__copyright">Bitbon Trade &copy; 2018<?php echo $copy; ?><br>Все права защищены</p>
        
        <div class="address footer__address">
           
            <?php dynamic_sidebar('info_text') ?>
            
        </div>

        <div class="contact footer__contact">
           
            <?php dynamic_sidebar('info_contact') ?>
            
        </div>
        <div class="social">
        
            <?php dynamic_sidebar('social_footer') ?>
        
        </div>
    </div>
    <div class="footer__adds adds">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <p><a class="adds__link" target="_blank" href="https://www.simcord.com/">Официальный сайт Simcord</a></p>
                <p><a class="adds__link" target="_blank" href="https://www.bitbon.space?ref=14639">Сайт Системы Bitbon</a></p>
                <p><a class="adds__link" target="_blank" href="https://www.bit.trade/14639">Биржа Цифровых Активов</a></p>
            </div>
            <div class="col-md-8 col-sm-7">
                <p class="adds__info">Сайт bitbon.trade представлен информационно-консультационным центром Киев UA-007 компании Simcord</p>
                <p class="adds__info">Использование текста сайта bitbon.trade возможно только со ссылкой на данный ресурс</p>
            </div>
        </div>
    </div>
    <a href="#page" class="button-up toTop">
        <i class="fa fa-chevron-up" aria-hidden="true"></i>
    </a>
    <button class="button-open" sp-show-form="101760">Получить в подарок <strong>Bit</strong>bon</button>
</footer>
<script>
    var srcSite = '<?php bloginfo( 'template_url' ) ?>';
</script>
<?php wp_footer() ?>
</body>
</html>