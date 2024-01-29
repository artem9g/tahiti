<?php
/*
Template Name: home
*/
?>
<?php get_header(); ?>
<!-- HERO -->
<section class="grid-container grid-large hero">
	<div class="grid-x  hero-section">
		<div class="large-12 cell hero-section-text">
			<h1><span><?php the_field("bold_hero_title"); ?></span> <?php the_field("hero_title"); ?></h1>
			<h4><?php the_field("hero_subtitle"); ?> </h4>
		</div>
		<div class="hero-slider slider-wrapper large-12 cell">
			<?php if (have_rows("hero_slider")) : while (have_rows("hero_slider")) : the_row(); ?>    
			<div class="large-12 cell section-slide"><img src="<?php the_sub_field("hero_slider_image"); ?> "  /></div>
			<?php endwhile;endif;  ?> 
		</div>
	</div>
</section>
<!-- DISCOVER -->
<section class="grid-container grid-large discover-tahiti" id="discover-tahiti-id">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell discover-tahiti__titles">
				<h2 class="discover-tahiti__title section-title"><span><?php the_field("bold_title_second_block"); ?> </span><?php the_field("title_second_block"); ?> </h2>
				<h5 class="section-subtitle"><?php the_field("sub-title_second_block"); ?></h5>
			</div>
			<div class="grid-container grid-x small-12 discover-tahiti__cards">
	  			<div class="cell auto">
					<div class="auto cardsslider">
						<!-- CARDs -->
						<?php if(have_rows("discover_tahiti_cards")) : while (have_rows("discover_tahiti_cards")) : the_row(); ?> 
						<div>
							<div class="product-card">
								<div class="product-card-thumbnail">
									<img src="<?php the_sub_field("card-island-image"); ?>" >
								</div>
								<div class="product-card-title"><?php the_sub_field("card-island-title"); ?></div>
								<p class="product-card-desc"><?php the_sub_field("card-island-description"); ?>...</p>
								<div class="product-card__bottom">
									<div class="product-card__prices">
										<span class="product-card-from">FROM</span>
										<span class="product-card-price">$<?php the_sub_field("card-island-price"); ?></span>
									</div>
									<a href="<?php the_sub_field("card-island-link_to_page"); ?>" class="button arrow-button" >
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="20px">
										<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M19.722,10.719 L10.751,19.690 C10.353,20.088 9.708,20.088 9.310,19.690 C8.912,19.292 8.912,18.647 9.310,18.249 L16.559,11.000 L1.000,11.000 C0.448,11.000 -0.000,10.552 -0.000,10.000 C-0.000,9.448 0.448,9.000 1.000,9.000 L16.559,9.000 L9.278,1.719 C8.880,1.321 8.880,0.676 9.278,0.278 C9.676,-0.120 10.321,-0.120 10.719,0.278 L19.690,9.249 C19.694,9.253 19.695,9.258 19.699,9.262 C19.706,9.269 19.715,9.271 19.722,9.278 C20.120,9.676 20.120,10.321 19.722,10.719 Z"
										/>
										</svg>
									</a>
								</div>
							</div>
						</div>
						<?php endwhile;endif;  ?>  
					</div>
				</div>
			</div>
		<!-- ALL OFFER -->
		<div class="all-tahiti-offers grid-x large-12 align-center medium-auto">
		<div class="cell large-12 text-center all-tahiti-offers__title">Discover all Tahiti has to offer.</div>
				<form method="post" id="island-form" class="auto cell grid-x align-center">
					<?php
					$featured_posts = get_field('select_second_block');
					if ($featured_posts): ?>
						<select id="island-selector" name="island-selector" style="background-image: url('<?php bloginfo("template_url");?>/assets/img/rounded-rectangle.png')" class="cell auto island-option-selection">
							<option value="" disabled selected>Select an island</option>
						<?php foreach ($featured_posts as $featured_post): ?>
								<?php
								$select_second_block_item = $featured_post['select_second_block_item'];
								$permalink = get_permalink($select_second_block_item->ID);
								$title = get_the_title($select_second_block_item->ID);
								$custom_field = get_field('field_name', $select_second_block_item->ID);
								?>
								<option value="<?php echo esc_url($permalink); ?>">
									<?php echo esc_html($title); ?>
									<span>  <?php echo esc_html($custom_field); ?></span>
								</option>
							<?php endforeach; ?>
						</select>
					<?php endif; ?>
					<button	button type="submit" class="button cell shrink large-auto medium-auto" name="submit_button">Explore</button>
				</form>
			</div>
		</div>
	</div>
</section>
<!--EXPEREINCE TAHITI -->
	<section class="grid-container grid-large expereience-tahiti">
	<div class="grid-x   hero-section">
		<div class="expereience-tahiti__slider slider-wrapper large-12 cell">
			<?php if (have_rows("slider_third_block")) : while (have_rows("slider_third_block")) : the_row(); ?>    
			<div class="expereience-tahiti__slide">
				<div class="large-12 cell section-slide expereience-tahiti__slide-bg"><img src="<?php the_sub_field("background_image_for_card_third_block"); ?> "  /></div>
				<div class=" cell grid-container expereience-tahiti__content-slide large-12">
					<div class="large-12 cell expereience-tahiti__titles">
						<h2 class="discover-tahiti__title section-title"><span><?php the_sub_field("bold_title_third_block"); ?> </span><?php the_sub_field("thin_title_third_block"); ?></h2>
						<h5 class="section-subtitle"><?php the_sub_field("sub_title_third_block"); ?></h5>
					</div>
					<div class="grid-x expereience-tahiti__content align-center">
						<p class="discover-tahiti__text cell"><?php the_sub_field("main_text_third_block"); ?> </p>
						<?php $link = get_sub_field("button_third_block");
								if( $link ): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<a class="discover-tahiti__button button cell" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>  
					</div>
				</div>
			</div>
			<?php endwhile;endif;  ?> 
		</div>
	</div>
</section>
<!--WHY TAHITI -->
<section class="why-tahiti grid-container grid-x align-center" id="why-tahiti-id">
	<div class="why-tahiti__title section-title"><span><?php the_field("bold_title_four_block"); ?></span> <?php the_field("title_four_block"); ?></div>
	<div class="why-tahiti__content grid-x align-center">
	<p class="why-tahiti__block cell auto small-12">
<?php the_field("first_column_four_block"); ?>
	</p>
	<p class="why-tahiti__block cell auto small-12">
		<?php the_field("second_column_four_block"); ?>
	</p>
	<p class="why-tahiti__block cell auto small-12">
		<?php the_field("third_column_four_block"); ?>
	</p>
	</div>
</section>
<!-- BOOK NOW --> 
<section id="book-now-id" class="book-now grid-large grid-container" style="background-image: url('<?php the_field("book-now-background"); ?>')">
	<div class="x-grid book-now__content align-center">
	<div class="book-now__title text cell">	<?php the_field("title_book_now_block"); ?></div>
	<div class="book-now__text cell">
			<?php the_field("text_book_now_block"); ?>
	</div>
		<?php 
		$link = get_field('button_link_book_now_block');
		if( $link ): 
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
		?>
			<a class="book-now__button button cell auto" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		<?php endif; ?>
	</div>
</section>
<?php get_footer();