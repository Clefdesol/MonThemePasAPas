<?php get_header(); ?>

<?php get_template_part('include','header'); ?>


<!-- Les styles sont dans global-style.css -->
<article>
    <p class="introTitreCat">Catégorie:</p>
    <h1 class="titreCat"><?php single_cat_title(); ?></h1>

    <?php if (category_description()): ?>
        <div class="desccategory"><?= category_description(); ?></div>
        <div class="h15"></div>
        <?php endif; ?> <!-- Calss desccategory dans global-style.css -->
        <?php get_template_part('include','articleListe'); ?>

</article>

<?php get_footer(); ?>