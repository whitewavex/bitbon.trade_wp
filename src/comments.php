<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version
 *
 */
_deprecated_file(
	/* translators: %s: template name */
	sprintf( __( 'Theme without %s' ), basename( __FILE__ ) ),
	'3.0.0',
	null,
	/* translators: %s: template name */
	sprintf( __( 'Please include a %s template in your theme.' ), basename( __FILE__ ) )
);

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments" class="comments__title">
		<?php
        
            $num_comments = get_comments_number();
            $last_num = substr($num_comments, -1);
            strlen($num_comments) > 1 ? $prelast_num = substr($num_comments, -2) : $prelast_num = 0;
        
			if ( $last_num == 1  && $prelast_num != 1 ) {
				echo $num_comments . ' комментарий';
			} 
            elseif ( $last_num > 1 && $last_num < 5 &&  $prelast_num != 1 ) {
				echo $num_comments . ' комментария';
			}
            else {
                echo $num_comments . ' комментариев';
            }
		?>
	</h3>

	<div class="commentlist comments__list">
	<?php wp_list_comments(array('style' => 'div', 'avatar_size' => 80));?>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		
    <h3 id="comments" class="comments__title">Комментариев пока нет</h3>

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.'); ?></p>

	<?php endif; ?>
<?php endif; ?>

<?php 

    $args = array(
        'fields' => array(
            'author' => '<input id="author" class="form__input input" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="Ваше имя *" size="30"' . $aria_req . ' />',
            'email'  => '<input id="email" class="form__input input" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="Ваш email *" size="30"' . $aria_req . ' />',
            'url'    => '<input id="url" class="form__input input" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="Ваш сайт" size="30" /></p>',
        ),
        'comment_field' => '<textarea id="comment" class="form__input textarea comment-form__textarea" name="comment" cols="45" rows="8" placeholder="Текст комментария...*" aria required="true"></textarea>',
        'submit_button' => '<input type="submit" value="Оставить комментарий" class="form__button button comment-form__button">'
    );

?>

<?php comment_form($args); ?>
