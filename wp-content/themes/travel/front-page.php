<?php
    get_header();
?>
    <section class="header" style="background-image: url('<?php the_field('image_bg') ?>')">
        <div class="container">
            <div class="row">
                <div class="header-title">
                    <h1><?php the_field('title')?></h1>
                    <p><?php the_field('sub_title')?></p>
                </div>
                <form class="form-inline md-form header-search">
                    <input type="text" placeholder="Where are you leaving from?" aria-label="">
                    <input type="text" placeholder="Where do you want to go?" aria-label="">
                    <input type="date" placeholder="Date" aria-label="Date" value="Data">
                    <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/flights' );  ?>
    <?php get_template_part( 'template-parts/hotels' );  ?>
<?php
get_footer();
