<?php
/**
 * The template for displaying the Work Single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Michiko_Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main">
		
		<?php
		while ( have_posts() ) :
			the_post();
			
			if (get_field('live')) {
				$liveLink = get_field('live');

				if($liveLink){
					$live_url = $liveLink['url'];
					$live_title = $liveLink['title'];
					$live_target = $liveLink['target'] ? $liveLink['target'] : '_self';
				}
			}
			?>
			<section class="single-work-descriotion">
				<!-- Display the title -->
				<h1><?php the_title(); ?></h1>

				<!-- Display the thumbnail -->
				<div class="work-single-img">
				<?php the_post_thumbnail('work-single-img'); ?>
				</div> <?php
				
				// Diplaying the Tool List
				$tools = get_field('tools');
				if( $tools ): ?>
				<ul class="tools">
				<?php foreach( $tools as $tool ): ?>
					<li><?php echo $tool; ?></li>
				<?php endforeach; ?>
				</ul>
				<?php endif; ?>

				<!-- Discpaly links -->
				<div class="link">
				<?php
				// Display link to GitHub
				if (get_field('git')) {
					$gitLink = get_field('git');
					if($gitLink){
						$git_url = $gitLink['url'];
						$git_title = $gitLink['title'];
						$git_target = $gitLink['target'] ? $gitLink['target'] : '_self';
					?>
					<a href="<?php echo esc_url($git_url); ?>"target="<?php echo esc_attr($github_target); ?>"><?php esc_html_e( 'GitHub', 'michiko-portfolio' ); ?></a>
					<?php
					}
				}
				// Display link to Live site
				if (get_field('live')) {
					?>
					<a  href="<?php echo esc_url($live_url); ?>"target="<?php echo esc_attr($live_target); ?>"><?php esc_html_e( 'Live Site', 'michiko-portfolio' ); ?></a>
					<?php
				}
				?>
				</div>

				<div class="process-reflection">
					<h2 class="process-header"><?php esc_html_e( 'Process', 'michiko-portfolio' ); ?></h2>
					<h2 class="reflection-header"><?php esc_html_e( 'What I learned', 'michiko-portfolio' ); ?></h2>
				</div>

				<div class="process">
					<?php 
					// Display Discriptions
					if (function_exists ( 'get_field')) {
						if (get_field('process')) { ?>
							<p><?php the_field('process'); ?></p>
						<?php
						}
						} ?>
				</div>

				<div class="reflection hide">
					<?php 
					// Display Reflection
					if (function_exists ( 'get_field')) {
						if (get_field('reflection')) { ?>
							<p><?php the_field('reflection'); ?></p>
						<?php
						}
						} ?>
				</div>
			</section>


			<section class="single-work-steps">
				
				<?php
					if (get_field('wireframe_img') || get_field('wireframe_link')) {
						?>
						<!-- Display Heading: Wireframe -->
						<div class="single-work-step">
							<h2><?php esc_html_e( 'Wireframe', 'michiko-portfolio' ); ?></h2>
							<?php
						
							// Display Wireframe Image (ID)
							$wireframe_img = get_field('wireframe_img');
							$size = 'work-archive-img';
							$wireframe_link = get_field('wireframe_link');
							
							if($wireframe_link){
								$wireframe_url = $wireframe_link['url'];
								$wireframe_title = $wireframe_link['title'];
								$wireframe_target = $wireframe_link['target'] ? $wireframe_link['target'] : '_self';
							}
							
							if( $wireframe_img ) {
								?>
								<div class="work-single-img">
								<?php echo wp_get_attachment_image( $wireframe_img, $size ); ?>
							</div>
								<?php
							}
						
							// Display Wireframe Link
							?>
							<div class="link">
									<a href="
									
									<?php echo esc_url($wireframe_url); ?>"target="<?php echo esc_attr($wireframe_target); ?>"><?php esc_html_e( 'View Wireframe', 'michiko-portfolio' ); ?>
								</a>
							</div>
						</div>
						<?php
					} 

					if (get_field('mockup_img') || get_field('mockup_link')) {
						?>
						<!-- Display Heading: mockup -->
						<div class="single-work-step">
							<h2><?php esc_html_e( 'Mockup', 'michiko-portfolio' ); ?></h2>
							<?php
							
							// Display Mochup Image (ID)
							$mockup_link = get_field('mockup_link');
							$mockup_img = get_field('mockup_img');
							$mockup_img_size = 'work-archive-img';
							
							if($mockup_link){
								$mockup_url = $mockup_link['url'];
								$mockup_title = $mockup_link['title'];
								$mockup_target = $mockup_link['target'] ? $mockup_link['target'] : '_self';
							}
							
							if( $mockup_img ) {
								?>
								<div class="work-single-img">
								<?php echo wp_get_attachment_image( $mockup_img, $mockup_img_size ); ?>
								</div>
								<?php
							}
							
							// Display Mochup Link
							?>
							<div class="link">
									<a href="<?php echo esc_url($mockup_url); ?>"target="<?php echo esc_attr($mockup_target); ?>"><?php esc_html_e( 'View mockup', 'michiko-portfolio' ); ?></a>
							</div>
						</div>
						<?php
					} 
					
					if (get_field('prototype_img') || get_field('prototype_link')) {
						?>
						
						<!-- Display Heading: Prototype -->
						<div class="single-work-step">
							<h2><?php esc_html_e( 'Prototype', 'michiko-portfolio' ); ?></h2>
							<?php
							
							// Display Mochup Image (ID)
							$prototype_link = get_field('prototype_link');
							$prototype_img = get_field('prototype_img');
							$prototype_img_size = 'work-archive-img';
							
							if($prototype_link){
								$prototype_url = $prototype_link['url'];
								$Prototype_title = $prototype_link['title'];
								$Prototype_target = $prototype_link['target'] ? $prototype_link['target'] : '_self';
							}
							
							if( $prototype_img ) {
								?>
								<div class="work-single-img">
								<?php echo wp_get_attachment_image( $prototype_img, $prototype_img_size ); ?>
								</div>
								<?php
							}
							
							// Display Mochup Link
							?>
							<div class="link">
									<a href="<?php echo esc_url($prototype_url); ?>"target="<?php echo esc_attr($Prototype_target); ?>"><?php esc_html_e( 'View Prototype', 'michiko-portfolio' ); ?></a>
							</div>
						</div>
						<?php
					} 
					
					// ---------------------------
					if (get_field('style_img') || get_field('style_link')) {
						?>
						<!-- Display Heading: Style Guide -->
						<div class="single-work-step">
							<h2><?php esc_html_e( 'Style Guide', 'michiko-portfolio' ); ?></h2>
							<?php
						
							// Display Style Guide Image (ID)
							$style_img = get_field('style_img');
							$style_size = 'work-archive-img';
							$style_link = get_field('style_link');
							
							if($style_link){
								$style_url = $style_link['url'];
								$style_title = $style_link['title'];
								$style_target = $style_link['target'] ? $style_link['target'] : '_self';
							}
							
							if( $style_img ) {
								?>
								<div class="work-single-img">
								<?php echo wp_get_attachment_image( $style_img, $style_size ); ?>
							</div>
								<?php
							}
						
							// Display Style Link
							?>
							<div class="link">
									<a href="<?php echo esc_url($style_url); ?>"target="<?php echo esc_attr($style_target); ?>"><?php esc_html_e( 'View Style Guide', 'michiko-portfolio' ); ?></a>
							</div>
						</div>
						<?php
						} 

						// ------------------------------------
					if (get_field('development_img')) {
					?>
					<div class="single-work-step">
							<h2><?php esc_html_e( 'Development', 'michiko-portfolio' ); ?></h2>
							<?php
							
							// Display Development Image (ID)
							$development_img = get_field('development_img');
							$development_img_size = 'work-archive-img';
							
							if( $development_img ) {
								?>
								<div class="work-single-img">
								<?php echo wp_get_attachment_image( $development_img, $development_img_size ); ?>
								</div> <?php
							}
							
							// Display GitHub Link
							?>
							<div class="link">
								<a href="<?php echo esc_url($git_url); ?>"target="<?php echo esc_attr($git_target); ?>"><?php esc_html_e( 'Github', 'michiko-portfolio' ); ?></a>
							
								<!-- Live Site Link -->
								<a  href="<?php echo esc_url($live_url); ?>"target="<?php echo esc_attr($live_target); ?>"><?php esc_html_e( 'Live Site', 'michiko-portfolio' ); ?></a>
							</div>	
					</div>
					<?php 
					} ?>
			</section>
			<?php  	
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'michiko-portfolio' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'michiko-portfolio' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		
		get_template_part( 'template-parts/content', 'contact' );
		?>

	</main><!-- #main -->

<?php
get_footer();
