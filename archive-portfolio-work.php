<?php
/**
 * The template for displaying Work Archive Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Michiko_Portfolio
 */

$args = array(
	'post_type'     => 'portfolio-work',
	'post_per_page' => 1000,
);

// get_header();
?>
<?php get_header(); ?>

<main id="primary" class="site-main portfolio-work-list-page">
	<div class="page-header">
		<h1 class="page-title"> 
			<?php the_archive_title(); ?>
		</h1>
	</div>

	<?php
	$query = new WP_Query( $args );
	if( $query -> have_posts() ) { ?>
		<div class="works">
			<?php
			while( $query->have_posts()) {
				$query->the_post();
				?>
				<div class="work">
					<div class="work-img">
						<a href="<?= esc_url(get_permalink()); ?>">
							<?php the_post_thumbnail('full'); ?>
						</a>
					</div>
					
					<div class="work-content">
						<h3>
							<a href="<?= esc_url(get_permalink()); ?>">
								<?= esc_html(get_the_title()); ?>
							</a>
						</h3>
						<p class="work-description">
            <?= esc_html(get_field('description')); ?>
						</p> 
						<a class="details" href="<?= esc_url(get_permalink()); ?>">
							<?= esc_html__('See Details', 'portfolio'); ?>
						</a>
					</div>
				</div>
				<?php
			} ?>
		</div>

		<?php
		wp_reset_postdata();

	};

	get_template_part( 'template-parts/content', 'contact' ); ?>

</main>


<?php
get_footer();
