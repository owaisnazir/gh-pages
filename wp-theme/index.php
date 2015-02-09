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

                <?php
                if(get_post_type() == 'post'){
                    ?>
                    <div class="nav-previous alignleft"><?php previous_post_link(); ?></div>
                    <div class="nav-next alignright"><?php next_post_link(); ?></div>
                    <?php
                }
                ?>

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
                    /////////////////////////////////
                    // BLOG CATS AND PRACTICE AREAS
                    /////////////////////////////////
                    
                    if(get_post_type() == 'post'){

                        // categories
                        $taxonomy = 'category';

                        // get the term IDs assigned to post.
                        $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
                        // separator between links
                        $separator = ', ';

                        if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

                            $term_ids = implode( ',' , $post_terms );
                            $terms = wp_list_categories( 'echo=0&title_li=&taxonomy=' . $taxonomy . '&include=' . $term_ids );
                            $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

                            $cat_title = count($post_terms) == 1 ? 'Category' : 'Categories';
                            echo '<h2>' . $cat_title . '</h2>';
                            echo '<ul class="menu">';
                            echo  $terms;
                            echo '</ul>';
                        }
                        
                        
                        $related = new WP_Query( array(
                          'connected_type' => 'post_practice-area',
                          'connected_items' => get_queried_object(),
                          'nopaging' => false,
                        ) );


                        if($related->have_posts()){
                            ?>
                            <h2>Practice Area<?php echo $related->found_posts > 1 ? 's' : '' ?></h2>
                            <ul class="menu">
                                <?php
                                // sort parents and children
                                $related_pas = array();
                                $parent_pas = array();
                                while($related->have_posts()){
                                    $related->the_post();
                                    $related_pas[get_the_ID()] = $post;
                                    $related_pas[get_the_ID()]->echoed = false;

                                    if($post->post_parent > 0){
                                        if(!isset($parent_pas[$post->post_parent]))
                                            $parent_pas[$post->post_parent] = array();
                                        $parent_pas[$post->post_parent][] = get_the_ID();
                                    }
                                }


                                // spit em out
                                foreach($related_pas as $pa_id => $pa){
                                    if($pa->echoed || ($pa->post_parent > 0 && isset($related_pas[$pa->post_parent])))
                                        continue;


                                    echo '<li><a href="' . get_bloginfo('url') . '/posts-by-practice-area/?practice-area-filter=' . $pa->post_name . '">' . $pa->post_title . '</a>';

                                    if(isset($parent_pas[$pa->ID]) && count($parent_pas[$pa->ID]) > 0){
                                        echo '<ul class="menu children">';

                                        foreach($parent_pas[$pa->ID] as $child_pa_id){
                                            $child_pa = $related_pas[$child_pa_id];
                                            echo '<li><a href="' . get_bloginfo('url') . '/posts-by-practice-area/?practice-area-filter=' . $child_pa->post_name . '">' . $child_pa->post_title . '</a></li>';
                                            $related_pas[$child_pa_id]->echoed = true;
                                        }

                                        echo '</ul>';
                                    }

                                    echo '</li>';
                                    $related_pas[$pa_id]->echoed = true;
                                }
                                ?>
                            </ul>

                            <?php
                            wp_reset_query();
                        }

                        include('partial-blog-section-sidebar-stuff.php');
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