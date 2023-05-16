<?php
  get_header();
  _partials('_start');
  global $post;
?>

  <article <?php post_class( 'page' ); ?> >
    
    <div class="container mx-auto px-5 sm:px-0">
      <?php $i = 0; if ( have_posts() ): while( have_posts() ): the_post(); $i++; ?>
        <div class="flex flex-wrap sm:flex-nowrap items-center justify-between my-20">
          <?php if( wp_is_mobile() ) : ?>
            <div>
              <h2 class="text-3xl sm:text-4xl font-extrabold uppercase mb-5"><?php the_title(); ?></h2>
              <?php the_content(); ?>
            </div>
            <div class="max-w-3xl	w-full sm:ml-10 mt-5 sm:mt-0">
              <?php the_post_thumbnail(); ?>
            </div>
          <?php else : ?>
            
            <?php if ( $i % 2 != 0 ): ?>
              <div>
                <h2 class="text-3xl sm:text-4xl font-extrabold uppercase mb-5"><?php the_title(); ?></h2>
                <?php the_content(); ?>
              </div>
              <div class="max-w-3xl	w-full sm:ml-10 mt-5 sm:mt-0">
                <?php the_post_thumbnail(); ?>
              </div>

            <?php else : ?>
              <div class="max-w-3xl	w-full sm:mr-10 mt-5 sm:mt-0">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="<?php echo $post->post_name; ?>">
                <h2 class="text-3xl sm:text-4xl font-extrabold uppercase mb-5"><?php the_title(); ?></h2>
                <?php the_content(); ?>
              </div>
            <?php endif; ?>

          <?php endif; ?>
        </div>
      <?php
        endwhile;
        endif;
      ?>
    </div>
    
  </article>

<?php
  _partials('_end');
  get_footer();