<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?>
        </div><!-- #main -->
		<?php zo_mercury_footer();?>
	</div><!-- #page -->
	<?php wp_footer(); ?>
	<div class="container-fluid" id="footer">
		<div class="container">
			<div>&copy <?= date("Y") ?> Все права защищены</div>
		</div>
	</div>
	<script src="/script.js"></script>
</body>
</html>