<?php
/**
* This is where you can copy and paste your functions !
*/

add_filter('tc_credits_display', 'my_custom_credits');
function my_custom_credits(){ 
$credits = '';
$newline_credits = '';
return '
<div class="span4 credits">
    		    	<p> &middot; &copy; '.esc_attr( date( 'Y' ) ).' <a href="'.esc_url( home_url() ).'" title="'.esc_attr(get_bloginfo()).'" rel="bookmark">'.esc_attr(get_bloginfo()).'</a> &middot; '.($credits ? $credits : '').' '.($newline_credits ? '<br />&middot; '.$newline_credits.' &middot;' : '').'</p>		</div>';
}

//adds the script in the head of your theme
add_action ('wp_head' , 'add_fb_button_script');
 
function add_fb_button_script() {
 ?>
 <div id="fb-root"></div>
 <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1422160144746353',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
 <?php
}
 
// Defer Javascripts
// Defer jQuery Parsing using the HTML5 defer property
function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
        // return "$url' defer ";
        return "$url' defer onload='";
    }
add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );

