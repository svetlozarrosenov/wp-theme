<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class( 'article-single' ); ?>>
		<header class="article__head">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="article__image">
					<?php the_post_thumbnail( 'large' ); ?>
				</div><!-- /.article__image -->
			<?php endif; ?>

			<h2 class="article__title">
				<?php the_title(); ?>
			</h2><!-- /.article__title -->

			<?php get_template_part( 'fragments/post-meta' ); ?>
		</header><!-- /.article__head -->

		<div class="article__body">
			<div class="article__entry richtext-entry">
				<?php the_content(); ?>
			</div><!-- /.article__entry -->
		</div><!-- /.article__body -->
	</article><!-- /.article -->

	<?php comments_template(); ?>

	<?php
	$prev_post = get_adjacent_post( false, '', false );
	$next_post = get_adjacent_post();

	if ( $next_post || $prev_post ) :
	?>
		<div class="paging">
			<?php
			if ( ! empty( $prev_post ) ) {
				printf( '<a href="%s" class="paging__prev">%s</a>',
					get_permalink( $prev_post ), esc_html__( '« Previous Entry', 'crb' )
				);
			}

			if ( ! empty( $next_post ) ) {
				printf( '<a href="%s" class="paging__next">%s</a>',
					get_permalink( $next_post ), esc_html__( 'Next Entry »', 'crb' )
				);
			}
			?>
		</div><!-- /.paging -->
	<?php endif; ?>
<?php endwhile; ?>
