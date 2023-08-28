<?php get_header(); ?>
</div>
<section <?php if (is_archive('news')) : ?>class="archive" <?php endif; ?>>
    <div class="container">
        <div class="stories">
            <h2>Featured Stories</h2>
            <div class="stories__subhead"></div>
            <div class="stories_content">
                <?php
                $args = array(
                    'post_type' => 'news',
                    'orderby' => 'date',
                    'posts_per_page' => -1, // Количество постов на странице                    
                );

                $news_query = new WP_Query($args);

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                        <div class="stories_content_block">
                            <div class="stories_content_block__image">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('custom-thumbnail') ?></a>
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
                            <div class="stories_content_block__title text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>