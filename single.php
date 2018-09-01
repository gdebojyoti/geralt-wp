<?php get_header() ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="row u-m0">
	<?php
		$thumbnail_url = get_the_post_thumbnail_url();
	?>
	<div class="c-post-header" style="background-image: url(<?php echo esc_attr($thumbnail_url) ?>)">
		<div class="container">
			<div class="c-post-header__date">
				<i class="fa fa-calendar-alt"></i>
				<?php the_date() ?>
			</div>

			<h1 class="c-post-header__title u-ts"><?php the_title() ?></h1>

			<div class="c-post-header__post-navs">
				<?php
					$prev_post = get_previous_post();
					if (!empty( $prev_post )): ?>
						<a class="c-post-header__post-nav post-header__nav-prev" href="<?php echo esc_attr($prev_post->guid) ?>">
							<i class="fa fa-chevron-circle-left u-vam"></i>
							<span class="c-post-header__nav-text u-to u-vam"><?php echo esc_attr($prev_post->post_title) ?></span>
						</a>
				<?php endif ?>

				<?php
					$next_post = get_next_post();
					if (!empty( $next_post )): ?>
						<a class="c-post-header__post-nav post-header__nav-next" href="<?php echo esc_attr($next_post->guid) ?>">
							<span class="c-post-header__nav-text u-to u-vam"><?php echo esc_attr($next_post->post_title) ?></span>
							<i class="fa fa-chevron-circle-right u-vam"></i>
						</a>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>
<?php endwhile ?>

<div class="container">

	<div class="row">
		<div class="col-md-8">
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID() ?>" <?php post_class() ?>>

					<article class="c-post">
						<div class="c-post__stats">
							<div class="c-post__stat">
								<div class="c-post__stat-caption">By</div>
								<div class="c-post__stat-text">
									<i class="fa fa-user"></i>
									<span class="author"><?php the_author() ?></span>
								</div>
							</div>
							<div class="c-post__stat">
								<div class="c-post__stat-caption">Categorized under</div>
								<div class="c-post__stat-text">
									<i class="fa fa-tags"></i>
									<?php the_category() ?>
								</div>
							</div>
						</div>

						<div class="content c-post__content">
							
							<?php the_content() ?>
							<p><?php the_tags() ?></p>

						</div>
					</article>

					<?php
						wp_link_pages( array(
							'before'           => '<p>' . __( 'Pages:', 'geralt' ),
							'after'            => '</p>',
							'link_before'      => '',
							'link_after'       => '',
							'next_or_number'   => 'number',
							'separator'        => ' ',
							'nextpagelink'     => __( 'Next page', 'geralt'),
							'previouspagelink' => __( 'Previous page', 'geralt' ),
							'pagelink'         => '%',
							'echo'             => 1
						) )
					?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif
					?>

				</div>
			<?php endwhile ?>
		</div>

		<div class="col-md-4">
			<?php
				require_once get_template_directory() . '/inc/post-sidebar.php'; // Include general card layout definition
				echo geralt_post_sidebar(array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ), 'Related Posts');
			?>

			<?php
				require_once get_template_directory() . '/inc/post-sidebar.php'; // Include general card layout definition
				echo geralt_post_sidebar(array( 'numberposts' => 5, 'post__not_in' => array($post->ID) ));
			?>
		</div>
	</div>

</div>

<?php get_footer() ?>