	<!-- Footer. -->
	<footer class="footer">
		<div class="bone">
			<div class="footer_net __flex-center">
         <?php 
$footer_logo = get_theme_mod('footer_logo'); 
if($footer_logo): 
?>
    <a href="/" class="footer_logo">
        <picture>
            <source srcset="<?php echo esc_url($footer_logo); ?>" type="image/webp">
            <img src="<?php echo esc_url($footer_logo); ?>" alt="Footer Logo">
        </picture>
    </a>
<?php 
endif; 
?>

				<!-- <p class="footer_line">
					Contacts: <a class="__hover_line-active" href="mailto:david@rpb.ai">david@rpb.ai</a>
				</p>
				<p class="footer_line">
					© All rights reserved to <a class="__hover_line-active" href="//RPB.ai" target="_blank">RPB.ai</a>
				</p>
				<p class="footer_line">
					<a class="__hover_line-active" href="/policy">Privacy Policy</a>
				</p> -->

            <?php if (is_active_sidebar('custom_footer')) : ?>
    <?php dynamic_sidebar('custom_footer'); ?>
<?php endif; ?>

			</div>
		</div>		
	</footer>
	<!-- Footer. -->

	<?php wp_footer(); ?>
</body>
</html>