<?php

function my_scripts_enqueue() {
    wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), NULL, true );
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, NULL, 'all' );

    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_style( 'bootstrap-css' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_enqueue' );

register_nav_menu('in_header','Header Menu');

add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 960, 480 );
add_image_size( 'featured', 1200, 600, true );
add_image_size( 'featuredmin', 225, 135, false );
add_image_size( 'col2', 465, 280, array( 'bottom', 'right' ) );
add_image_size( 'col1', 300, 180, array( 'bottom', 'right' ) );
add_image_size( 'sidepop', 100, 60, true );
add_image_size( 'catflow', 450, 300, true );


add_image_size( 'search', 300, 180, false );


// THIS LINKS THE THUMBNAIL TO THE POST PERMALINK
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

function my_post_image_html( $html, $post_id, $post_image_id ) {

	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';

	return $html;
}


function disqus_embed($disqus_shortname) {
    global $post;
    wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "'.$disqus_shortname.'";
        var disqus_title = "'.$post->post_title.'";
        var disqus_url = "'.get_permalink($post->ID).'";
        var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
    </script>';
}

function disqus_count($disqus_shortname) {
    wp_enqueue_script('disqus_count','http://'.$disqus_shortname.'.disqus.com/count.js');
    echo '<a href="'. get_permalink() .'#disqus_thread"></a>';
}

function mySearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','mySearchFilter');

//Remove click from post images
update_option( 'image_default_link_type', 'none' );
function no_atag_on_images($content){
return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content); }
add_filter('the_content', 'no_atag_on_images'); 

?>