			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/opensource.png" alt="" width="905" height="285" />
				</div>
			</div>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
                    <div class="legacy">
                        <h2>GitHub</h2>
                        <div>
                            All our OpenSource projects have been migrated to <a href="http://www.github.com/macmade/">GitHub</a>.<br />
                            Feel free to fork!
                        </div>
                    </div>
					<h2>Overview</h2>
					<div class="img-right">
						<img src="/uploads/image/libobjc-log/console.png" alt="" width="130" height="130" />
					</div>
					<div class="grey">
						Obj-C Extended Log is a replacement library for the  for the built-in NSLog() function, from the Apple Core Foundation framework.<br />
						It provides better logging informations, as well as fome usefull macros to help various data-structures of the Core Foundation Framework.
					</div>
					<div class="grey">
						Obj-C Extended Log is release under the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/licenses/boost/' ) ?>. It means you can use it freely with your projects, without giving credits, as long as you only release object code.
					</div>
					<h2>Table of contents</h2>
					<div>
						<ol>
							<li>
								<a href="#features" title="Go to this section">Features</a>
							</li>
							<li>
								<a href="#usage" title="Go to this section">Usage</a>
							</li>
							<li>
								<a href="#macros" title="Go to this section">Macros</a>
							</li>
						</ol>
					</div>
					<a name="features"></a>
					<h2>Features</h2>
					<div>
						The NSLog() function is often used while developping Objective-C applications to output debug informations on the console.<br />
						Unfortunately, its output is pretty basic.
					</div>
					<div>
						For instance, the following code:
					</div>
					<div class="code">
						<code class="source"><span class="code-predefined">NSArray</span> * arr = [ <span class="code-predefined">NSArray</span> <span class="code-predefined">arrayWithObjects</span>: <span class="code-string">@"hello"</span>, <span class="code-string">@"world"</span>, <span class="code-keyword">nil</span> ];</code><br />
						<code class="source"><span class="code-predefined">NSLog</span>( <span class="code-string">@"This is an array: %@"</span>, arr );</code>
					</div>
					<div>
						The following will be outputted on the console:
					</div>
					<div class="code">
						<code class="source">2010-08-05 19:20:00.901 test[39730:903] This is an array: (</code><br />
						<code class="source">    hello,</code><br />
						<code class="source">    world</code><br />
						<code class="source">)</code>
					</div>
					<div>
						With the Obj-C Extended Log library, the very same code will produce the following output:
					</div>
					<div class="code">
						<code class="source">--------------------------------------------------</code><br />
						<code class="source"> Log informations:</code><br />
						<code class="source">--------------------------------------------------</code><br />
						<code class="source"></code><br />
						<code class="source">    - File:    ./file.m</code><br />
						<code class="source">    - Line:    42</code><br />
						<code class="source">    - PID:     170582</code><br />
						<code class="source">    - Thread:  1 - &lt;Main&gt;</code><br />
						<code class="source">    - Time:    2010-08-05 19:42:24.000</code><br />
						<code class="source"></code><br />
						<code class="source">Message:</code><br />
						<code class="source"></code><br />
						<code class="source">This is an array: (</code><br />
						<code class="source">    hello,</code><br />
						<code class="source">    world</code><br />
						<code class="source">)</code>
					</div>
					<div>
						As you can see, it provides additionnal informations that can be useful for debug prupose, like the file name and line number in which the log was made, the process and thread number, etc.
					</div>
					<div>
						The library also includes usefull macros, to help with the Core Foundation structures.<br />
						For instance:
					</div>
					<div class="code">
						<code class="source"><span class="code-predefined">NSRect</span> rect = <span class="code-predefined">NSMakeRect</span>( 0, 0, 100, 200 );</code>
					</div>
					<div>
						The NSRect C structure represents a rectangle. It contains two members:
					</div>
					<ul>
						<li>
							position<br />
							A NSPoint structure, containing two float members: x &amp; y
						</li>
						<li>
							size<br />
							A NSSize structure, containing two float members: width &amp; height
						</li>
					</ul>
					<div>
						You can't passed such a structure directly to the built-in NSLog function.<br />
						But with the Obj-C Extended Log library, you can use the 'LogRect' macro to automatically log each member of the structure:
					</div>
					<div class="code">
						<code class="source"><span class="code-ctag">LogRect</span>( rect );</code>
					</div>
					<div>
						Which will display:
					</div>
					<div class="code">
						<code class="source">--------------------------------------------------</code><br />
						<code class="source"> Log informations:</code><br />
						<code class="source">--------------------------------------------------</code><br />
						<code class="source"></code><br />
						<code class="source">    - File:    ./file.m</code><br />
						<code class="source">    - Line:    42</code><br />
						<code class="source">    - PID:     170582</code><br />
						<code class="source">    - Thread:  1 - &lt;Main&gt;</code><br />
						<code class="source">    - Time:    2010-08-05 19:42:24.000</code><br />
						<code class="source"></code><br />
						<code class="source">Message:</code><br />
						<code class="source"></code><br />
						<code class="source">X:      0</code><br />
						<code class="source">Y:      0</code><br />
						<code class="source">Width:  100</code><br />
						<code class="source">Height: 200</code>
					</div>
					<a name="usage"></a>
					<h2>Usage</h2>
					<div>
						The library consist of a header file (.h), and a source file (.m).<br />
						You can either include it directly into your project, or compile it separately as a static library, linked with your binary.
					</div>
					<div>
						To enable the extended log, you simply need to include the header file.<br />
						You don't need to change your code, as it will replace the built-in NSLog() function.
					</div>
					<div>
						For instance, a Objective-C main routine:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">&lt;Foundation/Foundation.h&gt;</span></code><br />
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">"libobj_log.h"</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">int</span> main( <span class="code-keyword">void</span> )</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-predefined">NSAutoreleasePool</span> * ap;</code><br />
						<code class="source">    </code><br />
						<code class="source">    ap = [ <span class="code-predefined">NSAutoreleasePool</span> new ];</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-predefined">NSLog</span>( <span class="code-string">@"hello, %@"</span>, <span class="code-string">@"world"</span> );</code><br />
						<code class="source">    </code><br />
						<code class="source">    [ ap drain ];</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-keyword">return EXIT_SUCCESS</span>;</code><br />
						<code class="source">}</code><br />
					</div>
					<div>
						The extended log will be automatically enabled when including the header file.<br />
						Log informations will be displayed on 'stderr', as well as on the Apple console (Console.app), using the Apple System Logger API (ASL).
					</div>
					<div>
						You can control what's logged on the Apple Console by defining two constants.<br />
						These constants must be defined before including the header file:
					</div>
					<div>
						<strong>LIBOBJC_LOG_CONSOLE_STD</strong>
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#define LIBOBJC_LOG_CONSOLE_STD</span></code><br />
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">"libobj_log.h"</span></code><br />
					</div>
					<div>
						If this is defined, the extended log informations will be displayed on stderr, but a standard log will be displayed on the Apple console (exactly like the built-in NSLog() function).
					</div>
					<div>
						<strong>LIBOBJC_LOG_NO_CONSOLE</strong>
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#define LIBOBJC_LOG_NO_CONSOLE</span></code><br />
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">"libobj_log.h"</span></code><br />
					</div>
					<div>
						If this is defined, the extended log informations will be displayed on stderr, but not on the Apple console.
					</div>
					<a name="macros"></a>
					<h2>Macros</h2>
					<div>
						<strong style="font-family: monospace;">NSLog( NSString * fmt, ... )</strong><br />
						The replacement for the built-in NSLog() function.<br />
						Takes a NSString * for the format, and optional arguments, depending on the format.
					</div>
					<div>
						<strong style="font-family: monospace;">LogPoint( NSPoint p )</strong><br />
						<strong style="font-family: monospace;">LogPoint( CGPoint p )</strong><br />
						Logs a NSPoint/CGPoint structure. Members are x, y.
					</div>
					<div>
						<strong style="font-family: monospace;">LogSize( NSSize s )</strong><br />
						<strong style="font-family: monospace;">LogSize( CGSize s )</strong><br />
						Logs a NSSize/CGSize structure. Members are width, height.
					</div>
					<div>
						<strong style="font-family: monospace;">LogRect( NSRect r )</strong><br />
						<strong style="font-family: monospace;">LogRect( CGRect r )</strong><br />
						Logs a NSRect/CGRect structure. Members are x, y, width, height.
					</div>
					<div>
						<strong style="font-family: monospace;">LogRange( NSRange r )</strong><br />
						Logs a NSRange structure. Members are location, length.
					</div>
					<div>
						<strong style="font-family: monospace;">LogEdgeInsets( UIEdgeInsets e )</strong><br />
						Only available for iPhone OS<br />
						Logs a UIEdgeInsets structure. Members are top, left, bottom, right.
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
