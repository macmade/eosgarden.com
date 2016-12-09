<?php

Eos_Layout::getInstance()->disableHeader();
Eos_Layout::getInstance()->disableFooter();

$RSS = new Eos_Article_Rss_Feed();

$RSS->setTitle( 'eosgarden: ' . Eos_Menu::getInstance()->getPageTitle( 'rss/articles' ) );
$RSS->setLink( Eos_Menu::getInstance()->getPageUrl( 'articles/' ) );
$RSS->setDescription( 'Technical articles, covering Web development, Mac OS X & iPhone developement, computer science, software deployment, system administration, etc.' );
$RSS->getPages( 'articles/' );

header( 'Content-type: text/xml' );

print $RSS;

unset( $RSS );
