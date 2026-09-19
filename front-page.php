<?php
/**
 * The template for displaying Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Michiko_Portfolio
 */


// Exit if accessed directly.
defined('ABSPATH') || exit;


get_header();
?>

	<main id="primary" class="site-main">

		<?php

		while ( have_posts() ) {
			the_post(); ?>	

			<div class="home-page">
				<div class="title-container">
					<h1 class="home-h1">
						<?php the_title(); ?>
					</h1>
				</div>
				<div class="content-container">
					<?php

					the_content();
					
					get_template_part( 'template-parts/content', 'socialicons' ); ?>

				</div>
			</div>

		<?php
		} ?>
	</main>
<?php

get_footer();