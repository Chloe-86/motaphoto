<section class="randomPictures">
    <h2> Vous aimerez aussi </h2>
    <?php

    $cats = array_map(function ($terms) {
        return $terms->term_id;
    }, get_the_terms(get_post(), 'categorie'));
    $args = array(
        'post__not_in' => [get_the_ID()],
        'post_type' => 'photo',
        'posts_per_page'=> '2',
        'orderby' => 'rand',
        'tax_query' => [
            [
                'taxonomy' => 'categorie',
                'terms' => $cats,
            ]
        ]
    );
  
    $query = new WP_Query($args);
    ?>
    <div class="randomPhotos">
        <?php if ($query->have_posts()): ?>
            <?php while ($query->have_posts()): ?>
                <?php $query->the_post(); ?>
                <?php the_content(); ?>
                <?php if (has_post_thumbnail()): 
                   
                    $image_url =  get_the_post_thumbnail_url($id, 'front-page');
                            $image_title = get_the_title();
                            $post_date= get_the_date('Y');
        
                    ?>
                            <div class="container-lightbox">
                                <div class="pre-lightbox-text">
                                    <div class="camera-top">
                                    <?php
                                        $terms = get_the_terms($id, 'categorie');
                                        if ($terms && !is_wp_error($terms)) {
                                            $term_names = array();
                                            foreach ($terms as $term) {
                                                $term_names[] = $term->name;
                                            }
                                            $category_names = implode(', ', $term_names);
                                        }
                                        ?>
                                        <button id="btn" class="image-link" data-image-url="<?php echo esc_attr($image_url); ?>" data-image-title="<?php echo esc_attr($image_title); ?>" data-category="<?php echo esc_attr($category_names); ?>" data-date="<?php echo esc_attr($post_date); ?>">
                                            <img class="lightbox-link-camera" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/fullscreen.svg" alt="">
                                    </button>
                                    </div>

                                    <div class="eye">
                                        <a href="<?php echo esc_url(get_permalink()); ?>">
                                            <img id="lightbox-link-eye" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/eye.svg" alt="">
                                        </a>
                                    </div>
                                    <div class="txt-bottom">
                                        <p><?php the_title() ?></p>
                                        <p><?php echo the_terms($id, 'categorie', false); ?></p>
                                    </div>
                                </div>
                                <div class="lightbox-img-block">
                                    <img class="" src="<?php echo esc_url($image_url); ?>" alt="">
                                </div>
                              
                            </div>
                <?php endif; ?>

            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>Désolé, aucun article ne correspond à cette requête</p>
    <?php endif;
        wp_reset_query();
        ?>
</section>