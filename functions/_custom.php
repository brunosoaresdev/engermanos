<?php
  // suporte of title
  add_theme_support( 'title-tag' );
  add_filter( 'get_user_option_admin_color','bsAdminColor' );
  add_filter( 'embed_oembed_html', 'wrapEmbedWithDiv', 10, 3 );

  function _partials($file) { include BS_PARTIALS_PATH . $file.'.php'; }
  function _loop($file) { include BS_LOOP_PATH . $file.'.php'; }
  function images_url($file) { echo get_stylesheet_directory_uri() . '/assets/images/'. $file; }
  function get_images_url($file) { return get_stylesheet_directory_uri() . '/assets/images/'. $file; }
  function bsAdminColor() { return 'modern'; }
  function wrapEmbedWithDiv($html, $url, $attr) { return "<div class=\"embed-container\">".$html."</div>"; }

  function bsAcfInit() {
    acf_update_setting('google_api_key', 'AIzaSyBiiSp9noWQYHvt1mFbgNhL8IKtjfmUM5g');
  }
  add_action('acf/init', 'bsAcfInit');  
  
  // custom excerpt
  function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if ( count($content)>=$limit ) :
      array_pop($content);
      $content = implode(" ",$content).'...';
    else : $content = implode(" ",$content);
    endif;
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return strip_tags($content);
  }

  // Custom Excerpt function for Advanced Custom Fields
  function wp_trim_excerpt_modified($text, $content_length = 55, $remove_breaks = false) {
    if ( '' != $text ) {
      $text = strip_shortcodes( $text );
      $text = excerpt_remove_blocks( $text );
      $text = apply_filters( 'the_content', $text );
      $text = str_replace(']]>', ']]&gt;', $text);
      $num_words = $content_length;
      $original_text = $text;
      $text = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $text );

      // Here is our modification
      // Allow <p> and <strong>
      $text = strip_tags($text);

      if ( $remove_breaks )
        $text = preg_replace('/[\r\n\t ]+/', ' ', $text);
      $text = trim( $text );
      if ( strpos( _x( 'words', 'Word count type. Do not translate!' ), 'characters' ) === 0 && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
        $text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $text ), ' ' );
        preg_match_all( '/./u', $text, $words_array );
        $words_array = array_slice( $words_array[0], 0, $num_words + 1 );
        $sep = '';
      } else {
        $words_array = preg_split( "/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY );
        $sep = ' ';
      }
      if ( count( $words_array ) > $num_words ) {
        array_pop( $words_array );
        $text = implode( $sep, $words_array );
      } else {
        $text = implode( $sep, $words_array );
      }
    }
    return $text;
  }