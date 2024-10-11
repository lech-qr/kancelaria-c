<?php get_header(); ?>
<main class="wrap container">
  <article class="row">
    <?php
      // Custom query to get posts from category 'zespol' and sort them by date (oldest first)
      $args = array(
          'orderby' => 'date',
          'order'   => 'ASC',
          'category_name' => 'zespol' // Replace with your category slug
      );

      $query = new WP_Query($args);

      if ( $query->have_posts() ) : 
        while ( $query->have_posts() ) : $query->the_post();
        ?>
          <div class="col-xs-12 col-md-6">
            <div class="card">
              <?php
                if (has_post_thumbnail($post_id)) {
                  echo get_the_post_thumbnail($post_id, 'large', array('class' => 'card-img-top'));  // 'large' is the size; you can change it to 'thumbnail', 'medium', etc.
                }   
              ?>
              <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                
                <!-- Display tags with better spacing -->
                <h6 class="card-subtitle mb-2 text-muted">
                  <?php
                    $tags = get_the_tags();
                    if ( $tags ) {
                        $tag_names = array();
                        foreach ( $tags as $tag ) {
                            $tag_names[] = $tag->name; // Get the tag name without link
                        }
                        echo implode(', ', $tag_names); // Output tag names as a comma-separated list
                    }
                  ?>
                </h6>
                
                <p class="card-text"><?php the_content(); ?></p>
              </div>
            </div>
          </div>
        <?php 
        endwhile; 

        // Reset post data after the loop
        wp_reset_postdata(); 
        
      else : ?>    
        <article>
          <p>Sorry, no posts were found!</p>
        </article>
      <?php endif; ?>
  </article>
</main>
<?php get_footer(); ?>
