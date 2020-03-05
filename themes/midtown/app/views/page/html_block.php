<?php
if ( ! array_filter( $html_block ) ) {
	return;
}
?>
<section class="section-content section-content--small">
	<div class="section__inner">
		<?php if ( ! empty( $html_block['title'] ) ) : ?>
			<h2><?php echo esc_html( $html_block['title'] ); ?></h2>
		<?php endif; ?>
		
		<?php if ( ! empty( $html_block['content'] ) ) : ?>
			<?php echo crb_content( $html_block['content'] ); ?>
		<?php endif; ?>
	
		<?php if ( ! empty( $html_block['image'] ) ) : ?>
			<figure class="wp-block-image size-large">
				<?php echo wp_get_attachment_image( $html_block['image'], 'crb_html_block_image_size' ); ?>
			</figure>
		<?php endif; ?>
	</div><!-- /.section__inner -->
</section><!-- /.section-content -->