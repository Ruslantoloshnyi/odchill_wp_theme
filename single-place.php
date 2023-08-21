<?php get_header(); ?>
<?php
while (have_posts()) :
    the_post(); ?>
    <section>
        <div class="container">
            <div class="single__wrapper">
                <div class="content">
                    <div class="content__image">
                        <?php the_post_thumbnail('custom-large'); ?>
                        <h2 class="content__head image__head"><?php the_title(); ?></h2>
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
                        <div><?php the_content(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="carousel_block">
            <div class="carousel">
                <?php
                if (have_rows('place_slider')) :
                    while (have_rows('place_slider')) : the_row();
                        $img = get_sub_field('place_slider_image');

                        $image = wp_get_attachment_image($img, 'custom-large', false, ['class' => 'carousel__img']);
                ?>
                        <div class="carousel__item">
                            <?php echo $image; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>