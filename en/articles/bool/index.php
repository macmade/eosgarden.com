<?php

header( 'Location: http://www.xs-labs.com/en/archives/articles/c-bool/', true, 301 );
exit();

?>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/articles.png" alt="" width="905" height="285" />
				</div>
				<div class="frame-spacer">&nbsp;</div>
				<div class="frame-content">
					<h2>Using boolean data-types with ANSI-C</h2>
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
						Boolean data types are certainly the most often used data-type in any programming language.<br />
						They are the root of any programming logic.<br />
						Nowadays, few people remember that the boolean data type wasn't defined with the ANSI (C89) C programming language.
						<!-- RSS_ABSTRACT_END -->
					</div>
					<div>
						It was added as part of the ISO-C99 standard, with the «stdbool.h» header file.
					</div>
					<div>
						Before this, it was up to each programmer to define its own boolean type, usually an enum, like the following one:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">typedef enum</span> { false = 0, true  = 1 } bool;</code>
					</div>
					<div>
						Of course, unless using prefixes, such declarations may cause many problems, especially when using libraries, in which each programmer defined a boolean datatype.
						You'll then get linking problems, because of duplicates symbols.
					</div>
					<div>
						The ISO-C99 specification defined a «bool» datatype, defined in the «stdbool.h» header file.
					</div>
					<div>
						That's great, but how can we be sure that we are coding for C99, what about code portability with old systems?
					</div>
					<div>
						The best way to ensure backward compatibility is to declare the boolean data-type exactly the same way C99 does.
					</div>
					<div>
						A macro, named «__bool_true_false_are_defined» is specified, so you can know if the boolean data-type is actually declared and available.
					</div>
					<div>
						No surprise, the «true» value must be defined to 1, and «false» to 0.
					</div>
					<div>
						In C99, the «bool» data-type must expand to «_Bool». If it's not defined, you can rely on on other data-type, like «char», that will save a few bits compared to integers.
					</div>
					<div>
						The final declaration may look like this, to ensure a maximum portability and compatibility:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">#ifndef</span> __bool_true_false_are_defined</code><br />
						<code class="source"><span class="code-keyword">    #ifdef</span> _Bool</code><br />
						<code class="source"><span class="code-keyword">        #define</span> bool                        _Bool</code><br />
						<code class="source"><span class="code-keyword">    #else</span></code><br />
						<code class="source"><span class="code-keyword">        #define</span> bool                        <span class="code-keyword">char</span></code><br />
						<code class="source"><span class="code-keyword">    #endif</span></code><br />
						<code class="source"><span class="code-keyword">    #define</span> true                            1</code><br />
						<code class="source"><span class="code-keyword">    #define</span> false                           0</code><br />
						<code class="source"><span class="code-keyword">    #define</span> __bool_true_false_are_defined   1</code><br />
						<code class="source"><span class="code-keyword">#endif</span></code>
					</div>
					<?php  print new Eos_Comment_View() . chr( 10 ); ?>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
			
