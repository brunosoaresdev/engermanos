<?php

  // add custom thumb sizes
	add_action('init', 'customThumbSizes');
  function customThumbSizes() {
    add_image_size('custom', 800, 600, true);
  }