<?php
	// Load js files 
	add_action( 'wp_print_scripts', 'bsLoadJS' );
	function bsLoadJS(){
		if ( !is_admin() ) {
			// desregistrando o jquery nativo e registrando o do CDN do Google.
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, '3.2.1' );
			wp_enqueue_script( 'jquery' );

			$js = get_template_directory_uri() . '/assets/js/';
			// wp_enqueue_script( 'fa', 				'//kit.fontawesome.com/880a2d4fb0.js', ['jquery']);
			// wp_enqueue_script( 'fancybox', 	'//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.min.js', ['jquery'] );
			wp_enqueue_script( 'slick', 		'//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js', ['jquery'] );
			wp_enqueue_script( 'ui', 				'//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', ['jquery'] );
			// wp_enqueue_script( 'maps', 			'//maps.googleapis.com/maps/api/js?key=AIzaSyBiiSp9noWQYHvt1mFbgNhL8IKtjfmUM5g', ['jquery'] );
			// wp_enqueue_script( 'acf-maps', 	$js . 'maps.js', ['jquery'] );
			wp_enqueue_script( 'mask', 			$js . 'jquery.mask.min.js', ['jquery'] );
			wp_enqueue_script( 'main', 			$js . 'main.js', ['jquery'] );
		}
	}

	// Load css files */
	add_action('wp_enqueue_scripts', 'bsLoadCSS');
	function bsLoadCSS(){
		$css = get_template_directory_uri() . '/assets/css/';
		// wp_enqueue_style( 'fancybox', 		'//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.min.css' );
		wp_enqueue_style( 'slick', 				'//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
		wp_enqueue_style( 'slick-theme', 	'//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css' );
	}

	// add thumbnail support
	add_action( 'after_setup_theme', 'upcode_setup' );
	if ( ! function_exists( 'upcode_setup' ) ):
		function upcode_setup() {
			add_editor_style('assets/css/editor-style.css');
			add_theme_support( 'post-thumbnails' );
			register_nav_menus( array(
				'global' => __( 'Navegação Global', 'partner-programmer' ),
				'local' => __( 'Navegação Local', 'partner-programmer' ),
			) );
		}
	endif;

	// Register widget areas.
	add_action( 'widgets_init', 'bsWidgetsInit' );
	function bsWidgetsInit() {
		register_sidebar( [
			'name' => __( 'Sidebar', 'bsdev' ),
			'id' => 'sidebar-principal',
			'description' => __( 'Arraste os itens desejados até aqui. ', 'bsdev' ),
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="title--widget">',
			'after_title' => '</h3>',
		] );
	}

	// setup after activation theme
	add_action( 'after_switch_theme', 'upactivate' );
  function upactivate() {
    // we need to include the file below because the activate_plugin() function isn't normally defined in the front-end
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		include_once( ABSPATH . 'wp-admin/includes/file.php' );
    
		// activate pre-bundled plugins
		delete_plugins( ['akismet/akismet.php'] );
    activate_plugin( 'advanced-custom-fields-pro/acf.php' );
    activate_plugin( 'advanced-custom-fields-font-awesome/acf-font-awesome.php' );
    activate_plugin( 'contact-form-7/wp-contact-form-7.php' );
    activate_plugin( 'regenerate-thumbnails/regenerate-thumbnails.php' );
    activate_plugin( 'wp-pagenavi/wp-pagenavi.php' );
    activate_plugin( 'wordpress-seo/wp-seo.php' );
	}