<?php
  // Filter Yoast Meta Priority
  add_filter( 'wpseo_metabox_prio', function() { return 'low';});

  // Custom WP Login
  add_action( 'login_head', 'bsdevCustomLogin' );
  add_filter( 'login_headerurl', 'bsdevCustomLoginUrl' );
  add_filter( 'login_headertitle', 'bsdevCustomLoginTitle' );
  function bsdevCustomLogin() {
    echo '<link media="all" type="text/css" href="'.get_template_directory_uri().'/assets/css/login-style.css" rel="stylesheet">';
    $bg = (get_field( 'logotipo', 'option' )) ? get_field( 'logotipo', 'option' ) : 'https://upcode.cloud/signature/logotipo.svg' ;
    ?>
      <style type="text/css" media="screen">
        body.login h1 a {
          background-image: url(<?php echo $bg; ?>);
          background-size: contain;
          background-position: center center;
        }
      </style>
    <?php
  }
  function bsdevCustomLoginUrl() { return home_url(); }
  function bsdevCustomLoginTitle() { return get_option('blogname'); }

  // Disables standard dashboard widgets
  add_action( 'admin_menu', 'disableDefaultDashboardWidgets' );
  function disableDefaultDashboardWidgets() {
    remove_meta_box( 'dashboard_browser_nag', 'dashboard', 'core' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );
  }

  // Load CSS files into Admin
  add_action( 'admin_enqueue_scripts', 'loadCustomAdminCSS' );
  function loadCustomAdminCSS() {
    wp_register_style( 'custom_wp_admin_css', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
  }

  // User ID on body-class
  add_filter( 'admin_body_class', 'idUserBodyClass' );
  function idUserBodyClass( $classes ) {
    global $current_user;
    $classes .= ' user-' . $current_user->ID;
    return trim( $classes );
  }

  // Allow upload extra filetypes
  add_filter('upload_mimes', 'extraUploadFiles');
  function extraUploadFiles($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }