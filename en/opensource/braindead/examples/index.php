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
					<h2>Examples for the BrainDead interpreter</h2>
					<h3>HelloWorld (commented version)</h3>
					<h4>Example code</h4>
					<div class="code">
						<code class="source">++++++++++          <span class="code-comment">| Cell 0 is 10</span></code><br />
						<code class="source">[                   <span class="code-comment">| Repeats till cell 0 is 0</span></code><br />
						<code class="source">    >+              <span class="code-comment">| Cell 1 is 1  (will be ASCII 10  = __LF__)</span></code><br />
						<code class="source">    >+++            <span class="code-comment">| Cell 2 is 3  (will be ASCII 30  = __RS__)</span></code><br />
						<code class="source">    >+++++++        <span class="code-comment">| Cell 3 is 7  (will be ASCII 70  = F)</span></code><br />
						<code class="source">    >++++++++       <span class="code-comment">| Cell 4 is 8  (will be ASCII 80  = P)</span></code><br />
						<code class="source">    >++++++++++     <span class="code-comment">| Cell 5 is 10 (will be ASCII 100 = d)</span></code><br />
						<code class="source">    >+++++++++++    <span class="code-comment">| Cell 6 is 11 (will be ASCII 110 = n)</span></code><br />
						<code class="source">    <<<<<<-         <span class="code-comment">| Decrements cell 0</span></code><br />
						<code class="source">]                   <span class="code-comment">| End of loop</span></code><br />
						<code class="source">$                   <span class="code-comment">| Prints the stack state (not a standard brainfuck command)</span></code><br />
						<code class="source">@                   <span class="code-comment">| Breakpoint (not a standard brainfuck command)</span></code><br />
						<code class="source">>>>++.              <span class="code-comment">| H</span></code><br />
						<code class="source">>>+.                <span class="code-comment">| E</span></code><br />
						<code class="source">+++++++.            <span class="code-comment">| L</span></code><br />
						<code class="source">.                   <span class="code-comment">| L</span></code><br />
						<code class="source">>+.                 <span class="code-comment">| O</span></code><br />
						<code class="source"><<<<++.             <span class="code-comment">| __SPC__</span></code><br />
						<code class="source">>>+++++++.          <span class="code-comment">| W</span></code><br />
						<code class="source">>>.                 <span class="code-comment">| O</span></code><br />
						<code class="source">+++.                <span class="code-comment">| R</span></code><br />
						<code class="source"><.                  <span class="code-comment">| L</span></code><br />
						<code class="source">--------.           <span class="code-comment">| D</span></code><br />
						<code class="source"><<<+.               <span class="code-comment">| !</span></code><br />
						<code class="source"><+++.               <span class="code-comment">| __CR__</span></code><br />
						<code class="source">---.                <span class="code-comment">| __LF__</span></code><br />
						<code class="source">>>.                 <span class="code-comment">| H</span></code><br />
						<code class="source">>>+.                <span class="code-comment">| E</span></code><br />
						<code class="source">+++++++.            <span class="code-comment">| L</span></code><br />
						<code class="source">.                   <span class="code-comment">| L</span></code><br />
						<code class="source">>---.               <span class="code-comment">| O</span></code><br />
						<code class="source"><<<<-.              <span class="code-comment">| __SPC__</span></code><br />
						<code class="source">>>--.               <span class="code-comment">| U</span></code><br />
						<code class="source">>>-.                <span class="code-comment">| N</span></code><br />
						<code class="source"><---.               <span class="code-comment">| I</span></code><br />
						<code class="source">>++++++++.          <span class="code-comment">| V</span></code><br />
						<code class="source"><----.              <span class="code-comment">| E</span></code><br />
						<code class="source">>----.              <span class="code-comment">| R</span></code><br />
						<code class="source">+.                  <span class="code-comment">| S</span></code><br />
						<code class="source"><.                  <span class="code-comment">| E</span></code><br />
						<code class="source"><<<+.               <span class="code-comment">| !</span></code><br />
						<code class="source"><+++.               <span class="code-comment">| __CR__</span></code><br />
						<code class="source">---.                <span class="code-comment">| __LF__</span></code><br />
						<code class="source">$                   <span class="code-comment">| Prints the stack state (not a standard brainfuck command)</span></code><br />
						<code class="source">%                   <span class="code-comment">| Resets the stack (not a standard brainfuck command)</span></code><br />
						<code class="source">$                   <span class="code-comment">| Prints the stack state (not a standard brainfuck command)</span></code>
					</div>
					<h4>Example output</h4>
					<div class="code">
						$ braindead -zbsm 10 helloworld.bf
					</div>
					<div class="code">
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">[STACK DEBUG - START]</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">Number of allocated cells: 10</code><br />
						<code class="small">Number of used cells:      7</code><br />
						<code class="small">Current cell index:        0</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">Cell #0: 0</code><br />
						<code class="small">Cell #1: 10</code><br />
						<code class="small">Cell #2: 30</code><br />
						<code class="small">Cell #3: 70</code><br />
						<code class="small">Cell #4: 80</code><br />
						<code class="small">Cell #5: 100</code><br />
						<code class="small">Cell #6: 110</code><br />
						<code class="small">Cell #7: 0</code><br />
						<code class="small">Cell #8: 0</code><br />
						<code class="small">Cell #9: 0</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">[STACK DEBUG - END]</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">[BREAKPOINT] - Press any key to continue...</code><br />
						<code class="small">hello, world</code><br />
						<code class="small">Hello Universe!</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">[STACK DEBUG - START]</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">Number of allocated cells: 10</code><br />
						<code class="small">Number of used cells:      7</code><br />
						<code class="small">Current cell index:        1</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">Cell #0: 0</code><br />
						<code class="small">Cell #1: 10</code><br />
						<code class="small">Cell #2: 33</code><br />
						<code class="small">Cell #3: 72</code><br />
						<code class="small">Cell #4: 85</code><br />
						<code class="small">Cell #5: 101</code><br />
						<code class="small">Cell #6: 115</code><br />
						<code class="small">Cell #7: 0</code><br />
						<code class="small">Cell #8: 0</code><br />
						<code class="small">Cell #9: 0</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">[STACK DEBUG - END]</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">[STACK DEBUG - START]</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">Number of allocated cells: 10</code><br />
						<code class="small">Number of used cells:      7</code><br />
						<code class="small">Current cell index:        1</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">Cell #0: 0</code><br />
						<code class="small">Cell #1: 0</code><br />
						<code class="small">Cell #2: 0</code><br />
						<code class="small">Cell #3: 0</code><br />
						<code class="small">Cell #4: 0</code><br />
						<code class="small">Cell #5: 0</code><br />
						<code class="small">Cell #6: 0</code><br />
						<code class="small">Cell #7: 0</code><br />
						<code class="small">Cell #8: 0</code><br />
						<code class="small">Cell #9: 0</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
						<code class="small">[STACK DEBUG - END]</code><br />
						<code class="small">--------------------------------------------------------------------------------</code><br />
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
