<?php

header( 'Location: http://www.xs-labs.com/en/archives/articles/xcode-static-libraries/', true, 301 );
exit();

?>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/articles.png" alt="" width="905" height="285" />
				</div>
				<div class="frame-spacer">&nbsp;</div>
				<div class="frame-content">
					<h2>Using static libraries with XCode</h2>
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
						It's often usefull to split an XCode project in several parts: the UI related code, and the code that's not related to the UI (tools, libraries, etc).<br />
						Such a split has many advantages. It allows different compilation settings for each part and a better compilation time, as each part is built separately, if needed.<br />
						This article will teach you how to setup such an XCode project.
						<!-- RSS_ABSTRACT_END -->
					</div>
					<h3>Projet creation</h3>
					<div>
						First of all, let's create a new iPhone XCode project (the same applies for a Mac OS X application project).
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-1.png" />
					</div>
					<div>
						XCode creates by default the necessary files for a basic application.
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-2.png" />
					</div>
					<div>
						The «Targets» section consists of the different products that may be built by XCode.
					</div>
					<div>
						In our case, we have an application. This target type includes the copy of the resources (XIB files - UI), the compilation of the application source code, and finally the link of the object code with the libraries and frameworks used by the application.
					</div>
					<div>
						Each target can have specific build settings, that can be accessed through the contextual menu.
					</div>
					
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-3.png" />
					</div>
					<h3>Targets</h3>
					<div>
						An XCode project can be composed of several targets. It is necessary if external libraries are used, but it may also be useful to split a project and optimize the compilation of the final application.
					</div>
					<div>
						Let's start by creating a new class, named «MethodProvider», that we'll use, as it name implies, as a method provider for our application.
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-4.png" />
					</div>
					<div>
						We are now going to implement a static method named «doSomething».
					</div>
					<div class="code">
						<code class="source"><span class="code-comment">/* MethodProvider.h */</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">&lt;UIKit/UIKit.h&gt;</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@interface</span> MethodProvider: NSObject</code><br />
						<code class="source">{}</code><br />
						<code class="source"></code><br />
						<code class="source">+ ( <span class="code-keyword">void</span> )doSomething;</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@end</span></code><br />
					</div>
					<div class="code">
						<code class="source"><span class="code-comment">/* MethodProvider.m */</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">"MethodProvider.h"</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@implementation</span> MethodProvider</code><br />
						<code class="source"></code><br />
						<code class="source">+ ( <span class="code-keyword">void</span> )doSomething</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-predefined">NSLog</span>( <span class="code-string">@"Method 'doSomething' called..."</span> );</code><br />
						<code class="source">}</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@end</span></code><br />
					</div>
					<div>
						We are going to call that method from our application, when it's loaded. We'll add the call on the «application: didFinishLaunchingWithOptions:» method of the «MyAppAppDelegate» class.
					</div>
					<div class="code">
						<code class="source">- ( <span class="code-keyword">BOOL</span> )application: ( <span class="code-predefined">UIApplication</span> * )application didFinishLaunchingWithOptions: ( <span class="code-predefined">NSDictionary</span> * )launchOptions</code><br />
						<code class="source">{</code><br />
						<code class="source">    [ <span class="code-ctag">window</span> <span class="code-predefined">addSubview</span>: <span class="code-ctag">viewController</span>.<span class="code-predefined">view</span> ];</code><br />
						<code class="source">    [ <span class="code-ctag">window</span> makeKeyAndVisible ];</code><br />
						<code class="source">    </code><br />
						<code class="source">    [ <span class="code-ctag">MethodProvider</span> doSomething ];</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-keyword">return YES</span>;</code><br />
						<code class="source">}</code><br />
					</div>
					<div>
						Do not forget to include the header file for the method provider class in the «MyAppAppController.m» file:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">"MyAppAppDelegate.h"</span></code><br />
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">"MyAppViewController.h"</span></code><br />
						<code class="source"><strong><span class="code-keyword">#import</span> <span class="code-string">"MethodProvider.h"</span></strong></code><br />
					</div>
					<div>
						Now, the «MethodProvider» class is compiled at the same time as other project files. We are now going to change that.
					</div>
					<div>
						Let's start by removing the class from our application's target. Simply uncheck the box at the side of the source file name.
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-5.png" />
					</div>
					<div>
						From now on, the class won't be compiled with other source files. The application build process will now fail, with the following message:
					</div>
					<div class="code">
							<code class="source">_OBJC_CLASS_$_MethodProvider", referenced from:</code><br />
							<code class="source">objc-class-ref-to-MethodProvider in MyAppAppDelegate.o</code><br />
							<code class="source">ld: symbol(s) not found</code><br />
							<code class="source">collect2: ld returned 1 exit status</code>
					</div>
					<div>
						It tells that the linker has not found the symbol corresponding to our class, even if it's used from the «MyAppAppDelegate» class.
					</div>
					<div>
						So we are going to create a new target, whose goal will be to compile the «MethodProvider» class.
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-6.png" />
					</div>
					<h3>Static library</h3>
					<div>
						The type of the target will be «static library»:
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-7.png" />
					</div>
					<div>
						A library is a specific object code format, which can provide applications with functions. A library can be static or dynamic.
					</div>
					<div>
						With a static library, the library's object code is integrated in the final binary, during link time.<br />
						There's only one binary, containing the library and the application codes. This way, the binary is larger, but the library does not need to be present on the host machine.
					</div>
					<div>
						With a dynamic library, only it's path is included in the application's binary. The kernel will load the library code in memory when the application is launched.<br />
						The final binary is smaller, but the library needs to be available on the host computer. The application's launch time may also be a bit slower.<br />
						The main advantage of a dynamic library is that different applications can refer to the same library.
					</div>
					<div>
						In our application, we're gonna choose a static library. On iOS, it's actually impossible to generate dynamic libraries.
					</div>
					<div>
						When several targets are available, we can switch from one to another from a drop-down menu, in the tool bar:
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-8.png" />
					</div>
					<div>
						We can now switch to our «Methods» target, and add the file(s) that need to be compiled:
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-9.png" />
					</div>
					<div>
						We can also see the library in the «Products» section:
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-10.png" />
					</div>
					<div>
						Now we have to link our main application with the library. This is done through the «Link Binary With Libraries» phase of the application's target.
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-11.png" />
					</div>
					<div>
						Let's add the library.
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-12.png" />
					</div>
					<div>
						The last step is to tell XCode that our application depends on the library, so it's compiled before the application, if necessary.<br />
						This can be done by adding a dependancy, in the «General» section of the application's target:
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-13.png" />
					</div>
					<div>
						Now we can build our application without any problem.
					</div>
					<div>
						This way of doing things can be used to split different parts of our code.<br />
						It's also used when we need to use external sources and libraries, like OpenCV (C++), JSON-Framework (Objective-C), etc.<br />
						We could choose to include the external source files in the same target as the application, but then it would be impossible to specify different compilation settings, and it will slow down the application's compilation time.
					</div>
					<h3>Categories</h3>
					<div>
						When using Objective-C categories, the use of a static library may cause problems (a category is a way of adding methods to an existing class).
					</div>
					<div>
						We are going to add a category on the «UIApplication» class, in our library's target:
					</div>
					<div class="code">
						<code class="source"><span class="code-comment">/* MyUIApp.h */</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">&lt;UIKit/UIKit.h&gt;</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@interface</span> UIApplication( MyUIApp )</code><br />
						<code class="source"></code><br />
						<code class="source">- ( <span class="code-keyword">void</span> )sayHello;</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@end</span></code><br />
					</div>
					<div class="code">
						<code class="source"><span class="code-comment">/* MyUIApp.m */</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">"MyUIApp.h"</span></code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@implementation</span> UIApplication( MyUIApp )</code><br />
						<code class="source"></code><br />
						<code class="source">- ( <span class="code-keyword">void</span> )sayHello</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-predefined">NSLog</span>( <span class="code-string">@"Hello"</span> );</code><br />
						<code class="source">}</code><br />
						<code class="source"></code><br />
						<code class="source"><span class="code-keyword">@end</span></code><br />
					</div>
					<div>
						Let's use the method in our application:
					</div>
					<div class="code">
						<code class="source"><span class="code-comment">/* MyAppAppDelegate.m */</span></code><br />
						<code class="source"></code><br />
						<code class="source">- ( <span class="code-keyword">BOOL</span> )application: ( <span class="code-predefined">UIApplication</span> * )application didFinishLaunchingWithOptions: ( <span class="code-predefined">NSDictionary</span> * )launchOptions</code><br />
						<code class="source">{</code><br />
						<code class="source">    [ <span class="code-ctag">window</span> <span class="code-predefined">addSubview</span>: <span class="code-ctag">viewController</span>.<span class="code-predefined">view</span> ];</code><br />
						<code class="source">    [ <span class="code-ctag">window</span> makeKeyAndVisible ];</code><br />
						<code class="source">    </code><br />
						<code class="source">    [ <span class="code-ctag">MethodProvider</span> doSomething ];</code><br />
						<code class="source">    [ application sayHello ];</code><br />
						<code class="source">    </code><br />
						<code class="source">    <span class="code-keyword">return YES</span>;</code><br />
						<code class="source">}</code><br />
					</div>
					<div>
						Do not forget to include the header file:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#import</span> <span class="code-string">"MyUIApp.h"</span></code><br />
					</div>
					<div>
						Compilation will be successfull, but the application will crash, with the following message, displayed in the console:
					</div>
					<div class="code">
						<code class="source">- [ UIApplication sayHello ]: unrecognized selector sent to instance 0x5911700</code>
					</div>
					<div>
						This particular case is caused by the dynamic aspect of the Objective-C language (symbol resolution occures at run-time), and by the linker that does not generate symbols for categories.
					</div>
					<div>
						To solve the problem, we have to fix the linker parameters, in the informations of the application's target, and add, in the «Other Linker Flags» section:
					</div>
					<div class="code">
						<code class="source">-ObjC -all_load</code>
					</div>
					<div>
						<img src="/uploads/image/articles/xcode-static-libraries/objc-lib-14.png" />
					</div>
					<?php  print new Eos_Comment_View() . chr( 10 ); ?>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			
