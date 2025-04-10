<?php get_header(); ?>

<!-- <?php get_template_part('include', 'header'); ?> -->

<div class="header-sans-menu">
    <img class="logo-sans_menu" src="<?= get_template_directory_uri();  ?>/assets/images/logo-60x60.png" alt="logo">
</div>

<article>   
    <section class="article">
        <?php if (post_password_required()): ?>
            <!-- Affiche le formulaire pour entrer le mot de passe -->
            <?php echo get_the_password_form(); ?>
        <?php else: ?>
            <!-- Affichage normal si l'article n'est pas protégé -->
            <?php if (has_post_thumbnail()): ?>
                <div class="imgarticle" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div> <!-- Boite div de l'image -->
            <?php endif; ?>

            <h1><?php the_title(); ?></h1>
            <br>

            <div><?php the_content(); ?></div>

            <!-- La grille------- -->
            <?php get_template_part('include', 'grille'); ?>
            <!-- Fin de la grille------- -->

            <!-- La lightbox------- -->
            <?php get_template_part('include', 'lightbox'); ?>
            <!-- Fin de la lightbox------- -->

            <p class="paragdate">Article publié le <?php the_time('l d F Y') ?></p>
        <?php endif; ?>
    </section>
</article>

<?php get_footer(); ?>
