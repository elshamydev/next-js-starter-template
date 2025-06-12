<?php get_header(); ?>

<main class="site-main container">
  <?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <h2 class="entry-title"><?php the_title(); ?></h2>
        </header>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
      <?php
    endwhile;
  else :
    ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'qatar-tender' ); ?></p>
    <?php
  endif;
  ?>
</main>

<?php get_footer(); ?>
