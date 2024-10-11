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
    <div class="carousel-item active">
      <video class="d-block w-100" autoplay muted loop>
        <source src="<?php echo get_template_directory_uri(); ?>/images/slide_1.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="carousel-caption">
        <h5>Kompleksowe usługi prawne.</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <video class="d-block w-100" autoplay muted loop>
      <source src="<?php echo get_template_directory_uri(); ?>/images/slide_3.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="carousel-caption">
        <h5>Reprezentowanie podmiotów gospodarczych.</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <video class="d-block w-100" autoplay muted loop>
        <source src="<?php echo get_template_directory_uri(); ?>/images/slide_2.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="carousel-caption">
        <h5>Usługi prawne dla klientów indywidualnych.</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
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
      $post_id = 1;  // ID posta, który chcesz wstawić
      $post = get_post($post_id);  // Pobranie posta    
    ?>
    <div class="col-xs-12 col-md-6">
      <?php
        if ($post) {
            // Wyświetlenie treści posta
            echo apply_filters('the_content', $post->post_content);
        }
      ?>    
    </div>
    <div class="col-xs-12 col-md-2 text-end">
      <?php
        if ($post) {
          // Display the featured image (if it exists)
          if (has_post_thumbnail($post_id)) {
              echo get_the_post_thumbnail($post_id, 'large');  // 'large' is the size; you can change it to 'thumbnail', 'medium', etc.
          }

        // Reset the global $post variable (to avoid issues with the rest of the page)
        wp_reset_postdata();
      }      
      ?>
    </div>
  </article>
</main>

<?php get_footer(); ?>