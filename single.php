<?php get_header(); ?>
  <main class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article class="row justify-content-center">
      <div class="col-xs-12 col-lg-6">
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
      </div>
    </article>
    <?php endwhile; else : ?>
      <article class="row justify-content-center">
        <div class="col-xs-12 col-lg-6">
          <p>Sorry, no post was found!</p>
        </div>
      </article>
    <?php endif; ?>    
  </main>
<?php get_footer(); ?>