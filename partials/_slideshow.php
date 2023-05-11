<?php if( have_rows( 'rpt_slideshow', 47 ) ): ?>
  <div class="banner z-0 after:absolute after:bg-orange after:left-0 after:bottom-64 after:z-10 after:w-2/5	after:h-1">
    <?php
      while ( have_rows( 'rpt_slideshow', 47 ) ) : the_row();
      $bg = get_sub_field('background');
      $link = get_sub_field('link');
    ?>
      <div
        class="relative aspect-video bg-no-repeat bg-cover flex items-center before:absolute before:bg-black/80 before:inset-0 before:z-10"
        style="background-image: url(<?php echo $bg['url']; ?>); display: flex !important;"
      >
        <div class="container mx-auto text-white relative z-20">
          <div class="max-w-xl">
            <h2 class="text-7xl font-bold mb-2"><?php the_sub_field('title'); ?></h2>
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