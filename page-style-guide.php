<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $pagekids = get_pages("child_of=".$post->ID."&sort_column=post_name");
    $firstchild = $pagekids[0];
    wp_redirect(get_permalink($firstchild->ID));
  }
}
?>