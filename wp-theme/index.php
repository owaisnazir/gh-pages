<?php
get_header();
the_post();
?>
 <div id="content">

        <div class="wrapper">

            <div class="banner-photo">

            <?php
            $banner_src = get_field('header_image');
            if(strlen($banner_src) == 0)
                $banner_src = get_field('default_page_header_image', 'options');
            ?>
                <img src="<?php echo $banner_src; ?>" alt="" />

            </div><!-- .banner-photo -->

            <div class="primary-content">

                <h1><?php the_title() ?></h1>

                <?php the_content() ?>

            </div><!-- .primary-content -->

            <div class="secondary-content">

                <?php
                if ( have_rows('sidebar_sections') ) {
                    ?>
                    <div class="accordion-tabs">

                        <?php

                        // loop through the rows of data
                        while ( have_rows('sidebar_sections') ) : the_row();

                            echo '<h4 class="accordion-toggle">' . get_sub_field('section_title') . '</h4>';
                            echo '<div class="accordion-content">';
                                the_sub_field('content');
                            echo '</div>';

                        endwhile;

                        ?>
                    </div>
                    <?php
                }
                ?>

                <ul class="sidebar menu">
                    <?php dynamic_sidebar( 'general-sidebar' ); ?>
                </ul>

            </div><!-- .secondary-content -->

        </div><!-- .wrapper -->

    </div><!-- #content -->
<?php get_footer() ?>