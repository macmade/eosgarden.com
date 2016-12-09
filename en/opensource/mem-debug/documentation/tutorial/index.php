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
					<h2>Tutorial</h2>
                    <div class="grey">
                        MEMDebug is a C library allowing to trace, inspect and debug the dynamic memory allocations inside a C program.
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
								<a href="#technical" title="Go to this section">Technical details</a>
							</li>
							<li>
								<a href="#usage" title="Go to this section">Usage</a>
								<ol>
									<li>
										<a href="#usage-example" title="Go to this section">Example</a>
									</li>
									<li>
										<a href="#usage-status" title="Go to this section">Memory allocation status</a>
									</li>
									<li>
										<a href="#usage-backtrace" title="Go to this section">Function call backtrace</a>
									</li>
									<li>
										<a href="#usage-details" title="Go to this section">Memory allocation details</a>
									</li>
									<li>
										<a href="#usage-fatal" title="Go to this section">Fatal memory errors</a>
									</li>
								</ol>
							</li>
							<li>
								<a href="#linking" title="Go to this section">Linking with your project</a>
							</li>
							<li>
								<a href="#functions" title="Go to this section">Helper functions</a>
							</li>
						</ol>
					</div>
					<a name="technical"></a>
					<h3>1. Technical details</h3>
					<div>
						MEMDebug uses C macros to replace the C memory allocation functions with its own functions.<br />
						This allows MEMDebug to track the memory allocations made from a C program.
					</div>
					<div>
						In other words, MEMDebug intercepts calls like malloc() and re-route them to a specifi function, that will effectively call the malloc() function, so you program will run as usual.<br />
						It will allocate a little more memory than asked, so it can create a specific structure, with informations about the memory block.<br />
						It will also put some specific markers just before and after the memory block, so it can detect buffer overflows.
					</div>
					<div>
						Actually, MEMDebug is able to deal with the following memory allocation functions:
					</div>
                    <ul>
                        <li>
                            malloc
                        </li>
                        <li>
                            valloc
                        </li>
                        <li>
                            calloc
                        </li>
                        <li>
                            realloc
                        </li>
                        <li>
                            free
                        </li>
                        <li>
                            alloca
                        </li>
                        <li>
                            GC_malloc
                        </li>
                        <li>
                            GC_malloc_atomic
                        </li>
                        <li>
                            GC_calloc
                        </li>
                        <li>
                            GC_realloc
                        </li>
                        <li>
                            malloc_zone_malloc
                        </li>
                        <li>
                            malloc_zone_valloc
                        </li>
                        <li>
                            malloc_zone_calloc
                        </li>
                        <li>
                            malloc_zone_realloc
                        </li>
                        <li>
                            malloc_zone_free
                        </li>
                    </ul>
					<a name="usage"></a>
					<h3>2. Usage</h3>
					<a name="usage-example"></a>
					<h4>2.1 Example</h4>
					<div>
						An example program is provided with MEMDebug.<br />
						That very simple C program will allocate some memory, using various memory allocation functions (depending on the platform).<br />
						It will then creates a buffer overflow and a segmentation fault, so you can see how MEMDebug handles that kind of error.
					</div>
					<div>
						The buffer overflow is created the following way:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">unsigned char</span> * m;</code><br />
						<code class="source"></code><br />
						<code class="source">m        = ( <span class="code-keyword">unsigned char</span> * )malloc( <span class="code-predefined">256</span> * <span class="code-keyword">sizeof</span>( <span class="code-keyword">unsigned char</span> ) );</code><br />
						<code class="source">m[ <span class="code-predefined">256</span> ] = <span class="code-predefined">0</span>;</code><br />
						<code class="source"></code><br />
						<code class="source">free( m );</code>
					</div>
					<div>
						As you can see, we are allocating enough contiguous memory to hold 256 chars, and we are writing a value past that memory area, as if we had allocated memory for 257 chars.
					</div>
					<div>
						And here's how the segmentation fault is generated:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">unsigned char</span> * m;</code><br />
						<code class="source"></code><br />
						<code class="source">m = <span class="code-predefined">0</span>;</code><br />
						<code class="source"></code><br />
						<code class="source">printf( <span class="code-string">"%i"</span>, m[ <span class="code-predefined">0</span> ] );</code>
					</div>
					<div>
						Once built, you can run the example with the following command (always from the MEMDebig directory):
					</div>
					<div class="code">
						<code class="source">./build/bin/memdebug</code>
					</div>
					<div>
						Here's what you will see:
					</div>
					<div class="code">
						<code class="source">#-------------------------------------------------------------------------------------------------------</code><br />
						<code class="source"># MEMDebug: WARNING</code><br />
						<code class="source"># </code><br />
						<code class="source"># $Revision: 69 $</code><br />
						<code class="source"># $Date: 2010-04-05 18:51:01 +0200 (Mon, 05 Apr 2010) $</code><br />
						<code class="source">#-------------------------------------------------------------------------------------------------------</code><br />
						<code class="source"># </code><br />
						<code class="source"># A buffer overflow was detected (pointer address: 0x1001001f8)</code><br />
						<code class="source"># </code><br />
						<code class="source"># Function:    main()</code><br />
						<code class="source"># File:        ./source/memdebug.c</code><br />
						<code class="source"># Line:        102</code><br />
						<code class="source"># </code><br />
						<code class="source"># Your choices are:</code><br />
						<code class="source"># </code><br />
						<code class="source">#     - c : Default: continue the program execution</code><br />
						<code class="source">#     - q : Abort the program execution</code><br />
						<code class="source">#     - s : Display the status of the memory allocations</code><br />
						<code class="source">#     - t : Display the backtrace (function call stack)</code><br />
						<code class="source">#     - p : Display all memory records (active and free)</code><br />
						<code class="source">#     - a : Display only the active memory records</code><br />
						<code class="source">#     - f : Display only the freed memory records</code><br />
						<code class="source"># </code><br />
						<code class="source">#-------------------------------------------------------------------------------------------------------</code>
					</div>
					<div>
						The buffer overflow is detected, and the program's execution is paused.<br />
						You can now decide what action to take:
					</div>
					<ul>
						<li>Ignore the error, and continue the program's execution</li>
						<li>Quit the program</li>
						<li>Display a status of the memory allocations till that point</li>
						<li>Display a backtrace (aka the functions call stack)</li>
						<li>Display details about all allocations till that point</li>
						<li>Display details about the allocations still active till that point</li>
						<li>Display details about the allocations that were freed till that point</li>
					</ul>
					<a name="usage-status"></a>
					<h4>2.2 Memory allocation status</h4>
					<div>
						If you choose to display the status of the memory allocations, to following kind of output will be produced:
					</div>
					<div class="code">
						<code class="source">#-------------------------------------------------------------------------------------------------------</code><br />
						<code class="source"># </code><br />
						<code class="source"># - Total allocated objects:               5</code><br />
						<code class="source"># - Number of non-freed objects:           2</code><br />
						<code class="source"># - Number of freed objects:               2</code><br />
						<code class="source"># - Number of automatically-freed objects: 1</code><br />
						<code class="source"># </code><br />
						<code class="source"># - Total memory:                          2570</code><br />
						<code class="source"># - Active memory:                         512</code><br />
						<code class="source"># </code><br />
						<code class="source">#-------------------------------------------------------------------------------------------------------</code>
					</div>
					<div>
						It will give you the number of allocated objects, the number of allocated objects that has been freed, and the number of allocated objects that are still active.<br />
						It will also give you the total memory usage of your application, as well as the current usage.
					</div>
					<a name="usage-backtrace"></a>
					<h4>2.3 Function call backtrace</h4>
					<div>
						The functions call stack is only available when using GCC as a compiler.<br />
						It will produce the following output:
					</div>
					<div class="code">
						<code class="source">#-------------------------------------------------------------------------------------------------------</code><br />
						<code class="source"># </code><br />
						<code class="source"># Displaying 3 stack frames:</code><br />
						<code class="source"># </code><br />
						<code class="source">#     0:     memdebug                            0x00000001000008ba main + 310</code><br />
						<code class="source">#     1:     memdebug                            0x000000010000077c start + 52</code><br />
						<code class="source">#     2:     ???                                 0x0000000000000001 0x0 + 1</code><br />
						<code class="source"># </code><br />
						<code class="source">#-------------------------------------------------------------------------------------------------------</code>
					</div>
					<a name="usage-details"></a>
					<h4>2.4 Memory allocation details</h4>
					<div>
						You can also display detailed informations about the allocated memory areas.<br />
						The produced output will be the following:
					</div>
					<div class="code">
						<code class="source">#-------------------------------------------------------------------------------------------------------</code><br />
						<code class="source"># </code><br />
						<code class="source"># - Memory record:           #3</code><br />
						<code class="source"># </code><br />
						<code class="source"># - Address:                 0x100802608</code><br />
						<code class="source"># - Size:                    2048</code><br />
						<code class="source"># - Allocation type:         malloc</code><br />
						<code class="source"># </code><br />
						<code class="source"># - Allocated in function:   main() - 0x10000077c</code><br />
						<code class="source"># - Allocated in file:       ./source/memdebug.c</code><br />
						<code class="source"># - Allocated at line:       86</code><br />
						<code class="source"># </code><br />
						<code class="source"># - Freed:                   yes</code><br />
						<code class="source"># - Freed in function:       main() - 0x100000874</code><br />
						<code class="source"># - Freed in file:           ./source/memdebug.c</code><br />
						<code class="source"># - Freed at line:           91</code><br />
						<code class="source"># </code><br />
						<code class="source">#-------------------------------------------------------------------------------------------------------</code><br />
						<code class="source"># </code><br />
						<code class="source"># - Memory record:           #4</code><br />
						<code class="source"># </code><br />
						<code class="source"># - Address:                 0x1001000e8</code><br />
						<code class="source"># - Size:                    256</code><br />
						<code class="source"># - Allocation type:         malloc</code><br />
						<code class="source"># </code><br />
						<code class="source"># - Allocated in function:   main() - 0x10000077c</code><br />
						<code class="source"># - Allocated in file:       ./source/memdebug.c</code><br />
						<code class="source"># - Allocated at line:       87</code><br />
						<code class="source"># </code><br />
						<code class="source"># - Freed:                   no</code><br />
						<code class="source"># </code><br />
						<code class="source"># - Memory dump:</code><br />
						<code class="source"># </code><br />
						<code class="source">#   0000000000: 00 01 02 03 04 05 06 07 08 09 0A 0B 0C 0D 0E 0F 10 11 12 13 14 15 16 17 | ........................</code><br />
						<code class="source">#   0000000024: 18 19 1A 1B 1C 1D 1E 1F 20 21 22 23 24 25 26 27 28 29 2A 2B 2C 2D 2E 2F | ........ !"#$%&'()*+,-./</code><br />
						<code class="source">#   0000000048: 30 31 32 33 34 35 36 37 38 39 3A 3B 3C 3D 3E 3F 40 41 42 43 44 45 46 47 | 0123456789:;<=>?@ABCDEFG</code><br />
						<code class="source">#   0000000072: 48 49 4A 4B 4C 4D 4E 4F 50 51 52 53 54 55 56 57 58 59 5A 5B 5C 5D 5E 5F | HIJKLMNOPQRSTUVWXYZ[\]^_</code><br />
						<code class="source">#   0000000096: 60 61 62 63 64 65 66 67 68 69 6A 6B 6C 6D 6E 6F 70 71 72 73 74 75 76 77 | `abcdefghijklmnopqrstuvw</code><br />
						<code class="source">#   0000000120: 78 79 7A 7B 7C 7D 7E 7F 80 81 82 83 84 85 86 87 88 89 8A 8B 8C 8D 8E 8F | xyz{|}~.................</code><br />
						<code class="source">#   0000000144: 90 91 92 93 94 95 96 97 98 99 9A 9B 9C 9D 9E 9F A0 A1 A2 A3 A4 A5 A6 A7 | ........................</code><br />
						<code class="source">#   0000000168: A8 A9 AA AB AC AD AE AF B0 B1 B2 B3 B4 B5 B6 B7 B8 B9 BA BB BC BD BE BF | ........................</code><br />
						<code class="source">#   0000000192: C0 C1 C2 C3 C4 C5 C6 C7 C8 C9 CA CB CC CD CE CF D0 D1 D2 D3 D4 D5 D6 D7 | ........................</code><br />
						<code class="source">#   0000000216: D8 D9 DA DB DC DD DE DF E0 E1 E2 E3 E4 E5 E6 E7 E8 E9 EA EB EC ED EE EF | ........................</code><br />
						<code class="source">#   0000000240: F0 F1 F2 F3 F4 F5 F6 F7 F8 F9 FA FB FC FD FE FF                         | ................</code><br />
						<code class="source"># </code><br />
						<code class="source">#-------------------------------------------------------------------------------------------------------</code>
					</div>
					<div>
						For each allocated memory block, you'll be able to see its address, size, and which was the function used to allocate it.<br />
						You will also be able to see in which function the block was allocated, in which file, and at which line.
					</div>
					<div>
						If the block has been freed, you'll also see where it has been freed (function, file and line).<br />
						Otherwise, you'll get a dump of the memory content.
					</div>
					<a name="usage-fatal"></a>
					<h4>2.5 Fatal memory errors</h4>
					<div>
						Back to the example program, if you choose to continue its execution, the next error will occure.<br />
						This time, it's a segmentation fault.
					</div>
					<div>
						That kind of error, as well as bus-erros, are normally fatal, meaning the Operating System will kill the process.<br />
						With MEMDebug, you have a last chance to see what happened:
					</div>
					<div class="code">
						<code class="source">#-------------------------------------------------------------------------------------------------------</code><br />
						<code class="source"># MEMDebug: SIGSEGV</code><br />
						<code class="source"># </code><br />
						<code class="source"># $Revision: 69 $</code><br />
						<code class="source"># $Date: 2010-04-05 18:51:01 +0200 (Mon, 05 Apr 2010) $</code><br />
						<code class="source">#-------------------------------------------------------------------------------------------------------</code><br />
						<code class="source"># </code><br />
						<code class="source"># A segmentation fault was detected.</code><br />
						<code class="source"># </code><br />
						<code class="source"># Your choices are:</code><br />
						<code class="source"># </code><br />
						<code class="source">#     - c : Default: continue the program execution</code><br />
						<code class="source">#     - q : Abort the program execution</code><br />
						<code class="source">#     - s : Display the status of the memory allocations</code><br />
						<code class="source">#     - t : Display the backtrace (function call stack)</code><br />
						<code class="source">#     - p : Display all memory records (active and free)</code><br />
						<code class="source">#     - a : Display only the active memory records</code><br />
						<code class="source">#     - f : Display only the freed memory records</code><br />
						<code class="source"># </code><br />
						<code class="source">#-------------------------------------------------------------------------------------------------------</code>
					</div>
					<div>
						As you can see, MEMDebug caught here the segmentation fault, and gives you the same possibilities seen before.<br />
						Note that if you decide to continue the program's execution at that point, the OS will probably kill the process.
					</div>
					<a name="linking"></a>
					<h3>3. Linking with your project</h3>
					<div>
						The first step to do in order to use MEMDebug with your project is to include its header file.
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#include</span> <span class="code-string">"libmemdebug.h"</span></code>
					</div>
					<div>
						This is absolutely required, as this header file will declare the macros that will replace the standard memory allocation functions.
					</div>
					<div>
						You will the need to include the MEMDebug library in your program, either by:
					</div>
					<ul>
						<li>compiling the C code with your program</li>
						<li>linking the C code with the program</li>
					</ul>
					<div>
						The first option will generate an executable by compiling your software's sources with the MEMDebug sources.<br />
						This can be done with the following kind of command:
					</div>
					<div class="code">
						<code class="source">gcc -o foo foo.c libmemdebug.c</code>
					</div>
					<div>
						This will generate an executable named «foo», by compiling both «foo.c» and «memdebug.c» source files.
					</div>
					<div>
						You can also decide to create a static library with MEMDebug, and then link that library with your program:
					</div>
					<div class="code">
						<code class="source">glibtool --quiet --mode=compile gcc -o libmemdebug.lo -c libmemdebug.c</code><br />
						<code class="source">glibtool --quiet --mode=link gcc -o libmemdebug.la -c libmemdebug.lo</code><br />
						<code class="source">gcc -o foo.o -c foo.c</code><br />
						<code class="source">glibtool --quiet --mode=link gcc -o foo foo.o libmemdebug.la</code>
					</div>
					<div>
						The first line create an object file from the MEMDebug source file, while the second one creates a library archive file, from the object file.
					</div>
					<div>
						The program's file is then compiled as object code, and finally linked with the MEMDebug library. This last step creates the final executable.
					</div>
					<a name="functions"></a>
					<h3>4. Helper functions</h3>
					<div>
						MEMDebug includes some extras functions for you to use while developing your C program.<br />
						Please note that those functions are not intended to be used on production.
					</div>
					<div>
						Here's a list of those functions:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">void</span> memdebug_print_status( <span class="code-keyword">void</span> );</code>
					</div>
					<div>
						Prints the current status of the memory allocations.
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">void</span> memdebug_print_objects( <span class="code-keyword">void</span> );</code>
					</div>
					<div>
						Prints all the memory records (active and freed).
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">void</span> memdebug_print_free( <span class="code-keyword">void</span> );</code>
					</div>
					<div>
						Prints the freed memory records.
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">void</span> memdebug_print_active( <span class="code-keyword">void</span> );</code>
					</div>
					<div>
						Prints the active memory records.
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">unsigned long int</span> memdebug_num_objects( <span class="code-keyword">void</span> );</code>
					</div>
					<div>
						Returns the total number of memory records (active and freed).
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">unsigned long int</span> memdebug_num_free( <span class="code-keyword">void</span> );</code>
					</div>
					<div>
						Returns the number of freed memory records.
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">unsigned long int</span> memdebug_num_active( <span class="code-keyword">void</span> );</code>
					</div>
					<div>
						Returns the number of active memory records.
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
