<?php

header( 'Location: http://www.xs-labs.com/en/archives/articles/iokit-idle-time/', true, 301 );
exit();

?>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/articles.png" alt="" width="905" height="285" />
				</div>
				<div class="frame-spacer">&nbsp;</div>
				<div class="frame-content">
					<h2>Detecting idle time and activity with I/O Kit</h2>
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
						It may be sometimes useful, from an application, to know if the user is currently interacting with the computer (or phone), or if he's away.<br />
						This article explains how to detect user's activity, on Mac OS X and on iOS.
						<!-- RSS_ABSTRACT_END -->
					</div>
					<h3>I/O Kit</h3>
					<div>
						There's in no direct way, with Cocoa, to detect if the computer is idle.<br />
						Idle means no interaction of the user with the computer. No mouse move nor keyboard entry, etc. Actions made solely by the OS are not concerned.
					</div>
					<div>
						The OS has of course access to that information, to allow a screensaver to activate, or to initiate computer sleep.
					</div>
					<div>
						To access this information, we'll have to use I/O Kit.<br />
						It consist in a collection of frameworks, libraries and tools used mainly to develop drivers for hardware components.
					</div>
					<div>
						In our case, we are going to use IOKitLib, a library that allows programmers to access hardware resources through the Mac OS kernel.
					</div>
					<div>
						As it's a low-level library, we need to code in C to use it.<br />
						So we are going to wrap the C code in an Objective-C class, to allow an easier and generic usage, as the C code may be harder to code for some programmers.
					</div>
					<h3>Project configuration</h3>
					<div>
						Before writing the actual code, we are going to configure our XCode project, so it can use IOKitLib.<br />
						As it's a library, it must be linked with the final binary.
					</div>
					<div>
						Let's add a framework to our project:
					</div>
					<div>
						<img src="/uploads/image/articles/iokit-idle/framework-add.png" alt="" width="377" height="267" />
					</div>
					<div>
						For a Mac OS X application, we can choose «IOKit.framework».<br />
						For iOS, this framework is not available, so we must choose «libIOKit.dylib».
					</div>
					<div>
						<img src="/uploads/image/articles/iokit-idle/framework-list.png" alt="" width="338" height="534" />
					</div>
					<div>
						The framework is added to our project, and will now be linked with the application, after compilation time.
					</div>
					<div>
						<img src="/uploads/image/articles/iokit-idle/framework-cocoa.png" alt="" width="250" height="120" /><br />
						<img src="/uploads/image/articles/iokit-idle/framework-iphone.png" alt="" width="250" height="120" />
					</div>
					<h3>IOKitLib usage</h3>
					<div>
						First of all, here are the reference manuals for I/O Kit:
					</div>
					<ul>
					<li>
							<a href="http://developer.apple.com/mac/library/documentation/Darwin/Reference/IOKit/IOKitLib_h/">IOKitLib</a>
						</li>
					<li>
							<a href="http://developer.apple.com/mac/library/documentation/DeviceDrivers/Conceptual/AccessingHardware/">Accessing Hardware</a>
						</li>
					<li>
							<a href="http://developer.apple.com/mac/library/documentation/DeviceDrivers/Conceptual/IOKitFundamentals/">I/O Kit Fundamentals</a>
						</li>
					</ul>
					<div>
						Now let's create an Objective-C class that will detect the idle time:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#include</span> <span class="code-string">&lt;IOKit/IOKitLib.h&gt;</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@interface</span> IdleTime: NSObject</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-predefined">mach_port_t</span>   <span class="code-ctag">ioPort</span>;</code><br />
						<code class="source">    <span class="code-predefined">io_iterator_t</span><span class="code-ctag"> ioIterator</span>;</code><br />
						<code class="source">    <span class="code-predefined">io_object_t</span>   <span class="code-ctag">ioObject</span>;</code><br />
						<code class="source">}</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@property</span>( <span class="code-keyword">readonly</span> ) <span class="code-predefined">uint64_t</span> timeIdle;</code><br />
						<code class="source"><span class="code-keyword">@property</span>( <span class="code-keyword">readonly</span> ) <span class="code-predefined">NSUInteger</span> secondsIdle;</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@end</span></code>
					</div>
					<div>
						This class has three instance variables, which will be used to communicate with I/O Kit.<br />
						The variables' types are defined by the «IOKit/IOKitLib.h», which we are including.
					</div>
					<div>
						We are also defining two properties, that we'll use to access the idle time. The first one in nanoseconds, the second one in seconds.
					</div>
					<div>
						Here's the basic implementation of the class:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#include</span> <span class="code-string">"IdleTime.h"</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@implementation</span> IdleTime</code><br />
						<code class="source"></code><br />
						<code class="source">- ( <span class="code-keyword">id</span> )init</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-keyword">if</span>( (<span class="code-keyword"> self</span> = [ <span class="code-keyword">super</span> init ] ) ) {</code><br />
						<code class="source">        </code><br />
						<code class="source">    }</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-keyword">return self</span>;</code><br />
						<code class="source">}</code><br />
						<code class="source"></code><br />
						<code class="source">- ( <span class="code-keyword">void</span> )dealloc</code><br />
						<code class="source">{</code><br />
						<code class="source">    [ <span class="code-keyword">super</span> dealloc ];</code><br />
						<code class="source">}</code><br />
						<code class="source"></code><br />
						<code class="source">- ( <span class="code-predefined">uint64_t</span> )timeIdle</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-keyword">return</span> 0;</code><br />
						<code class="source">}</code><br />
						<code class="source"></code><br />
						<code class="source">- ( <span class="code-predefined">NSUInteger</span> )secondsIdle</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-predefined">uint64_t</span> time;</code><br />
						<code class="source">    </code><br />
						<code class="source">    time = <span class="code-keyword">self</span>.<span class="code-ctag">timeIdle</span>;</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-keyword">return</span> ( <span class="code-predefined">NSUInteger</span> )( time >> 30 );</code><br />
						<code class="source">}</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@end</span></code>
					</div>
					<div>
						We've got an «init» method that we will use to establish the base communication with I/O Kit, a «dealloc» method that will free the allocated resources, and a getter method for each property.
					</div>
					<div>
						The second method (secondsIdle) only takes the time in nanoseconds and converts it into seconds. To do so, we just have to divide the nano time by 10 raised to the power of 9. As we have integer values, a 30 right shift does exactly that, in a more efficient wqy.
					</div>
					<div>
						Now let's concentrate to the «init» method, and let's establish communication with I/O Kit, to obtain hardware informations.
					</div>
					<div class="code">
						<code class="source">- ( <span class="code-keyword">id</span> )init</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-predefined">kern_return_t</span> status;</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-keyword">if</span>( ( <span class="code-keyword">self</span> = [ <span class="code-keyword">super</span> init ] ) ) {</code><br />
						<code class="source">        </code><br />
						<code class="source">    }</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-keyword">return self</span>;</code><br />
						<code class="source">}</code>
					</div>
					<div>
						We a declaring a variable of type «kern_status» that we'll use to check the status of the I/O Kit communication, and to manage errors.<br />
						The following code is inside the «if» statement:
					</div>
					<div class="code">
						<code class="source">status = <span class="code-predefined">IOMasterPort</span>( <span class="code-keyword">MACH_PORT_NULL</span>, &#038;<span class="code-ctag">ioPort</span> );</code>
					</div>
					<div>
						Here, we establish the connection with I/O Kit, on the default port (MACH_PORT_NULL).
					</div>
					<div>
						To know if the operation was successfull, we can check the value of the status variable with «KERN_SUCCESS»:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">if</span>( status != <span class="code-keyword">KERN_SUCCESS</span> ) {</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-comment">/* Error management... */</span></code><br />
						<code class="source">}</code>
					</div>
					<div>
						I/O Kit has many services. The one we are going to use is «IOHID». It will allow us to know about user interaction.<br />
						In the following code, we get an iterator on the I/O Kit services, so we can access to IOHID.
					</div>
					<div class="code">
						<code class="source">status = <span class="code-predefined">IOServiceGetMatchingServices</span>(</code><br />
						<code class="source">             <span class="code-ctag">ioPort</span>,</code><br />
						<code class="source">            <span class="code-predefined"> IOServiceMatching</span>( <span class="code-string">"IOHIDSystem"</span> ),</code><br />
						<code class="source">             &#038;<span class="code-ctag">ioIterator</span></code><br />
						<code class="source">);</code>
					</div>
					<div>
						Now we can store the IOHID service:
					</div>
					<div class="code">
						<code class="source"><span class="code-ctag">ioObject</span> = <span class="code-predefined">IOIteratorNext</span>( <span class="code-ctag">ioIterator</span> );</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">if</span> ( <span class="code-ctag">ioObject</span> == 0 ) {</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-comment">/* Error management */</span></code><br />
						<code class="source">}</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-predefined">IOObjectRetain</span>( <span class="code-ctag">ioObject</span> );</code><br />
						<code class="source"><span class="code-predefined">IOObjectRetain</span>( <span class="code-ctag">ioIterator</span> );</code>
					</div>
					<div>
						Here, we are doing a retain, so the objects won't be automatically freed.<br />
						So we'll have to release then in the «dealloc» method:
					</div>
					<div class="code">
						<code class="source">- ( <span class="code-keyword">void</span> )dealloc</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-predefined">IOObjectRelease</span>( <span class="code-ctag">ioObject</span> );</code><br />
						<code class="source">    <span class="code-predefined">IOObjectRelease</span>( <span class="code-ctag">ioIterator</span> );</code><br />
						<code class="source">    </code><br />
						<code class="source">    [ <span class="code-keyword">super</span> dealloc ];</code><br />
						<code class="source">}</code>
					</div>
					<div>
						Now the I/O Kit communication is established, and we have access to IOHID.<br />
						We can now use that service in the «timeIdle» method.
					</div>
					<div class="code">
						<code class="source">- ( <span class="code-predefined">uint64_t</span> )timeIdle</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-predefined">kern_return_t</span>          status;</code><br />
						<code class="source">    <span class="code-predefined">CFTypeRef</span>              idle;</code><br />
						<code class="source">    <span class="code-predefined">CFTypeID</span>               type;</code><br />
						<code class="source">    <span class="code-predefined">uint64_t</span>               time;</code><br />
						<code class="source">    <span class="code-predefined">CFMutableDictionaryRef</span> properties;</code><br />
						<code class="source">    </code><br />
						<code class="source">    properties = <span class="code-keyword">NULL</span>;</code>
					</div>
					<div>
						Let's start by declaring the variables we are going to use.
					</div>
					<div>
						First of all, we are going to access the IOHID properties.
					</div>
					<div class="code">
						<code class="source">status = <span class="code-predefined">IORegistryEntryCreateCFProperties</span>(</code><br />
						<code class="source">             <span class="code-ctag">ioObject</span>,</code><br />
						<code class="source">             &#038;properties,</code><br />
						<code class="source">             <span class="code-predefined">kCFAllocatorDefault</span>,</code><br />
						<code class="source">             0</code><br />
						<code class="source">);</code>
					</div>
					<div>
						Here, we get a dictionary (similar to NSDictionary) in the «properties» variable.<br />
						We also get a kernel status, that we have to check, as usual.
					</div>
					<div>
						Now we can get the IOHID properties. The one we'll used is called «HIDIdleTime»:
					</div>
					<div class="code">
						<code class="source">idle = <span class="code-predefined">CFDictionaryGetValue</span>( properties, <span class="code-keyword">CFSTR</span>( <span class="code-string">"HIDIdleTime"</span> ) );</code><br />
						<code class="source">    </code><br />
						<code class="source"><span class="code-keyword">if</span>( !idle ) {</code><br />
						<code class="source">        </code><br />
						<code class="source">    <span class="code-predefined">CFRelease</span>( ( <span class="code-predefined">CFTypeRef</span> )properties );</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-comment">/* Error management */</span></code><br />
						<code class="source">}</code>
					</div>
					<div>
						If an error occurs, we have to release the «properties» object, in order to avoid a memory leak.
					</div>
					<div>
						A dictionary can contains several types of values, so we have to know the type of the «HIDIdleTime» property, before using it.
					</div>
					<div class="code">
						<code class="source">type = <span class="code-predefined">CFGetTypeID</span>( idle );</code>
					</div>
					<div>
						The property can be of type «number» or «data». To obtain the correct value, each case must be managed.
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">if</span>( type == <span class="code-predefined">CFDataGetTypeID()</span> ) {</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-predefined">CFDataGetBytes</span>( ( <span class="code-predefined">CFDataRef</span> )idle, <span class="code-predefined">CFRangeMake</span>( 0, <span class="code-keyword">sizeof</span>( time ) ), ( <span class="code-predefined">UInt8</span> * )&#038;time );</code><br />
						<code class="source">    </code><br />
						<code class="source">} <span class="code-keyword">else if</span>( type == <span class="code-predefined">CFNumberGetTypeID()</span> ) {</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-predefined">CFNumberGetValue</span>( ( <span class="code-predefined">CFNumberRef</span> )idle, <span class="code-predefined">kCFNumberSInt64Type</span>, &#038;time );</code><br />
						<code class="source">    </code><br />
						<code class="source">} <span class="code-keyword">else</span> {</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-predefined">CFRelease</span>( idle );</code><br />
						<code class="source">    <span class="code-predefined">CFRelease</span>( ( <span class="code-predefined">CFTypeRef</span> )properties );</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-comment">/* Error management */</span></code><br />
						<code class="source">}</code>
					</div>
					<div>
						Then we can release the objects, and return the value:
					</div>
					<div class="code">
						<code class="source"><span class="code-predefined">CFRelease</span>( idle );</code><br />
						<code class="source"><span class="code-predefined">CFRelease</span>( ( <span class="code-predefined">CFTypeRef</span> )properties );</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">return</span> time;</code>
					</div>
					<div>
						The class is done. To use it, we just have to instantiate it and read the «secondsIdle» property (from a timer, for instance).
					</div>
					<h3>Demo</h3>
					<div>
						Here's an example program using that class to display the idle time:
					</div>
					<div>
						<a href="/uploads/source/objc/idle.m">idle.m</a>
					</div>
					<div>
						To compile and execute it:
					</div>
					<div class="code">
						<code class="source">gcc -Wall -framework Cocoa -framework IOKit -o idle idle.m &#038;&#038; ./idle</code>
					</div>
					<?php  print new Eos_Comment_View() . chr( 10 ); ?>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			
