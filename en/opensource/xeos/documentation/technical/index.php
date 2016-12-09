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
					<h2>Technical details</h2>
					<div class="grey">
						This section contains some technical details about the XEOS operating systems.<br />
						You'll find some usefull informations about the boot process, the XEOS kernel, hardware communication, the available libraries, and the organisation of the XEOS source code.
					</div>
					<h3 class="clearer">Table of contents</h3>
					<ol>
						<li>
							<a href="#boot" title="Go to this section">Boot process</a>
						</li>
						<li>
							<a href="#kernel" title="Go to this section">Kernel</a>
						</li>
						<li>
							<a href="#interrupts" title="Go to this section">Interrupts</a>
						</li>
						<li>
							<a href="#syscalls" title="Go to this section">Syscalls</a>
						</li>
						<li>
							<a href="#hal" title="Go to this section">Hardware abstraction layer</a>
						</li>
						<li>
							<a href="#memory" title="Go to this section">Memory layout</a>
						</li>
						<li>
							<a href="#libc" title="Go to this section">C Library</a>
						</li>
						<li>
							<a href="#libxeos" title="Go to this section">XEOS Library</a>
						</li>
						<li>
							<a href="#source" title="Go to this section">Source code organisation</a>
						</li>
					</ol>
					<a name="boot"></a>
					<h3>2. Boot process</h3>
					<div>
						The XEOS boot process consist of three main steps:
					</div>
					<ol>
						<li>
							First-stage bootloader
						</li>
						<li>
							Second-stage bootloader
						</li>
						<li>
							Kernel
						</li>
					</ol>
					<h4>1 - First-stage bootloader</h4>
					<div>
						This is the very first step of the XEOS boot process.<br />
						The first-stage bootloader consists of an x86 assembly program, loaded by the BIOS from the first 512 bytes of the XEOS boot floppy.
					</div>
					<div>
						For technical reasons, related to the BIOS, this software cannot exceed 512 bytes, when loaded into memory.<br />
						Even when writing pure assembly, it's hard to setup all the stuff needed by a kernel withing 512 bytes.
					</div>
					<div>
						So the only task executed by the first-stage bootloader is to find a second-stage bootloader, whose size isn't limited, from the FAT-12 floppy disk, to load it into memory, and to execute it's code.
					</div>
					<div>
						It uses BIOS interrupts to load the FAT-12 allocation table into memory, and look for a file named 'BOOT2.BIN'.<br />
						When it's found the file is loaded into memory, at the 0x50:0 address.<br />
						Control is then transfered to the second-stage bootloader.
					</div>
					<h4>1.2 - Second-stage bootloader</h4>
					<div>
						The second-stage bootloader is responsible to set-up a correct environment for the XEOS kernel, and of course to load and execute it.<br />
						Those steps cannot be made by the first-stage bootloader, as it takes more than 512 bytes of code.
					</div>
					<div>
						The second-stage bootloader is loaded at the 0x50:0 memory address, so it's at the top of the available memory.<br />
						Three main tasks are performed here:
					</div>
					<ol>
						<li>
							Load the XEOS kernel into memory
						</li>
						<li>
							Switch the CPU to 32bits protected mode
						</li>
						<li>
							Execute the XEOS kernel
						</li>
					</ol>
					<h4>1.2.1 - Kernel load</h4>
					<div>
						This first step is exactly the same as what the first-stage bootloader previously did.<br />
						It looks for a file named 'KERNEL.ELF' in the XEOS floppy disk, and loads it into memory, at the 0x1000:0 memory address.<br />
						Here again, it uses BIOS interrupts.
					</div>
					<h4>1.2.2 - 32bits protected mode</h4>
					<div>
						For historical reasons, an x86 computer boots in 16bits 'real' mode.<br />
						It means the available memory is limited to 1MB, because of a 20bits segmented memory address space.
					</div>
					<div>
						There's also an unlimited access to all the memory areas, as well as the I/O addresses.<br />
						Also, no memory protection, multitasking, or code privilege levels.
					</div>
					<div>
						It's perfectly possible to create an operating system running in 16bits real mode, but it would lack a lot of features provided by the modern CPUs.<br />
						So in order to execute the XEOS kernel, the second-stage bootloader needs to switch the CPU into 32bits protected mode.<br />
						This will give access to 4GB of memory, including memory protection and code privilege levels.
					</div>
					<div>
						Technically, switching to 32bits protected mode means:
					</div>
					<ol>
						<li>
							<div>
								<strong>Installing a global descriptor table (GDT)</strong>
							</div>
							<div>
								A GDT tells the x86 CPU about the required memory segmentation.<br />
								It defines at least three memory areas, each one with specific permissions.<br />
								The three memory areas are:
							</div>
							<ol>
								<li>
									a null descriptor (all zeros)
								</li>
								<li>
									an executable memory area (to load executable code)
								</li>
								<li>
									a read/write memoty area (to store data)
								</li>
							</ol>
							<div>
								XEOS actually defines two executable memory areas, and two read/write memory area.<br />
								There's one of each for the kernel itself, with all privileges, and one of each for the user-space, with limited privileges.
							</div>
						</li>
						<li>
							<div>
								<strong>Enabling the A20 address line</strong>
							</div>
							<div>
								In real mode, the memory address space is limited to 20bits.<br />
								To access up-to 4GB of memory, the 21st address line (A20), on the CPU's address bus, must be enabled. 
							</div>
							<div>
								This can be done with a few ways, depending on the architecture:
							</div>
							<ul>
								<li>
									through the system control port
								</li>
								<li>
									through a BIOS interrupt
								</li>
								<li>
									through the keyboard control port
								</li>
								<li>
									through the keyboard out port
								</li>
							</ul>
						</li>
					</ol>
					<div>
						XEOS tries by default to enable the A20 line with a BIOS interrupt. If it fails, it will ask the user which way to try.<br />
						Once it's done, the CPU is then effectively switched to 32bits protected mode, by using the primary control register (CR0).
					</div>
					<h4>1.2.3 - Kernel execution</h4>
					<div>
						The XEOS kernel file consists an ELF binary.<br />
						The second-stage bootloaders will look for the kernel's starting point, and execute a far jump to tranfer control.
					</div>
					<div>
						It's important to note that, in 32bits protected mode, BIOS interrupts are no longer available.<br />
						Everything has now to be coded from scratch.
					</div>
					<a name="kernel"></a>
					<h3>3. Kernel</h3>
					<div>
						[CONTENT TO COME]
					</div>
					<a name="interrupts"></a>
					<h3>4. Interrupts</h3>
					<div>
						[CONTENT TO COME]
					</div>
					<a name="syscalls"></a>
					<h3>5. Syscalls</h3>
					<div>
						[CONTENT TO COME]
					</div>
					<a name="hal"></a>
					<h3>6. Hardware abstraction layer</h3>
					<div>
						[CONTENT TO COME]
					</div>
					<a name="memory"></a>
					<h3>7. Memory layout</h3>
					<div>
						[CONTENT TO COME]
					</div>
					<a name="libc"></a>
					<h3>8. C Library</h3>
					<div>
						[CONTENT TO COME]
					</div>
					<a name="libxeos"></a>
					<h3>9. XEOS Library</h3>
					<div>
						[CONTENT TO COME]
					</div>
					<a name="source"></a>
					<h3>1. Source code organisation</h3>
					<div>
						
					</div>
					<ul class="filesystem">
						<li class="directory">
							<div>
								build<br />
								<span class="grey"></span>
							</div>
							<ul class="filesystem">
								<li class="directory">
									<div>
										bin<br />
										<span class="grey"></span>
									</div>
									<ul class="filesystem">
										<li class="directory">
											<div>
												boot<br />
												<span class="grey"></span>
											</div>
										</li>
										<li class="directory">
											<div>
												core<br />
												<span class="grey"></span>
											</div>
										</li>
									</ul>
								</li>
								<li class="directory">
									<div>
										mount<br />
										<span class="grey"></span>
									</div>
								</li>
								<li class="directory">
									<div>
										obj<br />
										<span class="grey"></span>
									</div>
									<ul class="filesystem">
										<li class="directory">
											<div>
												boot<br />
												<span class="grey"></span>
											</div>
										</li>
										<li class="directory">
											<div>
												core<br />
												<span class="grey"></span>
											</div>
											<ul class="filesystem">
												<li class="directory">
													<div>
														hal<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														kernel<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														libc<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														xeos<br />
														<span class="grey"></span>
													</div>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="directory">
									<div>
										release<br />
										<span class="grey"></span>
									</div>
								</li>
							</ul>
						</li>
						<li class="directory">
							<div>
								res<br />
								<span class="grey"></span>
							</div>
						</li>
						<li class="directory">
							<div>
								src<br />
								<span class="grey"></span>
							</div>
							<ul class="filesystem">
								<li class="directory">
									<div>
										boot<br />
										<span class="grey"></span>
									</div>
									<ul class="filesystem">
										<li class="directory">
											<div>
												include<br />
												<span class="grey"></span>
											</div>
										</li>
									</ul>
								</li>
								<li class="directory">
									<div>
										core<br />
										<span class="grey"></span>
									</div>
									<ul class="filesystem">
										<li class="directory">
											<div>
												hal<br />
												<span class="grey"></span>
											</div>
											<ul class="filesystem">
												<li class="directory">
													<div>
														cpu<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														gdt<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														idt<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														include<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														io<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														pic<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														pit<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														smbios<br />
														<span class="grey"></span>
													</div>
												</li>
											</ul>
										</li>
										<li class="directory">
											<div>
												include<br />
												<span class="grey"></span>
											</div>
											<ul class="filesystem">
												<li class="directory">
													<div>
														hal<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														kernel<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														private<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														xeos<br />
														<span class="grey"></span>
													</div>
												</li>
											</ul>
										</li>
										<li class="directory">
											<div>
												kernel<br />
												<span class="grey"></span>
											</div>
											<ul class="filesystem">
												<li class="directory">
													<div>
														include<br />
														<span class="grey"></span>
													</div>
													<ul class="filesystem">
														<li class="directory">
															<div>
																private<br />
																<span class="grey"></span>
															</div>
														</li>
													</ul>
												</li>
												<li class="directory">
													<div>
														interrupts<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														syscalls<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														system<br />
														<span class="grey"></span>
													</div>
												</li>
												<li class="directory">
													<div>
														video<br />
														<span class="grey"></span>
													</div>
												</li>
											</ul>
										</li>
										<li class="directory">
											<div>
												libc<br />
												<span class="grey"></span>
											</div>
										</li>
										<li class="directory">
											<div>
												libxeos<br />
												<span class="grey"></span>
											</div>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="directory">
							<div>
								sw<br />
								<span class="grey"></span>
							</div>
						</li>
					</ul>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
