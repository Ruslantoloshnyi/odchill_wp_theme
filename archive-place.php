<?php get_header(); ?>

<?php
if (is_tax('type')) {
    $current_term = get_queried_object(); // Get current taxonomy term

    // Create a WP_Query to display posts for this term only
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'place',
        'posts_per_page' => 6,
        'paged' => $paged,
        'orderby' => 'date',
        'tax_query' => array(
            array(
                'taxonomy' => 'type',
                'field' => 'term_id',
                'terms' => $current_term->term_id,
            ),
        ),
    );

    $query = new WP_Query($args);
?>
    <section>
        <div class="container">
            <div class="content__background">
                <?php
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>

                        <div class="wrapper">
                            <div class="content">
                                <div class="content__image">
                                    <?php the_post_thumbnail('custom-large'); ?>

                                    <h2 class="content__head image__head"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
                <div class="pagination">
                    <?php
                    $args = [
                        'total'        => $query->max_num_pages,
                        'current'      => $paged,
                        'show_all'     => False,
                        // 'end_size'     => 1,
                        // 'mid_size'     => 2,
                        'prev_next'    => True,
                        'prev_text'    => __('&#171;'),
                        'next_text'    => __('&#187;'),
                    ];

                    echo paginate_links($args);
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
} else {
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'place',
        'posts_per_page' => 6,
        'paged' => $paged,
        'orderby' => 'date',
    );

    $query = new WP_Query($args); ?>
    <section>
        <div class="container">
            <div class="content__background">
                <?php
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="wrapper">
                            <div class="content">
                                <div class="content__image">
                                    <?php the_post_thumbnail('custom-large'); ?>
                                    <h2 class="content__head image__head"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
                                </div>
                            </div>
                        </div>

                <?php
                    endwhile;
                else :
                    echo '<p>Записи не найдены.</p>';
                endif; ?>
                <div class="pagination">
                    <?php
                    $args = [

                        'total'        => $query->max_num_pages,
                        'current'      => $paged,
                        'show_all'     => False,
                        // 'end_size'     => 1,
                        // 'mid_size'     => 2,
                        'prev_next'    => True,
                        'prev_text'    => __('&#171;'),
                        'next_text'    => __('&#187;'),
                    ];

                    echo paginate_links($args);
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>

<?php get_footer(); ?>