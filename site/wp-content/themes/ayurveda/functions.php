<?php
#--------------------------------------------------------------------------------------------------

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'wp_generator' );

#--------------------------------------------------------------------------------------------------

//function remove_rel_tag( $text )
//{
//  $text = str_replace( 'rel="category tag"', 'rel="category"', $text );
//  return $text;
//}
//
//add_filter( 'the_category', 'remove_rel_tag' );

#--------------------------------------------------------------------------------------------------

if ( function_exists( 'register_sidebars' ) )
{
  register_sidebars( 3,
    array(
        'before_widget' => ''
      , 'after_widget' => ''
      , 'before_title' => '<h3>'
      , 'after_title' => '</h3>'
      )
  );
}

#--------------------------------------------------------------------------------------------------

# add_action('template_redirect', 'wpse_44152_template_redirect');

function wpse_44152_template_redirect()
{
  global $wp_filter;
  print_r($wp_filter['the_content']);
}

#--------------------------------------------------------------------------------------------------
# Disable Heartbeat

add_action( 'init', 'stop_heartbeat', 1 );

function stop_heartbeat()
{
  wp_deregister_script( 'heartbeat' );
}

#--------------------------------------------------------------------------------------------------
# Disable the emoji's

function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param    array  $plugins
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

#--------------------------------------------------------------------------------------------------
# Disable JSON REST API

add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');


function remove_json_api () {

    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );

    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );

   // Remove all embeds rewrite rules.
   //   add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}
add_action( 'after_setup_theme', 'remove_json_api' );


function disable_json_api () {

  // Filters for WP-API version 1.x
  add_filter('json_enabled', '__return_false');
  add_filter('json_jsonp_enabled', '__return_false');

  // Filters for WP-API version 2.x
  add_filter('rest_enabled', '__return_false');
  add_filter('rest_jsonp_enabled', '__return_false');

}
add_action( 'after_setup_theme', 'disable_json_api' );

#--------------------------------------------------------------------------------------------------
# Disable Search Action

add_filter('disable_wpseo_json_ld_search', '__return_true');
add_filter('wpseo_json_ld_output', '__return_true');

#--------------------------------------------------------------------------------------------------
# Disable Plugins Update

function disable_plugin_updates( $value ) {
#   unset( $value->response['si-captcha-for-wordpress/si-captcha.php'] );
#   unset( $value->response['si-contact-form/si-contact-form.php'] );
   return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );

#--------------------------------------------------------------------------------------------------
# add hatom data

function add_suf_hatom_data($content) {
    $t = get_the_modified_time('F jS, Y');
    $author = get_the_author();
    $title = get_the_title();
  if (is_home() || is_singular() || is_archive() ) {
        $content .= '<div class="hatom-extra" style="display:none;visibility:hidden;"><span class="entry-title">'.$title.'</span> was last modified: <span class="updated"> '.$t.'</span> by <span class="author vcard"><span class="fn">'.$author.'</span></span></div>';
    }
    return $content;
    }
add_filter('the_content', 'add_suf_hatom_data');

#--------------------------------------------------------------------------------------------------
# remove dns prefetch
function remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( wp_dependencies_unique_hosts(), $hints );
    }

    return $hints;
}

add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );

#--------------------------------------------------------------------------------------------------
# change the og:locale output

function yst_wpseo_change_og_locale( $locale ) {
 	return 'ru_RU';
}
add_filter( 'wpseo_locale', 'yst_wpseo_change_og_locale' );


#--------------------------------------------------------------------------------------------------
?>
