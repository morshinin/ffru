<footer class="footer clearfix">

	<nav class="footer-item nav-third">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'third',
			'items_wrap' => '<ul>%3$s</ul>'));
		?>
	</nav>
	<!-- footer-item -->
<!-- 	<nav class="footer-item">
		<?php wp_get_archives('title_li=&type=postbypost&limit=5'); ?> 
</nav> -->
	<!-- footer-item -->
<!-- 	<div class="footer-item">		

</div>  -->
	<!-- footer-item -->

	<div class="footer-additional">
	<?php bloginfo('name'); ?> &copy; 2007-<?php echo date('Y');?>. <?php wp_footer(); ?>
	</div>
</footer>

</body>
</html>