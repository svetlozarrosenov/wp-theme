<?php get_header(); ?>

<section class="section-default">
	<div class="shell">
		<div class="section__content">
			<?php
			crb_the_title( '<h1 class="pagetitle">', '</h1>' );

			if ( is_single() ) {
				get_template_part( 'loop', 'single' );
			} else {
				get_template_part( 'loop' );
			}
			?>
		</div><!-- /.section__content -->

		<div class="section__sidebar">
			<?php get_sidebar(); ?>
		</div><!-- /.section__sidebar -->
	</div><!-- /.shell -->
</section><!-- /.section-default -->

<?php get_footer();