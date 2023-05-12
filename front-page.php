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

<?php
  _partials('_end');
  get_footer();