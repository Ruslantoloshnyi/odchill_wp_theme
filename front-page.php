<?php get_header(); ?>

<section>
    <div class="container">
        <div class="content__background">
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'type',
                'hide_empty' => false,
            ));
            if (!empty($terms)) :
                foreach ($terms as $term) :
                    $args = array(
                        'post_type' => 'place',
                        'posts_per_page' => 1,
                        'orderby' => 'rand',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'type',
                                'field' => 'term_id',
                                'terms' => $term->term_id,
                            ),
                        ),
                    );

                    $random_post = new WP_Query($args);

                    if ($random_post->have_posts()) :
                        while ($random_post->have_posts()) : $random_post->the_post(); ?>
                            <div class="wrapper">
                                <div class="content">
                                    <div class="content__image">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('custom-large'); ?></a>

                                        <h2 class="content__head image__head"><?php the_title(); ?></h2>

                                        <div class="content_author">
                                            <?php
                                            $author_id = get_the_author_meta('ID');
                                            echo get_avatar($author_id, 30);
                                            ?>
                                            <div>
                                                <div class="content_author__name author__text"><?php the_author(); ?></div>
                                                <div class="content_author__date author__text"><?php echo get_the_date('d-m-Y'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content__text text">
                                        <div><?php the_excerpt(); ?></div>
                                        <div class="content__link text"><a href="<?php the_permalink(); ?>">Читати більше &#8594;</a></div>
                                    </div>
                                </div>
                            </div>
            <?php endwhile;
                        wp_reset_postdata();
                    endif;
                endforeach;
            endif;
            ?>
        </div>
    </div>

</section>
<section id="read_section">
    <div class="container">
        <div class="read">
            <h2>Бажаєш знати більше?</h2>
            <?php $archive_place_link = get_post_type_archive_link('place'); ?>
            <a class="btn" href="<?php echo esc_url($archive_place_link); ?>">Відвідати</a>

        </div>
    </div>
</section>

</div>
<section>
    <div class="container">
        <div class="stories">
            <h2>Новини Одеси</h2>
            <div class="stories__subhead">Бажаєш прочитати наші останні новини?</div>
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
            <div class="stories_foot">
                <div class="stories_foot__text">Бажаєш читати всі наші новини?</div>
                <?php $archive_link = get_post_type_archive_link('news'); ?>
                <a href="<?php echo esc_url($archive_link); ?>">Читати всі новини</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>