<?php get_header(); ?>

	<div class="container">
<div class="main-content clearfix">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">

	  <h3 class="post-title">
<a href="<?php the_permalink() ?>" rel="bookmark" title="Прямая ссылка на <?php the_title(); ?>"><?php the_title(); ?></a></h3>

<!--<h2 class="date-header"> <?php the_time('j.m.Y') ?> </h2>-->

			    <div class="post-body">
				<?php the_content(); ?>
				</div>
	
<?php wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

</div>

<?php comments_template(); ?>

<?php endwhile; else: ?>

		<p>Извини, нет постов удовлетворяющих критериям.</p>

<?php endif; ?>

	
</div>
</div>
<?php include("sidebar.php"); ?>


<?php get_footer(); ?>
