			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/opensource.png" alt="" width="905" height="285" />
				</div>
			</div>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
                    <div class="legacy">
                        <h2>GitHub</h2>
                        <div>
                            All our OpenSource projects have been migrated to <a href="http://www.github.com/macmade/">GitHub</a>.<br />
                            Feel free to fork!
                        </div>
                    </div>
					<h2>Overview</h2>
					<div class="img-right">
						<img src="/uploads/image/hexprint/hexprint.png" alt="" width="225" height="300" />
					</div>
					<div class="grey">
						HexPrint is a command line tool that displays a file's content as an hexadecimal dump.
					</div>
					<div class="grey">
						HexPrint is release under the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/licenses/boost/' ) ?>. It means you can use it freely with your projects, without giving credits, as long as you only release object code.
					</div>
					<h2>Table of contents</h2>
					<div>
						<ol>
							<li>
								<a href="#features" title="Go to this section">Features</a>
							</li>
							<li>
								<a href="#usage" title="Go to this section">Usage</a>
							</li>
						</ol>
					</div>
					<a name="features"></a>
					<h2>Features</h2>
					<div>
						HexPrint can be simply invoked by typing it's name, following by the path of the file to dump.<br />
						For instance:
					</div>
					<div class="code">
						<code class="source">hexprint /path/to/some/file</code>
					</div>
					<div>
						The result will look like this:
					</div>
					<div class="code">
						<code class="source">0000000000: CF FA ED FE   07 00 00 01   03 00 00 00   01 00 00 00 | ................</code><br />
						<code class="source">0000000016: 03 00 00 00   A0 01 00 00   00 20 00 00   00 00 00 00 | ......... ......</code><br />
						<code class="source">0000000032: 19 00 00 00   38 01 00 00   00 00 00 00   00 00 00 00 | ....8...........</code><br />
						<code class="source">0000000048: 00 00 00 00   00 00 00 00   00 00 00 00   00 00 00 00 | ................</code><br />
						<code class="source">0000000064: E8 01 00 00   00 00 00 00   C0 01 00 00   00 00 00 00 | ................</code><br />
						<code class="source">0000000080: E8 01 00 00   00 00 00 00   07 00 00 00   07 00 00 00 | ................</code><br />
						<code class="source">0000000096: 03 00 00 00   00 00 00 00   5F 5F 74 65   78 74 00 00 | ........__text..</code><br />
						<code class="source">0000000112: 00 00 00 00   00 00 00 00   5F 5F 54 45   58 54 00 00 | ........__TEXT..</code><br />
						<code class="source">0000000128: 00 00 00 00   00 00 00 00   00 00 00 00   00 00 00 00 | ................</code><br />
						<code class="source">0000000144: FA 00 00 00   00 00 00 00   C0 01 00 00   00 00 00 00 | ................</code><br />
						<code class="source">0000000160: A8 03 00 00   10 00 00 00   00 04 00 80   00 00 00 00 | ................</code><br />
						<code class="source">0000000176: 00 00 00 00   00 00 00 00   5F 5F 63 73   74 72 69 6E | ........__cstrin</code><br />
						<code class="source">0000000192: 67 00 00 00   00 00 00 00   5F 5F 54 45   58 54 00 00 | g.......__TEXT..</code><br />
						<code class="source">0000000208: 00 00 00 00   00 00 00 00   00 01 00 00   00 00 00 00 | ................</code><br />
						<code class="source">0000000224: 91 00 00 00   00 00 00 00   C0 02 00 00   03 00 00 00 | ................</code><br />
						<code class="source">0000000240: 00 00 00 00   00 00 00 00   02 00 00 00   00 00 00 00 | ................</code><br />
						<code class="source">0000000256: 00 00 00 00   00 00 00 00   5F 5F 65 68   5F 66 72 61 | ........__eh_fra</code><br />
						<code class="source">0000000272: 6D 65 00 00   00 00 00 00   5F 5F 54 45   58 54 00 00 | me......__TEXT..</code>
					</div>
					<div>
						You'll see the line offset, the hexadecimal data, and the ascii data.<br />
						All of this can be configured. For the options, just see below.
					</div>
					<a name="usage"></a>
					<h2>Usage</h2>
					<div>
						Here are the command line parameters that can be passed to HexPrint:
					</div>
					<div>
						<strong>-c [i] | --columns [i]</strong><br />
						The number of columns to display for the hexadecimal code (integer value)
					</div>
					<div>
						<strong>-g [i] | --group [i]</strong><br />
						Groups bytes by the given number (integer value)
					</div>
					<div>
						<strong>-a | --no-ascii</strong><br />
						Do not display the ASCII code
					</div>
					<div>
						<strong>-n | --no-lines</strong><br />
						Do not display the lines numbers
					</div>
					<div>
						<strong>-h | --help</strong><br />
						Print the help message
					</div>
					<div>
						<strong>-v | --version</strong><br />
						Print the version number
					</div>
					<div>
						<strong>-l | --license</strong><br />
						Print the license terms
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
