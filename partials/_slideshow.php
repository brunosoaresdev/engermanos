<?php
  $frontPageID = get_option('page_on_front');
  if( have_rows( 'rpt_slideshow', $frontPageID ) ):
?>
  <div class="banner z-0
    after:absolute after:bg-orange after:left-0 after:bottom-40 xl:after:bottom-32 2xl:after:bottom-64 after:z-10 after:w-2/5 after:h-1"
  >
    <?php
      while ( have_rows( 'rpt_slideshow', $frontPageID ) ) : the_row();
      $bg = get_sub_field('background');
      $link = get_sub_field('link');
    ?>
      <div
        class="relative aspect-video bg-no-repeat bg-cover flex items-center min-h-screen	sm:min-h-full px-5 sm:px-0
          before:absolute before:bg-black/80 before:inset-0 before:z-10"
        style="background-image: url(<?php echo $bg['url']; ?>); display: flex !important;"
      >
        <div class="container mx-auto text-white relative z-20">
          <div class="max-w-xl">
            <h2 class="text-4xl sm:text-7xl font-bold mb-2"><?php the_sub_field('title'); ?></h2>
            <div class="font-medium"><?php the_sub_field('content'); ?></div>
            <a
              class="btn--first"
              href="<?php echo $link['url']; ?>"
            >
              <?php echo $link['title']; ?>
            </a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>