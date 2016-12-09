			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/xeos.png" alt="" width="905" height="285" />
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
					<div class="list-box">
						<div class="list-box-header">
							Documentation
						</div>
						<?php print Eos_Menu::getInstance()->getMenuLevel( 4, true ) . chr( 10 ) ?>
					</div>
					<h2>Installing XEOS</h2>
					<div class="grey">
						This section will teach you how to compile and run XEOS.<br />
						Please carefully read the «Requirements» section, to learn how to setup the necessary build environment.
					</div>
					<div class="grey">
						Technical details about the OS (source code, features, etc.) can be found in the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/xeos/documentation/technical/', 'technical section' ) ?> of this documentation.
					</div>
					<h3 class="clearer">1. Requirements</h3>
					<div>
						In order to be built, XEOS needs a custom version of the GNU compiler (GCC).<br />
						The reason for this is that the compilers available by default on standard systems may only compile executables of a specific format.<br />
						For instance, you won't be able to build ELF on Mac OS X, nor Mach-O executables on Linux.<br />
					</div>
					<div>
						Additionally, the default compilers will usually automatically link with the standard C library that is available on the running system.<br />
						As XEOS is itself an operating system, it won't be able to use such a library.
					</div>
					<div>
						So the first step, in order to compile XEOS, is to compile the compiler that will be able to compile it...<br />
						And of course, a version of GCC needs to be available on your system in order to compile another version of GCC.<br />
						It may seems funny, but don't worry: everything has been prepared for you.
					</div>
					<h3>2. Building the compiler</h3>
					<div>
						A specific version of GCC has been prepared, and is included in the XEOS sources.<br />
						You need to compile and install it, before compiling XEOS.
					</div>
					<div>
						From a terminal window, you need to cd to XEOS trunk's directory.<br />
						Then, type the following command:
					</div>
					<div class="code">
						<code class="source">make cross</code>
					</div>
					<div>
						It will unpack and build everything that's needed to compile XEOS.<br />
						Everything will be installed in the «/usr/local/xeos/» directory, so you can easily clean everything up when needed.
					</div>
					<div>
						The tools that will be installed are:
					</div>
					<ul>
						<li>
							Binutils 2.20<span class="grey"> - The GNU collection of binary tools</span>
						</li>
						<li>
							GMP 4.3.2 <span class="grey"> - The GNU multiple precision arithmetic library</span>
						</li>
						<li>
							MPFR 2.4.2 <span class="grey"> - The GNU multiple-precision floating-point computations with correct rounding library</span>
						</li>
						<li>
							GCC 4.4.3 <span class="grey"> - The GNU compiler collection</span>
						</li>
						<li>
							QEMU 0.12.2 <span class="grey"> - A generic and open source machine emulator and virtualizer</span>
						</li>
					</ul>
					<div>
						The build process may take some time. But once it's done, you are ready to compile and use XEOS.
					</div>
					<h3>3. Compiling</h3>
					<div>
						Compiling XEOS is a very simple task.<br />
						From the trunk's directory, simple type the following command:
					</div>
					<div class="code">
						<code class="source">make</code>
					</div>
					<div>
						It will generate a FAT-12 floppy disk image containing the full OS, that you can run on any x86 machine or emulator.
					</div>
					<h3>4. Running XEOS</h3>
					<div>
						XEOS can be run with the QEMU emulator, which was automatically installed when building the compiler.<br />
						In order to launch it simply type, from the trunk's directory:
					</div>
					<div class="code">
						<code class="source">make test</code>
					</div>
					<div>
						This will launch QEMU, which will boot from the XEOS floppy drive.<br />
						Enjoy!
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
