<?php
  get_header();
  _partials('_start');
?>

  <article <?php post_class( 'page' ); ?> >
    
    <div class="container mx-auto">
      <div>
        <?php if ( have_posts() ): while( have_posts() ): the_post(); ?>
        <?php
          endwhile;
          endif;
        ?>
      </div>
    </div>
    
  </article>

<?php
  _partials('_end');
  get_footer();