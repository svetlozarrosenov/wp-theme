<?php
if ( ! array_filter( $intro ) ) {
	return;
}
$intro_class = '';
if ( $intro['small_intro_layout'] ) {
	$intro_class = 'intro--small';
}
?>
<div class="intro <?php echo $intro_class; ?>" style="background-image: url(<?php echo wp_get_attachment_image_url( $intro['image'], 'crb_home_intro_image_size' ); ?>);">
	<span class="intro__bg" style="background-color: #000; opacity: 0;"></span>
	
	<?php if ( ! empty( $intro['title'] ) || ! empty( $intro['subtitle'] ) ) : ?>
		<div class="intro__inner">
			<div class="intro__content">
				<?php if ( ! empty( $intro['title'] ) ) : ?>
					<h1><?php echo esc_html( $intro['title'] ); ?></h1>
				<?php endif; ?>
				
				<?php if ( ! empty( $intro['subtitle'] ) ) : ?>
					<h3><?php echo esc_html( $intro['subtitle'] ); ?></h3>
				<?php endif; ?>
			</div><!-- /.intro__content -->
		</div><!-- /.intro__inner -->
	<?php endif; ?>
</div><!-- /.intro -->