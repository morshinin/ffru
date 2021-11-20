 <div id="comments" class="clearfix">

<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">
				<?php _e('Эта запись защищена паролем. Введите пароль, чтобы посмотреть комментарии.', 'ffru'); ?>
			</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	// $oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<?php $i = 0; ?>

<?php if ($comments) : ?>
	<strong><?php comments_number('Нет комментариев', 'Один комментарий есть', '% комментариев' );?></strong>

<ol class="comments_list">

	<?php foreach ($comments as $comment) : ?>
	<?php $i++; ?>

	<li class="comment_wrap" id="comment-<?php comment_ID(); ?>">
		<?php if ($comment->comment_approved == '0') : ?>
				<em>
					<?php _e('Ваш комментарий ожидает модерации.', 'ffru'); ?>
				</em>
				<?php endif; ?>
		<article>
			<header class="comment_meta"> 
	
				<h4 class="comment_author">
					<?php comment_author_link() ?>
				</h4>
	
				<time class="comment_time" datetime="<?php comment_date('Y-m-d'); ?>"><?php comment_date('F jS, Y'); ?>	<?php comment_time() ?>
				</time>
	
				<span class="comment_count">
					<?php echo $i; ?>
				</span>
			</header>
	
			<div class="comment_body">
				<?php comment_text() ?>
			</div>
		</article>
	</li>
				
<!-- 	<?php
	/* Changes every other comment to a different class */
	$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
?> -->

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">
			<?php _e('Комментирование закрыто.', 'ffru'); ?>
		</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<h3 class="comments_title">
	<?php _e('Оставьте комментарий', 'ffru'); ?>
</h3>
<p class="comments_permission">
	<?php _e('Круто! Вы решили оставить комментарий. Это фантастика! Пожалуйста имейте ввиду, что комментарии модерируются. Поэтому не используйте в имени названия сайтов.', 'ffru'); ?>
<!--
	<span>
		<?php _e('Все поля обязательны для заполнения.', 'ffru'); ?>
	</span>
-->
</p>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>
	<?php _e('Вам нужно', 'ffru'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('зарегистрироваться', 'ffru'); ?></a><?php _e(', что бы оставить комментарий.', 'ffru'); ?></p>
<?php else : ?>

<form class="comments_form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php _e('Вы вошли под именем', 'ffru'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Покинуть корабль">Выйти &raquo;</a></p>

<?php else : ?>

<label for="author"><small><?php _e('Имя', 'ffru'); ?> <!-- <?php if ($req) echo "(обязательно)"; ?> --></small></label>
<p>
	<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
</p>
<!--
<label for="email"><small><?php _e('Email', 'ffru'); ?>  <?php if ($req) echo "(обязательно)"; ?> </small></label>
<p>
	<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
</p>
 <label for="url"><small><?php _e('Сайт', 'ffru'); ?></small></label>
<p>
	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
</p> -->

<?php endif; ?>

<label for="comment">
	<small>
		<?php _e('Ваше сообщение', 'ffru'); ?>
	</small>
</label>
<p>
	<textarea name="comment" id="comment" cols="45" rows="10" tabindex="4"></textarea>
</p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Отправить комментарий" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

</div>

