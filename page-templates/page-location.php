<?php /**
 * Template Name: Location Page
 *
 * @package Kisetsucon
 */
?>
<?php
$image = carbon_get_post_meta( get_the_ID(), 'image' );
$map = carbon_get_post_meta( get_the_ID(), 'embed_map' );
?>
<?php get_header(); ?>

<?php get_template_part( 'partials/page', 'header'); ?>

<section class="page-content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo wp_get_attachment_image_src( $image, 'medium' )[0]; ?>" class="img-fluid" />
                </div>
                <div class="col-md-7" style="font-size: 1.25rem;">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-12 embed-responsive embed-responsive-16by9">
                    <?php echo $map; ?>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>