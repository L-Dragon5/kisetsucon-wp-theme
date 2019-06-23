<?php /**
 * Template Name: Google Form Embed Page
 *
 * @package Kisetsucon
 */
?>
<?php get_header(); ?>
<?php
$form_link = carbon_get_post_meta( get_the_ID(), 'google_form_link' );
$form_url = carbon_get_post_meta( get_the_ID(), 'google_form_url' );
$page_additional_info = carbon_get_post_meta( get_the_ID(), 'page_additional_info' );
?>

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
    <?php endwhile; ?>
    <?php endif; ?>

    <?php if(!empty($form_url)): ?>
        <div class="container">
            <div class="row">
                <?php if(!empty($page_additional_info)): ?>
                    <div class="col-sm-12 col-lg-5 order-lg-12 mb-5">
                        <?php echo wpautop( $page_additional_info ); ?>
                    </div>
                    <div class="col-sm-12 col-lg-7 order-lg-1 d-none d-lg-block embed-responsive embed-responsive-4by3" style="background-color: #DDD;">
                <?php else: ?>
                    <div class="col-sm-12 d-none d-lg-block embed-responsive embed-responsive-4by3" style="background-color: #DDD;">
                <?php endif; ?>
                    <iframe class="embed-responsive-item" style="padding: 2rem 1rem 0;" src="<?php echo $form_url; ?>">Loading...</iframe>
                </div>
                <div class="col-sm-12 d-lg-none">
                    <a href="<?php if(!empty($form_link)) { echo $form_link; } ?>" class="btn btn-primary btn-block btn-lg" role="button">Go to Form</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>