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
	</div><!-- /.shell -->
</section><!-- /.section-default -->