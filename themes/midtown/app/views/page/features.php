<?php
if ( empty( $features['features'] ) ) {
	return;
}
?>
<section class="section-features">
	<div class="slider slider--features">
		<div class="slider__clip swiper-container">
			<div class="slider__slides swiper-wrapper">
				<?php foreach ( $features['features'] as $feature ) : ?>
					<div class="slider__slide swiper-slide">
						<div class="feature">
							<?php if ( ! empty( $feature['image'] ) ) : ?>
								<div class="feature__image">
									<span style="background-image: url(<?php echo wp_get_attachment_image_url( $feature['image'], 'crb_feature_image_size' ); ?>);"></span>
								</div><!-- /.feature__image -->
							<?php endif; ?>

							<div class="feature__content">
								<div class="feature__entry">
									<?php if ( ! empty( $feature['title'] ) ) : ?>
										<h4><?php echo esc_html( $feature['title'] ); ?></h4>
									<?php endif; ?>
									
									<?php if ( ! empty( $feature['text'] ) ) : ?>
										<p>
											<?php echo esc_html( $feature['text'] ); ?>
										</p>
									<?php endif; ?>
								</div><!-- /.feature__entry -->
							</div><!-- /.feature__content -->
						</div><!-- /.feature -->
					</div><!-- /.slider__slide swiper-slide -->
				<?php endforeach; ?>
			</div><!-- /.slider__slides swiper-wrapper -->

			<div class="slider__actions">
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div><!-- /.slider__actions -->
		</div><!-- /.slider__clip swiper-container -->
	</div><!-- /.slider slider-/-features -->
</section><!-- /.section-features -->