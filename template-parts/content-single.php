<?php
/**
 * The template for displaying the content of a single blog post
 *
 * @package Geralt
 * @since Geralt 0.1
 */
?>

<div id="post-<?php the_ID() ?>" <?php post_class() ?>>

  <article class="article-full-width">
    <h1 class="title"><?php the_title() ?></h1>

    <div class="details">
      <span class="detail">
        <i class="fa fa-user"></i>
        <span class="author"><?php the_author() ?></span>
      </span>
      <span class="detail">
        <i class="fa fa-calendar-alt"></i>
        <?php the_date() ?>
      </span>
      <span class="detail">
        <i class="fa fa-tags"></i>
        <?php the_category() ?>
      </span>
    </div>

    <p><?php // the_tags() ?></p>

    <?php
      $thumbnail_url = get_the_post_thumbnail_url();
    ?>
    <?php if ($thumbnail_url != null) : ?>
      <div class="thumbnail" style="background-image: url(<?php echo esc_attr($thumbnail_url) ?>)"></div>
    <?php endif ?>
    
    <div class="content">
      <?php the_content() ?>
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
    if (is_singular('post')) {
      the_post_navigation(array(
        'next_text' => 'Next article <i class="fa fa-arrow-right"></i>',
        'prev_text' => '<i class="fa fa-arrow-left"></i> Previous article'
      ));
    }
  ?>

  <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif
  ?>

</div>