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
					<h2>File format specification</h2>
					<h3>About</h3>
					<div>
						EGPack uses its own specific file format, which is not compatible with other archive formats, such as the TAR format.
					</div>
					<h3>Format</h3>
					<div>
						The EGPack format consists of several specific header blocks, followed by the file(s) content.
					</div>
					<div>
						An EPKG file must start with the main header, which is 72 bytes long.
					</div>
					<div>
						The first four bytes represent the file format signature, which consists of the ASCII `EGPK` characters (0x45 0x47 0x50 0x4B).
					</div>
					<div>
						The next four bytes are used to store the archive creation time.
					</div>
					<div>
						Other bytes are reserved for format extension, and should be all zeros.
					</div>
					<div>
						In C, the EGPK header is represented the following way:
					</div>
					<div class="code">
						<code class="source">struct egpack_header</code><br />
						<code class="source">{</code><br />
						<code class="source">    uint8_t  id[ 4 ];</code><br />
						<code class="source">    uint32_t ctime;</code><br />
						<code class="source">    uint8_t  pad[ 64 ];</code><br />
						<code class="source">};</code>
					</div>
					<div>
						Each file or directory entry is preceded by an entry header, which is 72 bytes long.
					</div>
					<div>
						The first byte is used for the entry type. It's value can be:
					</div>
					<ul>
						<li>
							0:  Regular file
						</li>
						<li>
							1:  Directory
						</li>
						<li>
							2:  Symbolic link
						</li>
					</ul>
					<div>
						The second four bytes are used to store the depth of the file, from the archive's root directory.<br />
						In order to avoid limitations on the path length, all filenames are stored without the path (only the basename with extension).<br />
						So the depth value is used to indicate the file or directory depth, relative to the previous entry.
					</div>
					<div>
						Other bytes are reserved for format extension, and should be all zeros.
					</div>
					<div>
						In C, an entry header is represented the following way:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">struct</span> egpack_header_entry</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-keyword">uint8_t</span>  type;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span> depth;</code><br />
						<code class="source">    <span class="code-keyword">uint8_t</span>  pad[ 64 ];</code><br />
						<code class="source">};</code>
					</div>
					<div>
						Depending on the entry type, the following bytes are used to represents a file, directory, or symbolic link informations.
					</div>
					<div>
						An file entry header is 641 bytes long
					</div>
					<div>
						The first 512 bytes are used for the filename, which is a NULL terminated string.
					</div>
					<div>
						The next four bytes are used to store the file size, in bytes.
					</div>
					<div>
						Following 12 bytes represents respectively the file's creation time, the last modification time, and the last access time.<br />
						Each value is 4 bytes long.
					</div>
					<div>
						The next fours bytes are used for the file's permissions.
					</div>
					<div>
						The next eight bytes represents respectively the owner ID and the group ID.<br />
						Each value is 4 bytes long.
					</div>
					<div>
						Following 33 bytes are the MD5 checksum of the file.<br />
						The value is a NULL terminated string.
					</div>
					<div>
						Other bytes are reserved for format extension, and should be all zeros.
					</div>
					<div>
						In C, a file entry header is represented the following way:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">struct</span> egpack_header_entry_file</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-keyword">uint8_t</span>   name[ 512 ];</code><br />
						<code class="source">    <span class="code-keyword">uint64_t</span>  size;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  ctime;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  mtime;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  atime;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  mode;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  uid;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  gid;</code><br />
						<code class="source">    <span class="code-keyword">uint8_t</span>   md5[ 33 ];</code><br />
						<code class="source">    <span class="code-keyword">uint8_t </span>  pad[ 64 ];</code><br />
						<code class="source">};</code>
					</div>
					<div>
						A directory entry header contains the same fields, except the `size` and `md5` fields.
					</div>
					<div>
						A directory header is 600 bytes long.
					</div>
					<div>
						In C, a file entry header is represented the following way:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">struct</span> egpack_header_entry_dir</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-keyword">uint8_t</span>   name[ 512 ];</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  ctime;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  mtime;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  atime;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  mode;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  uid;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  gid;</code><br />
						<code class="source">    <span class="code-keyword">uint8_t</span>   pad[ 64 ];</code><br />
						<code class="source">};</code>
					</div>
					<div>
						A symbolic link header is the same as a file entry header, with the addition of a `target` field, representing the symbolic link target file, and without the `md5` field.
					</div>
					<div>
						A directory header is 1632 bytes long.
					</div>
					<div>
						In C, a file entry header is represented the following way:
					</div>
					<div class="code">
						<code class="source"><span class="code-keyword">struct</span> egpack_header_entry_symlink</code><br />
						<code class="source">{</code><br />
						<code class="source">    <span class="code-keyword">uint8_t</span>   name[ 512 ];</code><br />
						<code class="source">    <span class="code-keyword">uint8_t</span>   target[ 1024 ];</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  ctime;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  mtime;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  atime;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  mode;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  uid;</code><br />
						<code class="source">    <span class="code-keyword">uint32_t</span>  gid;</code><br />
						<code class="source">    <span class="code-keyword">uint8_t</span>   pad[ 64 ];</code><br />
						<code class="source">};</code>
					</div>
					<div>
						For files, the entry is followed by the file's data.
					</div>
					<div>
						For directories, the directory header is immediately followed by other entries headers.
					</div>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
