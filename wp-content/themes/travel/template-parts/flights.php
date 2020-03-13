<section class="section">
    <div class="container">
        <div class="row">
            <div class="section-wrap">
                <div class="section-title">
                    <h2><?php the_field('flights_title'); ?></h2>
                </div>
                <div class="section-tabs">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <?php
                            $terms = get_terms([
                                'taxonomy' => 'flights_cat',
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
            <div class="section-wrap-nav">
                <table>
                    <tbody>
                    <tr>
                        <td>Airline</td>
                        <td>Date</td>
                        <td>Departure</td>
                        <td>Arrival</td>
                        <td>Time</td>
                        <td>Price</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-content" id="nav-tabContent">


                <?php

                if ($terms && !is_wp_error($terms)) {
                    for ($i = 0; $i < count($terms); $i++) {
                        $term = $terms[$i];
                        ?>
                        <div class="tab-pane fade show <?= $i == 0 ? 'active' : '' ;?>"
                             id="<?php echo $term->slug; ?>" role="tabpanel">

                            <?php
                            $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $params = array(
                                'posts_per_page' => -1, // количество постов на странице
                                'post_type' => 'flights', // тип постов
                                'taxonomy' => 'flights_cat',
                                'term' => $term -> slug,
                                'paged' => $current_page, // текущая страница
                            );

                            query_posts($params);
                            $wp_query->is_archive = true;
                            $wp_query->is_home = false;
                            $index = 0;
                            while (have_posts()):
                                the_post();
                                ?>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="logo">
                                                <img src="<?php the_field('airline_logo'); ?>" alt="">
                                            </div>
                                            <div class="text">
                                                <p><?php the_field('airline_title'); ?></p>
                                                <p class="sub-title"><?php the_field('airline_subtitle'); ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text">
                                                <p><?php the_field('date_title'); ?></p>
                                                <p class="sub-title"><?php the_field('date_subtitle'); ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text">
                                                <p><?php the_field('departure_title'); ?></p>
                                                <p class="sub-title"><?php the_field('departure_subtitle'); ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text">
                                                <p><?php the_field('arrival_title'); ?></p>
                                                <p class="sub-title"><?php the_field('arrival_subtitle'); ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text">
                                                <p><?php the_field('time_title'); ?></p>
                                                <p class="sub-title"><?php the_field('time_subtitle'); ?></p>
                                            </div>
                                        </td>
                                        <td><a href="#" class="pink-btn"><?php the_field('price'); ?>$</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- DivTable -->
                                <?php
                                $index++;
                            endwhile;
                            // функция постраничной навигации
                            ?>
                        </div>
                        <?php
                    }
                } ?>
            </div>

            <div class="all-section">
                <a href="#">See all flights</a>
            </div>
        </div>
    </div>
</section>

