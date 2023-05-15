<?php
  /* Template Name: About */
  get_header();
  _partials('_start');
?>
  
  <div class="container mx-auto my-20">

    <article <?php post_class( 'flex items-start justify-between' ); ?> >
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>				
        <div class="flex-1"><?php the_content(); ?></div>
        <div class="w-full max-w-2xl ml-5"><?php the_post_thumbnail(); ?></div>
      <?php endwhile; ?>
    </article>

	</div>

<?php
  _partials('_end');
  get_footer();