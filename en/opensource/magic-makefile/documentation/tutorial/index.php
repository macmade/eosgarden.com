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
					<div class="list-box">
						<div class="list-box-header">
							Documentation
						</div>
						<?php print Eos_Menu::getInstance()->getMenuLevel( 4 ) . chr( 10 ) ?>
					</div>
					<h2>Tutorial</h2>
					<div class="grey">
						<div>
							This tutorial will teach you how to use the Magic MakeFile for your development projects.
						</div>
						<div>
							We'll create a simple C project as an example, so you can see the major features of the Magic MakeFile. Note that the steps are exactly the same if you are using a language such as C++ or Objective-C.
						</div>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<div class="clearer"></div>
					<h2>Table of contents</h2>
					<div>
						<ol>
							<li>
								<a href="#start" title="Go to this section">Getting started</a>
							</li>
							<li>
								<a href="#files" title="Go to this section">Files &amp;directories</a>
							</li>
							<li>
								<a href="#project" title="Go to this section">Starting &amp;configuring a new project</a>
							</li>
							<li>
								<a href="#deps" title="Go to this section">Dependancies</a>
							</li>
							<li>
								<a href="#libs" title="Go to this section">Libraries</a>
							</li>
							<li>
								<a href="#syslibs" title="Go to this section">System libraries</a>
							</li>
							<li>
								<a href="#debug" title="Go to this section">Debug</a>
							</li>
						</ol>
					</div>
					<a name="start"></a>
					<h3>1. Getting started</h3>
					<div>
						In order to follow this tutorial, simply <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/magic-makefile/download/', 'dowload' ) ?> the Magic MakeFile.<br />
						Please also ensure that the 'make' command is available on your system, and that it's version is at least 3.81.
					</div>
					<div>
						To check the version of GNU make, type the following from a Terminal window:
					</div>
					<div class="code">
						<code class="source">make -v</code>
					</div>
					<div>
						You should see the following output:
					</div>
					<div class="code">
						<code class="source">GNU Make 3.81</code><br />
						<code class="source">Copyright (C) 2006  Free Software Foundation, Inc.</code><br />
						<code class="source">This is free software; see the source for copying conditions.</code><br />
						<code class="source">There is NO warranty; not even for MERCHANTABILITY or FITNESS FOR A</code><br />
						<code class="source">PARTICULAR PURPOSE.</code>
					</div>
					<div>
						If you see «<code class="source">bash: make: command not found</code>», or if the GNU make version is smaller that 3.81, you will need to install or update GNU make.
					</div>
					<div>
						GNU make can be downloaded from the <a href="http://www.gnu.org/software/make/" title="GNU make">GNU website</a>.<br />
						If you are using Linux, make should be available from your favorite package manager system.
					</div>
					<a name="files"></a>
					<h3>2. Files &amp; directories</h3>
					<div>
						After uncompression, you will get a directory with the follwing structure:
					</div>
					<ul class="filesystem">
						<li class="directory">
							<div>
								build<br />
								<span class="grey">The directory containing all the build files, by category (see below).</span>
							</div>
							<ul class="filesystem">
								<li class="directory">
									<div>
										bin<br />
										<span class="grey">The directory where the final executable files are stored.</span>
									</div>
								</li>
								<li class="directory">
									<div>
										lib<br />
										<span class="grey">The directory where the generated libraries (if any) are stored.</span>
									</div>
								</li>
								<li class="directory">
									<div>
										obj<br />
										<span class="grey">The directory where the resulting object code files for your source files are stored.</span>
									</div>
								</li>
							</ul>
						</li>
						<li class="file">
							<div>
								makefile<br />
								<span class="grey">The magic makefile itself (that should not be edited).</span>
							</div>
						</li>
						<li class="directory">
							<div>
								makefile-code<br />
								<span class="grey">The directory containing the per-language configuration options.</span>
							</div>
							<ul class="filesystem">
								<li class="file">
									<div>
										C.mk<br />
										<span class="grey">The settings for the C programming language.</span>
									</div>
								</li>
								<li class="file">
									<div>
										C++.mk<br />
										<span class="grey">The settings for the C++ programming language.</span>
									</div>
								</li>
								<li class="file">
									<div>
										Objective-C.mk<br />
										<span class="grey">The settings for the Objective-C programming language.</span>
									</div>
								</li>
								<li class="file">
									<div>
										...
									</div>
								</li>
							</ul>
						</li>
						<li class="file">
							<div>
								makefile-makefile-config.mk<br />
								<span class="grey">The project's configuration file</span>
							</div>
						</li>
						<li class="directory">
							<div>
								makefile-lang<br />
								<span class="grey">The directory where localization files are stored.</span>
							</div>
							<ul class="filesystem">
								<li class="file">
									<div>
										en.mk<br />
										<span class="grey">The english labels.</span>
									</div>
								</li>
								<li class="file">
									<div>
										fr.mk<br />
										<span class="grey">The french labels.</span>
									</div>
								</li>
								<li class="file">
									<div>
										...
									</div>
								</li>
							</ul>
						</li>
						<li class="directory">
							<div>
								source<br />
								<span class="grey">The directory for your source code.</span>
							</div>
							<ul class="filesystem">
								<li class="directory">
									<div>
										include<br />
										<span class="grey">The directory for your project's include files.</span>
									</div>
								</li>
								<li class="directory">
									<div>
										lib<br />
										<span class="grey">The directory for the source code of your project's libraries (if any).</span>
									</div>
									<ul class="filesystem">
										<li class="directory">
											<div>
												include<br />
										<span class="grey">The directory for the include files of your project's libraries (if any).</span>
											</div>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
					<a name="project"></a>
					<h3>3. Starting &amp; configuring a new project</h3>
					<div>
						When starting a new project, the only file you have to edit is the 'makefile-makefile-config.mk' file, that contains all the build settings related to your project.<br />
						No other file needs to be edited.
					</div>
					<div>
						Please take a look at the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/magic-makefile/documentation/reference/', 'complete reference' ) ?> to learn more about the available configuration options.
					</div>
					<div>
						We will create a typicall 'HelloWorld' C program.<br />
						So in the 'source' directory, create a 'hello.c' file. This will be our main executable.
					</div>
					<div>
						Place the following code in that file:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#include</span> &lt;stdlib.h&gt;</code><br />
						<code class="source"><span class="code-keyword">#include</span> &lt;stdio.h&gt;</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">int</span> main( <span class="code-keyword">void</span> )</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-ctag">printf</span>( <span class="code-string">"hello, world\n"</span> );</code><br />
						<code class="source">    <span class="code-keyword">return</span> <span class="code-ctag">EXIT_SUCCESS</span>;</code><br />
						<code class="source">}</code>
					</div>
					<div>
						We need to configure the Magic MakeFile so it builds an executable from our C file.<br />
						Open the 'makefile-config.mk' file and look for the following line:
					</div>
					<div class="code">
						<code class="source">EXEC = main</code>
					</div>
					<div>
						This defines the names of the final executable files. You can add multiple names by separating each one by a space.<br />
						For the example, replace that line by the following:
					</div>
					<div class="code">
						<code class="source">EXEC = hello</code>
					</div>
					<div>
						The Magic MakeFile now knows that it should generate an executable named 'hello' from our 'hello.c' file.
					</div>
					<div>
						Also notice the line saying:
					</div>
					<div class="code">
						<code class="source">code = C</code>
					</div>
					<div>
						This is where you configure the programming language you use.
					</div>
					<div>
						Now, from a Terminal window, cd into the project's directory and type:
					</div>
					<div class="code">
						<code class="source">make clean</code><br />
						<code class="source">make</code>
					</div>
					<div>
						The first line ensures all output files are removed, so all of our source code is compiled again. Otherwise, it just re-compiles the files that have been modified since the last build.<br />
						The second line will produce the following output, meaning the executable was successfully generated:
					</div>
					<div class="code">
						<code class="source">#--------------------------------------------------</code><br />
						<code class="source"># Beginning make script</code><br />
						<code class="source">#</code><br />
						<code class="source"># Version of GNU Make needed: 3.81</code><br />
						<code class="source"># Current version of GNU Make: 3.81</code><br />
						<code class="source">#--------------------------------------------------</code><br />
						<code class="source"></code><br />
						<code class="source">--- Finding and building the libraries</code><br />
						<code class="source"></code><br />
						<code class="source">--- Done - All libraries were processed</code><br />
						<code class="source"></code><br />
						<code class="source">--- Finding and building the shared objects</code><br />
						<code class="source"></code><br />
						<code class="source">------ Building the object file for ./source/hello.c in ./build/obj/</code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">--- Done - All shared objects were processed</code><br />
						<code class="source"></code><br />
						<code class="source">--- Finding and building the executables</code><br />
						<code class="source"></code><br />
						<code class="source">------ Finding dependancies for hello</code><br />
						<code class="source">------ Done - hello does not depend on shared objects</code><br />
						<code class="source"></code><br />
						<code class="source">------ Building the executable hello for build/obj/hello.o in ./build/bin/</code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">--- Done - All executables were processed</code><br />
						<code class="source"></code><br />
						<code class="source">#--------------------------------------------------</code><br />
						<code class="source"># End of the make script</code><br />
						<code class="source">#</code><br />
						<code class="source"># Thanx for using this makefile</code><br />
						<code class="source"># Have a nice day</code><br />
						<code class="source">#--------------------------------------------------</code>
					</div>
					<div>
						You will find the resulting executable in the 'build/bin/' directory.<br />
						To test it, type:
					</div>
					<div class="code">
						<code class="source">./build/bin/hello</code>
					</div>
					<a name="deps"></a>
					<h3>4. Dependancies</h3>
					<div>
						Now what if we want to have a 'sayHello' function, placed in a separate file, and called from our C main function?
					</div>
					<div>
						The Magic MakeFile can automatically take care of that kind of dependancy.<br />
						So let's create another C file called 'functions.c' in the 'source' directory. Place the following code in that file:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#include</span> &lt;stdio.h&gt;</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">#include</span> "functions.h"</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">void</span> sayHello( <span class="code-keyword">void</span> )</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-ctag">printf</span>( <span class="code-string">"hello, world\n"</span> );</code><br />
						<code class="source">}</code>
					</div>
					<div>
						Also create a C header file called 'functions.h' in the 'source/include/' directory, with the following code:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#ifndef</span> FUNCTIONS_H</code><br />
						<code class="source"><span class="code-keyword">#define</span> FUNCTIONS_H</code><br />
						<code class="source"><span class="code-keyword">#pragma</span> once</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">void</span> sayHello( <span class="code-keyword">void</span> );</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">#endif</span></code>
					</div>
					<div>
						Now, let's modifiy the 'hello.c' file, so it uses the 'sayHello' function:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#include</span> &lt;stdlib.h&gt;</code><br />
						<code class="source"><span class="code-keyword">#include</span> &lt;stdio.h&gt;</code><br />
						<code class="source"></code><br />
						<code class="source"><strong><span class="code-keyword">#include</span> "functions.h"</strong></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">int</span> main( <span class="code-keyword">void</span> )</code><br />
						<code class="source">{</code><br />
						<code class="source">    <strong>sayHello();</strong></code><br />
						<code class="source">    <span class="code-keyword">return</span> <span class="code-ctag">EXIT_SUCCESS</span>;</code><br />
						<code class="source">}</code>
					</div>
					<div>
						Note that even if we placed the header file in the 'source/include/' directory, we can include it by using the file name, without the 'include/' prefix, because the Magic MakeFile automatically searches the 'source/include/' directory for header files.
					</div>
					<div>
						The last step is to let the Magic MakeFile know that the 'hello.c' file has a dependancy on the 'functions.c' file.<br />
						This is done by editing the 'makefile-config.mk' file.
					</div>
					<div>
						Locate the line that says:
					</div>
					<div class="code">
						<code class="source">DEPS_main =</code>
					</div>
					<div>
						That's the place where we can put dependancies for an executable called 'main'.<br />
						As our executable is called 'hello', simply replace that line by the following one:
					</div>
					<div class="code">
						<code class="source">DEPS_hello = functions</code>
					</div>
					<div>
						You can place multiple dependancies by separating them by a space.<br />
						If you have multiple executables, you can of course add other 'DEPS_' lines, one by exectable.
					</div>
					<div>
						Now, if we build our project:
					</div>
					<div class="code">
						<code class="source">#--------------------------------------------------</code><br />
						<code class="source"># Beginning make script</code><br />
						<code class="source">#</code><br />
						<code class="source"># Version of GNU Make needed: 3.81</code><br />
						<code class="source"># Current version of GNU Make: 3.81</code><br />
						<code class="source">#--------------------------------------------------</code><br />
						<code class="source"></code><br />
						<code class="source">--- Finding and building the libraries</code><br />
						<code class="source"></code><br />
						<code class="source">--- Done - All libraries were processed</code><br />
						<code class="source"></code><br />
						<code class="source">--- Finding and building the shared objects</code><br />
						<code class="source"></code><br />
						<code class="source">------ Building the object file for ./source/functions.c in ./build/obj/</code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">------ Building the object file for ./source/hello.c in ./build/obj/</code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">--- Done - All shared objects were processed</code><br />
						<code class="source"></code><br />
						<code class="source">--- Finding and building the executables</code><br />
						<code class="source"></code><br />
						<code class="source">------ Finding dependancies for hello</code><br />
						<code class="source"></code><br />
						<code class="source">--------- functions</code><br />
						<code class="source"></code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">------ Building the executable hello in ./build/bin/ by linking ./build/obj/hello.o with its dependancies: </code><br />
						<code class="source"></code><br />
						<code class="source">--------- ./build/obj/functions.o</code><br />
						<code class="source"></code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">--- Done - All executables were processed</code><br />
						<code class="source"></code><br />
						<code class="source">#--------------------------------------------------</code><br />
						<code class="source"># End of the make script</code><br />
						<code class="source">#</code><br />
						<code class="source"># Thanx for using this makefile</code><br />
						<code class="source"># Have a nice day</code><br />
						<code class="source">#--------------------------------------------------</code>
					</div>
					<div>
						We can see the executable was sucessfully generated.
					</div>
					<div>
						The Magic MakeFile produced two intermediate object code files ('functions.o' and 'hello.o'), and produced the final executable by linking the two object code files together.
					</div>
					<a name="libs"></a>
					<h3>5. Libraries</h3>
					<div>
						Rather than generating object code files for the dependancies, you can also choose to tell the Magic MakeFile to generate static libraries.
					</div>
					<div>
						To do this, simply put the C code of your libraries in the 'source/lib/' directory (and the related header files in the 'source/lib/include/' directory).<br />
						In the 'makefile-config.mk' file, use the 'DEPS_LIB_' variable instead of the 'DEPS_' variable.
					</div>
					<div>
						Let's demonstrate that.<br />
						Create a new C file called 'libfunctions.c' in the 'source/lib/' directory, and it's header file, 'libfunctions.h' in the 'source/lib/include/' directory.
					</div>
					<div>
						Note that the name of the library files <strong>MUST</strong> begin with the 'lib' prefix.<br />
						This is a requirement of the GNU libtool linker.
					</div>
					<div>
						Here's the source code of 'libfunctions.c':
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#include</span> &lt;stdio.h&gt;</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">#include</span> "libfunctions.h"</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">void</span> sayHelloFromLib( <span class="code-keyword">void</span> )</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-ctag">printf</span>( <span class="code-string">"Hello Universe!\n"</span> );</code><br />
						<code class="source">}</code>
					</div>
					<div>
						Here's the source code of 'libfunctions.h':
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#ifndef</span> LIBFUNCTIONS_H</code><br />
						<code class="source"><span class="code-keyword">#define</span> LIBFUNCTIONS_H</code><br />
						<code class="source"><span class="code-keyword">#pragma</span> once</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">void</span> sayHelloFromLib( <span class="code-keyword">void</span> );</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">#endif</span></code>
					</div>
					<div>
						Modify the main C file, so we also call the 'sayHelloFromLib' function:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#include</span> &lt;stdlib.h&gt;</code><br />
						<code class="source"><span class="code-keyword">#include</span> &lt;stdio.h&gt;</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">#include</span> "functions.h"</code><br />
						<code class="source"><strong><span class="code-keyword">#include</span> "libfunctions.h"</strong></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">int</span> main( <span class="code-keyword">void</span> )</code><br />
						<code class="source">{</code><br />
						<code class="source">    sayHello();</code><br />
						<code class="source">    <strong>sayHelloFromLib();</strong></code><br />
						<code class="source">    <span class="code-keyword">return</span> <span class="code-ctag">EXIT_SUCCESS</span>;</code><br />
						<code class="source">}</code>
					</div>
					<div>
						Adds the dependancy in the 'makefile-config.mk' file:
					</div>
					<div class="code">
						<code class="source">DEPS_LIB_hello = libfunctions</code>
					</div>
					<div>
						You can now build your project.
					</div>
					<a name="debug"></a>
					<h3>6. System libraries</h3>
					<div>
						You can also link final executables with system libraries.
					</div>
					<div>
						For instance, in order to link with the libcrypto library:
					</div>
					<div class="code">
						<code class="source">DEPS_SYSLIB_hello = crypto</code>
					</div>
					<div>
						That will tell the makefile to add additional linker flags for the system libraries (in that case -lcrypto).
					</div>
					<a name="debug"></a>
					<h3>7. Debug</h3>
					<div>
						You can tell the Magic MakeFile to display the commands it uses to produce the executables by setting the 'DEBUG_' variables of the 'makefile-config.mk' file to one.<br />
						Note that you can also set those variables directly from the command line.
					</div>
					<div>
						For instance, for the previous example:
					</div>
					<div class="code">
						<code class="source">make clean</code><br />
						<code class="source">make DEBUG_LIBTOOL=1 DEBUG_CC=1</code>
					</div>
					<div>
						You will be able to see how the magic MakeFile generates the build files:
					</div>
					<div class="code">
						<code class="source">#--------------------------------------------------</code><br />
						<code class="source"># Beginning make script</code><br />
						<code class="source">#</code><br />
						<code class="source"># Version of GNU Make needed: 3.81</code><br />
						<code class="source"># Current version of GNU Make: 3.81</code><br />
						<code class="source">#--------------------------------------------------</code><br />
						<code class="source"></code><br />
						<code class="source">--- Finding and building the libraries</code><br />
						<code class="source"></code><br />
						<code class="source">------ Building the library object file for ./source/lib/libfunctions.c in ./build/lib/</code><br />
						<code class="source">glibtool: compile:  gcc -c ./source/lib/libfunctions.c -I ./source/include -I ./source/lib/include -std=c99 -Os -pedantic -Werror -Wall -Wextra -Wbad-function-cast -Wdeclaration-after-statement -Werror-implicit-function-declaration -Wmissing-braces -Wmissing-declarations -Wmissing-field-initializers -Wmissing-prototypes -Wnested-externs -Wold-style-definition -Wparentheses -Wreturn-type -Wshadow -Wsign-compare -Wstrict-prototypes -Wswitch -Wuninitialized -Wunknown-pragmas -Wunused-function -Wunused-label -Wunused-parameter -Wunused-value -Wunused-variable -fno-common -DPIC -o build/lib/.libs/libfunctions.o</code><br />
						<code class="source">glibtool: compile:  gcc -c ./source/lib/libfunctions.c -I ./source/include -I ./source/lib/include -std=c99 -Os -pedantic -Werror -Wall -Wextra -Wbad-function-cast -Wdeclaration-after-statement -Werror-implicit-function-declaration -Wmissing-braces -Wmissing-declarations -Wmissing-field-initializers -Wmissing-prototypes -Wnested-externs -Wold-style-definition -Wparentheses -Wreturn-type -Wshadow -Wsign-compare -Wstrict-prototypes -Wswitch -Wuninitialized -Wunknown-pragmas -Wunused-function -Wunused-label -Wunused-parameter -Wunused-value -Wunused-variable -o build/lib/libfunctions.o >/dev/null 2>&1</code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">------ Building the library archive file for ./build/lib/libfunctions.lo in ./build/lib/</code><br />
						<code class="source">glibtool: link: rm -fr  build/lib/.libs/libfunctions.a build/lib/.libs/libfunctions.la</code><br />
						<code class="source">glibtool: link: ar cru build/lib/.libs/libfunctions.a build/lib/.libs/libfunctions.o </code><br />
						<code class="source">glibtool: link: ranlib build/lib/.libs/libfunctions.a</code><br />
						<code class="source">glibtool: link: ( cd "build/lib/.libs" &amp;&amp; rm -f "libfunctions.la" &amp;&amp; ln -s "../libfunctions.la" "libfunctions.la" )</code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">--- Done - All libraries were processed</code><br />
						<code class="source"></code><br />
						<code class="source">--- Finding and building the shared objects</code><br />
						<code class="source"></code><br />
						<code class="source">------ Building the object file for ./source/functions.c in ./build/obj/</code><br />
						<code class="source">gcc -I ./source/include -I ./source/lib/include -std=c99 -Os -pedantic -Werror -Wall -Wextra -Wbad-function-cast -Wdeclaration-after-statement -Werror-implicit-function-declaration -Wmissing-braces -Wmissing-declarations -Wmissing-field-initializers -Wmissing-prototypes -Wnested-externs -Wold-style-definition -Wparentheses -Wreturn-type -Wshadow -Wsign-compare -Wstrict-prototypes -Wswitch -Wuninitialized -Wunknown-pragmas -Wunused-function -Wunused-label -Wunused-parameter -Wunused-value -Wunused-variable -o ./build/obj/functions.o -c ./source/functions.c</code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">------ Building the object file for ./source/hello.c in ./build/obj/</code><br />
						<code class="source">gcc -I ./source/include -I ./source/lib/include --std=c99 -Os -pedantic -Werror -Wall -Wextra -Wbad-function-cast -Wdeclaration-after-statement -Werror-implicit-function-declaration -Wmissing-braces -Wmissing-declarations -Wmissing-field-initializers -Wmissing-prototypes -Wnested-externs -Wold-style-definition -Wparentheses -Wreturn-type -Wshadow -Wsign-compare -Wstrict-prototypes -Wswitch -Wuninitialized -Wunknown-pragmas -Wunused-function -Wunused-label -Wunused-parameter -Wunused-value -Wunused-variable -o ./build/obj/hello.o -c ./source/hello.c</code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">--- Done - All shared objects were processed</code><br />
						<code class="source"></code><br />
						<code class="source">--- Finding and building the executables</code><br />
						<code class="source"></code><br />
						<code class="source">------ Finding dependancies for hello</code><br />
						<code class="source"></code><br />
						<code class="source">--------- libfunctions </code><br />
						<code class="source">--------- functions</code><br />
						<code class="source"></code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">------ Building the executable hello in ./build/bin/ by linking ./build/obj/hello.o with its dependancies: </code><br />
						<code class="source"></code><br />
						<code class="source">--------- ./build/lib/libfunctions.la</code><br />
						<code class="source">--------- ./build/obj/functions.o</code><br />
						<code class="source"></code><br />
						<code class="source">glibtool: link: gcc -o build/bin/hello ./build/obj/hello.o ./build/obj/functions.o -I ./source/include -I ./source/lib/include -std=c99 -Os -pedantic -Werror -Wall -Wextra -Wbad-function-cast -Wdeclaration-after-statement -Werror-implicit-function-declaration -Wmissing-braces -Wmissing-declarations -Wmissing-field-initializers -Wmissing-prototypes -Wnested-externs -Wold-style-definition -Wparentheses -Wreturn-type -Wshadow -Wsign-compare -Wstrict-prototypes -Wswitch -Wuninitialized -Wunknown-pragmas -Wunused-function -Wunused-label -Wunused-parameter -Wunused-value -Wunused-variable ./build/lib/.libs/libfunctions.a</code><br />
						<code class="source">------ Done</code><br />
						<code class="source"></code><br />
						<code class="source">--- Done - All executables were processed</code><br />
						<code class="source"></code><br />
						<code class="source">#--------------------------------------------------</code><br />
						<code class="source"># End of the make script</code><br />
						<code class="source">#</code><br />
						<code class="source"># Thanx for using this makefile</code><br />
						<code class="source"># Have a nice day</code><br />
						<code class="source">#--------------------------------------------------</code>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
