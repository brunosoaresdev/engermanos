<?php
  get_header();
  _partials('_start');
?>

  <article <?php post_class( 'single' ); ?>></article>

<?php
  _partials('_end');
  get_footer();