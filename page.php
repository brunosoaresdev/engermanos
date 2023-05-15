<?php
  get_header();
  _partials('_start');
?>
  
  <div class="container mx-auto my-20">

    <article <?php post_class( 'page' ); ?> >
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>				
        <div><?php the_content(); ?></div>
      <?php endwhile; ?>
    </article>

	</div>

<?php
  _partials('_end');
  get_footer();