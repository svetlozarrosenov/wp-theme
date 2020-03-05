<?php
$socials = crb_get_socials_data();
if ( empty( $socials ) ) {
	return;
}
?>
<div class="socials">
	<ul>
		<?php foreach ( $socials as $social ) : ?>
			<li>
				<a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank">
					<i class="<?php echo $social['icon']; ?>"></i>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div><!-- /.socials -->