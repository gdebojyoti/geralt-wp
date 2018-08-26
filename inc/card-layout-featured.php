<?php

function geralt_card_layout_featured ($category_id) { echo ''?>

<div class="row mv-30 card-layout-featured">
	<div class="col-md-8">
		
		<?php
			$args = array(
				'cat'            => $category_id,
				'posts_per_page' => 1 // 1 primary post
			);
			$wp_query = new WP_Query( $args );
			while ($wp_query->have_posts()) : $wp_query->the_post();
		?>

			<article class="big-card">
				<?php
					$thumbnail_url = get_the_post_thumbnail_url();
				?>
				<?php if ($thumbnail_url == null) : ?>
					<div class="thumbnail"></div>
				<?php else : ?>
					<div class="thumbnail" style="background-image: url(<?php echo esc_attr($thumbnail_url) ?>)"></div>
				<?php endif ?>
				<div class="details">
					<h1 class="title"><?php the_title() ?></h1>
					<div class="description"><?php the_excerpt() ?></div>
					<a href="<?php the_permalink() ?>" class="btn btn-primary">Read more</a>
				</div>
			</article>

		<?php endwhile ?>

	</div>
	<div class="col-md-4">

		<h2 class="card-category txt-o"><?php echo get_cat_name($category_id) ?></h2>
		
		<?php
			$args = array(
				'cat'            => $category_id,
				'posts_per_page' => 4 // 4 side posts
			);
			$wp_query = new WP_Query( $args );
			$post_index = 0;
			while ($wp_query->have_posts()) : $wp_query->the_post();
		?>

			<?php if ($post_index > -1) : ?>

				<a class="small-card" href="<?php the_permalink() ?>">
					<?php
						$thumbnail_url = get_the_post_thumbnail_url();
					?>
					<?php if ($thumbnail_url == null) : ?>
						<div class="thumbnail"></div>
					<?php else : ?>
						<div class="thumbnail" style="background-image: url(<?php echo esc_attr($thumbnail_url) ?>)"></div>
					<?php endif ?>
					<div class="details">
						<h4 class="title"><?php the_title() ?></h4>
						<div class="single-line txt-o"><?php the_author() ?></div>
					</div>
				</a>

			<?php endif ?>

		<?php $post_index++; endwhile ?>

	</div>
</div>

<?php } ?>