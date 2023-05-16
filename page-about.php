<?php
  /* Template Name: About */
  get_header();
  _partials('_start');
?>
  
  <div class="container mx-auto my-20 px-5 sm:px-0">

    <article <?php post_class( 'flex flex-wrap items-start justify-between' ); ?>>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>				
        <div class="flex-1"><?php the_content(); ?></div>
        <div class="w-full max-w-full sm:max-w-2xl sm:ml-5 mt-5 sm:mt-0"><?php the_post_thumbnail(); ?></div>
      <?php endwhile; ?>
    </article>

	</div>

<?php
  _partials('_end');
  get_footer();