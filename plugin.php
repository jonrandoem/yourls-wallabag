<?php
/**
Plugin Name: Share to Wallabag
Plugin URI: https://github.com/jonrandoem/yourls-wallabag
Description: Add <a href="https://www.wallabag.org/">Wallabag</a> to the list of Quick Share destinations
Version: 1.0
Author: JonRandoem
Author URI: https://github.com/jonrandoem/
**/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

yourls_add_action( 'share_links', 'jr_yourls_wallabag' );

function jr_yourls_wallabag( $args ) {
	list( $longurl, $shorturl, $title, $text ) = $args;
	$longurl = rawurlencode( $longurl );
	if ( defined('WALLABAG_URL') ) {
		$poche_url = WALLABAG_URL;
		echo <<<WALLABAG
		
		<style type="text/css">
		#share_wallabag{background:url('../user/plugins/yourls-wallabag/wallabag.png') left center no-repeat;}
		</style>
		
		<a id="share_poche"
			href="$poche_url/index.php?action=add&amp;plainurl=$longurl&amp;autoclose=true"
			title="Share to Wallabag"
			onclick="yourls_share_on_wallabag();return false;">Wallabag
		</a>
		
		<script type="text/javascript">
		// Send to Wallabag open window
		function yourls_share_on_wallabag() {
			var url = $('#share_wallabag').attr('href');
			window.open(url, 'wallabag', 'toolbar=no,width=800,height=600');
			return false;
		}
		// Dynamically update Poche link
		// when user clicks on the "Share" Action icon, event $('#tweet_body').keypress() is fired, so we'll add to this
		$('#tweet_body').keypress(function(){
			var title = encodeURIComponent( $('#titlelink').val() );
			var url = encodeURIComponent( $('#copylink').val() );
			var wallabag = '$poche_url/index.php?action=add&plainurl='+url+'&autoclose=true';
			$('#share_wallabag').attr('href', wallabag);		
		});
		</script>

WALLABAG;
	}
}