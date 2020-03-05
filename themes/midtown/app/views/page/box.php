<?php
if ( empty( $box['title'] ) && empty( $box['content'] ) && empty( $box['image'] ) && empty( $box['btn_label'] ) && empty( $box['btn_link'] ) ) {
	return;
}
?>
<section class="section-card">
	<div class="card <?php echo $box['alignment']; ?>">
		<div class="card__content">
			<div class="card__entry">
				<?php if ( ! empty( $box['title'] ) ) : ?>
					<h3><?php echo esc_html( $box['title'] ); ?></h3>
				<?php endif; ?>
				
				<?php if ( ! empty( $box['content'] ) ) : ?>
					<p>
						<?php echo esc_html( $box['content'] ); ?>
					</p>
				<?php endif; ?>
				
				<?php if ( ! empty( $box['btn_label'] ) || ! empty( $box['btn_link'] ) ) : ?>
					<a href="<?php echo esc_url( $box['btn_link'] ); ?>" class="btn btn--transparent"><?php echo esc_html( $box['btn_label'] ); ?></a>
				<?php endif; ?>
			</div><!-- /.card__entry -->
		</div><!-- /.card__content -->
		
		<?php if ( ! empty( $box['image'] ) ) : ?>
			<div class="card__image">
				<span style="background-image: url(<?php echo wp_get_attachment_image_url( $box['image'], 'crb_box_image_size'); ?>);"></span>
			</div><!-- /.card__image -->
		<?php endif; ?>
	</div><!-- /.card -->
</section><!-- /.section-card -->