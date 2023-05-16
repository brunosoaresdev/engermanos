<div class="relative pb-6 z-0 after:absolute after:bg-orange after:left-0 after:bottom-0 after:z-10 after:h-1 after:w-1/5">
  <div class="container mx-auto my-10 px-5 sm:px-0">
    <?php if ( is_archive() ) : ?>
      <h2 class="text-4xl sm:text-5xl font-bold text-black-light"><?php echo post_type_archive_title( '', false ); ?></h2>
    <?php else : ?>
      <?php the_title('<h2 class="text-4xl sm:text-5xl font-bold text-black-light">', '</h2>'); ?>
    <?php endif; ?>
  </div>
</div>