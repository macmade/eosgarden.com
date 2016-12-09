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
					<div class="grey">
						EGPack is an archive utility, similar to the TAR utility.<br />
						A specific file format is used. Please see the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/egpack/format/', 'format specification' ) ?> for further informations about the EGPK file format.
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<h2>Overview</h2>
					<h3>Compiling and installing</h3>
					<div>
						Egpack should compile on every POSIX compliant operating system with an ANSI-C compiler.
					</div>
					<div>
						To compile EGPack, simply type <code>make</code> from a console prompt, from the EGPack root directory.
					</div>
					<div>
						Installation of the <code>egpack</code> utility is done through the `make install` command.
					</div>
					<h3>Usage</h3>
					<div>
						In order to archive a file or a directory, invoke the <code>egpack</code> binary with the <code>-a</code> argument, followed by the name of the file or directory to archive:
					</div>
					<div class="code">
						<code class="source">egpack -a path/to/directory/</code>
					</div>
					<div>
						Un-archiving is done with the `-u`option:
					</div>
					<div class="code">
						<code class="source">egpack -u path/to/archive.egpk</code>
					</div>
					<div>
						Here are the available command line arguments that can be passed to the <code>egpack</code> binary:
					</div>
					<ul>
						<li>
							<strong>-a</strong><br />
							Archives a file or a directory.
						</li>
						<li>
							<strong>-u</strong><br />
							Un-archives an EGPK archive file.
						</li>
						<li>
							<strong>-v</strong><br />
							Prints the EGPK version number.
						</li>
						<li>
							<strong>-h</strong><br />
							Prints the EGPK help dialog
						</li>
						<li>
							<strong>-d</strong><br />
							Turns on debugging mode
						</li>
					</ul>
					<h3>License</h3>
					<div>
						EGPack is a free software, distributed under the terms of the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/licenses/boost/', 'Boost license' ) ?>.
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
