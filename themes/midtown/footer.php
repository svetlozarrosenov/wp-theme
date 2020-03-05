			</div><!-- /.main -->
			<?php
			$footer = [
				'copyright' => do_shortcode(esc_html(carbon_get_theme_option('crb_copyright'))),
				'text' => do_shortcode(esc_html(carbon_get_theme_option('crb_footer_text'))),
			];
			?>
			<footer class="footer">
				<div class="footer__inner">
					<div class="footer__actions">
						<div class="footer__logo">
							<span><?php _e( 'Made In', 'crb' ); ?></span>
							
							<a href="<?php echo home_url('/'); ?>">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/footer-logo.jpg" alt="" />
							</a>
						</div><!-- /.footer__logo -->

						<nav class="footer__nav">
							<?php 
							if ( has_nav_menu('footer-menu-left') ) {
								wp_nav_menu( array(
									'theme_location' => 'footer-menu-left',
									'container' => ''
								) );
							}

							if ( has_nav_menu('footer-menu-right') ) {
								wp_nav_menu( array(
									'theme_location' => 'footer-menu-right',
									'container' => ''
								) );
							}
							?>
						</nav><!-- /.footer__nav -->
					</div><!-- /.footer__actions -->
					
					<?php if ( ! empty( $footer['copyright'] ) ) : ?>
						<div class="copyright">
							<p><?php echo $footer['copyright']; ?></p>
						</div><!-- /.copyright -->
					<?php endif; ?>
				</div><!-- /.footer__inner -->

				<div class="footer__bottom">
					<?php if ( ! empty( $footer['text'] ) ) : ?>
						<p><?php echo $footer['text']; ?></p>
					<?php endif; ?>

					<?php crb_render_fragment('common/socials'); ?>
				</div><!-- /.footer__bottom -->
			</footer><!-- /.footer -->
		</div><!-- /.wrapper__inner -->
	</div><!-- /.wrapper -->
	<?php wp_footer(); ?>
</body>
</html>