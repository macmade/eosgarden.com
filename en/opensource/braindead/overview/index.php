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
						BrainDead is an interpreter for the <a href="http://en.wikipedia.org/wiki/Brainfuck">BrainFuck</a> programming language, written in C, that can be run in interactive or non-interactive mode.
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<h2>Overview</h2>
					<h3>Usage</h3>
					<div>
						By default, the executable enters the interactive mode and interprets brainfuck code from stdin as you type.<br />
						Type "x", "X", "q" or "Q" to exit the interactive mode.
					</div>
					<div>
						If a target file is specified, the result will be displayed on the standard output.
					</div>
					<h3>Examples</h3>
					<ul>
						<li>
							<div>
								Entering into interactive mode:
							</div>
							<div class="code">
								<code class="source">$ braindead</code>
							</div>
						</li>
						<li>
							<div>
								Running a brainfuck script:
							</div>
							<div class="code">
								<code class="source">$ braindead path/to/file</code>
							</div>
						</li>
						<li>
							<div>
								Running a brainfuck script by reading characters by characters, allocating only 2 stack cells at a time, and displaying debug informations:
							</div>
							<div class="code">
								<code class="source">$ braindead -drm 1 2 path/to/file</code>
							</div>
						</li>
						<li>
							<div>
								Running a brainfuck script with input from a file instead of stdin:
							</div>
							<div class="code">
								<code class="source">$ braindead path/to/file < path/to/input/file</code>
							</div>
						</li>
					</ul>
					<h3>Language additions</h3>
					<div>
						BrainDead adds some features to the <a href="http://en.wikipedia.org/wiki/Brainfuck">BrainFuck</a> language:
					</div>
					<ul>
						<li>
							<strong>$</strong><br />
							Debug: prints the full stack
						</li>
						<li>
							<strong>@</strong><br />
							Break-point: halt the script
						</li>
						<li>
							<strong>%</strong><br />
							Resets all stack cells to 0
						</li>
					</ul>
					<h3>Arguments</h3>
					<div>
						The available command line arguments are:
					</div>
					<ul>
						<li>
							-h, boolean, --help<br />
							<span class="grey">Displays help about the command</span>
						</li>
						<li>
							-v, boolean, --version<br />
							<span class="grey">Displays the version number</span>
						</li>
						<li>
							-l, boolean, --license<br />
							<span class="grey">Displays the license text</span>
						</li>
						<li>
							-m, integer, --malloc<br />
							<span class="grey">Allocates &lt;X&gt; stack cells at a time (default is 85)</span>
						</li>
						<li>
							-r, integer, --read<br />
							<span class="grey">Read &lt;X&gt; bytes from input file at a time (default is 1024)</span>
						</li>
						<li>
							-d, boolean, --debug<br />
							<span class="grey">Debug mode - Displays every operation</span>
						</li>
						<li>
							-b, boolean, --enable-breakpoints<br />
							<span class="grey">Enables the use of '@' symbols in the brainfuck code for breakpoints</span>
						</li>
						<li>
							-s, boolean, --enable-stack-debug<br />
							<span class="grey">Enables the use of '$' symbols in the brainfuck code for stack debugging</span>
						</li>
						<li>
							-z, boolean, --enable-stack-reset<br />
							<span class="grey">Enables the use of '%' symbols in the brainfuck code for stack reset</span>
						</li>
					</ul>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
