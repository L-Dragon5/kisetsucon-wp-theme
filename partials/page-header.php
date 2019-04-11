<?php $header_img = carbon_get_theme_option( 'crb_page_header_image' ); ?>
<header class="page-header" style="background-image: url('<?php echo wp_get_attachment_image_src($header_img, 'full')[0]; ?>');">
    <h1><?php echo strtoupper(get_the_title()); ?></h1>
</header>