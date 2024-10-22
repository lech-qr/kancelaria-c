<?php get_header(); ?>
<main class="container">
  <article class="row justify-content-center">
    <div class="col-xs-12 col-lg-6">
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>   
    </div>
    <?php if (has_post_thumbnail($post_id)) { ?> 
      <div class="col-xs-12 col-lg-6 text-end">
        <?php echo get_the_post_thumbnail($post_id, 'large'); ?>
      </div>
    <?php  wp_reset_postdata();
    }      
    ?>    
  </article>
</main>
<?php get_footer(); ?>