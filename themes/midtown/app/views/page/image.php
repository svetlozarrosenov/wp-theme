<?php
if ( empty( $image['image'] ) ) {
	return;
}
?>
<section class="section-image">
	<?php echo wp_get_attachment_image( $image['image'], 'crb_section_image_image_size' ); ?>
</section><!-- /.section-image -->