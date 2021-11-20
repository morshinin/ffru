<?php
/*
Template Name: Archives Page
*/
?>
<?php get_header(); ?>

	<?php get_sidebar(); ?>

	<div id="content">

	<h2 class="entry-title"><?php the_title() ?></h2>

	<?php the_content() ?>

		<h2>Archives by Month:</h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>

		<h2>Archives by Subject:</h2>
			<ul>
				 <?php wp_list_categories(); ?>
			</ul>

	</div>

<?php get_footer(); ?>
