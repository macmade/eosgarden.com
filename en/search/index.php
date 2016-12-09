			<?php $Q = ( isset( $_POST[ 'q' ] ) ) ? $_POST[ 'q' ] : ( ( isset( $_GET[ 'q' ] ) ) ? urldecode( $_GET[ 'q' ] ) : '' ); ?>
			<div class="frame">
				<div class="frame-top">&nbsp;</div>
				<div class="frame-highlight">
					<img src="/uploads/image/highlights/search.png" alt="" width="905" height="285" />
				</div>
				<div class="frame-spacer">&nbsp;</div>
				<div class="frame-content">
					<div>
						<form action="<?php print Eos_Menu::getInstance()->getPageUrl( 'search' ); ?>" method="post" id="searchForm" name="searchForm">
							<input name="q" id="searchFormQuery" type="text" size="100" value="<?php print htmlspecialchars( stripslashes( $Q ) ); ?>"/>
							<input name="searchSubmit" id="searchFormSubmit" type="submit" value="Search" class="form-submit" />
						</form>
						<script type="text/javascript" charset="utf-8">
							// <![CDATA[
							jQuery( document ).ready
							(
								function()
								{
									$( '#searchFormQuery' ).autocomplete( '/scripts/searchbox-autocomplete.php' );
								}
							);
							// ]]>
						</script>
					</div>
					<?php print new Eos_Search(); ?>
				</div>
				<div class="frame-bottom">&nbsp;</div>
			</div>
