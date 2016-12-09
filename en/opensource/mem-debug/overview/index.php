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
                        MEMDebug is a C library allowing to trace, inspect and debug the dynamic memory allocations inside a C program.
                    </div>
                    <div class="grey">
                        MEMDebug is realeased under the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/licenses/bsd/' ) ?>. Feel free to use it, and modify it at your convenience.
                    </div>
                </div>
                <div class="frame-bottom">&nbsp;</div>
            </div>
            <div class="frame">
                <div class="frame-top">&nbsp;</div>
                <div class="frame-content">
                    <h2>Overview</h2>
                    <div>
                        Amongst the main reasons why a C program may crash is memory management.<br />
                        That kind of errors can be hard to track, depending on the application's logic. It can come from a pointer deallocated twice, a buffer overflow, a segmentation fault, a bus error, etc.
                    </div>
                    <div>
                        MEMDebug is C library that can be linked to a C program to provide assistance with memory debugging.<br />
                        It can detect buffer overflows, double frees, segmentation faults, bus errors, and will give detailed informations about the error that occured and the current memory layout.
                    </div>
                    <div>
                        MEMDebug is currently compatible with the following memory allocation functions:
                    </div>
                    <ul>
                        <li>
                            malloc
                        </li>
                        <li>
                            valloc
                        </li>
                        <li>
                            calloc
                        </li>
                        <li>
                            realloc
                        </li>
                        <li>
                            free
                        </li>
                        <li>
                            alloca
                        </li>
                        <li>
                            GC_malloc
                        </li>
                        <li>
                            GC_malloc_atomic
                        </li>
                        <li>
                            GC_calloc
                        </li>
                        <li>
                            GC_realloc
                        </li>
                        <li>
                            malloc_zone_malloc
                        </li>
                        <li>
                            malloc_zone_valloc
                        </li>
                        <li>
                            malloc_zone_calloc
                        </li>
                        <li>
                            malloc_zone_realloc
                        </li>
                        <li>
                            malloc_zone_free
                        </li>
                    </ul>
                    <div>
                    	Please read the <?php print Eos_Menu::getInstance()->getPageLink( '/opensource/mem-debug/documentation/', 'documentation' ) ?> to learn how to use MEMDebug with your C projects.
                    </div>
                </div>
                <div class="frame-bottom">&nbsp;</div>
            </div>
