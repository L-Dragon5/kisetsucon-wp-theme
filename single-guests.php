<?php
$image = carbon_get_post_meta( get_the_ID(), 'image' );
$notable_roles = carbon_get_post_meta( get_the_ID(), 'notable_roles' );
?>

<?php get_header(); ?>
<?php get_template_part( 'partials/page', 'header'); ?>

<section id="content" role="main" class="mt-5">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <img class="img-fluid rounded mx-auto d-block" src="<?php echo wp_get_attachment_image_src( $image, 'medium' )[0]; ?>" />
                </div>
                <div class="col-sm-12 col-md-8" style="font-size: 1.25rem;">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php if(!empty($notable_roles)): ?>
                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <h3>Notable Roles </h3>
                        <?php echo $notable_roles; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>