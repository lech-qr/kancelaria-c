<?php
/*
Template Name: Main page
*/
?>

<?php get_header(); ?>
<div id="carousel_mp" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel_mp" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carousel_mp" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carousel_mp" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <?php
    // Set up a query to get posts from category 6
    $args = array(
        'category__in' => 6,  // Category ID
        'posts_per_page' => 3,  // Number of posts to display
        'orderby' => 'date',
        'order' => 'ASC' // Oldest post first
    );
    $query = new WP_Query($args);
    $count = 0;

    // Loop through the posts
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Determine if it's the first item for the 'active' class
            $active_class = ($count == 0) ? 'active' : '';
            ?>
            <a href="<?php the_permalink(); ?>" class="carousel-item <?php echo $active_class; ?>">
                <video class="d-block w-100" autoplay muted loop>
                    <source src="<?php echo get_template_directory_uri(); ?>/images/slide_<?php echo $count + 1; ?>.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="carousel-caption">
                    <h5><?php the_title(); ?></h5>
                </div>
            </a>
            <?php
            $count++;
        endwhile;
        wp_reset_postdata();  // Reset post data
    else :
        echo '<p>No posts found.</p>';
    endif;
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carousel_mp" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel_mp" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<script>
  // Funkcja, która odtwarza lub zatrzymuje wideo w zależności od aktywności slajdu
  var videoCarousel = document.getElementById('videoCarousel');
  
  videoCarousel.addEventListener('slide.bs.carousel', function (event) {
    var activeVideo = event.relatedTarget.querySelector('video');
    var allVideos = videoCarousel.querySelectorAll('video');

    // Zatrzymanie wszystkich wideo
    allVideos.forEach(function(video) {
      video.pause();
    });

    // Sprawdzenie czy nowy slajd ma wideo i włączenie odtwarzania
    if (activeVideo) {
      activeVideo.play();
    }
  });

  // Automatyczne odtwarzanie wideo na pierwszym slajdzie (bo jest aktywny na starcie)
  window.addEventListener('load', function() {
    var activeVideo = document.querySelector('.carousel-item.active video');
    if (activeVideo) {
      activeVideo.play();
    }
  });
</script>
<main class="container">
  <article class="row justify-content-center">
    <?php
      $post_id = 1;
      $post = get_post($post_id);
    ?>
    <div class="col-xs-12 col-lg-6">
      <?php
        if ($post) {
            echo apply_filters('the_content', $post->post_content);
        }
      ?>    
    </div>
    <div class="col-xs-12 col-lg-6 text-end">
      <?php
        if ($post) {
          if (has_post_thumbnail($post_id)) {
              echo get_the_post_thumbnail($post_id, 'large');
          }
        wp_reset_postdata();
      }      
      ?>
    </div>
  </article>
</main>

<?php get_footer(); ?>