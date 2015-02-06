<h2>Browse Categories</h2>
<ul class="menu">
<?php
wp_list_categories('title_li=');
?>
</ul>

<h2>Browse Practice Areas</h2>
<ul class="menu">
<?php
wp_list_pages( array(
    'post_type' => 'practice-area',
    'title_li' => '',
    'depth' => 1
) );
?>
</ul>