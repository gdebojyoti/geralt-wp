<?php
/**
 * The main template file
 *
 * @package Geralt
 * @since Geralt 0.1
 */
?>

<?php get_header() ?>

<!-- <div class="jumbotron">
	<div class="container text-center">
		<h1><?php bloginfo('name') ?></h1>
		<h3><?php bloginfo('description') ?></h3>
	</div>
</div> -->

<?php get_header() ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
      <?php
        $page_title = single_term_title('', false);
        if ($page_title) : ?>
          <div class="tag"><?php echo $page_title ?></div>
      <?php endif ?>
      
      <?php while ( have_posts() ) : the_post(); ?>

        <article class="article-full-width">
          <a href="<?php the_permalink() ?>"><h4 class="title"><?php the_title() ?></h4></a>
          <div class="details">
						<span class="detail">
              <i class="fa fa-user"></i>
              <span class="author"><?php the_author() ?></span>
            </span>
						<span class="detail">
              <i class="fa fa-calendar-alt"></i>
              <?php the_date() ?>
            </span>
          </div>
          <?php
						$thumbnail_url = get_the_post_thumbnail_url();
					?>
					<?php if ($thumbnail_url == null) : ?>
						<div class="thumbnail"></div>
					<?php else : ?>
						<div class="thumbnail" style="background-image: url(<?php echo esc_attr($thumbnail_url) ?>)"></div>
					<?php endif ?>
        </article>
      
      <?php endwhile ?>
		</div>

		<div class="col-md-4">
			<?php get_sidebar() ?>
		</div>
	</div>
</div>

<?php get_footer() ?>