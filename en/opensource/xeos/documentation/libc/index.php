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
					<h2>Standard C Library</h2>
					<div class="grey">
						To ease the development process of the XEOS kernel, XEOS is built with a custom C89 standard library, written from scratch.<br />
						It also includes some parts of the C99 standard.
					</div>
					<div class="grey">
						This C standard library is not complete yet, but already provides an efficient way to work with the XEOS kernel.
					</div>
					<h3 class="clearer">Available headers</h3>
					<div>
						Here's the list of the available headers in the XEOS C standard library.<br />
						Most of them come from the C89 (ANSI) standard, but some C99 specifications have also been implemented.
					</div>
					<div style="overflow: hidden; height: 100%;">
						<div class="left">
							<h4>C89 / ANSI</h4>
							<ul>
								<li>
									<a href="#assert-h" title="assert.h">assert.h</a>
									<span class="grey">Diagnostics</span>
								</li>
								<li>
									<a href="#ctype-h" title="ctype.h">ctype.h</a>
									<span class="grey">Character class tests</span>
								</li>
								<li>
									<a href="#errno-h" title="errno.h">errno.h</a>
									<span class="grey">Error codes reported by (some) library functions</span>
								</li>
								<li>
									<a href="#float-h" title="float.h">float.h</a>
									<span class="grey">Implementation-defined floating-point limits</span>
								</li>
								<li>
									<a href="#limits-h" title="limits.h">limits.h</a>
									<span class="grey">Implementation-defined limits</span>
								</li>
								<li>
									<a href="#locale-h" title="locale.h">locale.h</a>
									<span class="grey">Locale-specific information</span>
								</li>
								<li>
									<a href="#math-h" title="math.h">math.h</a>
									<span class="grey">Mathematical functions</span>
								</li>
								<li>
									<a href="#setjmp-h" title="setjmp.h">setjmp.h</a>
									<span class="grey">Non-local jumps</span>
								</li>
								<li>
									<a href="#signal-h" title="signal.h">signal.h</a>
									<span class="grey">Signals</span>
								</li>
								<li>
									<a href="#stdarg-h" title="stdarg.h">stdarg.h</a>
									<span class="grey">Variable argument lists</span>
								</li>
								<li>
									<a href="#stddef-h" title="stddef.h">stddef.h</a>
									<span class="grey">Definitions of general use</span>
								</li>
								<li>
									<a href="#stdio-h" title="stdio.h">stdio.h</a>
									<span class="grey">Input and output</span>
								</li>
								<li>
									<a href="#stdlib-h" title="stdlib.h">stdlib.h</a>
									<span class="grey">Utility functions</span>
								</li>
								<li>
									<a href="#string-h" title="string.h">string.h</a>
									<span class="grey">String functions</span>
								</li>
								<li>
									<a href="#time-h" title="time.h">time.h</a>
									<span class="grey">Time and date functions</span>
								</li>
							</ul>
						</div>
						<div class="left" style="margin-left: 25px;">
							<h4>ISO C90</h4>
							<ul>
								<li>
									<a href="#iso646-h" title="iso646.h">iso646.h</a>
									<span class="grey">Bitwise and logical operators</span>
								</li>
							</ul>
							<h4>ISO C99</h4>
							<ul>
								<li>
									<a href="#stdbool-h" title="stdbool.h">stdbool.h</a>
									<span class="grey">Boolean datatype</span>
								</li>
								<li>
									<a href="#stdint-h" title="stdint.h">stdint.h</a>
									<span class="grey">Exact-width integer types</span>
								</li>
							</ul>
						</div>
					</div>
					<a name="assert-h"></a>
					<h3>&lt;assert.h&gt;</h3>
					<div>
						<ul>
							<li style="margin-bottom: 5px;">
								<strong style="font-family: monospace;">void assert( int expression );</strong><br />
								Macro used for internal error detection. Ignored if NDEBUG is defined where &lt;assert.h&gt; is included. If expression equals zero, message printed on stderr and abort called to terminate execution. Source filename and line number in message are from preprocessor macros __FILE__ and __LINE__.
							</li>
						</ul>
					</div>
					<a name="ctype-h"></a>
					<h3>&lt;ctype.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalpha( int c );</strong><br />
							isupper( c ) or islower( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int iscntrl( int c );</strong><br />
							Is control character. In ASCII, control characters are 0x00 (NUL) to 0x1F (US), and 0x7F (DEL)
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isdigit( int c );</strong><br />
							Is decimal digit
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isgraph( int c );</strong><br />
							Is printing character other than space
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int islower( int c );</strong><br />
							Is lower-case letter
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isprint( int c );</strong><br />
							Is printing character (including space). In ASCII, printing characters are 0x20 (' ') to 0x7E ('~')
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int ispunct( int c );</strong><br />
							Is printing character other than space, letter, digit
							</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isspace( int c );</strong><br />
							Is space, formfeed, newline, carriage return, tab, vertical tab
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isupper( int c );</strong><br />
							Is upper-case letter
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isxdigit( int c );</strong><br />
							Is hexadecimal digit
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int tolower( int c );</strong><br />
							Return lower-case equivalent
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int isalnum( int c );</strong><br />
							isalpha( c ) or isdigit( c )
						</li>
						
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int toupper( int c );</strong><br />
							Return upper-case equivalent
						</li>
					</ul>
					<a name="errno-h"></a>
					<h3>&lt;errno.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">errno</strong><br />
							Object to which certain library functions assign specific positive values on error
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">EDOM</strong><br />
							Code used for domain errors
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">ERANGE</strong><br />
							Code used for range errors
						</li>
					</ul>
					<div>
						Notes:<br />
						Other implementation-defined error values are permitted to determine the value (if any) assigned to errno by a library function, a program should assign zero to errno immediately prior to the function call
					</div>
					<a name="float-h"></a>
					<h3>&lt;float.h&gt;</h3>
					<div>
						Where the prefix "FLT" pertains to type float, "DBL" to type double, and "LDBL" to type long double:
					</div>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FLT_RADIX</strong><br />
							Radix of floating-point representations
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FLT_ROUNDS</strong><br />
							Floating-point rounding mode
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FLT_DIG<br />DBL_DIG<br />LDBL_DIG</strong><br />
							Precision (in decimal digits)
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FLT_EPSILON<br />DBL_EPSILON<br />LDBL_EPSILON</strong><br />
							Smallest number x such that 1.0 + x != 1.0 FLT_MANT_DIG
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">DBL_MANT_DIG<br />LDBL_MANT_DIG</strong><br />
							Number of digits, base FLT_RADIX, in mantissa FLT_MAX
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">DBL_MAX<br />LDBL_MAX</strong><br />
							Maximum number
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FLT_MAX_EXP<br />DBL_MAX_EXP<br />LDBL_MAX_EXP</strong><br />
							Largest positive integer exponent to which FLT_RADIX can be raised and remain representable FLT_MIN
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">DBL_MIN<br />LDBL_MIN</strong><br />
							Minimum normalised number
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FLT_MIN_EXP<br />DBL_MIN_EXP<br />LDBL_MIN_EXP</strong><br />
							Smallest negative integer exponent to which FLT_RADIX can be raised and remain representable
						</li>
					</ul>
					<a name="limits-h"></a>
					<h3>&lt;limits.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">CHAR_BIT</strong><br />
							Number of bits in a char
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">CHAR_MAX</strong><br />
							Maximum value of type char
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">CHAR_MIN</strong><br />
							Minimum value of type char
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SCHAR_MAX</strong><br />
							Maximum value of type signed char
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SCHAR_MIN</strong><br />
							Minimum value of type signed char
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">UCHAR_MAX</strong><br />
							Maximum value of type unsigned char
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SHRT_MAX</strong><br />
							Maximum value of type short
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SHRT_MIN</strong><br />
							Minimum value of type short
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">USHRT_MAX</strong><br />
							Maximum value of type unsigned short
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">INT_MAX</strong><br />
							Maximum value of type int
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">INT_MIN</strong><br />
							Minimum value of type int
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">UINT_MAX</strong><br />
							Maximum value of type unsigned int
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">LONG_MAX</strong><br />
							Maximum value of type long
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">LONG_MIN</strong><br />
							Minimum value of type long
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">ULONG_MAX</strong><br />
							Maximum value of type unsigned long
						</li>
					</ul>
					<a name="iso646-h"></a>
					<h3>&lt;iso646.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">and</strong><br />
							&amp;&amp;
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">and_eq</strong><br />
							&amp;=
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">bitand</strong><br />
							&amp;
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">bitor</strong><br />
							|
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">compl</strong><br />
							~
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">not</strong><br />
							!
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">not_eq</strong><br />
							!=
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">or</strong><br />
							||
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">or_eq</strong><br />
							|=
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">xor</strong><br />
							^
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">xor_eq</strong><br />
							^=
						</li>
					</ul>
					<a name="locale-h"></a>
					<h3>&lt;locale.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">struct lconv</strong><br />
							Describes formatting of monetary and other numeric values:<br />
							<ul>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char * decimal_point;</strong><br />
									Decimal point for non-monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char * grouping;</strong><br />
									Sizes of digit groups for non-monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char * thousands_sep;</strong><br />
									Separator for digit groups for non-monetary values (left of "decimal point")
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char * currency_symbol;</strong><br />
									Currency symbol
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char * int_curr_symbol;</strong><br />
									International currency symbol
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char * mon_decimal_point;</strong><br />
									Decimal point for monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char * mon_grouping;</strong><br />
									Sizes of digit groups for monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char * mon_thousands_sep;</strong><br />
									Separator for digit groups for monetary values (left of "decimal point")
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char * negative_sign;</strong><br />
									Negative sign for monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char * positive_sign;</strong><br />
									Positive sign for monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char frac_digits;</strong><br />
									Number of digits to be displayed to right of "decimal point" for monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char int_frac_digits;</strong><br />
									Number of digits to be displayed to right of "decimal point" for international monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char n_cs_precedes;</strong><br />
									Whether currency symbol precedes (1) or follows (0) negative monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char n_sep_by_space;</strong><br />
									Whether currency symbol is (1) or is not (0) separated by space from negative monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char n_sign_posn;</strong><br />
									Format for negative monetary values:<br />
									<ul>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">0</strong> - Parentheses surround quantity and currency symbol
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">1</strong> - Sign precedes quantity and currency symbol
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">2</strong> - Sign follows quantity and currency symbol
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">3</strong> - Sign immediately precedes currency symbol
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">4</strong> - Sign immediately follows currency symbol
										</li>
									</ul>
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char p_cs_precedes;</strong><br />
									Whether currency symbol precedes (1) or follows (0) positive monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char p_sep_by_space;</strong><br />
									Whether currency symbol is (1) or is not (0) separated by space from non-negative monetary values
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">char p_sign_posn;</strong><br />
									Format for non-negative monetary values, with values as for n_sign_posn
								</li>
							</ul>
							<br />
							Implementations may change field order and include additional fields. Standard C Library functions use only decimal_point.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">struct lconv * localeconv( void );</strong><br />
							Returns pointer to formatting information for current locale
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * setlocale( int category, const char * locale );</strong><br />
							Sets components of locale according to specified category and locale. Returns string describing new locale or null on error. (Implementations are permitted to define values of category additional to those describe here.)
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">LC_ALL</strong><br />
							Category argument for all categories
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">LC_NUMERIC</strong><br />
							Category for numeric formatting information
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">LC_MONETARY</strong><br />
							Category for monetary formatting information
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">LC_COLLATE</strong><br />
							Category for information affecting collating functions
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">LC_CTYPE</strong><br />
							Category for information affecting character class tests functions
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">LC_TIME</strong><br />
							Category for information affecting time conversions functions
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">NULL</strong><br />
							Null pointer constant
						</li>
					</ul>
					<a name="math-h"></a>
					<h3>&lt;math.h&gt;</h3>
					<div>
						On domain error, implementation-defined value returned and errno set to EDOM. On range error, errno set to ERANGE and return value is HUGE_VAL with correct sign for overflow, or zero for underflow. Angles are in radians.
					</div>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">HUGE_VAL</strong><br />
							Magnitude returned (with correct sign) on overflow error
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double exp( double x );</strong><br />
							Exponential of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double log( double x );</strong><br />
							Natural logarithm of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double log10( double x );</strong><br />
							Base-10 logarithm of x double
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">pow( double x, double y );</strong><br />
							X raised to power y
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double sqrt( double x );</strong><br />
							Square root of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double ceil( double x );</strong><br />
							Smallest integer not less than x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double floor( double x );</strong><br />
							Largest integer not greater than x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double fabs( double x );</strong><br />
							Absolute value of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double ldexp( double x, int n );</strong><br />
							X times 2 to the power n
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double frexp( double x, int * exp );</strong><br />
							If x non-zero, returns value, with absolute value in interval [1/2, 1], and assigns to * exp integer
such that product of return value and 2 raised to the power * exp equals x; if x zero, both return value and * exp are zero
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double modf( double x, double * ip );</strong><br />
							Returns fractional part and assigns to * ip integral part of x, both with same sign as x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double fmod( double x, double y );</strong><br />
							If y non-zero, floating-point remainder of x/y, with same sign as x; if y zero, result is implementation-defined
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double sin( double x );</strong><br />
							Sine of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double cos( double x );</strong><br />
							Cosine of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double tan( double x );</strong><br />
							Tangent of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double asin( double x );</strong><br />
							Arc-sine of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double acos( double x );</strong><br />
							Arc-cosine of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double atan( double x );</strong><br />
							Arc-tangent of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double atan2( double y, double x );</strong><br />
							Arc-tangent of y/x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double sinh( double x );</strong><br />
							Hyperbolic sine of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double cosh( double x );</strong><br />
							Hyperbolic cosine of x
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double tanh( double x );</strong><br />
							Hyperbolic tangent of x
						</li>
					</ul>
					<a name="setjmp-h"></a>
					<h3>&lt;setjmp.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">jmp_buf</strong><br />
							Type of object holding context information
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int setjmp( jmp_buf env );</strong><br />
							Saves context information in env and returns zero. Subsequent call to longjmp with same env returns non-zero.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void longjmp( jmp_buf env, int val );</strong><br />
							Restores context saved by most recent call to setjmp with specified env. Execution resumes as a second return from setjmp, with returned value val if specified value non-zero, or 1 otherwise.
						</li>
					</ul>
					<a name="signal-h"></a>
					<h3>&lt;signal.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SIGABRT</strong><br />
							Abnormal termination
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SIGFPE</strong><br />
							Arithmetic error
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SIGILL</strong><br />
							Invalid execution
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SIGINT</strong><br />
							Asynchronous interactive attention
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SIGSEGV</strong><br />
							Illegal storage access
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SIGTERM</strong><br />
							Asynchronous termination request
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SIG_DFL</strong><br />
							Specifies default signal handling
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SIG_ERR</strong><br />
							Signal return value indicating erro
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SIG_IGN</strong><br />
							Specifies that signal should be ignored
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void ( * signal( int sig, void ( * handler )( int ) ) )( int );</strong><br />
							Install handler for subsequent signal sig. If handler is SIG_DFL, implementation-defined default behaviour will be used; if SIG_IGN, signal will be ignored; otherwise function pointed to by handler will be invoked with argument sig. In the last case, handling is restored to default behaviour before handler is called. If handler returns, execution resumes where signal occurred. signal returns the previous handler or SIG_ERR on error. Initial state is implementation-defined. Implementations may may define signals additional to those listed here.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int raise( int sig );</strong><br />
							Sends signal sig. Returns zero on success.
						</li>
					</ul>
					<a name="stdarg-h"></a>
					<h3>&lt;stdarg.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">va_list</strong><br />
							type of object holding context information
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void va_start( va_list ap, lastarg );</strong><br />
							Initialisation macro which must be called once before any unnamed argument is accessed. Stores context information in ap. lastarg is the last named parameter of the function.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">type va_arg( va_list ap, type );</strong><br />
							Yields value of the type (type) and value of the next unnamed argument.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void va_end( va_list ap );</strong><br />
							Termination macro which must be called once after argument processing and before exit from function.
						</li>
					</ul>
					<a name="stdbool-h"></a>
					<h3>&lt;stdbool.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">bool</strong><br />
							Expands to _Bool
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">true</strong><br />
							Expands to 1
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">false</strong><br />
							Expands to 0
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">__bool_true_false_are_defined</strong><br />
							Expands to 1
						</li>
					</ul>
					<a name="stddef-h"></a>
					<h3>&lt;stddef.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">NULL</strong><br />
							Null pointer constant.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">offsetof( stype, m )</strong><br />
							Offset (in bytes) of member m from start of structure type stype.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">ptrdiff_t</strong><br />
							Type for objects declared to store result of subtracting pointers.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">size_t</strong><br />
							Type for objects declared to store result of sizeof operator.
						</li>
					</ul>
					<a name="stdint-h"></a>
					<h3>&lt;stdint.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int8_t;</strong><br />
							<strong style="font-family: monospace;">int16_t;</strong><br />
							<strong style="font-family: monospace;">int32_t;</strong><br />
							<strong style="font-family: monospace;">int64_t;</strong><br />
							Exact width integer types (signed)
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">uint8_t;</strong><br />
							<strong style="font-family: monospace;">uint16_t;</strong><br />
							<strong style="font-family: monospace;">uint32_t;</strong><br />
							<strong style="font-family: monospace;">uint64_t;</strong><br />
							Exact width integer types (unsigned)
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int_least8_t;</strong><br />
							<strong style="font-family: monospace;">int_least16_t;</strong><br />
							<strong style="font-family: monospace;">int_least32_t;</strong><br />
							<strong style="font-family: monospace;">int_least64_t;</strong><br />
							Minimum width integer types (signed)
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">uint_least8_t;</strong><br />
							<strong style="font-family: monospace;">uint_least16_t;</strong><br />
							<strong style="font-family: monospace;">uint_least32_t;</strong><br />
							<strong style="font-family: monospace;">uint_least64_t;</strong><br />
							Minimum width integer types (unsigned)
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int_fast8_t;</strong><br />
							<strong style="font-family: monospace;">int_fast16_t;</strong><br />
							<strong style="font-family: monospace;">int_fast32_t;</strong><br />
							<strong style="font-family: monospace;">int_fast64_t;</strong><br />
							Fastest minimum width integer types (signed)
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">uint_fast8_t;</strong><br />
							<strong style="font-family: monospace;">uint_fast16_t;</strong><br />
							<strong style="font-family: monospace;">uint_fast32_t;</strong><br />
							<strong style="font-family: monospace;">uint_fast64_t;</strong><br />
							Fastest minimum width integer types (unsigned)
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">intptr_t;</strong><br />
							<strong style="font-family: monospace;">uintptr_t;</strong><br />
							Integer types capable of holding object pointers
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">intmax_t;</strong><br />
							<strong style="font-family: monospace;">uintmax_t;</strong><br />
							Greatest width integer types
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">INT8_MIN</strong><br />
							<strong style="font-family: monospace;">INT16_MIN</strong><br />
							<strong style="font-family: monospace;">INT32_MIN</strong><br />
							<strong style="font-family: monospace;">INT64_MIN</strong><br />
							<strong style="font-family: monospace;">INT8_MAX</strong><br />
							<strong style="font-family: monospace;">INT16_MAX</strong><br />
							<strong style="font-family: monospace;">INT32_MAX</strong><br />
							<strong style="font-family: monospace;">INT64_MAX</strong><br />
							<strong style="font-family: monospace;">UINT8_MAX</strong><br />
							<strong style="font-family: monospace;">UINT16_MAX</strong><br />
							<strong style="font-family: monospace;">UINT32_MAX</strong><br />
							<strong style="font-family: monospace;">UINT64_MAX</strong><br />
							Limits of exact-width integer types
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">INT_LEAST8_MIN</strong><br />
							<strong style="font-family: monospace;">INT_LEAST16_MIN</strong><br />
							<strong style="font-family: monospace;">INT_LEAST32_MIN</strong><br />
							<strong style="font-family: monospace;">INT_LEAST64_MIN</strong><br />
							<strong style="font-family: monospace;">INT_LEAST8_MAX</strong><br />
							<strong style="font-family: monospace;">INT_LEAST16_MAX</strong><br />
							<strong style="font-family: monospace;">INT_LEAST32_MAX</strong><br />
							<strong style="font-family: monospace;">INT_LEAST64_MAX</strong><br />
							<strong style="font-family: monospace;">UINT_LEAST8_MAX</strong><br />
							<strong style="font-family: monospace;">UINT_LEAST16_MAX</strong><br />
							<strong style="font-family: monospace;">UINT_LEAST32_MAX</strong><br />
							<strong style="font-family: monospace;">UINT_LEAST64_MAX</strong><br />
							Limits of minimum-width integer types
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">INT_FAST8_MIN</strong><br />
							<strong style="font-family: monospace;">INT_FAST16_MIN</strong><br />
							<strong style="font-family: monospace;">INT_FAST32_MIN</strong><br />
							<strong style="font-family: monospace;">INT_FAST64_MIN</strong><br />
							<strong style="font-family: monospace;">INT_FAST8_MAX</strong><br />
							<strong style="font-family: monospace;">INT_FAST16_MAX</strong><br />
							<strong style="font-family: monospace;">INT_FAST32_MAX</strong><br />
							<strong style="font-family: monospace;">INT_FAST64_MAX</strong><br />
							<strong style="font-family: monospace;">UINT_FAST8_MAX</strong><br />
							<strong style="font-family: monospace;">UINT_FAST16_MAX</strong><br />
							<strong style="font-family: monospace;">UINT_FAST32_MAX</strong><br />
							<strong style="font-family: monospace;">UINT_FAST64_MAX</strong><br />
							Limits of fastest minimum-width integer types
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">INTPTR_MIN</strong><br />
							<strong style="font-family: monospace;">INTPTR_MAX</strong><br />
							<strong style="font-family: monospace;">UINTPTR_MAX</strong><br />
							Limits of integer types capable of holding object pointers
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">INTMAX_MIN</strong><br />
							<strong style="font-family: monospace;">INTMAX_MAX</strong><br />
							<strong style="font-family: monospace;">UINTMAX_MAX</strong><br />
							Limits of greatest-width integer types
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">PTRDIFF_MIN</strong><br />
							<strong style="font-family: monospace;">PTRDIFF_MAX</strong><br />
							<strong style="font-family: monospace;">SIG_ATOMIC_MIN</strong><br />
							<strong style="font-family: monospace;">SIG_ATOMIC_MAX</strong><br />
							<strong style="font-family: monospace;">SIZE_MAX</strong><br />
							<strong style="font-family: monospace;">WCHAR_MIN</strong><br />
							<strong style="font-family: monospace;">WCHAR_MAX</strong><br />
							<strong style="font-family: monospace;">WINT_MIN</strong><br />
							<strong style="font-family: monospace;">WINT_MAX</strong><br />
							Limits of other integer types
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">INT8_C( value )</strong><br />
							<strong style="font-family: monospace;">INT16_C( value )</strong><br />
							<strong style="font-family: monospace;">INT32_C( value )</strong><br />
							<strong style="font-family: monospace;">INT64_C( value )</strong><br />
							<strong style="font-family: monospace;">UINT8_C( value )</strong><br />
							<strong style="font-family: monospace;">UINT16_C( value )</strong><br />
							<strong style="font-family: monospace;">UINT32_C( value )</strong><br />
							<strong style="font-family: monospace;">UINT64_C( value )</strong><br />
							Macros for minimum-width integer constant expressions
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">INTMAX_C( value )</strong><br />
							<strong style="font-family: monospace;">UINTMAX_C( value )</strong><br />
							Macros for greatest-width integer constant expressions
						</li>
					</ul>
					<a name="stdio-h"></a>
					<h3>&lt;stdio.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">BUFSIZ</strong><br />
							Size of buffer used by setbuf.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">EOF</strong><br />
							Value used to indicate end-of-stream or to report an error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FILENAME_MAX</strong><br />
							Maximum length required for array of characters to hold a filename.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FOPEN_MAX</strong><br />
							Maximum number of files which may be open simultaneously.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">L_tmpnam</strong><br />
							Number of characters required for temporary filename generated by tmpnam.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">NULL</strong><br />
							Null pointer constant.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SEEK_CUR</strong><br />
							Value for origin argument to fseek specifying current file position.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SEEK_END</strong><br />
							Value for origin argument to fseek specifying end of file.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">SEEK_SET</strong><br />
							Value for origin argument to fseek specifying beginning of file.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">TMP_MAX</strong><br />
							Minimum number of unique filenames generated by calls to tmpnam.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">_IOFBF</strong><br />
							Value for mode argument to setvbuf specifying full buffering.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">_IOLBF</strong><br />
							Value for mode argument to setvbuf specifying line buffering.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">_IONBF</strong><br />
							Value for mode argument to setvbuf specifying no buffering.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">stdin</strong><br />
							File pointer for standard input stream. Automatically opened when program execution begins.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">stdout</strong><br />
							File pointer for standard output stream. Automatically opened when program execution begins.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">stderr</strong><br />
							File pointer for standard error stream. Automatically opened when program execution begins.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FILE</strong><br />
							Type of object holding information necessary to control a stream.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">fpos_t</strong><br />
							Type for objects declared to store file position information.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">size_t</strong><br />
							Type for objects declared to store result of sizeof operator.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FILE * fopen( const char * filename, const char * mode );</strong><br />
							Opens file named filename and returns a stream, or NULL on failure. mode may be one of the following for text files:<br />
							<ul>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">"r"</strong> - Text reading
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">"w"</strong> - Text writing
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">"a"</strong> - Text append
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">"r+"</strong> - Text update (reading and writing)
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">"w+"</strong> - Text update, discarding previous content (if any)
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">"a+"</strong> - Text append, reading, and writing at end
								</li>
							</ul>
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FILE * freopen( const char * filename, const char * mode, FILE * stream );</strong><br />
							Closes file associated with stream, then opens file filename with specified mode and associates it with stream. Returns stream or NULL on error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int fflush( FILE * stream );</strong><br />
							Flushes stream stream and returns zero on success or EOF on error. Effect undefined for input stream. fflush(NULL) flushes all output streams.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int fclose( FILE * stream );</strong><br />
							Closes stream stream (after flushing, if output stream). Returns EOF on error, zero otherwise.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int remove( const char * filename );</strong><br />
							Removes specified file. Returns non-zero on failure.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int rename( const char * oldname, const char * newname );</strong><br />
							Changes name of file oldname to newname. Returns non-zero on failure.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">FILE * tmpfile();</strong><br />
							Creates temporary file (mode "wb+") which will be removed when closed or on normal program termination. Returns stream or NULL on failure.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * tmpnam( char s[ L_tmpnam ] );</strong><br />
							Assigns to s (if s non-null) and returns unique name for a temporary file. Unique name is returned for each of the first TMP_MAX invocations.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int setvbuf( FILE * stream, char * buf, int mode, size_t size );</strong><br />
							Controls buffering for stream stream. mode is _IOFBF for full buffering, _IOLBF for line buffering, _IONBF for no buffering. Non-null buf specifies buffer of size size to be used; otherwise, a buffer is allocated. Returns non-zero on error. Call must be before any other operation on stream.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void setbuf( FILE * stream, char * buf );</strong><br />
							Controls buffering for stream stream. For null buf, turns off buffering, otherwise equivalent to ( void )setvbuf( stream, buf, _IOFBF, BUFSIZ ).
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int fprintf( FILE * stream, const char * format, ... );</strong><br />
							Converts (according to format format) and writes output to stream stream. Number of characters written, or negative value on error, is returned. Conversion specifications consist of:<br />
							<ul>
								<li style="margin-bottom: 5px;">
									%
								</li>
								<li style="margin-bottom: 5px;">
									(optional) flag:<br />
									<ul>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">-</strong> - Left adjust
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">+</strong> - Always sign
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">space</strong> - Space if no sign
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">0</strong> - Zero pad
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">#</strong> - Alternate form: for conversion character o, first digit will be zero, for [xX], prefix 0x or 0X to non-zero value, for [eEfgG], always decimal point, for [gG] trailing zeros not removed.
										</li>
									</ul>
								</li>
								<li style="margin-bottom: 5px;">
									(optional) minimum width: if specified as *, value taken from next argument (which must be int).
								</li>
								<li style="margin-bottom: 5px;">
									(optional) . (separating width from precision):
								</li>
								<li style="margin-bottom: 5px;">
									(optional) precision: for conversion character s, maximum characters to be printed from the string, for [eEf], digits after decimal point, for [gG], significant digits, for an integer, minimum number of digits to be printed. If specified as *, value taken from next argument (which must be int).
								</li>
								<li style="margin-bottom: 5px;">
									(optional) length modifier:<br />
									<ul>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">h</strong> - short or unsigned short
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">l</strong> - long or unsigned long
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">L</strong> - long double
										</li>
									</ul>
								</li>
								<li style="margin-bottom: 5px;">
									conversion character:<br />
									<ul>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">d,i</strong> - int argument, printed in signed decimal notation
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">o</strong> - int argument, printed in unsigned octal notation
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">x,X</strong> - int argument, printed in unsigned hexadecimal notation
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">u</strong> - int argument, printed in unsigned decimal notation
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">c</strong> - int argument, printed as single character
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">s</strong> - char * argument
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">f</strong> - double argument, printed with format [-]mmm.ddd
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">e,E</strong> - double argument, printed with format [-]m.dddddd(e|E)(+|-)xx
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">g,G</strong> - double argument
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">p</strong> - void * argument, printed as pointer
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">n</strong> - int * argument : the number of characters written to this point is written into argument
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">%</strong> - no argument; prints %
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int printf( const char * format, ... );</strong><br />
							printf( f, ... ) is equivalent to fprintf( stdout, f, ... )
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int sprintf( char * s, const char * format, ... );</strong><br />
							Like fprintf, but output written into string s, which must be large enough to hold the output, rather than to a stream. Output is NUL-terminated. Returns length (excluding the terminating NUL).
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int vfprintf( FILE * stream, const char * format, va_list arg );</strong><br />
							Equivalent to fprintf with variable argument list replaced by arg, which must have been initialised by the va_start macro (and may have been used in calls to va_arg).
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int vprintf( const char * format, va_list arg );</strong><br />
							Equivalent to printf with variable argument list replaced by arg, which must have been initialised by the va_start macro (and may have been used in calls to va_arg).
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int vsprintf( char * s, const char * format, va_list arg );</strong><br />
							Equivalent to sprintf with variable argument list replaced by arg, which must have been initialised by the va_start macro (and may have been used in calls to va_arg).
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int fscanf( FILE * stream, const char * format, ... );</strong><br />
							Performs formatted input conversion, reading from stream stream according to format format. The function returns when format is fully processed. Returns number of items converted and assigned, or EOF if end-of-file or error occurs before any conversion. Each of the arguments following format must be a pointer. Format string may contain:
blanks and tabs, which are ignored ordinary characters, which are expected to match next non-white-space of input conversion specifications, consisting of:<br />
							<ul>
								<li style="margin-bottom: 5px;">
									%
								</li>
								<li style="margin-bottom: 5px;">
									(optional) assignment suppression character "*"
								</li>
								<li style="margin-bottom: 5px;">
									(optional) maximum field width
								</li>
								<li style="margin-bottom: 5px;">
									(optional) target width indicator:<br />
									<ul>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">h</strong> - argument is pointer to short rather than int
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">l</strong> - argument is pointer to long rather than int, or double rather than float
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">L</strong> - argument is pointer to long double rather than float
										</li>
									</ul>
								</li>
								<li style="margin-bottom: 5px;">
									conversion character:<br />
									<ul>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">d</strong> - decimal integer; int * parameter required
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">i</strong> - integer; int * parameter required; decimal, octal or hex
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">o</strong> - octal integer; int * parameter required
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">u</strong> - unsigned decimal integer; unsigned int * parameter required
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">x</strong> - hexadecimal integer; int * parameter required
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">c</strong> - characters; char * parameter required; white-space is not skipped, and NUL- termination is not performed
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">s</strong> - string of non-white-space; char * parameter required; string is NUL-terminated
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">e,f,g</strong> - floating-point number; float * parameter required
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">p</strong> - pointer value; void * parameter required
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">n</strong> - chars read so far; int * parameter required
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">[...]</strong> - longest non-empty string from specified set; char * parameter required; string is NUL-terminated
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">[^...]</strong> - longest non-empty string not from specified set; char * parameter required; string is NUL-terminated
										</li>
										<li style="margin-bottom: 5px;">
											<strong style="font-family: monospace;">%</strong> - literal %; no assignment
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int scanf( const char * format, ... );</strong><br />
							scanf( f, ... ) is equivalent to fscanf( stdin, f, ... )
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int sscanf( char * s, const char * format, ... );</strong><br />
							Like fscanf, but input read from string s.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int fgetc( FILE * stream );</strong><br />
							next character from (input) stream stream, or EOF on end-of-file or error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * fgets( char * s, int n, FILE * stream );</strong><br />
							Copies characters from (input) stream stream to s, stopping when n-1 characters copied, newline copied, end-of-file reached or error occurs. If no error, s is NUL-terminated. Returns NULL on end- of-file or error, s otherwise.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int fputc( int c, FILE * stream );</strong><br />
							Writes c, to stream stream. Returns c, or EOF on error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * fputs( const char * s, FILE * stream );</strong><br />
							Writes s, to (output) stream stream. Returns non-negative on success or EOF on error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int getc( FILE * stream );</strong><br />
							Equivalent to fgetc except that it may be a macro.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int getchar( void );</strong><br />
							Equivalent to getc( stdin ).
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * gets( char * s );</strong><br />
							Copies characters from stdin into s until newline encountered, end-of-file reached, or error occurs. Does not copy newline. NUL-terminates s. Returns s, or NULL on end-of-file or error. Should not be used because of the potential for buffer overflow.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int putc( int c, FILE * stream );</strong><br />
							Equivalent to fputc except that it may be a macro.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int putchar( int c );</strong><br />
							putchar( c ) is equivalent to putc( c, stdout ).
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int puts( const char * s );</strong><br />
							Writes s (excluding terminating NUL) and a newline to stdout. Returns non-negative on success, EOF on error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int ungetc( int c, FILE * stream );</strong><br />
							Pushes c (which must not be EOF), onto (input) stream stream such that it will be returned by the next read. Only one character of pushback is guaranteed (for each stream). Returns c, or EOF on error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">size_t fread( void * ptr, size_t size, size_t nobj, FILE * stream );</strong><br />
							Reads (at most) nobj objects of size size from stream stream into ptr and returns number of objects read. (feof and ferror can be used to check status.)
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">size_t fwrite( const void * ptr, size_t size, size_t nobj, FILE * stream );</strong><br />
							Writes to stream stream, nobj objects of size size from array ptr. Returns number of objects written.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int fseek( FILE * stream, long offset, int origin );</strong><br />
							Sets file position for stream stream and clears end-of-file indicator. For a binary stream, file position is set to offset bytes from the position indicated by origin: beginning of file for SEEK_SET, current position for SEEK_CUR, or end of file for SEEK_END. Behaviour is similar for a text stream, but offset must be zero or, for SEEK_SET only, a value returned by ftell. Returns non-zero on error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">long ftell( FILE * stream );</strong><br />
							Returns current file position for stream stream, or -1 on error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void rewind( FILE * stream );</strong><br />
							Equivalent to fseek( stream, 0L, SEEK_SET ); clearerr( stream ).
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int fgetpos( FILE * stream, fpos_t * ptr );</strong><br />
							Stores current file position for stream stream in * ptr. Returns non-zero on error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int fsetpos( FILE * stream, const fpos_t * ptr );</strong><br />
							Sets current position of stream stream to * ptr. Returns non-zero on error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void clearerr( FILE * stream );</strong><br />
							Clears end-of-file and error indicators for stream stream.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int feof( FILE * stream );</strong><br />
							Returns non-zero if end-of-file indicator is set for stream stream.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int ferror( FILE * stream );</strong><br />
							Returns non-zero if error indicator is set for stream stream.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void perror( const char * s );</strong><br />
							Prints s (if non-null) and strerror(errno) to standard error as would:
fprintf( stderr, "%s: %s\n", ( s != NULL ? s : "" ), strerror( errno ) )
						</li>
					</ul>
					<a name="stdlib-h"></a>
					<h3>&lt;stdlib.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">EXIT_FAILURE</strong><br />
							Value for status argument to exit indicating failure.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">EXIT_SUCCESS</strong><br />
							Value for status argument to exit indicating success.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">RAND_MAX</strong><br />
							Maximum value returned by rand().
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">NULL</strong><br />
							Null pointer constant.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">div_t</strong><br />
							Return type of div(). Structure having members:<br />
							<ul>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">int quot;</strong><br />
									quotient
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">int rem;</strong><br />
									remainder
								</li>
							</ul>
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">ldiv_t</strong><br />
							Return type of ldiv(). Structure having members:<br />
							<ul>
								<li style="margin-bottom: 5px;">
								<strong style="font-family: monospace;">long quot;</strong><br />
								quotient
								</li>
								<li style="margin-bottom: 5px;">
								<strong style="font-family: monospace;">long rem;</strong><br />
								remainder
								</li>
							</ul>
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">size_t</strong><br />
							Type for objects declared to store result of sizeof operator.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int abs( int n );</strong><br />
							<strong style="font-family: monospace;">long labs( long n );</strong><br />
							Returns absolute value of n.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">div_t div( int num, int denom );</strong><br />
							<strong style="font-family: monospace;">ldiv_t ldiv( long num, long denom );</strong><br />
							Returns quotient and remainder of num/denom.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double atof( const char * s );</strong><br />
							Equivalent to strtod( s, ( char ** ) NULL ) except that errno is not necessarily set on conversion error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int atoi(const char* s);</strong><br />
							Equivalent to ( int )strtol( s, ( char ** )NULL, 10 ) except that errno is not necessarily set on conversion error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">long atol( const char * s );</strong><br />
							Equivalent to strtol( s, ( char ** )NULL, 10 ) except that errno is not necessarily set on conversion error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double strtod( const char * s, char ** endp );</strong><br />
							Converts initial characters (ignoring leading white space) of s to type double. If endp non-null, stores pointer to unconverted suffix in * endp. On overflow, sets errno to ERANGE and returns HUGE_VAL with the appropriate sign; on underflow, sets errno to ERANGE and returns zero; otherwise returns converted value.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">long strtol( const char * s, char ** endp, int base );</strong><br />
							Converts initial characters (ignoring leading white space) of s to type long. If endp non-null,
stores pointer to unconverted suffix in * endp. If base between 2 and 36, that base used for conversion; if zero, leading (after any sign) 0X or 0x implies hexadecimal, leading 0 (after any sign) implies octal, otherwise decimal assumed. Leading 0X or 0x permitted for base hexadecimal. On overflow, sets errno to ERANGE and returns LONG_MAX or LONG_MIN (as appropriate for sign); otherwise returns converted value.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">unsigned long strtoul( const char * s, char ** endp, int base );</strong><br />
							As for strtol except result is unsigned long and value on overflow is ULONG_MAX.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void * calloc( size_t nobj, size_t size );</strong><br />
							Returns pointer to zero-initialised newly-allocated space for an array of nobj objects each of size size, or NULL on error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void * malloc( size_t size );</strong><br />
							Returns pointer to uninitialised newly-allocated space for an object of size size, or NULL on error.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void * realloc( void* p, size_t size );</strong><br />
							Returns pointer to newly-allocated space for an object of size size, initialised, to minimum of old and new sizes, to existing contents of p (if non-null), or NULL on error. On success, old object deallocated, otherwise unchanged.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void free( void * p );</strong><br />
							If p non-null, deallocates space to which it points.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void abort();</strong><br />
							Terminates program abnormally, by calling raise( SIGABRT ).
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void exit( int status );</strong><br />
							Terminates program normally. Functions installed using atexit are called (in reverse order to that in which installed), open files are flushed, open streams are closed and control is returned to environment. status is returned to environment in implementation-dependent manner. Zero or EXIT_SUCCESS indicates successful termination and EXIT_FAILURE indicates unsuccessful termination. Implementations may define other values.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int atexit( void ( * fcm )( void ) );</strong><br />
							Registers fcn to be called when program terminates normally (or when main returns). Returns non- zero on failure.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int system( const char * s );</strong><br />
							If s is not NULL, passes s to environment for execution, and returns status reported by command processor; if s is NULL, non-zero returned if environment has a command processor.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * getenv( const char * name );</strong><br />
							Returns string associated with name name from implementation's environment, or NULL if no such string exists.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void * bsearch( const void * key, const void * base, size_t n, size_t size, int ( * cmp )( const void * keyval, const void * datum ) );</strong><br />
							Searches ordered array base (of n objects each of size size) for item matching key according to comparison function cmp. cmp must return negative value if first argument is less than second, zero if equal and positive if greater. Items of base are assumed to be in ascending order (according to cmp). Returns a pointer to an item matching key, or NULL if none found.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void qsort( void * base, size_t n, size_t size, int ( * cmp )( const void *, const void * ) );</strong><br />
							Arranges into ascending order array base (of n objects each of size size) according to comparison function cmp. cmp must return negative value if first argument is less than second, zero if equal and positive if greater.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int rand( void );</strong><br />
							Returns pseudo-random number in range 0 to RAND_MAX.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void srand( unsigned int seed );</strong><br />
							Uses seed as seed for new sequence of pseudo-random numbers. Initial seed is 1.
						</li>
					</ul>
					<a name="string-h"></a>
					<h3>&lt;string.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">NULL</strong><br />
							Null pointer constant.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">size_t</strong><br />
							Type for objects declared to store result of sizeof operator.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * strcpy( char * s, const char * ct );</strong><br />
							Copies ct to s including terminating NUL and returns s.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char* strncpy( char * s, const char * ct, size_t n );</strong><br />
							Copies at most n characters of ct to s. Pads with NUL characters if ct is of length less than n. Note that this may leave s without NUL-termination. Return s.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * strcat( char * s, const char * ct );</strong><br />
							Concatenate ct to s and return s.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char* strncat( char * s, const char * ct, size_t n );</strong><br />
							Concatenate at most n characters of ct to s. NUL-terminates s and return it.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int strcmp( const char * cs, const char * ct );</strong><br />
							Compares cs with ct, returning negative value if cs&lt;ct, zero if cs==ct, positive value if cs&gt;ct.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int strncmp( const char * cs, const char * ct, size_t n );</strong><br />
							Compares at most (the first) n characters of cs and ct, returning negative value if cs&lt;ct, zero if cs==ct, positive value if cs&gt;ct.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int strcoll( const char * cs, const char * ct );</strong><br />
							Compares cs with ct according to locale, returning negative value if cs&lt;ct, zero if cs==ct, positive value if cs&gt;ct.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * strchr( const char * cs, int c );</strong><br />
							Returns pointer to first occurrence of c in cs, or NULL if not found.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * strrchr( const char * cs, int c );</strong><br />
							Returns pointer to last occurrence of c in cs, or NULL if not found.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">size_t strspn( const char * cs, const char * ct );</strong><br />
							Returns length of prefix of cs which consists of characters which are in ct.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">size_t strcspn( const char * cs, const char * ct );</strong><br />
							Returns length of prefix of cs which consists of characters which are not in ct.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * strpbrk( const char * cs, const char * ct );</strong><br />
							Returns pointer to first occurrence in cs of any character of ct, or NULL if none is found.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * strstr( const char * cs, const char * ct );</strong><br />
							Returns pointer to first occurrence of ct within cs, or NULL if none is found.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">size_t strlen( const char * cs );</strong><br />
							Returns length of cs.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * strerror( int n );</strong><br />
							Returns pointer to implementation-defined message string corresponding with error n.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * strtok( char * s, const char * t );</strong><br />
							Searches s for next token delimited by any character from ct. Non-NULL s indicates the first call of a sequence. If a token is found, it is NUL-terminated and returned, otherwise NULL is returned. ct need not be identical for each call in a sequence.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">size_t strxfrm( char * s, const char * ct, size_t n );</strong><br />
							Stores in s no more than n characters (including terminating NUL) of a string produced from ct according to a locale-specific transformation. Returns length of entire transformed string.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void * memcpy( void * s, const void * ct, size_t n );</strong><br />
							Copies n characters from ct to s and returns s. s may be corrupted if objects overlap.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void * memmove( void * s, const void * ct, size_t n );</strong><br />
							Copies n characters from ct to s and returns s. s will not be corrupted if objects overlap.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">int memcmp( const void * cs, const void * ct, size_t n );</strong><br />
							Compares at most (the first) n characters of cs and ct, returning negative value if cs&lt;ct, zero if cs==ct, positive value if cs&gt;ct.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void * memchr( const void * cs, int c, size_t n );</strong><br />
							Returns pointer to first occurrence of c in first n characters of cs, or NULL if not found.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">void * memset( void * s, int c, size_t n );</strong><br />
							Replaces each of the first n characters of s by c and returns s.
						</li>
					</ul>
					<a name="time-h"></a>
					<h3>&lt;time.h&gt;</h3>
					<ul>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">CLOCKS_PER_SEC</strong><br />
							The number of clock_t units per second.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">NULL</strong><br />
							Null pointer constant.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">clock_t</strong><br />
							An arithmetic type elapsed processor representing time.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">time_t</strong><br />
							An arithmetic type representing calendar time.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">struct tm</strong><br />
							Represents the components of calendar time:<br />
							<ul>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">int tm_sec;</strong><br />
									seconds after the minute
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">int tm_min;</strong><br />
									minutes after the hour
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">int tm_hour;</strong><br />
									hours since midnight
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">int tm_mday;</strong><br />
									day of the month
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">int tm_mon;</strong><br />
									months since January
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">int tm_year;</strong><br />
									years since 1900
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">int tm_wday;</strong><br />
									days since Sunday
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">int tm_yday;</strong><br />
									days since January 1
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">int tm_isdst;</strong><br />
									Daylight Saving Time flag : is positive if DST is in effect, zero if not in effect, negative if information not known.
								</li>
							</ul><br />
							Implementations may change field order and include additional fields.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">clock_t clock( void );</strong><br />
							Returns elapsed processor time used by program or -1 if not available.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">time_t time( time_t * tp );</strong><br />
							Returns current calendar time or -1 if not available. If tp is non-NULL, return value is also assigned to * tp.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">double difftime( time_t time2, time_t time1 );</strong><br />
							Returns the difference in seconds between time2 and time1.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">time_t mktime( struct tm * tp );</strong><br />
							If necessary, adjusts fields of * tp to fall withing normal ranges. Returns the corresponding calendar time, or -1 if it cannot be represented.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * asctime( const struct tm * tp );</strong><br />
							Returns the given time as a string of the form: Sun Jan 3 13:08:42 1988\n\0
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">char * ctime( const time_t * tp );</strong><br />
							Returns string equivalent to calendar time tp converted to local time. Equivalent to: asctime( localtime( tp ) )
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">struct tm * gmtime( const time_t * tp );</strong><br />
							Returns calendar time * tp converted to Coordinated Universal Time, or NULL if not available.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">struct tm * localtime( const time_t * tp );</strong><br />
							Returns calendar time * tp converted into local time.
						</li>
						<li style="margin-bottom: 5px;">
							<strong style="font-family: monospace;">size_t strftime( char * s, size_t smax, const char * fmt, const struct tm * tp );</strong><br />
							Formats * tp into s according to fmt. Places no more than smax characters into s, and returns number of characters produced (excluding terminating NUL), or 0 if greater than smax. Formatting conversions (%c) are:<br />
							<ul>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">A</strong> - name of weekday
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">a</strong> - abbreviated name of weekday
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">B</strong> - name of month
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">b</strong> - abbreviated name of month
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">c</strong> - local date and time representation
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">d</strong> - day of month [01-31]
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">H</strong> - hour (24-hour clock) [00-23]
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">I</strong> - hour (12-hour clock) [01-12]
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">j</strong> - day of year [001-366]
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">M</strong> - minute [00-59]
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">m</strong> - month [01-12]
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">p</strong> - local equivalent of "AM" or "PM"
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">S</strong> - second [00-61]
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">U</strong> - week number of year (Sunday as 1st day of week) [00-53]
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">W</strong> - week number of year (Monday as 1st day of week) [00-53]
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">w</strong> - weekday (Sunday as 0) [0-6]
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">X</strong> - local time representation
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">x</strong> - local date representation
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">Y</strong> - year with century
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">y</strong> - year without century [00-99]
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">Z</strong> - name (if any) of time zone
								</li>
								<li style="margin-bottom: 5px;">
									<strong style="font-family: monospace;">%</strong> - %
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>

