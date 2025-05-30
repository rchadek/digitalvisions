<?php
/**
 * Title: About section half-width
 * Slug: powder/about-half-primary
 * Categories: powder-about
 */
?>
<!-- wp:group {"metadata":{"name":"About Half-width"},"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|60"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"style":{"typography":{"lineHeight":"1","fontSize":"60px"}}} -->
			<h2 class="wp-block-heading" style="font-size:60px;line-height:1"><?php echo esc_html__( 'We build the quintessential experience.', 'powder' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php echo esc_html__( 'Catalina is an award-winning architectural, interior, and landscape design company based in Laguna Beach, California. We deliver everything our clients hope for, specializing in modern design, soaked in simplicity, and cultivate living spaces that are sophisticated and absolutely breathtaking.', 'powder' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"base","textColor":"contrast","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background has-link-color wp-element-button"><?php echo esc_html__( 'Start Your Project →', 'powder' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
