<?php
if ( empty( $btns['btns'] ) ) {
	return;
}
?>
<section class="section-buttons border-top border-bottom">
	<div class="section__content">
		<div class="list-buttons">
			<ul>
				<?php foreach ( $btns['btns'] as $btn ) : ?>
					<?php
					if ( empty( $btn['btn_label'] ) || empty( $btn['btn_link'] ) ) {
						continue;
					}
					?>
					<li>
						<a href="<?php echo esc_url( $btn['btn_link'] ); ?>" class="btn btn--lg"><?php echo esc_html( $btn['btn_label'] ); ?></a>
					</li>
				<?php endforeach; ?>				
			</ul>
		</div><!-- /.list-buttons -->
	</div><!-- /.section__content -->
</section><!-- /.section-buttons -->