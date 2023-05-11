<?php
  get_header();
  _partials('_start');
?>
  
  <div class="container">

    <article <?php post_class( 'page' ); ?> >
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>				
        <div class="content"><?php the_content(); ?></div>
      <?php endwhile; ?>
    </article>
    
    <div class="sidebar"><?php get_sidebar(); ?></div>

	</div>

<?php
  _partials('_end');
  get_footer();