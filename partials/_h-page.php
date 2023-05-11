<?php
  global $post;
  $hpage = get_field('h_page', $post->ID);
?>

<div class="h-page" style="background-image: url(<?php echo $hpage; ?>);">
  <div class="container">
    <?php
      if ( function_exists('yoast_breadcrumb') ) :
        echo '<div class="bread">',
          yoast_breadcrumb(' <p id="breadcrumbs">','</p> ');
        echo '</div>';
      endif;

      if (is_home() || is_singular('post')) : echo '<h class="title__section">Notícias</h>';
      else : the_title('<h2 class="title__section">', '</h2>');
      endif;
    ?>
  </div>
</div>