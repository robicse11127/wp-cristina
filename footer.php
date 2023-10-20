<?php
/**
 * Footer tempate file.
 */
?>
<footer class="cristina-footer-area">
	<?php
	if ( is_active_sidebar( 'cristina-footer-wdg' ) ) {
		dynamic_sidebar( 'cristina-footer-wdg' );
	}
	?>
</footer>
<?php wp_footer(); ?>
</body>
</html>