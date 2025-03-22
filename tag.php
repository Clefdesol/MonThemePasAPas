<?php get_header(); ?>

<?php get_template_part('include','header'); ?>

<?php get_footer(); ?>

<article>
    <h1>Liste des articles liés à l'étiquette: <?php single_tag_title(); ?></h1>

    <?php if (tag_description()): ?>
        <div class="desccategory"><?= tag_description(); ?></div>
        <?php endif; ?> <!-- Calss desccategory dans global-style.css -->
        <?php get_template_part('include','articleListe'); ?>

</article>