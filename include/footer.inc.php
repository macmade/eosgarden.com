		</div>
		<?php print Eos_Menu::getInstance()->getRootlineMenu() . chr( 10 ) ?>
		<div id="footer">
			<div class="left">
				eosgarden &copy; <?php print date( 'Y', time() ); ?> - All rights reseverd - All wrongs reserved
			</div>
			<div class="right">
				<?php print Eos_Menu::getInstance()->getPageLink( '/legal/privacy/' ) . ' - ' . Eos_Menu::getInstance()->getPageLink( '/legal/credits/' ) . chr( 10 ) ?>
			</div>
		</div>
		<div id="footer-tools">
		    <!--
			<div id="fb-root">
			    <?php
				//<iframe src="http://www.facebook.com/plugins/like.php?href=http://www.eosgarden.com<?php print Eos_Menu::getInstance()->getCurrentPageUrl(); ?>&amp;layout=standard&amp;show_faces=false&amp;width=740&amp;action=like&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:740px; height:35px;" allowTransparency="true"></iframe>
			    ?>
			</div>
			-->
			<!--
			<div id="donate">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
					<input type="image" src="/uploads/image/paypal-donate.png" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="donate" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>
			-->
		</div>
	</div>
</body>
</html>
