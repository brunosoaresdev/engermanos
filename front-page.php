<?php
  get_header();
  _partials('_start');
?>  

  <section>
    <div class="container flex items-start justify-between mx-auto my-16">
      <?php
        $services = get_field('services');
        foreach ($services as $service) :
        $ico = get_field('ico_service', $service->ID);
      ?>
        <a
          href="#"
          data-target="defaultModal-<?php echo $service->ID; ?>" data-toggle="modal"
          class="flex-col items-center w-1/5"
        >
          <figure class="flex items-center justify-center bg-orange w-36 h-36 rounded-full mx-auto mb-4"><img src="<?php echo $ico['url']; ?>" alt=""></figure>
          <h2 class="text-2xl font-bold text-center"><?php echo $service->post_title; ?></h2>
        </a>
      <?php endforeach; ?>
    </div>
  </section>

  <?php if ( have_rows( 'rpt_mvv', get_option('page_on_front') ) ) : ?>
    <section class="my-20">
      <div class="container mx-auto flex items-stretch">
        <?php
          $i = 0; while ( have_rows( 'rpt_mvv', get_option('page_on_front') ) ) : the_row(); $i++;
          $ico = get_sub_field('ico');
          if ( $i === 1 ) {
            $bg = 'bg-black-light/20';
          } elseif ( $i === 2 ) {
            $bg = 'bg-black-light';
            $color = 'text-white';
          } else {
            $bg = 'bg-orange';
            $color = 'text-black-light';
          }
          
        ?>
          <div class="flex items-start justify-between w-1/3 p-5 <?php echo $bg; ?>">
            <figure class="flex w-20 m-0 mr-8">
              <img src="<?php echo $ico['url']; ?>" class="w-20">
            </figure>
            <div class="flex-1">
              <h3 class="font-bold text-2xl mb-4 <?php echo $color; ?>"><?php the_sub_field('title'); ?></h3>
              <p class="<?php echo $color; ?>"><?php the_sub_field('description'); ?></p>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </section>
  <?php endif; ?>

<?php
  _partials('_end');
  get_footer();