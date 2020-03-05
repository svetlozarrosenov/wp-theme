<?php
if ( ! array_filter( $block ) ) {
	return;
}
$classes = '';
if ( $block['right_alignment'] ) {
	$classes = 'box box--reversed';
}
?>
<section class="section-box">
	<div class="box <?php echo $classes; ?>" style="background-image: url(<?php echo wp_get_attachment_image_url( $block['image'], 'crb_block_image_size' ); ?>);">
		<?php if ( ! empty( $block['overlay_color'] ) && ! empty( $block['overlay_opacity'] ) ) : ?>
			<span class="box__bg-color" style="background-color: <?php echo $block['overlay_color']; ?>; opacity: <?php echo $block['overlay_opacity']; ?>;"></span>
		<?php endif; ?>

		<div class="box__inner">
			<?php if ( ! empty( $block['title'] ) || ! empty( $block['content'] ) ) : ?> 
				<div class="box__content">
					<?php if ( ! empty( $block['title'] ) ) : ?>
						<h3 style="color: <?php echo $block['text_color']; ?>;"><?php echo esc_html( $block['title'] ); ?></h3>
					<?php endif; ?>
					
					<?php if ( ! empty( $block['content'] ) ) : ?>
						<p style="color: <?php echo $block['text_color']; ?>;"><?php echo esc_html( $block['content'] ); ?></p>
					<?php endif; ?>
				</div><!-- /.box__content -->
			<?php endif; ?>
			
			<?php if ( ! empty( $block['btn_label'] ) && ! empty( $block['btn_link'] ) ) : ?>
				<div class="box__actions">
					<a href="<?php echo esc_url( $block['btn_link'] ); ?>" class="btn btn--white"><?php echo esc_html( $block['btn_label'] ); ?></a>
				</div><!-- /.box__actions -->
			<?php endif; ?>
		</div><!-- /.box__inner -->
	</div><!-- /.box -->
</section><!-- /.section-box -->