<?php get_header(); ?>

<section>
    <div class="container">
        <div class="content__background">
            <?php
            $post_types = array('beach', 'park', 'architecture');

            foreach ($post_types as $post_type) :
                $args = array(
                    'post_type' => $post_type,
                    'orderby' => 'rand',
                    'posts_per_page' => 1
                );

                $random_post = new WP_Query($args);

                if ($random_post->have_posts()) :
                    while ($random_post->have_posts()) : $random_post->the_post(); ?>
                        <div class="wrapper">
                            <div class="content">
                                <div class="content__image">
                                    <?php the_post_thumbnail('custom-large'); ?>
                                    <a href="">
                                        <h2 class="content__head image__head"><?php the_title(); ?></h2>
                                    </a>
                                    <div class="content_author">
                                        <?php
                                        $author_id = get_the_author_meta('ID');
                                        echo get_avatar($author_id, 30);
                                        ?>
                                        <div>
                                            <div class="content_author__name author__text"><?php the_author(); ?></div>
                                            <div class="content_author__date author__text"><?php the_date('d-m-Y'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content__text text">
                                    <div><?php the_excerpt(); ?></div>
                                </div>
                            </div>
                        </div>
            <?php endwhile;
                    wp_reset_postdata();
                endif;
            endforeach;
            ?>
        </div>
    </div>

</section>
<section id="read_section">
    <div class="container">
        <div class="read">
            <h2>Want to read more?</h2>
            <?php $archive_link =  esc_url(get_template_directory_uri() . '/templates/all-cpts.php');
            if ($archive_link) :
            ?>
                <a class="btn" href="<?php echo $archive_link; ?>">Visit Blog Archive</a>
            <?php endif; ?>
        </div>
    </div>
</section>

</div>
<section>
    <div class="container">
        <div class="stories">
            <h2>Featured Stories</h2>
            <div class="stories__subhead">Did you read our personal favorites?</div>
            <div class="stories_content">
                <?php
                $args = array(
                    'post_type' => 'news',
                    'orderby' => 'date',
                    'posts_per_page' => 3, // Количество постов на странице                    
                );

                $news_query = new WP_Query($args);

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                        <div class="stories_content_block">
                            <div class="stories_content_block__image">
                                <?php the_post_thumbnail('custom-thumbnail') ?>
                                <div class="stories_content_block_author">
                                    <?php
                                    $author_id = get_the_author_meta('ID');
                                    echo get_avatar($author_id, 30);
                                    ?>
                                    <div>
                                        <div class="stories_content_block_author__name author__text"><?php the_author(); ?></div>
                                        <div class="stories_content_block_author__date author__text"><?php echo get_the_date('d-m-Y'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>">
                                <div class="stories_content_block__title text"><?php the_title(); ?></div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <div class="stories_foot">
                <div class="stories_foot__text">Want to read all of our stories?</div>
                <?php $archive_link = get_post_type_archive_link('news'); ?>
                <a href="<?php echo esc_url($archive_link); ?>">Read the full blog</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>