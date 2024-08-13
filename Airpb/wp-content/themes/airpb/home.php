<?php
    get_header();

   // Template Name: Home

?>
	


	<div class="cookie" id="cookie">
		<div class="bone">
			<div class="cookie_net __flex-center">
				<p><?php the_field('cookie_text'); ?></p>
				<div class="cookie_btn __flex-align">
					<button onclick="funCookie('#cookie');" class="__btn _white"><?php the_field('cookie_button_1'); ?></button>
					<button onclick="funCookie('#cookie');" class="__btn _white"><?php the_field('cookie_button_2'); ?></button>
				</div>
			</div>
		</div>
	</div>

	<main>
		<section class="master" id="home">
			<div class="bone">
				<div class="master_net __flex-center">
					<div class="master_info">
						<h1 class="master_title __anim _anim-title"><?php the_field('master_title'); ?></h1>
						<p class="master_text __anim _slide-y _anim-del_43"><?php the_field('master_text'); ?></p>
						<div class="master_btn __anim _slide-y _anim-del_83">
							<a href="<?php the_field('master_button_link'); ?>" class="__btn"><?php the_field('master_button'); ?></a>
						</div>
					</div>
					<div class="master_rocket">
					<img src="<?php the_field('master_background'); ?>">
					</div>
				</div>
			</div>
		</section>

		<section class="black">
			<div class="bone">
				<h2 class="black_title __anim _anim-title"><?php the_field('black_title'); ?></h2>
				<p class="black_text  __anim _slide-y"><?php the_field('black_text'); ?></p>
			</div>
		</section>

		<section class="faq" id="services">
			<div class="bone">
				<div class="faq_info">
					<h2 class="faq_title __anim _anim-title"><?php the_field('faq_title'); ?></h2>
					<p class="faq_text  __anim _slide-y"><?php the_field('faq_text'); ?></p>
				</div>
				<div class="faq_net __grid-twoo">
               <?php
                  $faq = new WP_Query(array(
                    'posts_per_page' => -1,
						  'post_type' => 'faq',
                    'order' => 'ASC'
                  ));
               
                  while($faq -> have_posts()){
                  $faq -> the_post(); ?>
                  
						<li class="faq_li  __anim _slide-y">
							<h4 class="faq_trigger" onclick="faqToggle(this)"><?php the_title(); ?></h4>
							<div class="faq_content">
								<?php the_content(); ?>
							</div>
						</li>


                  <?php }; wp_reset_postdata(); ?>

						
					
					
				</div>
			</div>
		</section>

		<section class="about" id="about">
			<div class="bone">
				<h2 class="about_title  __anim _anim-title"><?php the_field('about_title'); ?></h2>
				<div class="about_net __grid-twoo">
					<div class="about_info">
						<h3 class="about_subtitle __anim _slide-x"><?php the_field('about_subtitle'); ?></h3>
						<p class="about_text __anim _slide-x"><?php the_field('about_text'); ?></p>
						<div class="about_nums __grid-twoo">
							<div class="about_num">
								<div class="about_num_title __anim _slide-y"><?php the_field('about_num_1'); ?></div>
								<p class="about_num_text __anim _slide-y"><?php the_field('about_num_text_1'); ?></p>
							</div>
							<div class="about_num">
								<div class="about_num_title __anim _slide-y"><?php the_field('about_num_2'); ?></div>
								<p class="about_num_text __anim _slide-y"><?php the_field('about_num_text_2'); ?></p>
							</div>
						</div>
					</div>
					<div class="about_img">
						<img src="<?php the_field('about_image'); ?>">
					</div>
				</div>
			</div>
		</section>

		<section class="team" id="contact">
			<div class="bone">
				<ul class="team_list">
            <?php
                  $team = new WP_Query(array(
                    'posts_per_page' => -1,
						  'post_type' => 'team',
                    'order' => 'ASC'
                  ));
               
                  while($team -> have_posts()){
                  $team -> the_post(); ?>
                  
						<li class="team_li">
						<div class="team_net __grid-twoo">
							<div class="team_info">
								<h2 class="team_name __anim _anim-title"><?php the_title(); ?></h2>
								<div class="team_text __anim _slide-y">
									<?php the_content(); ?>
								</div>
								<div class="team_bottom __flex-align __anim _slide-y">
									<button class="__btn" onclick="teamToggle(this);"><?php the_field('read_more_button_text'); ?></button>
									<a href="<?php the_field('contact_button_link'); ?>" target="_blank" class="__btn"><?php the_field('contact_button_text'); ?></a>
								</div>
							</div>
							<div class="team_img">
								<img src="<?php the_post_thumbnail_url(); ?>">
							</div>
						</div>
					</li>

                  <?php }; wp_reset_postdata(); ?>
				
				</ul>
			</div>
		</section>
	</main>

	<?php

get_footer();

?>