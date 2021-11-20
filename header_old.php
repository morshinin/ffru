<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo('charset'); ?>">

<title><?php wp_title(' - ',TRUE,'right'); bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head(); ?>
</head>
<body>

<!-- Главное меню -->
<nav class="nav-main clearfix">  
	<div class="container">	
		<div class="logo">

		<?php if (is_home() ) { ?>
     <h1 class="logo_title-homepage"><?php bloginfo('name'); ?></h1>
     <a href="#">
      <img src="<?php echo esc_url(get_theme_mod('ffru_logo')); ?>" alt="<?php bloginfo('name'); ?>" class="logo_img">
      </a>

      
		<?php } else { ?>
			<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="l-header_logolink" rel="home"><img src="<?php echo esc_url(get_theme_mod('ffru_logo')); ?>" alt="<?php bloginfo('name'); ?>" class="logo_img"></a>

<?php } ?>
		</div>
		<!-- Отзывчивое менюна css -->
		<label for="drop" class="toggle">
			<?php _e('Меню', 'ffru'); ?>
		</label>
		<input type="checkbox" id="drop">
		<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'items_wrap' => '<ul>%3$s</ul>'));
				?>
		<div class="search">
						<?php include (TEMPLATEPATH . "/searchform.php"); ?>
				 </div>
				 		<div class="signin clearfix">
							<ul>
								<?php wp_register(); ?>
								<li><?php wp_loginout(); ?></li>
							</ul>	 
						</div>
						<!-- signin -->
 	 </div>
 	 <!-- container -->
</nav> 

<!-- Nav secondary -->

	<nav class="nav-secondary clearfix">
	<label for="drop2" class="toggle">
		<?php _e('Рубрики', 'ffru'); ?>
	</label>
	<input type="checkbox" id="drop2">
			<?php
							wp_nav_menu( array(
								'theme_location' => 'secondary',
								'items_wrap' => '<ul>%3$s</ul>'));
							?>

		<div class="archive">
			<span>
				<?php _e('Архив: '); ?>
			</span>
			<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
		  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
		  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
			</select>
		</div>
	</nav>

<?php //highlight 'Blog' if not Page
if (is_page()) {
	$highlight = "page_item";	
} else {
	$highlight = "page_item current_page_item";
}
?>
