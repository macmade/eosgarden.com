			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/articles.png" alt="" width="905" height="285" />
				</div>
				<div class="frame-spacer">&nbsp;</div>
				<div class="frame-content">
					<h2>Calling conventions</h2>
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
						Programming languages let us write human readable code, with concepts like variables, functions, objects, methods, etc.<br />
						Those concepts don't exists for a computer, and the human readable code needs to be converted into machine code (compilation), so the CPU can execute it.<br />
						This article explains how functions are called, from a machine code perspective.
						<!-- RSS_ABSTRACT_END -->
					</div>
					<div>
						Let's take a simple C program. We define an add function, that adds two numbers, and returns the result:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">int</span> add( <span class="code-keyword">int</span> x, <span class="code-keyword">int</span> y );</code><br />
						<code class="source"><span class="code-keyword">int</span> add( <span class="code-keyword">int</span> x, <span class="code-keyword">int</span> y )</code><br />
						<code class="source">{</code><br />
						<code class="source">	<span class="code-keyword">return</span> x + y;</code><br />
						<code class="source">}</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">int</span> main( <span class="code-keyword">void</span> )</code><br />
						<code class="source">{</code><br />
						<code class="source">	<span class="code-keyword">int</span> x = add( 1, 2 );</code><br />
						<code class="source">	</code><br />
						<code class="source">	<span class="code-keyword">return</span> 0;</code><br />
						<code class="source">}</code>
					</div>
					<div>
						To see what instructions will be executed by the CPU, we can ask GCC to produce assembly output from the C file, so we can see how the machine will execute our code:
					</div>
					<div class="code">
						<code class="source">gcc -Wall -S filename.c</code>
					</div>
					<div>
						This will generate a filename.s file, with AT&T assembly code.<br />
						Let's look what's in this file:
					</div>
					<div class="code">
						<code class="source">.text</code><br />
						<code class="source">.globl _add</code><br />
						<code class="source">_add:</code><br />
						<code class="source">	pushq   %rbp</code><br />
						<code class="source">	movq    %rsp, %rbp</code><br />
						<code class="source">	movl    %edi, -4(%rbp)</code><br />
						<code class="source">	movl    %esi, -8(%rbp)</code><br />
						<code class="source">	movl    -8(%rbp), %eax</code><br />
						<code class="source">	addl    -4(%rbp), %eax</code><br />
						<code class="source">	leave</code><br />
						<code class="source">	ret</code><br />
						<code class="source">.globl _main</code><br />
						<code class="source">_main:</code><br />
						<code class="source">	pushq  %rbp</code><br />
						<code class="source">	movq   %rsp, %rbp</code><br />
						<code class="source">	subq   $16, %rsp</code><br />
						<code class="source">	movl   $2, %esi</code><br />
						<code class="source">	movl   $1, %edi</code><br />
						<code class="source">	call   _add</code><br />
						<code class="source">	movl   %eax, -4(%rbp)</code><br />
						<code class="source">	movl   $0, %eax</code><br />
						<code class="source">	leave</code><br />
						<code class="source">	ret</code>
					</div>
					<div>
						We can see our functions names, prefixed by an underscore (_add and _main). Those are our functions' symbols (the entry points).
					</div>
					<div>
						The program will start by jumping to the _main symbol. The first three lines creates stack space for the local variables.
					</div>
					<div class="code">
						<code class="source">pushq %rbp</code><br />
						<code class="source">movq  %rsp, %rbp</code><br />
						<code class="source">subq  $16,  %rsp</code>
					</div>
					<div>
						Then, decimal values 1 and 2 are added to the EDI and ESI registers. These values are the arguments we have passed to the add function, from our C code.
					</div>
					<div class="code">
						<code class="source">movl $2, %esi</code><br />
						<code class="source">movl $1, %edi</code>
					</div>
					<div>
						The next instruction, 'call', will jump to the _add symbol, and execute its code.
					</div>
					<div class="code">
						<code class="source">call _add</code>
					</div>
					<div>
						Here again, stack space is created (so the stack from main isn't corrupted).
					</div>
					<div>
						Then, values from the EDI and ESI registers (our arguments) are moved to the stack:
					</div>
					<div class="code">
						<code class="source">movl %edi, -4(%rbp)</code><br />
						<code class="source">movl %esi, -8(%rbp)</code>
					</div>
					<div>
						The programs then moves one of the arguments to the EAX register, and adds it with the other argument. The result will say in EAX.
					</div>
					<div class="code">
						<code class="source">movl -8(%rbp), %eax</code><br />
						<code class="source">addl -4(%rbp), %eax</code>
					</div>
					<div>
						Then, the function returns, and the previous code location is executed (in _main):
					</div>
					<div class="code">
						<code class="source">leave</code><br />
						<code class="source">ret</code>
					</div>
					<div>
						Then the main function returns, placing it's return code in the EAX register.
					</div>
					<div>
						What we've seen here is a perfect example of what's called a calling convention.
					</div>
					<div>
						We've seen that the arguments are passed through the EDI and ESI registers, and that the return value is stored in the EAX register.
					</div>
					<div>
						This calling convention is called System V. If you're on Mac OS or Linux, this is certainly the calling convention that's used.
					</div>
					<div>
						But other calling conventions exists. You may have heard of cdecl, fastcall or this'll.
					</div>
					<div>
						What's the difference between them? Let's take our previous example, in which we used two arguments. What would happen if we used three arguments?
					</div>
					<div>
						We've seen that argument one is passed in the EDI register, and that argument two through ESI. What about a third argument?
					</div>
					<div>
						The System V ABI calling convention specify that arguments needs to be passed respectively through the EDI, ESI, EDX, ECX, R8 and R9 registers. Note that if you're on a 64bits machine, registers will be RDI, RSI, RCX and RCX.
					</div>
					<div>
						Ok, now we can pass 6 arguments. But what if we have seven, or more?<br />
						The System V calling convention specifies that additional arguments are passed on the stack, meaning they'll be pushed, using the 'push' instruction.
					</div>
					<div>
						There's a little exception with the floating point arguments (float or double). That kind of argument needs to be passed in special registers, which are mmx0 to mmx7. Those are SSE registers.
					</div>
					<div>
						That's only for the System V calling convention. What about the others?
					</div>
					<div>
						Let's take cdecl. With that calling convention, no register are used to pass arguments. It means they will all be passed on the stack.<br />
						The return value is also on the EAX register.
					</div>
					<div>
						Let's take our main function, et let's try to write it using the cdecl calling convention.
					</div>
					<div>
						The code to call our add function will be:
					</div>
					<div class="code">
							<code class="source">push $1</code><br />
							<code class="source">push $2</code><br />
							<code class="source">call _add</code>
					</div>
					<div>
						It may seem easier, but remember that stack operations are slower that operations on registers, hence the other calling conventions.
					</div>
					<div>
						I won't cover the other one here, but if you're interested on other calling conventions, take a look at the Wikipedia page.
					</div>
					<?php  print new Eos_Comment_View() . chr( 10 ); ?>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
