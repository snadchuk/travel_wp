<section class="section">
    <div class="container">
        <div class="row">
            <div class="section-wrap">
                <div class="section-title">
                    <h2><?php the_field('hotels_title', 55); ?></h2>
                </div>
                <div class="section-tabs">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <?php
                            $terms = get_terms([
                                'taxonomy' => 'hotels_cat',
                                'hide_empty' => false,
                            ]);
                             ?>
                            <?php

                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) { ?>

                                    <a data-toggle="tab" href="#<?php echo $term->slug; ?>" role="tab"
                                       aria-selected="false">

                                        <?php echo $term->name; ?>
                                    </a>
                                    <?php
                                }
                            } ?>

                        </div>
                    </nav>
                </div>
            </div>

            <div class="tab-content" id="nav-tabContent">


                <?php

                if ($terms && !is_wp_error($terms)) {
                    for ($i = 0; $i < count($terms); $i++) {
                        $term = $terms[$i];
                        ?>
                        <div class="tab-pane fade show <?= $i == 0 ? 'active' : '' ;?>"
                             id="<?php echo $term->slug; ?>" role="tabpanel">
                            <div class="row">
                            <?php
                            $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $params = array(
                                'posts_per_page' => -1, // количество постов на странице
                                'post_type' => 'hotels', // тип постов
                                'taxonomy' => 'hotels_cat',
                                'term' => $term -> slug,
                                'paged' => $current_page, // текущая страница
                            );
                            query_posts($params);
                            $wp_query->is_archive = true;
                            $wp_query->is_home = false;
                            $index = 0;
                            while (have_posts()) : the_post(); ?>


                            <div class="col-xs-12 col-md-4">
                                <div class="card">
                                    <img src="<?php the_field('hotels_image'); ?>" alt="">
                                    <div class="card-info">
                                        <h4><?php the_field('card_title'); ?></h4>
                                        <div class="d-flex justify-content-between">
                                            <p class="sub-title"><?php the_field('distance'); ?></p>
                                            <p class="sub-title"><?php the_field('wifi'); ?></p>
                                        </div>
                                        <a href="#" class="pink-btn"><?php the_field('hotels_price'); ?> $</a>
                                    </div>
                                </div>
                            </div>


                                <!-- DivTable -->
                                <?php
                                $index++;
                            endwhile;
                            // функция постраничной навигации
                            ?>
                                <span>                            </div>
                            </span>                        </div>
                        <?php
                    }
                } ?>
            </div>

            <div class="all-section">
                <a href="#">See all hotels</a>
            </div>
        </div>
    </div>
</section>

