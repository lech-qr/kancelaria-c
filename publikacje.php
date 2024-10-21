<?php
/*
Template Name: Publikacje
*/
?>

<?php get_header(); ?>

<main class="container">
  <article class="row justify-content-center">
    <h2><?php echo get_cat_name(5); ?></h2>

            <?php
              // Get the current page number for pagination
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

              $args = array(
                  'cat' => 5, // Category ID 5
                  'posts_per_page' => 10, // Number of posts to display per page
                  'paged' => $paged, // Pass current page number for pagination
                  'orderby' => 'date', // Sort by date
                  'order' => 'DESC' // Newest to oldest
              );

              // Custom query
              $query = new WP_Query($args);

              // Check if the query returns any posts
              if ($query->have_posts()) :
                  // Loop through the posts
                  while ($query->have_posts()) : $query->the_post(); ?>
                  <div class="col-xs-12 col-lg-6">
                    <div class="card">
                      <div class="card-body">
                          <!-- Post Title -->
                          <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                          <h6 class="card-subtitle mb-2 text-muted">radca prawny <span><?php the_author(); ?></span></h6>
                          <!-- Post Date -->
                          <p><?php echo get_the_date(); ?></p>
                          
                          <!-- Post Excerpt -->
                          <p><?php the_excerpt(); ?></p>

                          <!-- Correct the link button -->
                          <a class="btn btn-light" href="<?php the_permalink(); ?>">Czytaj więcej</a>
                      </div>
                    </div>
                  </div>

                  <?php endwhile; ?>

<!-- Bootstrap 5 Pagination -->
<nav class="pagina" aria-label="navigation">
    <ul class="pagination justify-content-center">
        <?php
        // Get the pagination links
        $pagination_links = paginate_links(array(
            'total' => $query->max_num_pages, // Total number of pages
            'current' => $paged, // Current page
            'prev_text' => __('«'), // Previous page text
            'next_text' => __('»'), // Next page text
            'type' => 'array' // Return pagination as array to style each link
        ));

        // Loop through pagination links and apply Bootstrap 5 styles
        if (!empty($pagination_links)) {
            foreach ($pagination_links as $link) {
                $active = strpos($link, 'current') !== false ? ' active' : '';
                echo '<li class="page-item' . $active . '">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
            }
        }
        ?>
    </ul>
</nav>

            <?php else : ?>
                <p>No posts found.</p>
            <?php endif;

            // Reset post data after custom query
            wp_reset_postdata();
            ?>
            
            <div class="col-12">
            <?php
              $post_id = 86; // Your specific post ID
              $post = get_post($post_id);
              if ($post) {
                  echo '<h2>' . get_the_title($post_id) . '</h2>';
                  echo apply_filters('the_content', $post->post_content);
              }
              ?>              
            </div>
  </article>
</main>

<?php get_footer(); ?>
