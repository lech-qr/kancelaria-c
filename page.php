<?php get_header(); ?>
  <main class="container">
    <article class="row justify-content-center">
      <div class="col-xs-12 col-lg-6">
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
      </div>
    </article>
  </main>
<?php get_footer(); ?>