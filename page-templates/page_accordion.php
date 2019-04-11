<?php /**
 * Template Name: Accordion Collapse Page
 *
 * @package Kisetsucon
 */
?>
<?php get_header(); ?>
<?php $accordion_list = carbon_get_post_meta( get_the_ID(), 'accordion_list' ); ?>

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

    <?php if($accordion_list): $c1 = 0;?>
        <div class="container mt-4">
            <div class="row">
                <?php foreach($accordion_list as $acc): ?>
                    <div class="col-sm-12 col-lg-6 mb-sm-4">
                        <h2 class="accordion-header"><?php echo $acc['accordion_header']; ?></h2>

                        <div id="accordion-<?php echo $c1; ?>">
                            <?php
                            if($accordion_body = $acc['accordion_body']):
                                $c2 = 0;
                                foreach($accordion_body as $q): ?>
                                <div class="card">
                                    <a class="accordion-link card-link" data-toggle="collapse" href="#collapse-<?php echo $c1; ?>-<?php echo $c2; ?>">
                                        <div class="card-header">
                                            <?php echo $q['heading']; ?>
                                        </div>
                                    </a>
                                    <div id="collapse-<?php echo $c1; ?>-<?php echo $c2; ?>" class="collapse" data-parent="#accordion-<?php echo $c1; ?>">
                                        <div class="card-body">
                                            <?php echo wpautop($q['body']); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php $c2++; endforeach; endif; ?>
                        </div>
                    </div>

                <?php $c1++; endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>