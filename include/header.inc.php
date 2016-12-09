<?php
if( isset( $_GET[ 'download_file' ] ) )
{
    $download = __ROOTDIR__
              . DIRECTORY_SEPARATOR
              . 'downloads'
              . DIRECTORY_SEPARATOR
              . $_GET[ 'download_file' ];
    
    if( file_exists( $download ) )
    {
        header( 'Pragma: public' );
        header( 'Content-type: ' );
        header(' Expires: 0' );
        header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
        header( 'Content-Type: application/octet-stream' );
        header( 'Content-Disposition: attachment; filename="' .  basename( $download ) . '"' );
        header( 'Content-Transfer-Encoding: binary' );
        header( 'Content-Length: '. filesize( $download ) );
        readfile( $download );
        exit();
    }
}
?>
<?php print'<?xml version="1.0" encoding="utf-8"?>' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://api.facebook.com/1.0/facebook.xsd" xml:lang="en" lang="en">
-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	
	<!--
	
	##################################################
	#                                                #
	#       Blood Sweat & Code (& Rock'N'Roll)       #
	#      Thanx for looking at the source code      #
	#                                                #
	#                eosgarden © 2010                #
	#                                                #
	##################################################
	
	-->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php print Eos_Menu::getInstance()->getRootLine(); ?></title>
	<link rel="schema.dc" href="http://purl.org/metadata/dublin_core_elements" />
	<link rel="stylesheet" href="/css/styles.php" type="text/css" media="all" charset="utf-8" />
	<link rel="stylesheet" href="/css/jquery/smoothness/jquery-ui-1.7.2.custom.css" type="text/css" media="all" charset="utf-8" />
	<link rel="stylesheet" href="/css/jquery/fancybox/jquery.fancybox-1.2.5.css" type="text/css" media="all" charset="utf-8" />
	<link title="eosgarden: <?php print Eos_Menu::getInstance()->getPageTitle( 'rss/articles' ); ?>" href="<?php print Eos_Menu::getInstance()->getPageUrl( 'rss/articles' ); ?>" type="application/rss+xml" rel="alternate" rev="alternate" />
	<link title="eosgarden: <?php print Eos_Menu::getInstance()->getPageTitle( 'rss/discussions' ); ?>" href="<?php print Eos_Menu::getInstance()->getPageUrl( 'rss/discussions' ); ?>" type="application/rss+xml" rel="alternate" rev="alternate" />
	<script src="/js/functions.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery/jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery/jquery-ui-1.7.2.custom.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery/jquery.masonry.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery/jquery.fancybox-1.2.5.pack.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery/jquery.bgiframe.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery/jquery.ajaxQueue.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery/thickbox.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/jquery/jquery.autocomplete.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/TopBarController.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/swfobject.js" type="text/javascript" charset="utf-8"></script>
	<meta http-equiv="content-language" content="<?php print Eos_Menu::getInstance()->getLanguage(); ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="eosgarden" />
	<meta name="DC.Creator" content="eosgarden" />
	<meta name="copyright" content="eosgarden &copy; 2010 - All rights reseverd - All wrongs reserved" />
	<meta name="DC.Rights" content="eosgarden &copy; 2010 - All rights reseverd - All wrongs reserved" />
	<meta name="description" content="<?php print Eos_Menu::getInstance()->getDescription(); ?>" />
	<meta name="DC.Description" content="<?php print Eos_Menu::getInstance()->getDescription(); ?>" />
	<meta name="keywords" content="<?php print Eos_Menu::getInstance()->getKeywords(); ?>" />
	<meta name="DC.Subject" content="<?php print Eos_Menu::getInstance()->getKeywords(); ?>" />
	<meta name="DC.Language" scheme="NISOZ39.50" content="<?php print Eos_Menu::getInstance()->getLanguage(); ?>" />
	<meta name="rating" content="General" />
	<meta name="robots" content="all" />
	<meta name="generator" content="BBEdit 9.2" />
	<script type="text/javascript" charset="utf-8">
		// <![CDATA[
		jQuery( document ).ready
		(
			function()
			{
				$( '.box-frameset' ).masonry();
				$( 'a.fancyBox' ).fancybox
				(
					{
						'zoomSpeedIn':	250,
						'zoomSpeedOut':	250,
						'overlayShow':	false
					}
				);
				$( '#navig' ).fadeIn( 'slow' );
				$( '#offer' ).fadeIn( 'slow' );
			}
		);
		jQuery( document ).ready
		(
			function()
			{
				$( '#searchBoxQuery' ).autocomplete( '/scripts/searchbox-autocomplete.php' );
			}
		);
		// ]]>
	</script>
	<?php if( $_SERVER[ 'SERVER_NAME' ] !== 'eosgarden.localhost' ): ?>
    <script type="text/javascript">
        // <![CDATA[
        
        (
            function( i, s, o, g, r, a, m )
            {
                i[ 'GoogleAnalyticsObject' ] = r;
                i[ r ]                       = i[ r ] || function()
                {
                    ( i[ r ].q = i[ r ].q || [] ).push( arguments )
                },
                i[ r ].l = 1 * new Date();
                a        = s.createElement( o ),
                m        = s.getElementsByTagName( o )[ 0 ];
                a.async  = 1;
                a.src    = g;
            
                m.parentNode.insertBefore( a, m )
            }
        )
        (
            window,
            document,
            'script',
            '//www.google-analytics.com/analytics.js',
            'ga'
        );
        
        ga( 'create', 'UA-51035898-3', 'eosgarden.com' );
        ga( 'require', 'displayfeatures' );
        ga( 'send', 'pageview' );
        
        // ]]>
    </script>

	<?php endif; ?>
	<!--[if IE 6]>
	<script type="text/javascript" charset="utf-8">
		// <![CDATA[
		var IE6UPDATE_OPTIONS = { icons_path: "/js/ie6update/images/" };
		// ]]>
	</script>
	<script type="text/javascript" src="/js/ie6update/ie6update.js" charset="utf-8"></script>
	<![endif]-->
</head>
<body>
	<div id="page">
	    <!--
		<div id="share">
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<div class="topbar-content">
						<h2>Thank you!</h2>
						<div class="share-services">
							<div class="share-service">
								<div class="share-service-icon">
									<a href="<?php //print Eos_Share_Helper::getInstance()->twitterUrl(); ?>" title="Share this page on Twitter"><img src="/css/pictures/furry-cushion/twitter-64.png" alt="" width="64" height="64" /></a>
								</div>
								<div class="share-service-link">
									<a href="<?php //print Eos_Share_Helper::getInstance()->twitterUrl(); ?>" title="Share this page on Twitter">Twitter</a>
								</div>
							</div>
							<div class="share-service">
								<div class="share-service-icon">
									<a href="<?php //print Eos_Share_Helper::getInstance()->facebookUrl(); ?>" title="Share this page on Facebook"><img src="/css/pictures/furry-cushion/facebook-64.png" alt="" width="64" height="64" /></a>
								</div>
								<div class="share-service-link">
									<a href="<?php //print Eos_Share_Helper::getInstance()->facebookUrl(); ?>" title="Share this page on Facebook">Facebook</a>
								</div>
							</div>
							<div class="share-service">
								<div class="share-service-icon">
									<a href="<?php //print Eos_Share_Helper::getInstance()->stumbleUrl(); ?>" title="Share this page on StumbleUpon"><img src="/css/pictures/furry-cushion/stumble-64.png" alt="" width="64" height="64" /></a>
								</div>
								<div class="share-service-link">
									<a href="<?php //print Eos_Share_Helper::getInstance()->stumbleUrl(); ?>" title="Share this page on StumbleUpon">StumbleUpon</a>
								</div>
							</div>
							<div class="share-service">
								<div class="share-service-icon">
									<a href="javascript:shareDelicious();" title="Share this page on Delicious"><img src="/css/pictures/furry-cushion/delicious-64.png" alt="" width="64" height="64" /></a>
								</div>
								<div class="share-service-link">
									<a href="javascript:shareDelicious();" title="Share this page on Delicious">Delicious</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<?php print Eos_Menu::getInstance()->getRootlineMenu() . chr( 10 ) ?>
		</div>
		<div id="twitter">
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<div class="topbar-content">
						<h2>Latest tweets from eosgarden</h2>
						<div>
							<?php //print new Eos_Twitter_Feed( 'eosgarden' ) . chr( 10 ); ?>
						</div>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<?php print Eos_Menu::getInstance()->getRootlineMenu() . chr( 10 ) ?>
		</div>
		-->
		<div id="search">
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<div class="topbar-content">
						<h2>Search this website</h2>
						<div>
							<form action="<?php print Eos_Menu::getInstance()->getPageUrl( 'search' ); ?>" method="post" id="searchBox">
								<div>
									<input name="q" id="searchBoxQuery" type="text" size="100" />
									<input name="searchSubmit" id="searchBoxSubmit" type="submit" value="Search" class="form-submit" />
								</div>
							</form>
						</div>
						<div class="search-tags">
							<?php print new Eos_Tag_Cloud(); ?>
						</div>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<?php print Eos_Menu::getInstance()->getRootlineMenu() . chr( 10 ) ?>
		</div>
		<div id="sitemap">
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<div class="topbar-content">
						<h2>Looking for a page?</h2>
						<div>
							<?php print new Eos_SiteMap( 2 ) . chr( 10 ) ?>
						</div>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<?php print Eos_Menu::getInstance()->getRootlineMenu() . chr( 10 ) ?>
		</div>
		<div id="header">
			<div class="left">
				<a href="<?php print Eos_Menu::getInstance()->getHomePageURL(); ?>" title="eosgarden"><img src="/css/pictures/logo.png" alt="" width="165" height="100" /></a>
			</div>
			<div class="right">
			    <!--
				<div id="share-link" class="left">
					<a href="#" onclick="javascript:TopBarController.getInstance().toggle( 'share', $( this ) );" title="Toggle the sharing options">Share</a>
				</div>
				<div id="twitter-link" class="left">
					<a href="#" onclick="javascript:TopBarController.getInstance().toggle( 'twitter', $( this ) );" title="Toggle the Twitter feed">Twitter feed</a>
				</div>
				-->
				<div id="search-link" class="left">
					<a href="#" onclick="javascript:TopBarController.getInstance().toggle( 'search', $( this ) );" title="Toggle the search box">Search</a>
				</div>
				<div id="sitemap-link" class="left">
					<a href="#" onclick="javascript:TopBarController.getInstance().toggle( 'sitemap', $( this ) );" title="Toggle the sitemap">Show sitemap</a>
				</div>
			</div>
		</div>
		<div id="navig">
			<div class="menu-start">&nbsp;</div>
			<?php print Eos_Menu::getInstance()->getMenuLevel( 1 ) . chr( 10 ); ?>
			<div class="menu-end">&nbsp;</div>
		</div>
		<?php
			
			if( Eos_Menu::getInstance()->isPreview() === true && $_SERVER[ 'SERVER_NAME' ] === 'eosgarden.localhost' )
			{
				print '<div class="preview"><h1>Preview</h1></div>';
			}
			
		?>
		
		<!--
        <div id="offer">
		    <div class="offer-image">
		        <img src="/uploads/image/macbundles.png" alt="" width="64" height="64" />
		    </div>
		    <div class="offer-text">
		        <a href="http://www.themacbundles.com/">The MacBundles<span class="small"> - No Games, No Hype, No Middlemen. Just GREAT Software at a GREAT Price &trade; - Get 50% off WebStart now!</span></a>
		    </div>
		</div>
		-->

		<!--
		<div id="top-news">
		    "I'm convinced that the only thing that kept me going was that I loved what I did." - Steve Jobs 1955-2011
		</div>
		-->
        
        <?php
            if( Eos_Menu::getInstance()->isHomePage() == false )
            {
        ?>
        
		<div id="top-news-close">
		    <div class="left">
                <img src="/uploads/image/closed.png" alt="" width="100" height="100" />
            </div>
            <div class="right">
                <strong>Important notice - 06 April 2013</strong><br /><br />
                All eosgarden activities have been <strong>closed forever</strong>, in order to focus on <a href="http://www.xs-labs.com/">new projects</a>.<br />
                The content of this website will stay as is, for archive purpose, but won't be updated anymore.<br />
                eosgarden software are <strong>still available</strong> for download, but are no <strong>longer maintained</strong>. Support is no longer available.
            </div>
		</div>
		
		<?php
		    }
		?>
		
		<div id="subnavig">
			<div id="page-title">
				<?php print Eos_Menu::getInstance()->getPageTitleHeader(); ?>
			</div>
			<div id="submenu">
				<?php print Eos_Menu::getInstance()->getMenuLevel( 3 ) . chr( 10 ); ; ?>
			</div>
		</div>
		<div id="content">



