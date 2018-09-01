<?php

function geralt_post_sidebar ($arr = [], $sidebar_title = "Recent Posts") { echo ''?>

  <?php
    $posts = get_posts($arr);
    if( $posts ) : ?>
      <div class="c-post-sidebar">
        <h2 class="c-post-sidebar__heading u-to"><?php echo $sidebar_title ?></h2>
      
        <?php foreach( $posts as $post ) {
        setup_postdata($post); ?>

          <a href="<?php echo get_permalink($post->ID) ?>" class="c-post-sidebar__item">
            <div class="c-post-sidebar__thumbnail" style="background-image: url(<?php echo esc_attr(get_the_post_thumbnail_url($post->ID)) ?>)"></div>
            <div class="c-post-sidebar__details">
              <div class="c-post-sidebar__title"><?php echo get_the_title( $post->ID ) ?></div>
              <div class="c-post-sidebar__author"><?php echo get_the_author_meta('display_name', get_post($post->ID)->post_author) ?></div>
            </div>
          </a>
        
        <?php } ?>

      </div>
    <?php endif ?>

<?php } ?>