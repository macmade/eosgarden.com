			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/opensource.png" alt="" width="905" height="285" />
				</div>
				<div class="frame-spacer">&nbsp;</div>
				<div class="frame-content">
                    <div class="legacy">
                        <h2>GitHub</h2>
                        <div>
                            All our OpenSource projects have been migrated to <a href="http://www.github.com/macmade/">GitHub</a>.<br />
                            Feel free to fork!
                        </div>
                    </div>
                    <h2>About</h2>
                    <div>
                        The XEOS C Foundation library provides the base for object-oriented C style coding, reference counting memory management with auto-release capabilities, reflection, runtime environment, polymorphism, exceptions, and basic objects. It's purpose is to be integrated in the XEOS Operating System, once its C standard library will be complete.
                    </div>
                    <div>
                        For now, it's just a standalone project, that should compile on every OS with a decent C compiler.
                    </div>
                    <h3>Supported OS</h3>
                    <div>
                        XSFoundation can be used on POSIX compliant systems (Mac OS X, Unix, Linux) as well as on Windows.
                    </div>
                    <h3>Building</h3>
                    <div>
                        The standard command make will build static and dynamic versions of the XSFoundation library.
                    </div>
                    <h3>Linking</h3>
                    <div>
                        Once built, you can link with the XSFoundation library:
                    </div>
                    <div class="code">
                        <code class="source">gcc -Wall -o exec_name libxeos.a source.c</code>
                    </div>
                    <h3>Header files</h3>
                    <div>
                        A main header file is provided: XS.h. No other header file should be directly included.
                    </div>
                    <h3>Documentation</h3>
                    <div>
                        Wiki can be found on GitHub: <a href="https://github.com/macmade/XSFoundation/wiki" title="Wiki">https://github.com/macmade/XSFoundation/wiki</a>
                    </div>
                    <h3>Basic example</h3>
                    <div class="code">
                        <code class="source">#include "XS.h"</code><br />
                        <code class="source"></code><br />
                        <code class="source">XSMainStart( argc, argv )</code><br />
                        <code class="source">{</code><br />
                        <code class="source">    XSUInteger e;</code><br />
                        <code class="source">    XSString   str1;</code><br />
                        <code class="source">    XSString   str2;</code><br />
                        <code class="source">    XSString   str3;</code><br />
                        <code class="source"></code><br />
                        <code class="source">    // String creation - The object will be released automatically</code><br />
                        <code class="source">    str1 = XSSTR( "hello, world" );</code><br />
                        <code class="source"></code><br />
                        <code class="source">    // Substring - The object will be released automatically</code><br />
                        <code class="source">    str2 = XSString_SubstringtoIndex( str1, 5 );</code><br />
                        <code class="source"></code><br />
                        <code class="source">    // String copy - The object will have to be released explicitly</code><br />
                        <code class="source">    str3 = XSCopy( str2 );</code><br />
                        <code class="source"></code><br />
                        <code class="source">    // Prints "hello, world, world, world"</code><br />
                        <code class="source">    XSLog( "This is a log message: $@$@$@", str1, str2, str3 );</code><br />
                        <code class="source"></code><br />
                        <code class="source">    // Release memory</code><br />
                        <code class="source">    XSRelease( str3 );</code><br />
                        <code class="source">}</code><br />
                        <code class="source">XSMainEnd( EXIT_SUCCESS )</code>
                    </div>
                    <h3>License</h3>
					<div class="grey">
						XSFoundation is released under the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/licenses/boost/' ) ?>.<br />
						Feel free to use and modify it at your convenience.
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
