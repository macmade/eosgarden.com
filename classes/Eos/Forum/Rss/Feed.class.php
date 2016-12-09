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

class Eos_Forum_Rss_Feed extends Eos_Rss_Feed
{
    const TABLE_POSTS      = 'FORUM_POSTS';
    const TABLE_THREADS    = 'FORUM_THREADS';
    const TABLE_CATEGORIES = 'FORUM_CATEGORIES';
    const TABLE_SECTIONS   = 'FORUM_SECTIONS';
    const POSTS_LIMIT      = 1000;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->_getPosts();
    }
    
    protected function _getPosts()
    {
        $posts = Eos_Database_Object::getObjectsByFields(
            self::TABLE_POSTS,
            array(
                'deleted' => 0
            ),
            'ctime DESC',
            self::POSTS_LIMIT
        );
        
        $threads    = array();
        $categories = array();
        $sections   = array();
        
        foreach( $posts as $id => $post ) {
            
            if( !isset( $threads[ $post->id_forum_thread ] ) ) {
                
                $threads[ $post->id_forum_thread ] = new Eos_Database_Object( self::TABLE_THREADS, $post->id_forum_thread );
            }
            
            $thread = $threads[ $post->id_forum_thread ];
            
            if( !isset( $categories[ $thread->id_forum_category ] ) ) {
                
                $categories[ $thread->id_forum_category ] = new Eos_Database_Object( self::TABLE_CATEGORIES, $thread->id_forum_category );
            }
            
            $category = $categories[ $thread->id_forum_category ];
            
            if( !isset( $sections[ $category->id_forum_section ] ) ) {
                
                $sections[ $category->id_forum_section ] = new Eos_Database_Object( self::TABLE_SECTIONS, $category->id_forum_section );
            }
            
            $section = $sections[ $category->id_forum_section ];
            
            $item              = $this->_rss->channel->addChild( 'item' );
            $item->title       = $section->name . ' - ' . $category->name . ' - ' . $thread->title;
            $item->description = $post->message;
            $item->pubDate     = date( 'r', $post->ctime );
            $item->link        = $this->_menu->getPageUrl(
                'support/discussions',
                array(
                    'forum[thread]' => $thread->getId(),
                    'forum[post]' => $post->getId(),
                )
            );
        }
    }
}
