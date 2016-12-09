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
					<h2>XCode integration</h2>
					<div class="grey">
						<div>
							The Magic MakeFile can be easily integrated into IDE software, such as Apple's XCode (part of the Developer Tools).
						</div>
						<div>
							This short tutorial will teach you how to build an XCode project that uses the Magic MakeFile as build tool.
						</div>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<div class="clearer"></div>
					<h2>Project setup</h2>
					<div>
						From XCode, simply create a new project. From the project creation window, under "Mac OS X", choose "Other", then select "External Build System", as shown in the picture below.
					</div>
					<div>
						<img src="/uploads/image/magic-makefile/xcode-project.png" alt="" width="680" height="522" />
					</div>
					<div>
						<div class="img-right">
							<img src="/uploads/image/magic-makefile/xcode-target.png" alt="" width="157" height="191" />
						</div>
						This will tell XCode not to use it's internal build system.<br />
						A custom target is automatically created. Although its settings can be adjusted, the default ones work perfectly with the Magic MakeFile.
					</div>
					<div>
						<div class="img-left">
							<img src="/uploads/image/magic-makefile/xcode-directories.png" alt="" width="190" height="117" />
						</div>
						Then simply copy the Magic MakeFile files into your XCode project's directory.
					</div>
					<div class="clearer">
						You're done! Now each time you'll tell XCode to build your project, the Magic MakeFile will be used.<br />
						It's output will be displayed directly in the XCode build results view, just as a normal XCode project.
					</div>
					<div>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
