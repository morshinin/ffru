
<?php get_header(); ?>

	<div class="container">
<div class="main-content clearfix">
		

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

	<article class="post clearfix" id="post-<?php the_ID(); ?>">

	  <div class="post_wrap clearfix">

	  	<header class="post_header">
	  		<span class="category"><?php the_category(', ') ?></span> 
  	  	<h2 class="post-title">
  	  		<a href="<?php the_permalink() ?>" rel="bookmark" title="Прямая ссылка на <?php the_title(); ?>"><?php the_title(); ?></a>
  	  	</h2>
  	  
  	  	<div class="allinfos">
  	  		<span class="author"><?php the_author(); ?></span> | <span class="date"><?php the_time('j.m.Y') ?></span>
  	  	</div>
	  	</header>
	  
	  		<div class="post-body">
	  			<!-- <?php
	  			            if ( has_post_thumbnail() ) 
	  			              the_post_thumbnail( );
	  			           ?> -->
	  			<?php
	  			global $post; ?>
	  			<?php
	  			$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1280,853 ), false, '' );
	  			?>
	  			<?php
	  			if (!empty($src)) { ?>
	  			<div class="post_thumb" style="background: url(<?php echo $src[0]; ?> ) center / cover no-repeat;"></div>
	  			<?php } else {} ?>
	  			<?php the_content(('Читать запись полностью &raquo;')); ?>
	  		</div>
	  
	  		<footer class="post_footer">
	  			<span class="tags"><?php the_tags('',''); ?></span>
	  		</footer>
	  </div>
	  <!-- post_wrap -->
	</article>

			<?php endwhile; ?>

			<?php if(function_exists("wp_pagenavi")) { wp_pagenavi(); } ?>

		<?php else : ?>

			<h2 class="center">Не найдено</h2>
			<p class="center">То, что ты искал(а) здесь нет.</p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>

		<?php endif; ?>


</div><!-- End #main-content -->

<?php get_sidebar(); ?>
	</div>
	<!-- .container -->
<?php get_footer(); ?>