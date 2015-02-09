<h2>Browse Categories</h2>
<ul class="menu">
<?php
wp_list_categories('title_li=');
?>
</ul>

<h2>Browse Practice Areas</h2>
<ul class="menu">
<?php
$sidebar_pas = new WP_Query( array(
    'post_type' => 'practice-area',
    'post_parent' => 0,
    'posts_per_page' => -1,
    'order_by' => 'title',
    'order' => 'ASC'
) );

while($sidebar_pas->have_posts()){
	$sidebar_pas->the_post();

	echo '<li><a href="' . get_bloginfo('url') . '/posts-by-practice-area/?practice-area-filter=' . $post->post_name . '">' . get_the_title() . '</a></li>';
}
?>
</ul>