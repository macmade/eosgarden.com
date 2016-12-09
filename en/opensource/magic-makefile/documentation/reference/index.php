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
					<a name="feature"></a>
					<div class="list-box">
						<div class="list-box-header">
							Documentation
						</div>
						<?php print Eos_Menu::getInstance()->getMenuLevel( 4 ) . chr( 10 ) ?>
					</div>
					<h2>Reference</h2>
					<div class="grey">
						<div>
							You will find below all the available configuration directive for the Magic MakeFile.
						</div>
						<div>
							You can either edit them directly in the 'makefile-config.mk' file, or temporary set them from the command line, when calling make.
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
								<a href="#project-configuration" title="Go to this section">Project configuration</a>
							</li>
							<li>
								<a href="#executables-dependancies" title="Go to this section">Executables &amp; dependancies</a>
							</li>
							<li>
								<a href="#directories" title="Go to this section">Directories</a>
							</li>
							<li>
								<a href="#external-tools" title="Go to this section">External tools</a>
							</li>
							<li>
								<a href="#external-tools-arguments" title="Go to this section">Arguments for the external tools</a>
							</li>
							<li>
								<a href="#debug-options" title="Go to this section">Debug options</a>
							</li>
							<li>
								<a href="#output" title="Go to this section">Output</a>
							</li>
							<li>
								<a href="#installation-tools" title="Go to this section">Installation tools</a>
							</li>
							<li>
								<a href="#installation-paths" title="Go to this section">Installation paths</a>
							</li>
							<li>
								<a href="#language-settings" title="Go to this section">Language specific settings</a>
								<ol>
									<li>
										<a href="#language-settings-c" title="Go to this section">C</a>
									</li>
									<li>
										<a href="#language-settings-cpp" title="Go to this section">C++</a>
									</li>
									<li>
										<a href="#language-settings-objc" title="Go to this section">Objective-C</a>
									</li>
								</ol>
							</li>
						</ol>
					</div>
					<a name="project-configuration"></a>
					<h3>Project configuration</h3>
					<h4><code class="source">code</code><span class="grey"> - Programming language</span></h4>
					<div class="code">
						<code class="source">code = C</code>
					</div>
					<div>
						This is were you define the programming language used in your project.<br />
						Actually, 'C', 'C++' and 'Objective-C' are supported.
					</div>
					<div>
						Note that the settings for each language are placed in the 'makefile-code' directory. You'll find a detailed explaination about those settings at the end of this page.
					</div>
					<h4><code class="source">lang</code><span class="grey"> - Output language</span></h4>
					<div class="code">
						<code class="source">lang = en</code>
					</div>
					<div>
						The language that the Magic MakeFile will use for its output messages.<br />
						Actually, 'en' or 'fr' are supported. Translators are welcome...
					</div>
					<a name="executables-dependancies"></a>
					<h3>Executables &amp; dependancies</h3>
					<h4><code class="source">EXEC</code><span class="grey"> - Final executable(s)</span></h4>
					<div class="code">
						<code class="source">EXEC = main</code>
					</div>
					<div>
						The name of the final executable(s) that will be built.<br />
						If you need to generate several executables, simply separate them by a single space.
					</div>
					<div>
						Note that you need to have a source file with the same name as the target.<br />
						For instance, if your final executable is called 'my_soft', and if you are using C as programming language, you'll need to have a 'my_soft.c' file in the source directory.
					</div>
					<h4><code class="source">DEPS_</code><span class="grey"> - Object code dependancies</span></h4>
					<div class="code">
						<code class="source">DEPS_main =</code>
					</div>
					<div>
						The dependancies for a final executable.<br />
						The name after 'DEPS_' must be the same as the executable you configured in the 'EXEC' section.<br />
						If you have several executables, simply add other 'DEPS_' lines.
					</div>
					<div>
						Listed dependancies must have a corresponding source file, in the source directory.<br />
						For instance, 'DEPS_main = funcs' will compile the 'funcs.c' and 'main.c' files from the source directory and link them together to generate an executable called main.<br />
						Separate dependancies for a single executable by a single space.
					</div>
					<h4><code class="source">DEPS_LIB_</code><span class="grey"> - Library dependancies</span></h4>
					<div class="code">
						<code class="source">DEPS_LIB_main =</code>
					</div>
					<div>
						This setting works the same way as the previous one, with the difference that listed dependancies will be taken form the 'source/lib' directory.<br />
						For each dependancy, a static library will be built (instead of object code), and then linked with the final executable.
					</div>
					<h4><code class="source">DEPS_SYSLIB_</code><span class="grey"> - System library dependancies</span></h4>
					<div class="code">
						<code class="source">DEPS_SYSLIB_main =</code>
					</div>
					<div>
						You may list here the system libraries that have to be linked with the final executable.
					</div>
					<h4><code class="source">OBJC_FRAMEWORK</code><span class="grey"> - Objective-C framework(s)</span></h4>
					<div class="code">
						<code class="source">OBJC_FRAMEWORK = Cocoa</code>
					</div>
					<div>
						This setting is only applicable if Objective-C is defined as the programming language.<br />
						It specifies the frameworks that will be linked with the executables.
					</div>
					<div>
						By default, the 'Cocoa' framework is set, but you can add other ones if you need them.<br />
						Simply separate frameworks with a single space.
					</div>
					<a name="directories"></a>
					<h3>Directories</h3>
					<h4><code class="source">DIR_BUILD</code><span class="grey"> - Build directory</span></h4>
					<div class="code">
						<code class="source">DIR_BUILD = ./build</code>
					</div>
					<div>
						The directory for the build files.
					</div>
					<h4><code class="source">DIR_BUILD_BIN</code><span class="grey"> - Build directory (executables)</span></h4>
					<div class="code">
						<code class="source">DIR_BUILD_BIN = $(DIR_BUILD)/bin</code>
					</div>
					<div>
						The directory where the final executables will be placed, after compiling the project.
					</div>
					<h4><code class="source">DIR_BUILD_OBJ</code><span class="grey"> - Build directory (object code)</span></h4>
					<div class="code">
						<code class="source">DIR_BUILD_OBJ = $(DIR_BUILD)/obj</code>
					</div>
					<div>
						The directory where the intermediate object-code files will be placed, after compiling the project.
					</div>
					<h4><code class="source">DIR_BUILD_LIB</code><span class="grey"> - Build directory (libraries)</span></h4>
					<div class="code">
						<code class="source">DIR_BUILD_LIB = $(DIR_BUILD)/lib</code>
					</div>
					<div>
						The directory where the generated static libraries will be placed, after compiling the project.
					</div>
					<h4><code class="source">DIR_SRC</code><span class="grey"> - Sources</span></h4>
					<div class="code">
						<code class="source">DIR_SRC = ./source</code>
					</div>
					<div>
						The directory where the main source files are located.
					</div>
					<h4><code class="source">DIR_SRC_LIB</code><span class="grey"> - Library sources</span></h4>
					<div class="code">
						<code class="source">DIR_SRC_LIB = $(DIR_SRC)/lib</code>
					</div>
					<div>
						The directory where the source files for the libraries are located.
					</div>
					<h4><code class="source">DIR_SRC_INC</code><span class="grey"> - Includes</span></h4>
					<div class="code">
						<code class="source">DIR_SRC_INC = $(DIR_SRC)/include</code>
					</div>
					<div>
						The directory where the main include files are located.
					</div>
					<h4><code class="source">DIR_SRC_LIB_INC</code><span class="grey"> - Library includes</span></h4>
					<div class="code">
						<code class="source">DIR_SRC_LIB_INC = $(DIR_SRC_LIB)/include</code>
					</div>
					<div>
						The directory where the include files for the libraries are located.
					</div>
					<a name="external-tools"></a>
					<h3>External tools</h3>
					<h4><code class="source">RM</code><span class="grey"> - Removal tool</span></h4>
					<div class="code">
						<code class="source">RM = rm</code>
					</div>
					<div>
						The tool used to remove files or directories.
					</div>
					<h4><code class="source">INSTALL</code><span class="grey"> - Install tool</span></h4>
					<div class="code">
						<code class="source">INSTALL = install</code>
					</div>
					<div>
						The tool used to install files into their final destinations.
					</div>
					<h4><code class="source">SHELL</code><span class="grey"> - Used shell</span></h4>
					<div class="code">
						<code class="source">SHELL = /bin/sh</code>
					</div>
					<div>
						The shell that will be used for some operations.
					</div>
					<h3>Arguments for the external tools</h3>
					<a name="external-tools-arguments"></a>
					<h4><code class="source">ARGS_RM</code></h4>
					<div class="code">
						<code class="source">ARGS_RM = -rf</code>
					</div>
					<div>
						The arguments for the file removal tool.
					</div>
					<h4><code class="source">ARGS_INSTALL</code></h4>
					<div class="code">
						<code class="source">ARGS_INSTALL =</code>
					</div>
					<div>
						The arguments for the installation tool.
					</div>
					<a name="debug-options"></a>
					<h3>Debug options</h3>
					<h4><code class="source">DEBUG_LIBTOOL</code><span class="grey"> - Linker debug</span></h4>
					<div class="code">
						<code class="source">DEBUG_LIBTOOL = 0</code>
					</div>
					<div>
						If set to '1', displays the commands used to link generated files together, in order to create the executables.
					</div>
					<h4><code class="source">DEBUG_CC</code><span class="grey"> - Compiler debug</span></h4>
					<div class="code">
						<code class="source">DEBUG_CC = 0</code>
					</div>
					<div>
						If set to '1', displays the commands used to compile individual source files.
					</div>
					<h4><code class="source">DEBUG_RM</code><span class="grey"> - Remove debug</span></h4>
					<div class="code">
						<code class="source">DEBUG_RM = 0</code>
					</div>
					<div>
						If set to '1', displays the commands used to remove files or directories.
					</div>
					<h4><code class="source">DEBUG_INSTALL</code><span class="grey"> - Installation debug</span></h4>
					<div class="code">
						<code class="source">DEBUG_INSTALL = 0</code>
					</div>
					<div>
						If set to '1', displays the commands used to install files into their final destinations.
					</div>
					<a name="output"></a>
					<h3>Output</h3>
					<h4><code class="source">DISPLAY_HEADER</code></h4>
					<div class="code">
						<code class="source">DISPLAY_HEADER = 1</code>
					</div>
					<div>
						If set to '1', displays the Magic MakeFile header notice.
					</div>
					<h4><code class="source">DISPLAY_FOOTER</code></h4>
					<div class="code">
						<code class="source">DISPLAY_FOOTER = 1</code>
					</div>
					<div>
						If set to '1', displays the Magic MakeFile footer notice.
					</div>
					<a name="installation-tools"></a>
					<h3>Installation tools</h3>
					<h4><code class="source">INSTALL_PROGRAM</code></h4>
					<div class="code">
						<code class="source">INSTALL_PROGRAM = $(INSTALL)</code>
					</div>
					<div>
						The tool used to install software.
					</div>
					<h4><code class="source">INSTALL_DATA</code></h4>
					<div class="code">
						<code class="source">INSTALL_DATA = $(INSTALL) -m 644</code>
					</div>
					<div>
						The tool used to install software's data, that does not require an execution flag.
					</div>
					<a name="installation-paths"></a>
					<h3>Installation paths</h3>
					<div>
						Those variables are used in most makefiles to control where the final files will be installed.<br />
						The 'prefix' variable controls where all files will be located. The other ones are used for fine tuning, if necessary.
					</div>
					<h4><code class="source">prefix</code></h4>
					<div class="code">
						<code class="source">prefix = /usr/local</code>
					</div>
					<h4><code class="source">exec_prefix</code></h4>
					<div class="code">
						<code class="source">exec_prefix = $(prefix)</code>
					</div>
					<h4><code class="source">bindir</code></h4>
					<div class="code">
						<code class="source">bindir = $(exec_prefix)/bin</code>
					</div>
					<h4><code class="source">sbindir</code></h4>
					<div class="code">
						<code class="source">sbindir = $(exec_prefix)/sbin</code>
					</div>
					<h4><code class="source">libexecdir</code></h4>
					<div class="code">
						<code class="source">libexecdir = $(exec_prefix)/libexec</code>
					</div>
					<h4><code class="source">datarootdir</code></h4>
					<div class="code">
						<code class="source">datarootdir = $(prefix)/share</code>
					</div>
					<h4><code class="source">datadir</code></h4>
					<div class="code">
						<code class="source">datadir = $(datarootdir)</code>
					</div>
					<h4><code class="source">infodir</code></h4>
					<div class="code">
						<code class="source">infodir = $(datarootdir)/info</code>
					</div>
					<a name="language-settings"></a>
					<h3>Language specific settings</h3>
					<div>
						Independant settings can be configured for each supported language.<br />
						The language settings can be found on the 'makefile-code' directory. They are included, depending on which language you are using.
					</div>
					<div>
						Here's the list of the default settings:
					</div>
					<a name="language-settings-c"></a>
					<h4>C</h4>
					<div>
						<strong>Compiler:</strong> gcc<br />
						<strong>Linker:</strong> glibtool<br />
					</div>
					<div>
						<strong>Compiler options:</strong>
					</div>
					<ul>
						<li>-std=c99</li>
						<li>-Os</li>
						<li>-pedantic</li>
						<li>-Werror</li>
						<li>-Wall</li>
						<li>-Wextra</li>
						<li>-Wbad-function-cast</li>
						<li>-Wdeclaration-after-statement</li>
						<li>-Werror-implicit-function-declaration</li>
						<li>-Wmissing-braces</li>
						<li>-Wmissing-declarations</li>
						<li>-Wmissing-field-initializers</li>
						<li>-Wmissing-prototypes</li>
						<li>-Wnested-externs</li>
						<li>-Wold-style-definition</li>
						<li>-Wparentheses</li>
						<li>-Wreturn-type</li>
						<li>-Wshadow</li>
						<li>-Wsign-compare</li>
						<li>-Wstrict-prototypes</li>
						<li>-Wswitch</li>
						<li>-Wuninitialized</li>
						<li>-Wunknown-pragmas</li>
						<li>-Wunused-function</li>
						<li>-Wunused-label</li>
						<li>-Wunused-parameter</li>
						<li>-Wunused-value</li>
						<li>-Wunused-variable</li>
					</ul>
					<a name="language-settings-cpp"></a>
					<h4>C++</h4>
					<div>
						<strong>Compiler:</strong> g++<br />
						<strong>Linker:</strong> glibtool<br />
					</div>
					<div>
						<strong>Compiler options:</strong>
					</div>
					<ul>
						<li>-Os</li>
						<li>-pedantic</li>
						<li>-Werror</li>
						<li>-Wall</li>
						<li>-Wextra</li>
						<li>-Wmissing-braces</li>
						<li>-Wmissing-field-initializers</li>
						<li>-Wmissing-prototypes</li>
						<li>-Wparentheses</li>
						<li>-Wreturn-type</li>
						<li>-Wshadow</li>
						<li>-Wsign-compare</li>
						<li>-Wswitch</li>
						<li>-Wuninitialized</li>
						<li>-Wunknown-pragmas</li>
						<li>-Wunused-function</li>
						<li>-Wunused-label</li>
						<li>-Wunused-parameter</li>
						<li>-Wunused-value</li>
						<li>-Wunused-variable</li>

					</ul>
					<a name="language-settings-objc"></a>
					<h4>Objective-C</h4>
					<div>
						<strong>Compiler:</strong> gcc<br />
						<strong>Linker:</strong> glibtool<br />
					</div>
					<div>
						<strong>Compiler options:</strong>
					</div>
					<ul>
						<li>-std=c99</li>
						<li>-Os</li>
						<li>-pedantic</li>
						<li>-Werror</li>
						<li>-Wall</li>
						<li>-Wextra</li>
						<li>-Wbad-function-cast</li>
						<li>-Wdeclaration-after-statement</li>
						<li>-Werror-implicit-function-declaration</li>
						<li>-Wmissing-braces</li>
						<li>-Wmissing-declarations</li>
						<li>-Wmissing-field-initializers</li>
						<li>-Wmissing-prototypes</li>
						<li>-Wnested-externs</li>
						<li>-Wold-style-definition</li>
						<li>-Wparentheses</li>
						<li>-Wreturn-type</li>
						<li>-Wshadow</li>
						<li>-Wsign-compare</li>
						<li>-Wstrict-prototypes</li>
						<li>-Wstrict-selector-match</li>
						<li>-Wswitch</li>
						<li>-Wundeclared-selector</li>
						<li>-Wuninitialized</li>
						<li>-Wunknown-pragmas</li>
						<li>-Wunused-function</li>
						<li>-Wunused-label</li>
						<li>-Wunused-parameter</li>
						<li>-Wunused-value</li>
						<li>-Wunused-variable</li>
					</ul>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
