<?php

################################################################################
# Copyright (c) 2010, Jean-David Gadina <macmade@eosgarden.com>                #
# All rights reserved.                                                         #
#                                                                              #
# Redistribution and use in source and binary forms, with or without           #
# modification, are permitted provided that the following conditions are met:  #
#                                                                              #
#  -   Redistributions of source code must retain the above copyright notice,  #
#      this list of conditions and the following disclaimer.                   #
#  -   Redistributions in binary form must reproduce the above copyright       #
#      notice, this list of conditions and the following disclaimer in the     #
#      documentation and/or other materials provided with the distribution.    #
#  -   Neither the name of 'Jean-David Gadina' nor the names of its            #
#      contributors may be used to endorse or promote products derived from    #
#      this software without specific prior written permission.                #
#                                                                              #
# THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"  #
# AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE    #
# IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE   #
# ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE    #
# LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR          #
# CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF         #
# SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS     #
# INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN      #
# CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)      #
# ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE   #
# POSSIBILITY OF SUCH DAMAGE.                                                  #
################################################################################

# $Id$

final class Eos_Menu
{
    private static $_instance = NULL;
    private $_menu            = NULL;
    private $_pathInfos       = array();
    private $_lang            = '';
    private $_currentPath     = '';
    
    private function __construct()
    {
        $this->_pathInfos = explode( '/', $_SERVER[ 'REQUEST_URI' ] );
        
        array_shift( $this->_pathInfos );
        array_pop( $this->_pathInfos );
        
        $this->_lang = ( isset( $this->_pathInfos[ 0 ] ) ) ? $this->_pathInfos[ 0 ] : 'en';
        $menuPath    = __ROOTDIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'menu.' . $this->_lang . '.xml';
        
        if( !file_exists( $menuPath ) ) {
            
            $this->_lang = 'en';
            $menuPath    = __ROOTDIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'menu.' . $this->_lang . '.xml';
        }
        
        $this->_menu = simplexml_load_file( $menuPath );
        
        $relPathInfos = $this->_pathInfos;
        
        array_shift( $relPathInfos );
        
        $this->_currentPath = implode( '/', $relPathInfos );
    }
    
    public function __clone()
    {
        throw new Eos_Singleton_Exception(
            'Class ' . __CLASS__ . ' cannot be cloned',
            Eos_Singleton_Exception::EXCEPTION_CLONE
        );
    }
    
    public static function getInstance()
    {
        if( !is_object( self::$_instance ) ) {
            
            self::$_instance = new self();
        }
        
        return self::$_instance;
    }
    
    private function _getParams( array $params )
    {
        $query = '?';
        
        foreach( $params as $key => $value ) {
            
            $query .= urlencode( $key ) . '=' . urlencode( $value ) . '&';
        }
        
        return substr( $query, 0, -1 );
    }
    
    public function getRootLine( $sep = ' - ' )
    {
        $rootline = $this->_menu[ 'root' ];
        $menu     = $this->_menu;
        
        for( $i = 1; $i < count( $this->_pathInfos ); $i++ ) {
            
            $page = $this->_pathInfos[ $i ];
            
            if( !isset( $menu->$page ) ) {
                
                return $rootline;
            }
            
            $menu      = $menu->$page;
            
            if( isset( $menu->title ) && !empty( $menu->title ) )
            {
                $rootline .= $sep . htmlentities( $menu->title );
            }
            
            $menu      = $menu->sub;
        }
        
        return $rootline;
    }
    
    public function getRootLineMenu( $class = 'rootline' )
    {
        if( count( $this->_pathInfos ) == 1 ) {
            
            return '';
        }
        
        $rootline            = new Eos_Xhtml_Tag( 'div' );
        $rootline[ 'class' ] = $class;
        $menu                = $this->_menu;
        $list                = $rootline->ul;
        $item                = $list->li;
        $item[ 'class' ]     = 'start';
        $link                = $item->a;
        $path                = '/' . $this->_lang . '/';
        $link[ 'href' ]      = $path;
        $link[ 'title' ]     = $menu[ 'root' ];
        
        $link->addTextData( $menu[ 'root' ] );
        
        for( $i = 1; $i < count( $this->_pathInfos ); $i++ ) {
            
            $page = $this->_pathInfos[ $i ];
            
            if( !isset( $menu->$page ) ) {
                
                return $rootline;
            }
            
            $menu            = $menu->$page;
            $item            = $list->li;
            $link            = $item->a;
            $path           .= $this->_pathInfos[ $i ] . '/';
            $link[ 'href' ]  = $path;
            $link[ 'title' ] = htmlentities( $menu->title );
            
            $link->addTextData(  htmlentities( $menu->title ) );
            
            $menu = $menu->sub;
        }
        
        $item[ 'class' ] = 'end';
        
        return $rootline;
    }
    
    public function getHomePageURL()
    {
        return '/' . $this->_lang . '/';
    }
    
    public function getMenuLevel( $level, $showHidden = false )
    {
        if( !isset( $this->_pathInfos[ $level - 1 ] ) && $level > 1 ) {
            
            return new Eos_Xhtml_Comment( 'No available menu items' );
        }
        
        $menu = $this->_menu;
        $list = new Eos_Xhtml_Tag( 'ul' );
        $path = '/' . $this->_lang . '/';
        
        $list->useFormattedOutput( false );
        
        for( $i = 1; $i < count( $this->_pathInfos ); $i++ ) {
            
            $page = $this->_pathInfos[ $i ];
            
            if( !isset( $menu->$page ) && $i > 1 ) {
                
                return new Eos_Xhtml_Comment( 'No available menu items' );
            }
            
            if( $i == $level ) {
                
                break;
            }
            
            $menu  = $menu->$page;
            $menu  = $menu->sub;
            $path .= $page . '/';
        }
        
        if( !$menu )
        {
            return '';
        }
        
        if( $i > 1 ) {
            
            $menu = $menu->children();
        }
        
        foreach( $menu as $item ) {
            
            if( isset( $item[ 'preview' ] ) ) {
                
                continue;
            }
            
            if( isset( $item[ 'hidden' ] ) && $showHidden === false ) {
                
                continue;
            }
            
            $listItem        = $list->li;
            $link            = $listItem->a;
            $link[ 'href' ]  = $path . $item->getName() . '/';
            
            if( isset( $item->linkTitle ) ) {
            
                $link[ 'title' ] =  htmlentities( $item->linkTitle );
                
            } else {
            
                $link[ 'title' ] =  htmlentities( $item->title );
            }
            
            if( isset( $item->navTitle ) ) {
                
                $link->addTextData(  htmlentities( $item->navTitle ) );
                
            } else {
                
                $link->addTextData(  htmlentities( $item->title ) );
            }
            
            if( $link[ 'href' ] == $_SERVER[ 'REQUEST_URI' ] || strpos( $_SERVER[ 'REQUEST_URI' ], $link[ 'href' ] ) === 0 ) {
                
                $listItem[ 'class' ] = 'act';
            }
            
            if( isset( $item->anchor ) ) {
                
                $link[ 'href' ] .= '#' . $item->anchor;
            }
            
            if( isset( $item->redirect ) ) {
                
                $link[ 'href' ] = $item->redirect;
            }
        }
        
        return $list;
    }
    
    public function getPageTitleHeader( $lockOnLevel = 2 )
    {
        $header = new Eos_Xhtml_Tag( 'h1' );
        $menu   = $this->_menu;
        $path   = '/';
        
        for( $i = 1; $i < count( $this->_pathInfos ); $i++ ) {
            
            if( $i == $lockOnLevel + 1 ) {
                
                break;
            }
            
            $page = $this->_pathInfos[ $i ];
            
            if( !isset( $menu->$page ) ) {
                
                return new Eos_Xhtml_Comment( 'No available page title' );
            }
            
            $menu  = $menu->$page;
            $path .= $menu->getName() . '/';
            $menu  = $menu->sub;
        }
        
        $header->addChildNode( $this->getPageLink( $path ) );
        
        return $header;
    }
    
    public function getPageTitle( $path )
    {
        $path  = ( string )$path;
        $infos = explode( '/', $path );
        $menu  = $this->_menu;
        $title = '';
        
        if( $infos[ 0 ] === '' ) {
            
            array_shift( $infos );
        }
        
        if( $infos[ count( $infos ) - 1 ] === '' ) {
            
            array_pop( $infos );
        }
        
        foreach( $infos as $page ) {
            
            if( !isset( $menu->$page ) ) {
                
                return '';
            }
            
            $menu  = $menu->$page;
            $title =  htmlentities( $menu->title );
            $menu  = $menu->sub;
        }
        
        return $title;
    }
    
    public function isPreview( $path = '' )
    {
        $menu      = $this->_menu;
        
        if( $path )
        {
            $path      = ( substr( $path, 0, 1 ) !== '/' ) ? '/' . $path : $path;
            $path      = ( substr( $path, -1   ) !== '/' ) ? $path . '/' : $path;
            $pathInfos = explode( '/', $path );
            
            array_pop( $pathInfos );
        }
        else
        {
            $pathInfos = $this->_pathInfos;
        }
        
        for( $i = 1; $i < count( $pathInfos ); $i++ ) {
            
            $page = $pathInfos[ $i ];
            
            if( !isset( $menu->$page ) ) {
                
                return false;
            }
            
            $menu  = $menu->$page;
            
            if( isset( $menu[ 'preview' ] ) )
            {
                return true;
            }
            
            $menu  = $menu->sub;
        }
        
        return false;
    }
    
    public function getLanguage()
    {
        return $this->_lang;
    }
    
    public function redirectOnFirstSubpage()
    {
        $path = '/' . $this->_lang . '/';
        $menu = $this->_menu;
        
        for( $i = 1; $i < count( $this->_pathInfos ); $i++ ) {
            
            $page = $this->_pathInfos[ $i ];
            
            if( !isset( $menu->$page ) ) {
                
                return;
            }
            
            $menu  = $menu->$page;
            $path .= $menu->getName() . '/';
            $menu  = $menu->sub;
        }
        
        $children = $menu->children();
        
        if( !isset( $children[ 0 ] ) ) {
            
            return;
            
        } else {
            
            header( 'Location: ' . $path . $children[ 0 ]->getName() . '/' );
        }
    }
    
    public function getPageLink( $path, $customTitle = '', array $params = array() )
    {
        $path     = ( string )$path;
        $infos    = explode( '/', $path );
        $segments = count( $infos );
        $link     = new Eos_Xhtml_Tag( 'a' );
        $menu     = $this->_menu;
        $href     = '/' . $this->_lang . '/';
        
        if( $infos[ 0 ] === '' ) {
            
            array_shift( $infos );
            $segments--;
        }
        
        if( $infos[ $segments - 1 ] === '' ) {
            
            array_pop( $infos );
            $segments--;
        }
        
        for( $i = 0; $i < $segments; $i++ ) {
            
            $page = $infos[ $i ];
            
            if( !isset( $menu->$page ) ) {
                
                return ( string )new Eos_Xhtml_Comment( 'No available menu link (path: ' . $path . ')' );
            }
            
            $menu  = $menu->$page;
            $href .= $page . '/';
            
            if( $i === $segments - 1 ) {
                
                break;
            }
            
            $menu = $menu->sub;
        }
        
        $link[ 'href' ]  = $href;
        
        if( isset( $menu->linkTitle ) ) {
        
            $link[ 'title' ] = htmlentities( $menu->linkTitle );
            
        } else {
        
            $link[ 'title' ] = htmlentities( $menu->title );
        }
        
        if( $customTitle ) {
            
            $link->addTextData( $customTitle );
            
        } else {
            
            $link->addTextData(  htmlentities( $menu->title ) );
        }
        
        if( isset( $menu->anchor ) ) {
            
            $link[ 'href' ] .= '#' . $menu->anchor;
        }
        
        if( count( $params ) ) {
            
            $link[ 'href' ] .= $this->_getParams( $params );
        }
        
        if( isset( $menu->redirect ) ) {
            
            $link[ 'href' ] = $menu->redirect;
        }
        
        return $link;
    }
    
    public function getPageUrl( $path, array $params = array() )
    {
        $path     = ( string )$path;
        $infos    = explode( '/', $path );
        $segments = count( $infos );
        $link     = new Eos_Xhtml_Tag( 'a' );
        $menu     = $this->_menu;
        $href     = '/' . $this->_lang . '/';
        
        if( $infos[ 0 ] === '' ) {
            
            array_shift( $infos );
            $segments--;
        }
        
        if( isset( $infos[ $segments - 1 ] ) && $infos[ $segments - 1 ] === '' ) {
            
            array_pop( $infos );
            $segments--;
        }
        
        for( $i = 0; $i < $segments; $i++ ) {
            
            $page = $infos[ $i ];
            
            if( !isset( $menu->$page ) ) {
                
                return new Eos_Xhtml_Comment( 'No available menu link (path: ' . $path . ')' );
                
            }
            
            $menu  = $menu->$page;
            $href .= $page . '/';
            
            if( $i === $segments - 1 ) {
                
                break;
            }
            
            $menu = $menu->sub;
        }
        
        if( isset( $menu->anchor ) ) {
            
            $href .= '#' . $menu->anchor;
        }
        
        if( isset( $menu->redirect ) ) {
            
            $href = $menu->redirect;
        }
        
        if( count( $params ) ) {
            
            $href .= $this->_getParams( $params );
        }
        
        return $href;
    }
    
    public function getCurrentPageLink( $customTitle = '', array $params = array() )
    {
        return $this->getPageLink( $this->_currentPath, $customTitle, $params );
    }
    
    public function getCurrentPageUrl( array $params = array() )
    {
        return $this->getPageUrl( $this->_currentPath, $params );
    }
    
    public function getDescription()
    {
        $description = '';
        $menu        = $this->_menu;
        
        for( $i = 0; $i < count( $this->_pathInfos ); $i++ )
        {
            $page = $this->_pathInfos[ $i ];
            
            if( $i == 1 )
            {
                $menu = $menu->$page;
            }
            elseif( $i > 1 && isset( $menu->sub ) )
            {
                $menu = $menu->sub->$page;
            }
            
            if( isset( $menu[ 'description' ] ) && !isset( $menu[ 'preview' ] ) )
            {
                $description = ( string )$menu[ 'description' ];
            }
        }
        
        return $description;
    }
    
    public function getKeywords()
    {
        $keywords = array();
        $menu     = $this->_menu;
        
        for( $i = 0; $i < count( $this->_pathInfos ); $i++ )
        {
            $page = $this->_pathInfos[ $i ];
            
            if( $i == 1 )
            {
                $menu = $menu->$page;
            }
            elseif( $i > 1 && isset( $menu->sub ) )
            {
                $menu = $menu->sub->$page;
            }
            
            if( isset( $menu[ 'keywords' ] ) && !isset( $menu[ 'preview' ] ) )
            {
                $words = explode( ',', $menu[ 'keywords' ] );
                
                foreach( $words as $word )
                {
                    $keywords[ $word ] = trim( $word );
                }
            }
        }
        
        return implode( ', ', $keywords );
    }
    
    public function isHomePage()
    {
        return count( $this->_pathInfos ) < 2;
    }
}
