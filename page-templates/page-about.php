<?php /**
 * Template Name: About Page
 *
 * @package Kisetsucon
 */
?>
<?php get_header(); ?>
<?php
$staff = carbon_get_post_meta( get_the_ID(), 'crb_staff_list' );
?>

<?php get_template_part( 'partials/page', 'header'); ?>

<section class="page-content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php endif; ?>

    <?php if($staff): ?>
    <div class="container" style="margin-top: 2rem;">
        <div class="row">
            <div class="col-sm-12">
                <h2>Meet the Staff</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach($staff as $member): ?>
                <div class="col-md-6 col-lg-4 mb-2">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo wp_get_attachment_image_src( $member['image'], 'medium' )[0]; ?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $member['name'] . ' - ' . $member['position']; ?></h5>
                            <p class="card-text"><?php echo $member['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>