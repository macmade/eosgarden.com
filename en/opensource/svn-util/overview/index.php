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
					<h2>About</h2>
					<div class="grey">
						SVN-Utils is a small but useful shell script to simplify some operations on SVN working-copies.<br />
						You will find below a list of it's features.
					</div>
					<div class="grey">
						SVN-Utils is realeased under the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/licenses/bsd/' ) ?>. Feel free to use it, and modify it at your convenience.
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-content">
					<h2>Documentation</h2>
					<h3>Table of contents</h3>
					<div>
						<ol>
							<li>
								<a href="#features" title="Go to this section">Features</a>
								<ol>
									<li>
										<a href="#features-keywords" title="Go to this section">Automatic SVN keywords</a>
									</li>
									<li>
										<a href="#features-delete" title="Go to this section">SVN removal</a>
									</li>
									<li>
										<a href="#features-clean" title="Go to this section">Mac OS X cleanup</a>
									</li>
									<li>
										<a href="#features-add" title="Go to this section">Automatic SVN add</a>
									</li>
								</ol>
							</li>
							<li>
								<a href="#usage" title="Go to this section">Usage</a>
							</li>
						</ol>
					</div>
					<a name="features"></a>
					<h3>1. Features</h3>
					<a name="features-keywords"></a>
					<h4>1.1. Automatic SVN keywords</h4>
					<div>
						SVN-Util can be used to automatically set the «svn:keywords» property on all regular files of a working-copy.
					</div>
					<div>
						The «svn:keywords» property is used to automatically replace some keywords in your files.<br />
						For instance, the «$Id$» keyword that is automatically expanded with the commit's date and author, revision number, etc.
					</div>
					<div>
						With Subversion, you need to set the list of available keywords on all files. SVN-Util can do this automatically for all the files in a working-copy.
					</div>
					<div>
						To do this, simply invoke the script with the «-k» or «--keywords» command:
					</div>
					<div class="code">
						<code>svn-util -k ~/myProject</code>
					</div>
					<a name="features-delete"></a>
					<h4>1.2. SVN removal</h4>
					<div>
						Subversion stores informations about a working-copy in hidden directories named «.svn». Such a directory is present in every directory of a working-copy.
					</div>
					<div>
						SVN-Util can automatically delete all that «.svn» directories in a working-copy, making it a standard, unversioned directory.<br />
						This can be useful for instance if you want to copy a working-copy over FTP, or create an archive.
					</div>
					<div>
						To do this, simply invoke the script with the «-d» or «--delete» command:
					</div>
					<div class="code">
						<code>svn-util -d ~/myProject</code>
					</div>
					<a name="features-clean"></a>
					<h4>1.3. Mac OS X cleanup</h4>
					<div>
						Mac OS X stores the Finder view's settings per directory in hidden files named «.DS_Store».<br />
						When manipulating files from the Finder, those files are automatically created in the direcotories you are working in.
					</div>
					<div>
						It can be very embarassing when using a SVN working-copy, as you will see all that «.DS_Store» files reported as unversioned files.<br />
						SVN-Util can clean all the «.DS_Store» files in a working-copy.
					</div>
					<div>
						To do this, simply invoke the script with the «-c» or «--clean» command:
					</div>
					<div class="code">
						<code>svn-util -c ~/myProject</code>
					</div>
					<a name="features-add"></a>
					<h4>1.4. Automatic SVN add</h4>
					<div>
						SVN-Util can be used to automatically mark all unversioned files present in working-copy, so they will be added to the repository with the next commit.
					</div>
					<div>
						To do this, simply invoke the script with the «-a» or «--add» command:
					</div>
					<div class="code">
						<code>svn-util -a ~/myProject</code>
					</div>
					<a name="usage"></a>
					<h3>2. Usage</h3>
					<div>
						The script has to be invoked from the command line.<br />
						It takes two arguments: a command name and the path to a SVN working-copy.<br />
						Please refer to the features list to learn more about the available commands.
					</div>
					<div>
						For instance:
					</div>
					<div class="code">
						<code>bash svn-util.sh -k ~/myProject</code>
					</div>
					<div>
						Note that you can also make the SVN-Util script available like standard Unix commands.<br />
						Simply copy it in a directory that's included in your executable path (like /usr/local/bin/), and make sure the executable flag is set.
					</div>
					<div>
						For instance:
					</div>
					<div class="code">
						<code>sudo cp svn-util.sh /usr/local/bin/svn-util</code><br />
						<code>sudo chmod 755 /usr/local/bin/svn-util</code>
					</div>
					<div>
						You'll then be able to call the script as a normal executable:
					</div>
					<div class="code">
						<code>svn-util -k ~/myProject</code>
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
