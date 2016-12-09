<?php

header( 'Location: http://www.xs-labs.com/en/archives/articles/float/', true, 301 );
exit();

?>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/articles.png" alt="" width="905" height="285" />
				</div>
				<div class="frame-spacer">&nbsp;</div>
				<div class="frame-content">
					<h2>Binary representation of single precision floating point numbers</h2>
					<div>
						<strong>Author:</strong> Jean-David Gadina &lt;<?php print Eos_Utils::getInstance()->mailTo( 'macmade@eosgarden.com' ); ?>&gt;<br />
						<strong>Source:</strong> <a href="http://ieeexplore.ieee.org/servlet/opac?punumber=4610933" title="IEEE 754">IEEE Standard for Floating-Point Arithmetic - IEEE 754</a>
					</div>
					<div class="grey">
						<div class="small">
							Copyright (C)  Jean-David Gadina.
						</div>
						<div class="small">
							Permission is granted to copy, distribute and/or modify this document under the terms of the GNU Free Documentation License, Version 1.3 or any later version published by the Free Software Foundation; with no Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A copy of the license is included in the section entitled <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/licenses/gnu-fdl/' ) ?>.
						</div>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<h2>Table of contents</h2>
					<div>
						<ol>
							<li>
								<a href="#theory" title="Go to this section">Theory</a>
							</li>
							<li>
								<a href="#example" title="Go to this section">Example</a>
							</li>
							<li>
								<a href="#special-numbers" title="Go to this section">Special numbers</a>
								<ol>
									<li>
										<a href="#special-numbers-denormalized" title="Go to this section">Denormalized numbers</a>
									</li>
									<li>
										<a href="#special-numbers-zero" title="Go to this section">Zero</a>
									</li>
									<li>
										<a href="#special-numbers-infinity" title="Go to this section">Infinity</a>
									</li>
									<li>
										<a href="#special-numbers-nan" title="Go to this section">NaN</a>
									</li>
								</ol>
							</li>
							<li>
								<a href="#range" title="Go to this section">Range</a>
								<ol>
									<li>
										<a href="#range-normalized" title="Go to this section">Normalized numbers</a>
									</li>
									<li>
										<a href="#range-denormalized" title="Go to this section">Denormalized numbers</a>
									</li>
								</ol>
							</li>
							<li>
								<a href="#c-code" title="Go to this section">C code example</a>
							</li>
						</ol>
					</div>
					<a name="theory"></a>
					<h3>1. Theory</h3>
					<div>
						<!-- RSS_ABSTRACT_BEGIN -->
						Single precsion floating point numbers are usually called 'float', or 'real'. They are 4 bytes long, and are packed the following way, from left to right:
						<!-- RSS_ABSTRACT_END -->
					</div>
					<div>
						<ul>
							<li>Sign:     1 bit</li>
							<li>Exponent: 8 bits</li>
							<li>Mantissa: 23 bits</li>
						</ul>
					</div>
					<div>
						<table>
							<tr>
								<td>X</td>
								<td>XXXX XXXX</td>
								<td>XXX XXXX XXXX XXXX XXXX XXXXX</td>
							</tr>
							<tr>
								<th>Sign<br />1 bit</th>
								<th>Exponent<br />8 bits</th>
								<th>Mantissa<br />23 bits</th>
							</tr>
						</table>
					</div>
					<div>
						The sign indicates if the number is positive or negative (zero for positive, one for negative).
					</div>
					<div>
						The real exponent is computed by substracting 127 to the value of the exponent field. It's the exponent of the number as it is expressed in the scientific notation.
					</div>
					<div>
						The full mantissa, which is also sometimes called significand, should be considered as a 24 bits value. As we are using scientific notation, there is an implicit leading bit (sometimes called the hidden bit), always set to 1, as there is never a leading 0 in the scientific notation.<br />
						For instance, you won't say <code>0.123 &middot; 10<span class="power">5</span></code> but <code>1.23 &middot; 10<span class="power">4</span></code>.
					</div>
					<div>
						The conversion is performed the following way:
					</div>
					<div class="code">
						<code>-1<span class="power">S</span> &middot; 1.M &middot; 2<span class="power">( E - 127 )</span></code>
					</div>
					<div>
						Where S is the sign, M the mantissa, and E the exponent.
					</div>
					<a name="example"></a>
					<h3>2. Example</h3>
					<div>
						For instance, <code>0100 0000 1011 1000 0000 0000 0000 0000</code>, which is <code>0x40B80000</code> in hexadecimal.
					</div>
					<div>
						<table>
							<tr>
								<th>Hex</th>
								<td>4</td>
								<td class="alt">0</td>
								<td>B</td>
								<td class="alt">8</td>
								<td>0</td>
								<td class="alt">0</td>
								<td>0</td>
								<td class="alt">0</td>
							</tr>
							<tr>
								<th>Bin</th>
								<td>0100</td>
								<td class="alt">0000</td>
								<td>1011</td>
								<td class="alt">1000</td>
								<td>0000</td>
								<td class="alt">0000</td>
								<td>0000</td>
								<td class="alt">0000</td>
							</tr>
						</table>
					</div>
					<div>
						<table>
							<tr>
								<th>Sign</th>
								<th>Exponent</th>
								<th>Mantissa</th>
							</tr>
							<tr>
								<td>0</td>
								<td>1000 0001</td>
								<td>(1) 011 1000 0000 0000 0000 0000</td>
							</tr>
						</table>
					</div>
					<div>
						<ul>
							<li>The sign is <code>0</code>, so the number is positive.</li>
							<li>The exponent field is <code>1000 0001</code>, which is 129 in decimal. The real exponent value is then 129 - 127, which is 2.</li>
							<li>The mantissa with the leading 1 bit, is <code>1011 1000 0000 0000 0000 0000</code>.</li>
						</ul>
					</div>
					<div>
						The final representation of the number in the binary scientific notation is:
					</div>
					<div class="code">
						<code>-1<span class="power">0</span> &middot; 1.0111 &middot; 2<span class="power">2</span></code>
					</div>
					<div>
						Mathematically, this means:
					</div>
					<div class="code">
						<code>1 &middot; ( 1 &middot; 2<span class="power">0</span> + 0 &middot; 2<span class="power">-1</span> + 1 &middot; 2<span class="power">-2</span> + 1 &middot; 2<span class="power">-3</span> + 1 &middot; 2<span class="power">-4</span> ) &middot; 2<span class="power">2</span></code><br />
						<code>( 2<span class="power">0</span> + 2<span class="power">-2</span> + 2<span class="power">-3</span> + 2<span class="power">-4</span> ) &middot; 2<span class="power">2</span></code><br />
						<code>2<span class="power">2</span> + 2<span class="power">0</span> + 2<span class="power">-1</span> + 2<span class="power">-2</span></code><br />
						<code>4 + 1 + 0.5 + 0.25</code>
					</div>
					<div>
						The floating point value is then 5.75.
					</div>
					<a name="special-numbers"></a>
					<h3>3. Special numbers</h3>
					<div>
						Depending on the value of the exponent field, some numbers can have special values. They can be:
					</div>
					<div>
						<ul>
							<li>Denormalized numbers</li>
							<li>Zero</li>
							<li>Infinity</li>
							<li>NaN (not a number)</li>
						</ul>
					</div>
					<a name="special-numbers-denormalized"></a>
					<h4>3.1. Denormalized numbers</h4>
					<div>
						If the value of the exponent field is 0 and the value of the mantissa field is greater than 0, then the number has to be treated as a denormalized number.<br />
						In such a case, the exponent is not -127, but -126, and the implicit leading bit is not 1 but 0.<br />
						That allows smaller numbers to be represented.
					</div>
					<div>
						The scientific notation for a denormalized number is:
					</div>
					<div class="code">
						<code>-1<span class="power">S</span> &middot;  0.M &middot; 2<span class="power">-126</span></code>
					</div>
					<a name="special-numbers-zero"></a>
					<h4>3.2. Zero</h4>
					<div>
						If the exponent and the mantissa fields are both 0, then the final number is zero. The sign bit is permitted, even if it does not have much sense mathematically, allowing a positive or a negative zero.<br />
						Note that zero can be considered as a denormalized number. In that case, it would be <code>0 &middot; 2<span class="power">-126</span></code>, which is zero.
					</div>
					<a name="special-numbers-infinity"></a>
					<h4>3.3. Infinity</h4>
					<div>
						If the value of the exponent field is 255 (all 8 bits are set) and if the value of the mantissa field is 0, the number is an infinity, either positive or negative, depending on the sign bit.
					</div>
					<a name="special-numbers-nan"></a>
					<h4>3.4. NaN</h4>
					<div>
						If the value of the exponent field is 255 (all 8 bits are set) and if the value of the mantissa field is not 0, then the value is not a number. The sign bit as no meaning in such a case.
					</div>
					<a name="range"></a>
					<h3>3. Range</h3>
					<div>
						The range depends if the number is normalized or not. Below are the ranges for that two cases:
					</div>
					<a name="range-normalized"></a>
					<h4>3.1 Normalized numbers</h4>
					<div>
						<ul>
							<li><strong>Min:</strong> <code>±1.1754944909521E-38</code> / <code>±1.00000000000000000000001<span class="power">-126</span></code></li>
							<li><strong>Max:</strong> <code>±3.4028234663853E+38</code> / <code>±1.11111111111111111111111<span class="power">128</span></code></li>
						</ul>
					</div>
					<a name="range-denormalized"></a>
					<h4>3.2 Denormalized numbers</h4>
					<div>
						<ul>
							<li><strong>Min:</strong> <code>±1.4012984643248E-45</code> / <code>±0.00000000000000000000001<span class="power">-126</span></code></li>
							<li><strong>Max:</strong> <code>±1.1754942106924E-38</code> / <code>±0.11111111111111111111111<span class="power">-126</span></code></li>
						</ul>
					</div>
					<a name="c-code"></a>
					<h3>4. C code example</h3>
					<div>
						Below is an example of a C program that will converts a binary number to its float representation:
					</div>
					<div class="code">
						<code class="source"><span class="code-comment">/* System includes */</span></code><br />
						<code class="source"><span class="code-keyword">#include</span> &lt;stdlib.h&gt;</code><br />
						<code class="source"><span class="code-keyword">#include</span> &lt;stdio.h&gt;</code><br />
						<code class="source"><span class="code-keyword">#include</span> &lt;math.h&gt;</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-comment">/* Definition of the boolean data type */</span></code><br />
						<code class="source"><span class="code-keyword">typedef</span> <span class="code-keyword">enum</span> { <span class="code-keyword">FALSE</span>, <span class="code-keyword">TRUE</span> } boolean;</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-comment">/**</span></code><br />
						<code class="source"><span class="code-comment"> * Converts a integer to its float representation</span></code><br />
						<code class="source"><span class="code-comment"> * </span></code><br />
						<code class="source"><span class="code-comment"> * This function converts a 32 bits integer to a single precision floating point</span></code><br />
						<code class="source"><span class="code-comment"> * number, as specified by the IEEE Standard for Floating-Point Arithmetic</span></code><br />
						<code class="source"><span class="code-comment"> * (IEEE 754). This standard can be found at the folowing address:</span></code><br />
						<code class="source"><span class="code-comment"> * {@link http://ieeexplore.ieee.org/servlet/opac?punumber=4610933}</span></code><br />
						<code class="source"><span class="code-comment"> * </span></code><br />
						<code class="source"><span class="code-comment"> * @param   unsigned long   The integer to convert to a floating point value</span></code><br />
						<code class="source"><span class="code-comment"> * @return  float           The floating point number</span></code><br />
						<code class="source"><span class="code-comment"> * @author                  Jean-David Gadina &lt;macmade@eosgarden.com&gt;</span></code><br />
						<code class="source"><span class="code-comment"> */</span></code><br />
						<code class="source"><span class="code-keyword">float</span> binaryToFloat( <span class="code-keyword">unsigned</span> <span class="code-keyword">long</span> binary )</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-comment">/* Gets the sign field */</span></code><br />
						<code class="source">    <span class="code-comment">/* Bit 0, left to right */</span></code><br />
						<code class="source">    <span class="code-ctag">boolean</span> sign           = binary &gt;&gt; 31;</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-comment">/* Gets the exponent field */</span></code><br />
						<code class="source">    <span class="code-comment">/* Bits 1 to 8, left to right */</span></code><br />
						<code class="source">    <span class="code-keyword">unsigned</span> <span class="code-keyword">char</span> exp      = ( ( binary &gt;&gt; 23 ) &amp; 0xFF );</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-comment">/* Gets the mantissa field */</span></code><br />
						<code class="source">    <span class="code-comment">/* Bits 9 to 32, left to right */</span></code><br />
						<code class="source">    <span class="code-keyword">unsigned</span> <span class="code-keyword">long</span> mantissa = ( binary &amp; 0x7FFFFF );</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-comment">/* Storage for the return value */</span></code><br />
						<code class="source">    <span class="code-keyword">float</span> floatValue       = 0;</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-comment">/* Counter */</span></code><br />
						<code class="source">    <span class="code-keyword">signed</span> <span class="code-keyword">int</span> i           = 0;</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-comment">/* Checks the values of the exponent and the mantissa fields to handle special numbers */</span></code><br />
						<code class="source">    <span class="code-keyword">if</span>( exp == 0 &amp;&amp; mantissa == 0 )</code><br />
						<code class="source">    {</code><br />
						<code class="source">        <span class="code-comment">/* Zero - No need for a computation even if it can be considered as a denormalized number */</span></code><br />
						<code class="source">        <span class="code-keyword">return</span> 0;</code><br />
						<code class="source">    }<br /></code>
						<code class="source">    <span class="code-keyword">else</span> <span class="code-keyword">if</span>( exp == 255 &amp;&amp; mantissa == 0 )</code><br />
						<code class="source">    {</code><br />
						<code class="source">        <span class="code-comment">/* Infinity */</span></code><br />
						<code class="source">        <span class="code-keyword">return</span> 0;</code><br />
						<code class="source">    }<br /></code>
						<code class="source">    <span class="code-keyword">else</span> <span class="code-keyword">if</span>( exp == 255 &amp;&amp; mantissa != 0 )</code><br />
						<code class="source">    {</code><br />
						<code class="source">        <span class="code-comment">/* Not a number */</span></code><br />
						<code class="source">        <span class="code-keyword">return</span> 0;</code><br />
						<code class="source">    }<br /></code>
						<code class="source">    <span class="code-keyword">else</span> <span class="code-keyword">if</span>( exp == 0 &amp;&amp; mantissa != 0 )</code><br />
						<code class="source">    {</code><br />
						<code class="source">        <span class="code-comment">/* Denormalized number - Exponent is fixed to -126 */</span></code><br />
						<code class="source">        exp = -126;</code><br />
						<code class="source">    }<br /></code>
						<code class="source">    <span class="code-keyword">else</span></code><br />
						<code class="source">    {</code><br />
						<code class="source">        <span class="code-comment">/* Computes the real exponent */</span></code><br />
						<code class="source">        exp      = exp - 127;</code><br />
						<code class="source">        </code><br />
						<code class="source">        <span class="code-comment">/* Adds the implicit bit to the mantissa */</span></code><br />
						<code class="source">        mantissa = mantissa | 0x800000;</code><br />
						<code class="source">    }</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-comment">/* Process the 24 bits of the mantissa */</span></code><br />
						<code class="source">    <span class="code-keyword">for</span>( i = 0; i > -24; i-- )</code><br />
						<code class="source">    {</code><br />
						<code class="source">        <span class="code-comment">/* Checks if the current bit is set */</span></code><br />
						<code class="source">        <span class="code-keyword">if</span>( mantissa &amp; ( 1 &lt;&lt; ( i + 23 ) ) )</code><br />
						<code class="source">        {</code><br />
						<code class="source">            <span class="code-comment">/* Adds the value for the current bit */</span></code><br />
						<code class="source">            <span class="code-comment">/* This is done by computing two raised to the power of the exponent plus the bit position */</span></code><br />
						<code class="source">            <span class="code-comment">/* (negative if it's after the implicit bit, as we are using scientific notation) */</span></code><br />
						<code class="source">            floatValue += ( <span class="code-keyword">float</span> )<span class="code-ctag">pow</span>( 2, i + exp );</code><br />
						<code class="source">        }</code><br />
						<code class="source">    }</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-comment">/* Returns the final float value */</span></code><br />
						<code class="source">    <span class="code-keyword">return</span> ( sign == <span class="code-keyword">FALSE</span> ) ? floatValue : -floatValue;</code><br />
						<code class="source">}</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-comment">/**</span></code><br />
						<code class="source"><span class="code-comment"> * C main() function</span></code><br />
						<code class="source"><span class="code-comment"> * </span></code><br />
						<code class="source"><span class="code-comment"> * @return  int     The exit status</span></code><br />
						<code class="source"><span class="code-comment"> */</span></code><br />
						<code class="source"><span class="code-keyword">int</span> main( <span class="code-keyword">void</span> )</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-ctag">printf</span>( <span class="code-string">"%f\n"</span>, <span class="code-ctag">binaryToFloat</span>( 0x40B80000 ) );</code><br />
						<code class="source">    <span class="code-keyword">return</span> <span class="code-ctag">EXIT_SUCCESS</span>;</code><br />
						<code class="source">}</code>
					</div>
					<?php  print new Eos_Comment_View() . chr( 10 ); ?>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			
