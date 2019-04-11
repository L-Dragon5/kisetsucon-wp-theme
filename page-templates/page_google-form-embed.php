<?php /**
 * Template Name: Google Form Embed Page
 *
 * @package Kisetsucon
 */
?>
<?php get_header(); ?>
<?php
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
            <?php if(!empty($page_additional_info)): ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-5 order-lg-12 mb-5">
                        <?php echo wpautop( $page_additional_info ); ?>
                    </div>
                    <div class="col-sm-12 col-lg-7 order-lg-1 embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" style="max-width: 640px;" src="<?php echo $form_url; ?>">Loading...</iframe>
                    </div>
                </div>
            <?php else: ?>
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" style="max-width: 640px;" src="<?php echo $form_url; ?>">Loading...</iframe>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>