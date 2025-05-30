<?php
/**
 * Title: Header with site logo
 * Slug: powder/header-site-logo-quaternary
 * Categories: powder-header
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"metadata":{"name":"Header"},"align":"full","style":{"spacing":{"margin":{"top":"0px"},"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"quaternary","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull has-quaternary-background-color has-background" style="margin-top:0px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
<!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"10px"},"layout":{"selfStretch":"fixed","flexSize":"200px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":30} /-->
			<!-- wp:site-title {"level":0} /-->
		</div>
		<!-- /wp:group -->
		<!-- wp:navigation {"layout":{"type":"flex","setCascadingProperties":true}} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
