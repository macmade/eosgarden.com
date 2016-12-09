// <![CDATA[

/*******************************************************************************
 * Copyright (c) 2010, Jean-David Gadina <macmade@eosgarden.com>
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 * 
 *  -   Redistributions of source code must retain the above copyright notice,
 *      this list of conditions and the following disclaimer.
 *  -   Redistributions in binary form must reproduce the above copyright
 *      notice, this list of conditions and the following disclaimer in the
 *      documentation and/or other materials provided with the distribution.
 *  -   Neither the name of 'Jean-David Gadina' nor the names of its
 *      contributors may be used to endorse or promote products derived from
 *      this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 ******************************************************************************/

var TopBarController =
(
    function ()
    {
        var _instance = null;
        
        TopBarController = function TopBarController()
        {
            if( _instance )
            {
                return _instance;
            }
            
            var _opened   = null;
            var _toOpen   = null;
            var _link     = null;
            
            function _open( id )
            {
                if( id === undefined )
                {
                    id      = _toOpen;
                    _toOpen = null;
                }
                
                var o   = $( id );
                _opened = id;
                
                o.slideDown( 'slow', _showContent );
            }
            
            function _close( id )
            {
                if( id === undefined )
                {
                    id = _opened;
                }
                
                var o = $( id );
                var c = $( id + ' .topbar-content' );
                
                if( c.is( ':hidden' ) )
                {
                    _opened = null;
                    
                    if( _toOpen === null )
                    {
                        o.slideUp( 'slow' );
                    }
                    else
                    {
                        o.slideUp( 'slow', _open );
                    }
                }
                else
                {
                    _hideContent();
                }
            }
            
            function _showContent()
            {
                var c = $( _opened + ' .topbar-content' )
                
                c.fadeIn( 'slow' );
            }
            
            function _hideContent()
            {
                var c = $( _opened + ' .topbar-content' )
                
                c.fadeOut( 'slow', _close );
            }
            
            this.toggle = function ( id, link )
            {
                link.toggleClass( 'topbar-link-act' );
                
                if( _link != null && _link.hasClass( 'topbar-link-act' ) )
                {
                    _link.toggleClass( 'topbar-link-act' );
                }
                
                _link = link;
                
                var id = '#' + id;
                
                if( id == _opened )
                {
                    _close( id );
                }
                else if( _opened === null )
                {
                    _open( id );
                }
                else
                {
                    _toOpen = id;
                    
                    _close( _opened );
                }
            }
            
            _instance = this;
        }
        
        TopBarController.getInstance = function ()
        {
            if ( _instance === null )
            {
                _instance = new TopBarController();
            }
            
            return _instance;
        }
        
        return TopBarController;
        
    }
)();

// ]]>
