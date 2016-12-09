<?php

header( 'Location: http://www.xs-labs.com/en/archives/articles/c-reference-counting/', true, 301 );
exit();

?>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/articles.png" alt="" width="905" height="285" />
				</div>
				<div class="frame-spacer">&nbsp;</div>
				<div class="frame-content">
					<h2>Reference counting in ANSI-C</h2>
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
					<h3>About</h3>
					<div>
						<!-- RSS_ABSTRACT_BEGIN -->
						Memory management can be a hard task when coding a C program.<br />
						Some higher level programming languages provide other ways to manage memory.<br />
						Main variants are garbage collection, and reference counting.<br />
						This article will teach you how to implement a reference counting memory management system in C.
						<!-- RSS_ABSTRACT_END -->
					</div>
					<div>
						Personally, as a C and Objective-C developer, I love the reference counting way.<br />
						It implies the notion of ownership on objects.
					</div>
					<h3>Objective-C example</h3>
					<div>
						For instance, in Objective-C, when you creates an object using the alloc, or copy methods, you own the object. It means you'll have to release your object, so the memory can be reclaimed.
					</div>
					<div>
						Objects can also be retained. In such a case they must be released too.
					</div>
					<div>
						Objects get by convenience methods are not owned by the caller, so there's no need to release them, as it will be done by someone else.
					</div>
					<div>
						For instance, in Objective-C:
					</div>
					<div class="code">
						<code class="source"><span class="code-predefined">NSArray</span> * object1 = [ <span class="code-predefined">NSArray</span> array ];</code><br />
						<code class="source"><span class="code-predefined">NSArray</span> * object2 = [ [ <span class="code-predefined">NSArray</span> alloc ] init ];</code><br />
						<code class="source"><span class="code-predefined">NSArray</span> * object3 = [ [ [ <span class="code-predefined">NSArray</span> array ] retain ] retain ];</code>
					</div>
					<div>
						Here, the object2 variable will need to be released, as we allocated it explicitly.<br />
						The object3 variable will need to be released twice, since we retained it twice.
					</div>
					<div class="code">
						<code class="source">[ object2 release ];</code><br />
						<code class="source">[ [ object3 release ] release ];</code>
					</div>
					<h3>C implementation</h3>
					<div>
						As a C coder, I've implemented this with ANSi-C.<br />
						Here are some explanations.
					</div>
					<div>
						First of all, we are going to define a structure for our memory records.<br />
						The structure will look like this:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">typedef struct</span></code><br />
						<code class="source">{</code><br />
						<code class="source">	<span class="code-keyword">unsigned int</span> retainCount</code><br />
						<code class="source">	<span class="code-keyword">void</span>       * data;</code><br />
						<code class="source">}</code><br />
						<code class="source">MemoryObject;</code>
					</div>
					<div>
						Here, we are storing the retain count of the memory object. A retain will increment it, and a release decrement it. When it reaches 0, the object will be freed.
					</div>
					<div>
						We'll also need a custom allocation function:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">void</span> * Alloc( <span class="code-keyword">size_t</span> size )</code><br />
						<code class="source">{</code><br />
						<code class="source">	MemoryObject * o;</code><br />
						<code class="source">	</code><br />
						<code class="source">	o = ( MemoryObject * )<span class="code-keyword">calloc</span>( <span class="code-keyword">sizeof</span>( MemoryObject ) + size, 1 );</code>
					</div>
					<div>
						Here, allocate space for our memory object structure, plus the user requested size.<br />
						We are not going to return the memory object, so we need some calculation here.
					</div>
					<div>
						First of all, let's declare a char pointer, that will point to our allocated memory object structure:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">char</span> * ptr = ( <span class="code-keyword">char</span> * )o;</code>
					</div>
					<div>
						Then, we can get the location of the user defined data by adding the size of the memory object structure:
					</div>
					<div class="code">
						<code class="source">ptr += <span class="code-keyword">sizeof</span>( MemoryObject );</code>
					</div>
					<div>
						Then, we can set our data pointer, et set the retain count to 1.
					</div>
					<div class="code">
						<code class="source">o->data        = ptr;</code><br />
						<code class="source">o->retainCount = 1;</code>
					</div>
					<div>
						Now we'll return to pointer to the user data, so it doesn't have to know about our memory object structure.
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">return</span> ptr;</code>
					</div>
					<div>
						Here's the full function:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">void</span> * Alloc( <span class="code-keyword">size_t</span> size )</code><br />
						<code class="source">{</code><br />
						<code class="source">	MemoryObject * o;</code><br />
						<code class="source">	<span class="code-keyword">char</span>         * ptr;</code><br />
						<code class="source">	</code><br />
						<code class="source">	o              = ( MemoryObject * )<span class="code-keyword">calloc</span>( <span class="code-keyword">sizeof</span>( MemoryObject ) + size, 1 );</code><br />
						<code class="source">	ptr            = ( <span class="code-keyword">char</span> * )o;</code><br />
						<code class="source">	ptr           += <span class="code-keyword">sizeof</span>( MemoryObject );</code><br />
						<code class="source">	o->retainCount = 1;</code><br />
						<code class="source">	o->data        = ptr;</code><br />
						<code class="source">	</code><br />
						<code class="source">	<span class="code-keyword">return</span> ( void * )ptr;</code><br />
						<code class="source">}</code>
					</div>
					<div>
						This way, we return the user defined allocated size, and we are hiding our structure before that data.
					</div>
					<div>
						To retrieve our data, we simply need to subtract the size of the MemoryObject structure.
					</div>
					<div>
						For example, here's the Retain function:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">void</span> Retain( <span class="code-keyword">void</span> * ptr )</code><br />
						<code class="source">{</code><br />
						<code class="source">	MemoryObject * o;</code><br />
						<code class="source">	<span class="code-keyword">char</span>         * cptr;</code><br />
						<code class="source">	</code><br />
						<code class="source">	cptr = ( <span class="code-keyword">char</span> * )ptr;</code><br />
						<code class="source">	cptr -= <span class="code-keyword">sizeof</span>( MemoryObject );</code><br />
						<code class="source">	o     = ( MemoryObject * )cptr;</code><br />
						<code class="source">	</code><br />
						<code class="source">	o->retainCount++:</code><br />
						<code class="source">}</code>
					</div>
					<div>
						We are here retrieving our MemoryObject structure, by subtracting the size of it to the user pointer. Once done, we can increase the retain count by one.
					</div>
					<div>
						Same thing is done for the Release function:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">void</span> Release( <span class="code-keyword">void</span> * ptr )</code><br />
						<code class="source">{</code><br />
						<code class="source">	MemoryObject * o;</code><br />
						<code class="source">	<span class="code-keyword">char</span>         * cptr;</code><br />
						<code class="source">	</code><br />
						<code class="source">	cptr = ( <span class="code-keyword">char</span> * )ptr;</code><br />
						<code class="source">	cptr -= <span class="code-keyword">sizeof</span>( MemoryObject );</code><br />
						<code class="source">	o     = ( MemoryObject * )cptr;</code><br />
						<code class="source">	</code><br />
						<code class="source">	o->retainCount--:</code><br />
						<code class="source">	</code><br />
						<code class="source">	if( o->retainCount == 0 )</code><br />
						<code class="source">	{</code><br />
						<code class="source">		<span class="code-keyword">free</span>( o );</code><br />
						<code class="source">	}</code><br />
						<code class="source">}</code>
					</div>
					<div>
						When the retain count reaches zero, we can free the object.
					</div>
					<div>
						That's all. We now have a reference counting memory management in C.<br />
						All you have to do is call Alloc to create an object, Retain if you need to, and Release when you don't need the object anymore.<br />
						It may have been retained by another function, but then you don't have to care if it will be freed or not, as you don't own the object anymore.
					</div>
					<?php  print new Eos_Comment_View() . chr( 10 ); ?>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
