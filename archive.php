<?php
  get_header();
  _partials('_start');
  global $post;
?>

  <article <?php post_class( 'page' ); ?> >
    
    <div class="container mx-auto">
      <?php $i = 0; if ( have_posts() ): while( have_posts() ): the_post(); $i++; ?>
        <div class="flex items-center justify-between my-20">
          <?php if ( $i % 2 != 0 ): ?>
          <div>
            <h2 class="text-4xl font-extrabold uppercase mb-5"><?php the_title(); ?></h2>
            <?php the_content(); ?>
          </div>
          <div class="max-w-3xl	w-full ml-10">
            <?php the_post_thumbnail(); ?>
          </div>

          <?php
            else :
            // echo '<pre>',print_r($post,1),'</pre>';
          ?>
          <div class="max-w-3xl	w-full mr-10">
            <?php the_post_thumbnail(); ?>
          </div>
          <div class="<?php echo $post->post_name; ?>">
            <h2 class="text-4xl font-extrabold uppercase mb-5"><?php the_title(); ?></h2>
            <?php the_content(); ?>
          </div>
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