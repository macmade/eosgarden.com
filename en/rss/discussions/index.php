<?php

Eos_Layout::getInstance()->disableHeader();
Eos_Layout::getInstance()->disableFooter();

$RSS = new Eos_Forum_Rss_Feed();

$RSS->setTitle( 'eosgarden: ' . Eos_Menu::getInstance()->getPageTitle( 'rss/discussions' ) );
$RSS->setLink( Eos_Menu::getInstance()->getPageUrl( 'support/discussions/' ) );
$RSS->setDescription( 'Latest posts from the public discussions.' );

header( 'Content-type: text/xml' );

print $RSS;

unset( $RSS );
