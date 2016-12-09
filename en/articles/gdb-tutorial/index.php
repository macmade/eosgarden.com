<?php

header( 'Location: http://www.xs-labs.com/en/archives/articles/gdb-tutorial/', true, 301 );
exit();

?>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/articles.png" alt="" width="905" height="285" />
				</div>
				<div class="frame-spacer">&nbsp;</div>
				<div class="frame-content">
					<h2>GDB tutorial</h2>
					<div>
						<strong>Author:</strong> Jean-David Gadina &lt;<?php print Eos_Utils::getInstance()->mailTo( 'macmade@eosgarden.com' ); ?>&gt;<br />
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
					<div>
						<!-- RSS_ABSTRACT_BEGIN -->
						I have to admit I always felt stupid, while building XCode projects, when the GDB window comes out, or when it display a message like: «set a breakpoint in malloc to debug».<br />
						So I decided to learn a few things about GDB. This tutorial will explain you some of the basics.
						<!-- RSS_ABSTRACT_END -->
					</div>
					<h3>Example program &amp; Compilation</h3>
					<div>
						Before using GCC, we need a sample program to work with. We'll also need to add a specific compiler flag when compiling.<br />
						Let's begin with a simple C program:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">&lt;stdlib.h&gt;</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">void</span> do_stuff( <span class="code-keyword">void</span> );</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">unsigned long</span> x;</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">int</span> main( <span class="code-keyword">void</span> )</code><br />
						<code class="source">{</code><br />
						<code class="source">    x = 10;</code><br />
						<code class="source">    </code><br />
						<code class="source">    do_stuff();</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-keyword">return</span> 0;</code><br />
						<code class="source">}</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">void</span> do_stuff( <span class="code-keyword">void</span> )</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-keyword">char</span> * s;</code><br />
						<code class="source">    </code><br />
						<code class="source">    s = ( <span class="code-keyword">char</span> * )x;</code><br />
						<code class="source">    </code><br />
						<code class="source">    if( s != <span class="code-keyword">NULL</span> )</code><br />
						<code class="source">    {</code><br />
						<code class="source">        s[ 0 ] = 0;</code><br />
						<code class="source">    }</code><br />
						<code class="source">}</code>
					</div>
					<div>
						Name the file 'gdb_test.c', then compile and run the code with the following command:
					</div>
					<div class="code">
						<code class="source">gcc -Wall -o gdb_test gdb_test.c && ./gdb_test</code>
					</div>
					<div>
						No surprise, the program will end with a segmentation fault (EXC_BAD_ACCESS - SIGSEGV).
					</div>
					<div>
						Now compile the same file again, and add the '<strong>-g</strong>' parameter to the GCC invocation:
					</div>
					<div class="code">
						<code class="source">gcc -Wall -g -o gdb_test gdb_test.c</code>
					</div>
					<div>
						That will tell GCC to generate the debug symbols file. It will be called <strong>'gdb_test.dSYM'</strong>.<br />
						Such a file contains informations about each symbol of the executable (functions, variables, line numbers, etc). Now that we have that file, we are ready to use GDB.
					</div>
					<h3>Using GDB</h3>
					<div>
						Simply type '<strong>gdb</strong>' to enter a new GDB session. We'll the load our executable using the <strong>file</strong> command:
					</div>
					<div class="code">
						<code class="source">GNU gdb 6.3.50-20050815 (Apple version gdb-1518) (Thu Jan 27 08:34:47 UTC 2011)</code><br />
						<code class="source">Copyright 2004 Free Software Foundation, Inc.</code><br />
						<code class="source">GDB is free software, covered by the GNU General Public License, and you are</code><br />
						<code class="source">welcome to change it and/or distribute copies of it under certain conditions.</code><br />
						<code class="source">Type "show copying" to see the conditions.</code><br />
						<code class="source">There is absolutely no warranty for GDB.  Type "show warranty" for details.</code><br />
						<code class="source">This GDB was configured as "x86_64-apple-darwin".</code><br />
						<code class="source">(gdb) <strong>file gdb_test</strong></code>
					</div>
					<div>
						The executable is now loaded. We can run it with the '<strong>run</strong>' command:
					</div>
					<div class="code">
						<code class="source">(gdb) <strong>run</strong></code><br />
						<code class="source">Starting program: /Users/macmade/Desktop/gdb_test </code><br />
						<code class="source">Reading symbols for shared libraries +. done</code><br />
						<code class="source"></code><br />
						<code class="source">Program received signal EXC_BAD_ACCESS, Could not access memory.</code><br />
						<code class="source">Reason: KERN_INVALID_ADDRESS at address: 0x000000000000000a</code><br />
						<code class="source">0x0000000100000f0f in do_stuff () at gdb_test.c:24</code><br />
						<code class="source">24	        s[ 0 ] = 0;</code>
					</div>
					<div>
						We can see GDB caught the segmentation fault, and stopped the program's execution. It even display the line where the segmentation fault occurs. Very useful!
					</div>
					<div>
						We can also ask GDB for a backtrace, with the '<strong>bt</strong>' command:
					</div>
					<div class="code">
						<code class="source">(gdb) <strong>bt</strong></code><br />
						<code class="source">#0  0x0000000100000f0f in do_stuff () at gdb_test.c:24</code><br />
						<code class="source">#1  0x0000000100000eeb in main () at gdb_test.c:11</code>
					</div>
					<h3>Breakpoints</h3>
					<div>
						We can also set breakpoints with GDB. A breakpoint can be a function's name, a specific line number, or a condition.<br />
						When GDB encounters a breakpoint, it will stop the program execution. The execution can the be continued with the <strong>'s'</strong> (step) or <strong>'n'</strong> (next) commands.
					</div>
					<div>
						So lets run our program again, and let's set a breakpoint in the <strong>do_stuff()</strong> function:
					</div>
					<div class="code">
						<code class="source">(gdb) <strong>break do_stuff</strong></code><br />
						<code class="source">Breakpoint 1 at 0x100000ef6: file gdb_test.c, line 20.</code><br />
						<code class="source">(gdb) <strong>run</strong></code><br />
						<code class="source">The program being debugged has been started already.</code><br />
						<code class="source">Start it from the beginning? (y or n) <strong>y</strong></code><br />
						<code class="source">Starting program: /Users/macmade/Desktop/gdb_test </code><br />
						<code class="source"></code><br />
						<code class="source">Breakpoint 1, do_stuff () at gdb_test.c:20</code><br />
						<code class="source">20	    s = ( char * )x;</code><br />
						<code class="source">(gdb) </code>
					</div>
					<div>
						GDB will automatically stops the program's execution when we call the <strong>do_stuff()</strong> function.<br />
						Now we can inspect our program.
					</div>
					<div>
						We can start by asking the value of our '<strong>x</strong>' variable:
					</div>
					<div class="code">
						<code class="source">(gdb) <strong>p x</strong></code>
					</div>
					<div>
						That will print the value of the '<strong>x</strong>' variable:
					</div>
					<div class="code">
						<code class="source">$1 = 10</code>
					</div>
					<div>
						We can now modify that variable, so it equals '0' (NULL):
					</div>
					<div class="code">
						<code class="source">(gdb) '<strong>p x=0</strong></code>
					</div>
					<div>
						Now we've fixed the problem, and we can continue the program's execution, by stepping multiple times:
					</div>
					<div class="code">
						<code class="source">(gdb) <strong>s</strong></code>
					</div>
					<div>
						Till GDB prints:
					</div>
					<div class="code">
						<code class="source">Program exited normally.</code>
					</div>
					<?php  print new Eos_Comment_View() . chr( 10 ); ?>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			
