<?php
/*
Template Name: Все Типы Записей
Template Post Type: post, beach, park, architecture
*/
get_header();
?>

<section>
    <div class="container">
        <div class="content__background">
            <?php
            $post_types = array('beach', 'park', 'architecture');
            $args = array(
                'post_type' => $post_types,
                'orderby' => 'date',
                'posts_per_page' => -1, // Количество постов на странице                    
            );

            $news_query = new WP_Query($args);

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
            ?>
                    <div class="wrapper">
                        <div class="content">
                            <div class="content__image">
                                <img src="../../../img/image_1.jpg" alt="">
                                <h2 class="content__head image__head">The 10 most beautiful places you should visit in your life
                                </h2>
                                <div class="content_author">
                                    <img src="../../../img/autor_1.png" alt="">
                                    <div>
                                        <div class="content_author__name author__text">Luke Cage</div>
                                        <div class="content_author__date author__text">11.02.2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="content__text text">
                                <div>Vestibulum ut placerat nisl. Cras sed purus tellus. Pellentesque
                                    habitant
                                    morbi
                                    tristique senectus et netus et malesuada fames ac turpis egestas. Duis posuere nisi sit amet
                                    neque
                                    finibus
                                    vestibulum. Vivamus at leo ut turpis posuere molestie. Nullam at turpis nec metus pharetra
                                    bibendum.
                                    Vivamus
                                    id urna et leo blandit consequat...</div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>