<?php get_header(); ?>

<?php get_template_part('include', 'header'); ?>

<article>
    <section class="article">
        <?php if (has_post_thumbnail()): ?>
            <div class="imgarticle" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div> <!-- Boite div de l'image -->


        <?php endif ?>
        <h1><?php the_title(); ?></h1>
        <br>

        <?php
        $cats = get_the_category();
        if (has_category()) {
            echo 'Catégories : ';
            foreach ($cats as $cat) {
                echo '<a href="' . get_category_link($cat->cat_ID) . '" title="' . $cat->name . '">' . $cat->name . '</a> ';
            }
        }
        ?>
        <br>
        <?php
        $tags = get_the_tags();
        if (get_the_tags()) {
            echo 'Etiquettes : ';
            foreach ($tags as $tag) {
                echo '<a href="' . get_tag_link($tag->term_id) . '" title="' . $tag->name . '">' . $tag->name . '</a> ';
            }
        }
        ?>

        </p>

        <div><?php the_content(); ?></div>

        <!-- La grille------- -->
        <?php get_template_part('include', 'grille'); ?>
        <!-- Fin de la grille------- -->

        <!-- La lightbox------- -->
        <?php get_template_part('include', 'lightbox'); ?>
        <!-- Fin de la lightbox------- -->

        <p class="paragdate">Article publié le <?php the_time('l d F Y') ?>


            <!-- Navigation sous les articles -->
        <div class="presuiv">
            <ul>
                <li><?php previous_post_link() ?></li>
                <li><?php next_post_link() ?></li>
            </ul>
        </div>
    </section>
</article>


;<?php get_footer(); ?>