<?php
require 'wp-config.php';
function showImages()
{
    error_reporting(0);
    global $post;
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $firstImg = $matches [1] [0];
    if (empty($firstImg)) {
        $firstImg = '//namikarifoglu.com/assets/images/profile.jpg';
    }
    return $firstImg;
}

?>
<div id="blog-slide" class="owl-carousel">
    <?php $wpQuery = new WP_Query("showposts=20&orderby=ID");
    while ($wpQuery->have_posts()) : $wpQuery->the_post(); ?>
        <div class="item">
            <div class="blog-content">
                <div class="blog-img image-hover">
                    <a href="<?php the_permalink() ?>">
                        <img src="<?php echo showImages(); ?>" class="img-responsive" alt="blog.tetil.net">
                    </a>
                    <span class="post-date"><?php the_time('j/F/Y'); ?></span>
                </div>
                <h4>
                    <a href="<?php the_permalink() ?>" rel="bookmark"
                       title="<?php the_title_attribute(); ?>">
                        <?php the_title_attribute(); ?>
                    </a>
                </h4>
                <p></p>
            </div>
        </div>
    <?php endwhile; ?>
</div>
