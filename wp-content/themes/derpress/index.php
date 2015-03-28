<?php get_header(); ?>

	<div class="row">
		<?php if ( have_posts() ) { ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('large-12 columns'); ?>>
				<?php while ( have_posts() ) { the_post(); ?>
					<h1><?php the_title(); ?></h1>
				<?php } //end while ?>
			</div>
		<?php } //end if ?>
		<hr>
	</div>

<?php get_footer(); ?>