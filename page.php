<?php get_header(); ?>

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
</section>

<?php get_footer(); ?>