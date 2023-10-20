<?php
/**
 * Single post content template-part.
 */
?>
<article id="post-<?php the_ID(); ?>" class="cristina-post-article col-sm-12 col-md-12">
	<div class="cristina-post-content">

		<?php
			echo get_the_content();
		?>
	</div>

</article>