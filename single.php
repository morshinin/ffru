<?php get_header(); ?>

<div class="main-content clearfix">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		
		<article class="post" id="post-<?php the_ID(); ?>">
			<header class="post_header">
				<span class="category"><?php the_category(', ') ?></span>
				<h1 class="post-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Прямая ссылка на <?php the_title(); ?>"><?php the_title(); ?></a>
				</h1>
		
				<div class="allinfos">
					<span class="author"><?php the_author(); ?></span> |
					<time class="date" datetime="<?php the_time('Y-m-d'); ?>" pubdate><?php the_time('j.m.Y'); ?></time>  
				</div>
			</header>


					<div class="post-body">

				<?php
				global $post; ?>
				<?php
				$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1280,853 ), false, '' );
				?>
				<?php
				if (!empty($src)) { ?>
				<div class="post_thumb" style="background: url(<?php echo $src[0]; ?> ) center / cover no-repeat;"></div>
				<?php } else {} ?>

				<?php the_content(); ?>
				</div>
			<footer class="post_footer">
	  			<span class="tags"><?php the_tags('',''); ?></span>
	  			<?php 
	  				global $user_ID;
	  				if (get_the_author_meta('user_url', $user_ID)) : ?>
	  			<div class="author_description clearfix">
	  			<figure class="author_avatar">
	  				<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
	  			</figure>
	  			<h2 class="author_name">
	  				<?php the_author_meta('user_firstname', $user_ID); ?>
	  			</h2>
	  				<p class="author_bio"><?php the_author_meta('user_description', $user_ID); ?>
	  				</p>
	  			</div>
	  		<?php endif; ?>
	  		</footer>
	</article>


<!-- <div id="vk_comments"></div> -->

	<?php endwhile; else: ?>

		<p>
			<?php _e('Извини, по твоему запросу ничего не найдено.', 'ffru'); ?>
		</p>

<?php endif; ?>
<?php comments_template(); ?>

</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>