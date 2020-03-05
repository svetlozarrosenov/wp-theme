<?php
if ( ! array_filter( $bar ) ) {
	return;
}
$large_title_class = '';
if ( $bar['large_title'] ) {
	$large_title_class = 'bar--large';
}
?>
<div class="<?php echo $bar['border']; ?> <?php echo $large_title_class; ?>">
	<div class="bar__content">
		<?php if ( ! empty( $bar['text'] ) ) : ?>
			<h4><?php echo esc_html( $bar['text'] ); ?></h4>
		<?php endif; ?>

		<?php
		if ( ! empty( $bar['content'] ) ) {
			echo crb_content( $bar['content'] ); 
		} 
		?>
	</div><!-- /.bar__content -->
</div><!-- /.bar -->