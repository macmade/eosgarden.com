			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/opencv.png" alt="" width="905" height="285" />
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
						<div>
							This tutorial will teach you how to use the OpenCV library with iPhone or iPad applications.<br />
							It is based on the XCode project file for iPhone, available from the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/opencv-ios/download/', 'download' ) ?> section.
						</div>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<div class="clearer"></div>
					<div class="img-right">
						<img src="/uploads/image/opencv-ios/simulator.png" alt="" width="207" height="385" />
					</div>
					<h2>Table of contents</h2>
					<div>
						<ol>
							<li>
								<a href="#xcode" title="Go to this section">XCode project</a>
							</li>
							<li>
								<a href="#targets" title="Go to this section">Targets</a>
							</li>
							<li>
								<a href="#headers" title="Go to this section">Header files</a>
							</li>
							<li>
								<a href="#files" title="Go to this section">Files &amp; directories</a>
							</li>
							<li>
								<a href="#build" title="Go to this section">Building OpenCV</a>
							</li>
							<li>
								<a href="#settings" title="Go to this section">XCode build settings</a>
							</li>
						</ol>
					</div>
					<a name="xcode"></a>
					<h3>1. XCode project</h3>
					<div>
						This port consist of a ready-to-use XCode project, including OpenCV as a static library, linked with the application main's target.
					</div>
					<div>
						The XCode project has been created using the «View-based application» preset, but you can customize it to create any kind of application.
					</div>
					<div>
						Note that when building your application for the iPhone (or iPad) simulator, you may see some warnings from the linker, like:
					</div>
					<div class="code">
						<code class="source">ld: warning: can't add line info to anonymous symbol cstring ...</code>
					</div>
					<div>
						This only affects the simulator builds, and it won't affect your OpenCV usage, even in the simulator.
					</div>
					<a name="targets"></a>
					<div class="img-right">
						<img src="/uploads/image/opencv-ios/targets.png" alt="" width="289" height="256" />
					</div>
					<h3>2. Targets</h3>
					<div>
						Two build targets are available:
					</div>
					<div>
						The first one is of course the application's target, that you will use to build and test your iOS application.<br />
						The second one is the target used to build the OpenCV library.
					</div>
					<div>
						The XCode project already includes a compiled version of the OpenCV library, so you can start developping your application right-away, without compiling OpenCV.
					</div>
					<div class="clearer">&nbsp;</div>
					<a name="headers"></a>
					<h3>3. Header files</h3>
					<div>
						The path to the OpenCV header files has been added to the XCode project's settings, so you can include them just like system incudes (&lt;filename.h&gt;).
					</div>
					<div>
						Note that the OpenCV main header files is included in the project's pre-compiled header files.<br />
						It means that the OpenCV function are available to use, without including the «<strong>opencv/opencv.h</strong>» header file.
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#ifdef __OBJC__</span></code><br />
						<code class="source">	<span class="code-keyword">#import</span> <span class="code-string">&lt;Foundation/Foundation.h&gt;</span></code><br />
						<code class="source">	<span class="code-keyword">#import</span> <span class="code-string">&lt;UIKit/UIKit.h&gt;</span></code><br />
						<code class="source">	<strong><span class="code-keyword">#import</span> <span class="code-string">&lt;opencv/cv.h&gt;</span></strong></code><br />
						<code class="source"><span class="code-keyword">#endif</span></code>
					</div>
					<a name="files"></a>
					<h3>4. Files &amp; directories</h3>
					<div class="img-right">
						<img src="/uploads/image/opencv-ios/files.png" alt="" width="328" height="450" />
					</div>
					<div>
						The XCode project contains a separate directory for the OpenCV files. That directory contains the full OpenCV sources, that are decompressed in the «tmp» directory during the build process.
					</div>
					<div>
						All build files are placed in the «build» directory, which contains a directory for the iPhone OS build files, and another one for the iPhone simulator build files.
					</div>
					<div>
						The final libraries and OpenCV support files are placed under the «lib» directory. Here again, there's a directory for the iPhone OS, and another one for the iPhone simulator.
					</div>
					<div>
						The build process is controlled by a custom makefile, invoked from the XCode target.
					</div>
					<div>
						You may modify the makefile to adapt the OpenCV build, or to port other versions. It's well documented, so it shouldn't be that hard. : )
					</div>
					<div>
						Also note the patch directory. It may contains patches for the OpenCV sources.<br />
						The name of the patch file must correspond to the OpenCV version that will be built.
					</div>
					<div>
						Actually, a small patch is made, to prevent a fatal build error. It just replaces a «double» datatype with an «int» one, to fit iOS structures.
					</div>
					<a name="build"></a>
					<h3>5. Building OpenCV</h3>
					<div>
						Although the XCode project already includes a compiled version of the OpenCV library, you may switch to the «OpenCV» target to build it again.
					</div>
					<div>
						The makefile will automatically build two versions of the library. The first one for iOS, the second one for the simulator.
					</div>
					<div>
						Building the OpenCV library is a long process. So we recommend you not to set the «OpenCV» target as a dependancy of your main application target. This will save some compilation time.<br />
						When building OpenCV, you may see some warnings and errors, but they shouldn't prevent the library to be built.
					</div>
					<div>
						You may check if everything went well by looking for the «<strong>libcv.a</strong>» file (the library itself), in the «<strong>OpenCV/lib/iPhoneOS/lib/</strong>» directory.
					</div>
					<a name="settings"></a>
					<h3>6. XCode build settings</h3>
					<div>
						Here's the aplication's build settings that allows the use of the OpenCV library.<br />
						No other settings were touched, so you can customize them as usual.
					</div>
					<h4>Other linker flags</h4>
					<div>
						Those settings will link the main application with the C++ standard libraries, and with the OpenCV core libraries.
					</div>
					<div>
						<strong>Any iPhone OS device</strong>
					</div>
					<div class="code">
						<code class="source">-lstdc++</code><br />
						<code class="source">-lz</code><br />
						<code class="source">"$(SRCROOT)/OpenCV/lib/iPhoneOS/lib/libcv.a"</code><br />
						<code class="source">"$(SRCROOT)/OpenCV/lib/iPhoneOS/lib/libcxcore.a"</code>
					</div>
					<div>
						<strong>Any iPhone OS simulator</strong>
					</div>
					<div class="code">
						<code class="source">-lstdc++</code><br />
						<code class="source">-lz</code><br />
						<code class="source">"$(SRCROOT)/OpenCV/lib/iPhoneSimulator/lib/libcv.a"</code><br />
						<code class="source">"$(SRCROOT)/OpenCV/lib/iPhoneSimulator/lib/libcxcore.a"</code>
					</div>
					<h4>Header search paths</h4>
					<div>
						Those settings will make the OpenCV header files available for the XCode project, as standard system includes.
					</div>
					<div>
						<strong>Any iPhone OS device</strong>
					</div>
					<div class="code">
						<code class="source">"$(SRCROOT)/OpenCV/lib/iPhoneOS/include/opencv/"</code><br />
						<code class="source">"$(SRCROOT)/OpenCV/lib/iPhoneOS/include/"</code>
					</div>
					<div>
						<strong>Any iPhone OS simulator</strong>
					</div>
					<div class="code">
						<code class="source">"$(SRCROOT)/OpenCV/lib/iPhoneSimulator/include/opencv/"</code><br />
						<code class="source">"$(SRCROOT)/OpenCV/lib/iPhoneSimulator/include/"</code>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
