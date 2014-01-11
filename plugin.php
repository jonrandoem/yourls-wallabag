<?php
/**
Plugin Name: Share to Poche
Plugin URI: https://github.com/jonrandoem/yourls-poche
Description: Add <a href="http://http://www.inthepoche.com/en/">Poche</a> to the list of Quick Share destinations
Version: 1.0
Author: JonRandoem
Author URI: https://github.com/jonrandoem/
**/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

yourls_add_action( 'share_links', 'jr_yourls_poche' );

function jr_yourls_poche( $args ) {
	list( $longurl, $shorturl, $title, $text ) = $args;
	$longurl = rawurlencode( $longurl );
	if ( defined('POCHE_URL') ) {
		$poche_url = POCHE_URL;
		echo <<<POCHE
		
		<style type="text/css">
		#share_poche{background:url('../user/plugins/yourls-poche/poche.png') left center no-repeat;}
		</style>
		
		<a id="share_poche"
			href="$poche_url/index.php?action=add&amp;plainurl=$longurl&amp;autoclose=true"
			title="Share to Poche"
			onclick="yourls_share_on_poche();return false;">Poche
		</a>
		
		<script type="text/javascript">
		// Send to Poche open window
		function yourls_share_on_poche() {
			var url = $('#share_poche').attr('href');
			window.open(url, 'poche', 'toolbar=no,width=800,height=600');
			return false;
		}
		// Dynamically update Poche link
		// when user clicks on the "Share" Action icon, event $('#tweet_body').keypress() is fired, so we'll add to this
		$('#tweet_body').keypress(function(){
			var title = encodeURIComponent( $('#titlelink').val() );
			var url = encodeURIComponent( $('#copylink').val() );
			var poche = '$poche_url/index.php?action=add&plainurl='+url+'&autoclose=true';
			$('#share_poche').attr('href', poche);		
		});
		</script>

POCHE;
	}
}