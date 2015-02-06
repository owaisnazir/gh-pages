<?php
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

                <div class="nav-previous alignleft"><?php previous_post_link(); ?></div>
                <div class="nav-next alignright"><?php next_post_link(); ?></div>

            </div><!-- .primary-content -->

            <?php
            if(!$hide_sidebar){
                ?>
                <div class="secondary-content">


                    <?php
                    ///////////////////////
                    // RELATED ATTORNEYS
                    ///////////////////////
                    
                    $related = new WP_Query( array(
                      'connected_type' => 'post_attorney',
                      'connected_items' => get_queried_object(),
                      'nopaging' => false,
                    ) );

                    if($related->have_posts()){
                        ?>
                        <h2>Attorney<?php echo $related->found_posts > 1 ? 's' : '' ?></h2>
                        <ul class="menu">
                            <?php
                            while($related->have_posts()){
                                $related->the_post();
                                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                            }
                            ?>
                        </ul>

                        <?php
                        wp_reset_query();
                    }
                    ?>

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