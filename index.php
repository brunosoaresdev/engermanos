<?php
  get_header();
  _partials('_start');
?>

  <article <?php post_class( 'page page__recipes' ); ?> >
    
    <div class="container">
      <div class="recipes d-flex justify-content-between">
        <?php if ( have_posts() ): while( have_posts() ): the_post(); ?>
          <div class="box__recipe">
            <a href="<?php the_permalink(); ?>">
              <figure><?php the_post_thumbnail( 'full', ['class' => 'img-fluid'] ); ?></figure>
            </a>
            <h3><?php the_title(); ?></h3>
            <p><?php echo content(20); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn__orange">Saiba mais</a>
          </div>
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