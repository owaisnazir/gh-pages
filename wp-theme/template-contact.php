<?php
/*
Template Name: Contact Us
*/

get_header();
the_post();

$hide_sidebar = get_field('hide_sidebar');
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

            <div class="<?php echo ($hide_sidebar ? '' : 'primary-content'); ?>">

                <h1><?php the_title() ?></h1>

                <?php the_content() ?>

                <h2>Offices</h2>

                <?php

                $locs = new WP_Query(array(
                    'post_type' => 'office'
                ));

                while($locs->have_posts()){
                    $locs->the_post();

                    echo '<h5>' . get_the_title() . '</h5>';
                    echo '<p>' . get_field('address') . '<br/>';
                    echo get_field('phone') . '<br/>';
                    echo '<a href="mailto:' . get_field('email') . '">' . get_field('email') . '</a></p>';
                }
                ?>

                <h2>How can we help you?</h2>

                <?php gravity_form( 1, false, false, false, null, true, 1); ?>


            </div><!-- .primary-content -->

            <?php
            if(!$hide_sidebar){
                ?>
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
                <?php
            }
            ?>

        </div><!-- .wrapper -->

    </div><!-- #content -->
<?php get_footer() ?>