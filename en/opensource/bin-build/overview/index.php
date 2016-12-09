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
					<div class="grey">
						Bin-Build is a small shell script to simplify compiling source file in C, C++ and Objective-C.<br />
						You will find below a list of it's features.
					</div>
					<div class="grey">
						Bin-Build is realeased under the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/licenses/bsd/' ) ?>. Feel free to use it, and modify it at your convenience.
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<h2>Documentation</h2>
					<h3>Table of contents</h3>
					<div>
						<ol>
							<li>
								<a href="#overview" title="Go to this section">Overview</a>
							</li>
							<li>
								<a href="#language-detection" title="Go to this section">Language detection</a>
							</li>
							<li>
								<a href="#language-settings" title="Go to this section">Language settings</a>
							</li>
							<li>
								<a href="#installation" title="Go to this section">Installation</a>
							</li>
							<li>
								<a href="#default-settings" title="Go to this section">Default settings</a>
							</li>
						</ol>
					</div>
					<a name="overview"></a>
					<h3>Overview</h3>
					<div>
						The purpose of this script is to provide a simplified compilation command.<br />
						When compiling a source file, the invocation of the compiler is often a painful task, especially when specific options need to be passed, like compiler flags, error level, etc.
					</div>
					<div>
						For instance, in order to compile a C file with GCC, you need to type the following kind of command:
					</div>
					<div class="code">
						<code class="source">gcc -Wall -Werror -Wextra -pedantic -std=c89 -Os -o file file.c</code>
					</div>
					<div>
						It can be a lot worse if using specific options.<br />
						With Bin-Build, you can replace the previous command with:
					</div>
					<div class="code">
						<code class="source">bin-build file.c</code>
					</div>
					<div>
						It will generate a 'file' executable, from the 'file.c' source file, using the C compiler.<br />
						You will see the following kind of output:
					</div>
					<div class="code">
						<code class="source">/usr/local/bin/bin-build: compiling file file.c</code><br />
						<code class="source"></code><br />
						<code class="source">Settings:</code><br />
						<code class="source"></code><br />
						<code class="source">    - Language:       C</code><br />
						<code class="source">    - Compiler:       /usr/bin/gcc</code><br />
						<code class="source">    - Input file:     /Users/macmade/Desktop/test.c</code><br />
						<code class="source">    - Output file:    /Users/macmade/Desktop/test</code><br />
						<code class="source"></code><br />
						<code class="source">Compiler options:</code><br />
						<code class="source">   - std=c99                         - Os                              - pedantic</code><br />
						<code class="source">   - Werror                          - Wall                            - Wextra</code><br />
						<code class="source">   - Wbad-function-cast              - Wdeclaration-after-statement    - Werror-implicit-function-declaration</code><br />
						<code class="source">   - Wmissing-braces                 - Wmissing-declarations           - Wmissing-field-initializers</code><br />
						<code class="source">   - Wmissing-prototypes             - Wnested-externs                 - Wold-style-definition</code><br />
						<code class="source">   - Wparentheses                    - Wreturn-type                    - Wshadow</code><br />
						<code class="source">   - Wsign-compare                   - Wstrict-prototypes              - Wswitch</code><br />
						<code class="source">   - Wuninitialized                  - Wunknown-pragmas                - Wunused-function</code><br />
						<code class="source">   - Wunused-label                   - Wunused-parameter               - Wunused-value</code><br />
						<code class="source">   - Wunused-variable</code><br />
						<code class="source"></code><br />
						<code class="source">Compiling file...</code><br />
						<code class="source"></code><br />
						<code class="source">Compilation successfull</code><br />
						<code class="source">Do you want to execute the produced binary now? [y/N]</code><br />
						<code class="source"></code><br />
						<code class="source">--------------------------------------------------------------------------------</code><br />
						<code class="source">Executing /Users/macmade/Desktop/test</code><br />
						<code class="source">--------------------------------------------------------------------------------</code><br />
						<code class="source"></code><br />
						<code class="source">--------------------------------------------------------------------------------</code><br />
						<code class="source">Process exit code: 0</code><br />
						<code class="source">--------------------------------------------------------------------------------</code>
					</div>
					<div>
						As you can see, once the compilation is complete, the script ask you if you want to execute the produced prgram, and gives you the program's exit code, once executed.
					</div>
					<a name="language-detection"></a>
					<h3>Language detection</h3>
					<div>
						Bin-Build can be used seamlessly with C, C++ and Objective-C.<br />
						The script automatically detects the programming language, based on the file extension:
					</div>
					<ul>
						<li><pre>C:           <strong>.c</strong></pre></li>
						<li><pre>C++:         <strong>.cpp</strong></pre></li>
						<li><pre>Objective-C: <strong>.m</strong></pre></li>
					</ul>
					<div>
						Specific compiler settings will be used for each language.
					</div>
					<a name="language-settings"></a>
					<h3>Language settings</h3>
					<div>
						Settings can be configured for each language, trough environment variables:
					</div>
					<ul>
						<li><pre>C:           <strong>$BIN_BUILD_C</strong></pre></li>
						<li><pre>C++:         <strong>$BIN_BUILD_CPP</strong></pre></li>
						<li><pre>Objective-C: <strong>$BIN_BUILD_OBJC</strong></pre></li>
					</ul>
					<div>
						Settings consist of the compiler arguments, separated by a ':' sign.<br />
						For instance:
					</div>
					<div class="code">
						<code class="source">export BIN_BUILD_C=-Wall:-Werror:-O2</code><br />
						<code class="source">bin-build file.c</code><br />
					</div>
					<div>
						Settings can be set for the session, as in the previous example, or globally, in your '.bash_rc' or '.profile' file.
					</div>
					<a name="installation"></a>
					<h3>Installation</h3>
					<div>
						Simply copy the script in a directory that's included in your executable path (like /usr/local/bin/), and make sure the executable flag is set.
					</div>
					<div>
						For instance:
					</div>
					<div class="code">
						<code>sudo cp bin-build.sh /usr/local/bin/bin-build</code><br />
						<code>sudo chmod 755 /usr/local/bin/bin-build</code>
					</div>
					<div>
						You'll then be able to call the script as a normal executable:
					</div>
					<div class="code">
						<code>svn-util ~/file.c</code>
					</div>
					<a name="default-settings"></a>
					<h3>Default settings</h3>
					<div>
						Here are the default settings, used for each language.
					</div>
					<h4>C</h4>
					<ul>
						<li>std=c99</li>
						<li>Os</li>
						<li>pedantic</li>
						<li>Werror</li>
						<li>Wall</li>
						<li>Wextra</li>
						<li>Wbad-function-cast</li>
						<li>Wdeclaration-after-statement</li>
						<li>Werror-implicit-function-declaration</li>
						<li>Wmissing-braces</li>
						<li>Wmissing-declarations</li>
						<li>Wmissing-field-initializers</li>
						<li>Wmissing-prototypes</li>
						<li>Wnested-externs</li>
						<li>Wold-style-definition</li>
						<li>Wparentheses</li>
						<li>Wreturn-type</li>
						<li>Wshadow</li>
						<li>Wsign-compare</li>
						<li>Wstrict-prototypes</li>
						<li>Wswitch</li>
						<li>Wuninitialized</li>
						<li>Wunknown-pragmas</li>
						<li>Wunused-function</li>
						<li>Wunused-label</li>
						<li>Wunused-parameter</li>
						<li>Wunused-value</li>
						<li>Wunused-variable</li>
					</ul>
					<h4>C++</h4>
					<ul>
						<li>Os</li>
						<li>pedantic</li>
						<li>Werror</li>
						<li>Wall</li>
						<li>Wextra</li>
						<li>Wmissing-braces</li>
						<li>Wmissing-field-initializers</li>
						<li>Wmissing-prototypes</li>
						<li>Wparentheses</li>
						<li>Wreturn-type</li>
						<li>Wshadow</li>
						<li>Wsign-compare</li>
						<li>Wswitch</li>
						<li>Wuninitialized</li>
						<li>Wunknown-pragmas</li>
						<li>Wunused-function</li>
						<li>Wunused-label</li>
						<li>Wunused-parameter</li>
						<li>Wunused-value</li>
						<li>Wunused-variable</li>
					</ul>
					<h4>Objective-C</h4>
					<ul>
						<li>framework Cocoa</li>
						<li>std=c99</li>
						<li>Os</li>
						<li>pedantic</li>
						<li>Werror</li>
						<li>Wall</li>
						<li>Wextra</li>
						<li>Wbad-function-cast</li>
						<li>Wdeclaration-after-statement</li>
						<li>Werror-implicit-function-declaration</li>
						<li>Wmissing-braces</li>
						<li>Wmissing-declarations</li>
						<li>Wmissing-field-initializers</li>
						<li>Wmissing-prototypes</li>
						<li>Wnested-externs</li>
						<li>Wold-style-definition</li>
						<li>Wparentheses</li>
						<li>Wreturn-type</li>
						<li>Wshadow</li>
						<li>Wsign-compare</li>
						<li>Wstrict-prototypes</li>
						<li>Wstrict-selector-match</li>
						<li>Wswitch</li>
						<li>Wundeclared-selector</li>
						<li>Wuninitialized</li>
						<li>Wunknown-pragmas</li>
						<li>Wunused-function</li>
						<li>Wunused-label</li>
						<li>Wunused-parameter</li>
						<li>Wunused-value</li>
						<li>Wunused-variable</li>
					</ul>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
