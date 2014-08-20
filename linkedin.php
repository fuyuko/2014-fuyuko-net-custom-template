<?php
/**
 * Template Name: LinkedIn Resume
 *
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<div id="linkedin-profile">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<div class="title-wrapper max-width">
							<h1 class="entry-title"><?php the_title(); ?></h1>
						</div>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						
								<?php

									$string = file_get_contents("/home/ubuntu/public_html/fuyuko-net/dev-2014-fuyuko-net/wp-content/themes/2014-fuyuko-net-custom-template/linkedin-profile.txt");
                                    //$string = file_get_contents("/home/fuyuckpc/public_html/2014-fuyuko-net/wp-content/themes/twentythirteen-child/linkedin-profile.txt");

									$json_data=json_decode($string,true);
								?>
								
								<div id="intro">
								<?php
									echo '<img src="' . $json_data['pictureUrl'] . '" title="Fuyuko Gratton" class="profile-image" />'. "\n";
									echo '<div class="intro-content">' . "\n";
										echo '<div class="intro-name">' . $json_data['firstName'] . " " . $json_data['lastName'] . "</div>\n";
										echo '<div class="headline">' . $json_data['headline'] . "</div>\n";
										echo '<div class="industry">Industry: ' . $json_data['industry'] . "</div>\n";
									echo "</div>\n";
								?>
								</div>

								
								<div id="main-profile">
									<div id="work-experiences">
									<h2>Work Experiences</h2>
									<?php

									foreach ($json_data['positions']['values'] as $position) {
										//var_dump($position);
										echo '<div class="work">' .  "\n";
										echo '<div class="name">' . $position['company']['name'] ;
										echo ', <span class="date">' . $position['startDate']['month'] . '/' . $position['startDate']['year'] . " - ";
										if($position['isCurrent'] == true) echo "Current"; else echo $position['endDate']['month'] . '/' . $position['endDate']['year'];
										echo "</span></div>\n";
										echo '<div class="position">' . $position['title'] . "</div>\n";
										
											echo '<p class="summary">' . $position['summary'] . "</p>\n";
										echo "</div>\n";
									}

									?>
									</div>
									<div id="educations">
									<h2>Education</h2>
									<?php

									foreach ($json_data['educations']['values'] as $school) {
										//var_dump($position);
										echo '<div class="school">' .  "\n";
										echo '<div class="name">' . $school['schoolName'];
										echo ', <span class="date">' . $school['startDate']['year'] . " - " . $school['endDate']['year'] ."</span></div>\n";
										echo '<div class="position">';
										if (strcmp($school['degree'], "N/A") != 0) echo $school['degree'] . " in ";
										echo $school['fieldOfStudy'] . "</div>\n";
										if($school['notes']) echo '<p class="notes">' . $school['notes'] . "</p>\n";
										if($school['activities']) echo '<p class="activities">Activities and Societies: ' . $school['activities'] . "</p>\n";
										
										echo "</div>\n";
									}
									?>
									</div><!-- end of educations -->
		</div><!-- end of main profile -->
						
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', '2014-fuyuko-net-custom-template' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
						<?php if (current_user_can( 'activate_plugins' )) { //if Administrator then the user can update the resume content ?> 
							<a href="/wp-content/themes/t2014-fuyuko-net-custom-template/linkedin-cron.php">Update Resume</a>
						<?php } ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<!-- side bar -->
<div id="tertiary" class="sidebar-container" role="complementary">
	<div class="sidebar-inner">
		<div class="widget-area">
			<div id="sub-profile">
				<div id="skills">
				<h2>Skills</h2>
					<?php

					foreach ($json_data['skills']['values'] as $skill) {
						//var_dump($position);
						echo '<div class="skill">' .  "\n";
						echo '<div class="skill-name">' . $skill['skill']['name'] . "</div>\n";
						echo "</div>\n";
					}
					?>
					<div style="clear:both;">&nbsp;</div>
				</div> <!-- end of #skills -->	
				<div id="certifications">
				<h2>Certifications</h2>
				<?php

				foreach ($json_data['certifications']['values'] as $certification) {
					//var_dump($position);
					echo '<div class="certification">' .  "\n";
					echo '<div class="cert-name">' . $certification['name'] . "</div>\n";
					echo "</div>\n";
				}
				?>
				</div>
				<div id="testimonials">
				<h2>Testimonials</h2>
				<?php

				foreach ($json_data['recommendationsReceived']['values'] as $recommend) {
					//var_dump($position);
					echo '<div class="recommendation">' .  "\n";
					echo '<div class="recommend-comment">"' . $recommend['recommendationText'] . '"</div>' . "\n";
					echo '<div class="recommender">by ' . $recommend['recommender']['firstName'] . " " . $recommend['recommender']['lastName'] . "</div>\n";
					echo "</div>\n";
				}
				?>
				</div>	
			</div> <!-- end of #sub-profile -->
		</div><!-- .widget-area -->
	</div><!-- .sidebar-inner -->
</div><!-- #tertiary -->
<!-- end of side bar -->
</div>
<?php get_footer(); ?>