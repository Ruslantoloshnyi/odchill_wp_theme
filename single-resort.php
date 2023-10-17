 <?php get_header(); ?>

 </div>

 <?php
    $image_1 = wp_get_attachment_image(get_field('resort_share_image_1'), 'full');
    $image_2 = wp_get_attachment_image(get_field('resort_share_image_2'), 'full');
    $image_3 = wp_get_attachment_image(get_field('resort_share_image_3'), 'full');

    ?>
 <?php
    while (have_posts()) :
        the_post(); ?>

     <div class="header__link">
         <div>
             <h1 class="header__heading heading-resort"><?php the_title(); ?></h1>
         </div>
     </div>
     <section class="resort">
         <div class="container">
             <div class="single__wrapper">
                 <div class="content">
                     <div class="content__image">
                         <a class="inactive__link" href="<?php echo $main_image_url; ?>"><?php the_post_thumbnail('custom-large'); ?></a>
                         <h2 class="content__head image__head"></h2>
                         <div class="content_author">

                             <div>
                                 <div class="content_author__name author__text"></div>
                                 <div class="content_author__date author__text"></div>
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
                    if (have_rows('resort_slider')) :
                        while (have_rows('resort_slider')) : the_row();
                            $img = get_sub_field('resort_image');
                            $img_url = wp_get_attachment_image_url($img, 'full');
                            $image = wp_get_attachment_image($img, 'custom-large', false, ['class' => 'carousel__img']);
                    ?>
                         <div class="carousel__item">
                             <a href="<?php echo $img_url; ?>"><?php echo $image; ?></a>
                         </div>
                     <?php endwhile; ?>
                 <?php endif; ?>
             </div>
         </div>
         <div class="map_block">
             <div class="map_block__heading">Місцеположення</div>
             <div class="map-responsive">
                 <?php echo get_field('resort_map'); ?>
             </div>
         </div>
     </div>
     <section>
         <div class="container">
             <div class="social-share">
                 <div class="social-share__head text">
                     <h3><?php echo get_field('resort_share_head'); ?></h3>
                 </div>
                 <div class="social-share__link">
                     <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><?php echo $image_1; ?></a>
                     <span class="tooltip">Поділитись у Facebook</span>
                 </div>
                 <div class="social-share__link">
                     <a href="https://telegram.me/share/url?url=https://<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank"><?php echo $image_2; ?></a>
                     <span class="tooltip">Поділитись у Telegram</span>
                 </div>
                 <div class="social-share__link">
                     <a href="viber://forward?text=<?php the_title(); ?>: <?php the_permalink(); ?>" target="_blank"><?php echo $image_3; ?></a>
                     <span class="tooltip">Поділитись у Viber</span>
                 </div>
             </div>
         </div>
     </section>
     <section id="read_section">
         <div class="container">
             <?php $link = get_field('resort_button_link'); ?>
             <div class="read">
                 <a class="btn" href="<?php if ($link) :
                                            echo get_field('resort_button_link');
                                        endif; ?>"><?php echo get_field('resort_button_head'); ?></a>
             </div>
         </div>
     </section>

 <?php endwhile; ?>



 <?php get_footer(); ?>