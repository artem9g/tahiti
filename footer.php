<footer class="grid-container footer-container">
	<div class="grid-x footer__container grid-margin-y">
	
	<div  class="footer__title">
		<?php the_custom_logo(); ?>
		<a class="cell footer__site-title large-shrink align-center topbar-responsive-logo logo-title-block" href="<?php echo get_home_url(); ?>">  <?php the_field("current_page_title_footer"); ?>  </a>
	</div>
	
	<div class="cell footer__columns grid-x large-auto align-center">
	<div class="footer__column cell medium-shrink">
	<div class="footer__title-column"><?php the_field("footer_title_first_column"); ?></div>
		<?php  wp_nav_menu(array('theme_location' => 'footer_menu_column_1')); ?>
	</div>
	<div class="footer__column cell medium-shrink">
		<div class="footer__title-column"><?php the_field("footer_title_second_column"); ?></div>
				<?php  wp_nav_menu(array('theme_location' => 'footer_menu_column_2')); ?>
		</div>
		<div class="footer__column cell medium-shrink">
			<div class="footer__title-column"><?php the_field("footer_title_third_column"); ?></div>
				<?php  wp_nav_menu(array('theme_location' => 'footer_menu_column_3')); ?>
			</div>
		</div>		
		<div class="cell social-buttons large-shrink rounded-social-buttons">
    		<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>