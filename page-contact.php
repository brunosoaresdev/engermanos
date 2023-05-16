<?php
  /* Template Name: Contact */
  get_header();
  _partials('_start');
?>
  
  <div class="container mx-auto my-20 px-5 sm:px-0">

    <article <?php post_class( 'flex flex-wrap items-start justify-between' ); ?> >
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>				
        <div class="flex-1"><?php the_content(); ?></div>
        <div class="w-full max-w-xl mt-10 sm:mt-0 sm:ml-5 flex justify-start sm:justify-end">
          <ul>
            <li class="flex items-center mb-8">
              <figure class="relative w-12 h-10 flex items-center justify-center m-0 mr-4 z-10 before:bg-orange before:absolute before:inset-0 before:-skew-x-12 before:-z-10 before:rounded">
                <img src="<?php images_url('ico-address.svg'); ?>" />
              </figure>
              <?php the_field('address_info', get_option('page_on_front')); ?>
            </li>
            <li class="flex items-center mb-8">
              <figure class="relative w-12 h-10 flex items-center justify-center m-0 mr-4 z-10 before:bg-orange before:absolute before:inset-0 before:-skew-x-12 before:-z-10 before:rounded">
                <img src="<?php images_url('ico-whatsapp.svg'); ?>" />
              </figure>
              <span class="phoneMask"><?php the_field('phone_info', get_option('page_on_front')); ?></span>
            </li>
            <?php if ( get_field('instagram_info', get_option('page_on_front')) ): ?>
            <li class="flex items-center mb-8">
              <figure class="relative w-12 h-10 flex items-center justify-center m-0 mr-4 z-10 before:bg-orange before:absolute before:inset-0 before:-skew-x-12 before:-z-10 before:rounded">
                <img src="<?php images_url('ico-instagram.svg'); ?>" />
              </figure>
              <a
                href="https://instagram.com/<?php the_field('instagram_info', get_option('page_on_front')); ?>"
                target="_blank"
              >
                @<?php the_field('instagram_info', get_option('page_on_front')); ?>
              </a>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      <?php endwhile; ?>
    </article>

	</div>

<?php
  _partials('_end');
  get_footer();