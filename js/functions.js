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

function cryptCharCode( charCode, start, end, offset )
{
    charCode += offset;
    
    if( offset > 0 && charCode > end )
    {
        charCode = start + ( charCode - end - 1 );
    }
    else if( offset < 0 && charCode < start )
    {
        charCode = end - ( start - charCode - 1 );
    }
    
    return charCode;
}

function cryptEmail( email, reverse )
{
    crypt = '';
    
    for( i = 0; i < email.length; i++ )
    {
        charValue = email.charAt( i );
        charCode  = email.charCodeAt( i );
        
        if( charCode >= 33 && charCode <= 126 )
        {
            offset    = ( reverse ) ? -10 : 10;
            charValue = String.fromCharCode( cryptCharCode( charCode, 33, 126, offset ) );
        }
        
        crypt = crypt + charValue;
    }
    
    return crypt;
}

function decryptEmail( email )
{
    location.href = 'mailto:' + cryptEmail( email, true );
}

function shareDelicious()
{
    f = 'http://delicious.com/save?url='
      + encodeURIComponent( window.location.href )
      + '&title='
      + encodeURIComponent( document.title )
      + '&v=5&';
    
    a = function()
    {
        if(
            !window.open
            (
                f + 'noui=1&jump=doclose',
                'deliciousuiv5',
                'location=yes,links=no,scrollbars=no,toolbar=no,width=550,height=550'
            )
        )
        {
            location.href = f + 'jump=yes';
        }
    };
    
    if( /Firefox/.test( navigator.userAgent ) )
    {
        setTimeout( a, 0 );
    }
    else
    {
        a();
    }
}

// ]]>
