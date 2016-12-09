<?php
    
    Eos_Layout::getInstance()->disableFooter();
    Eos_Layout::getInstance()->disableHeader();
    
    $SITEMAP = new Eos_Google_SiteMap();
    
    header( 'Content-type: text/xml' );
    
    print $SITEMAP;
