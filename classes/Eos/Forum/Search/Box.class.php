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

class Eos_Forum_Search_Box extends Eos_Forum_Base
{
    public function __construct()
    {
        parent::__construct();
        
        $form               = $this->_content->form;
        $form[ 'action' ]   = $this->_menu->getCurrentPageUrl( array( 'forum[search]' => 1 ) );
        $form[ 'name' ]     = 'forum-searchbox';
        $form[ 'id' ]       = 'forum-searchbox';
        $form[ 'method' ]   = 'post';
        
        $this->_createFields( $form );
    }
    
    protected function _createFields( Eos_Xhtml_Tag $form )
    {
        $searchbox = $form->div;
        $inputDiv  = $searchbox->div;
        $submitDiv = $searchbox->div;
        $label     = $inputDiv->label;
        $input     = $inputDiv->input;
        $submit    = $submitDiv->input;
        
        $searchbox[ 'class' ] = 'forum-searchbox';
        $inputDiv[ 'class' ]  = 'forum-searchbox-input';
        $submitDiv[ 'class' ] = 'forum-searchbox-submit';
        
        $label[ 'for' ]    = 'forum-search-word';
        $input[ 'id' ]     = 'forum-search-word';
        $input[ 'name' ]   = 'forum[searchWord]';
        $input[ 'type' ]   = 'text';
        $input[ 'size' ]   = '50';
        $submit[ 'type' ]  = 'submit';
        $submit[ 'id' ]    = 'forum-search-submit';
        $submit[ 'name' ]  = 'forum[search][submit]';
        $submit[ 'value' ] = $this->_lang->submit;
        
        if( isset( $_POST[ 'forum' ][ 'searchWord' ] ) ) {
            
            $input[ 'value' ]  = $_POST[ 'forum' ][ 'searchWord' ];
            
        } elseif( isset( $_GET[ 'forum' ][ 'searchWord' ] ) ) {
            
            $input[ 'value' ]  = $_GET[ 'forum' ][ 'searchWord' ];
        }
        
        $label->addTextData( $this->_lang->search );
    }
}
