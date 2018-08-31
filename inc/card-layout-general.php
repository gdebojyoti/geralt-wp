<?php

function geralt_card_layout_general ($category_id) { echo ''?>

<div class="row section">
	<div class="col-md-12">
		<h2 class="mt-70 txt-o">Latest posts<?php echo get_cat_name($category_id) ?></h2>
	</div>
</div>
<div class="row">
	
	<?php
		$args = array(
			'cat'            => $category_id,
			'posts_per_page' => 10 // 10 posts
		);
		$wp_query = new WP_Query( $args );
		$post_index = 0;
		while ($wp_query->have_posts()) : $wp_query->the_post();
	?>

		<?php if ($post_index > -1) : ?>

			<?php
				$thumbnail_url = get_the_post_thumbnail_url();
			?>
			<div class="col-md-4 mt-20_">
				<article class="c-card">
					<div class="c-card__thumbnail" style="background-image: url(<?php echo esc_attr($thumbnail_url) ?>)"></div>
					<div class="c-card__info">
						<a class="c-card__basic" href="<?php the_permalink() ?>">
							<h1 class="c-card__title"><?php the_title() ?></h1>
							<div class="c-card__excerpt"><?php the_excerpt() ?></div>
						</a>
						<div class="c-card__footer">
							<div class="c-card__author"><?php the_author() ?></div>
							<div class=""><?php the_author() ?></div>
						</div>
					</div>

					<div class="c-card__categories">
						<span class="c-card__category">Featured</span>
					</div>
				</article>
			</div>

		<?php endif ?>

	<?php $post_index++; endwhile ?>

</div>

<?php } ?>