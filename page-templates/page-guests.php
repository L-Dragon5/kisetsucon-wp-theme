<?php /**
 * Template Name: Guests Page
 *
 * @package Kisetsucon
 */
?>
<?php get_header(); ?>

<?php get_template_part( 'partials/page', 'header'); ?>

<section class="page-content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="font-size: 1.5rem;">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>



    <?php
    $query = new WP_Query( array( 'post_type' => 'guests' ));
    if( $query->have_posts() ) : ?>
        <div class="container">
        <div class="row">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php $image = carbon_get_post_meta( get_the_ID(), 'image' ); ?>
        <?php $type = get_the_terms(get_the_ID(), 'type'); ?>
            <div class="col-md-6 col-lg-4 mb-2">
                <a href="<?php the_permalink(); ?>" class="blank-link">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo wp_get_attachment_image_src( $image, 'medium' )[0]; ?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text">
                                <?php foreach($type as $t) {
                                    echo $t->name;
                                } ?>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
        </div>
        </div>
    <?php else: ?>
        <div class="col-sm-12">
            Guests are to be determined. Please check back later.
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>