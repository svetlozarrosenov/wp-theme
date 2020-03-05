<?php
if ( empty( $subscribe['gform'] ) ) {
	return;
}
?>
<section class="section-subscribe">
	<div class="<?php echo $subscribe['border']; ?>">
		<div class="subscribe__content">
			<?php crb_render_gform( $subscribe['gform'], true, array( 'display_title' => true, 'display_description' => true ) ); ?>
		</div><!-- /.subscribe__content -->
	</div><!-- /.subscribe -->
</section><!-- /.section-subscribe -->