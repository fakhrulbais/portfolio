<?php

/**
 * The template for displaying all single portfolio posts
 */

get_header();

?>

<?php while (have_posts()) : the_post(); ?>

    <section id="pt-section" class="pt-page single-portfolio">
        <div class="section-container">
            <!--Page Heading-->
            <div class="page-heading">
                <span class="icon"><i class="lnr lnr-briefcase"></i></span>
                <h2 class="portfolio-title"><?php echo the_title(); ?></h2>
            </div>

            <div class="portfolio-content">
                <?php the_content(); ?>
            </div>

            <!-- Add Navigation -->
            <?php
            the_post_navigation(array(
                'screen_reader_text' => ' ',
                'next_text' => '<span class="post-nav-prev post-nav-text">' . esc_html(watson_get_theme_options('ct_watson_portfolio_next_post_caption')) . '</span>',
                'prev_text' => '<span class="post-nav-next post-nav-text">' . esc_html(watson_get_theme_options('ct_watson_portfolio_prev_post_caption')) . '</span>'
            ));
            ?>

        </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>