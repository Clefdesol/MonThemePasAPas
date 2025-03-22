<header>
    <div id="logo">
        <a href="<?= get_permalink(get_page_by_path('Accueil'))  ?>"><img src="<?= get_template_directory_uri();  ?>/assets/images/logo-60x60.png" alt="logo"></a>
    </div>

    <?php
    wp_nav_menu([
        'menu' => 'menu 1',
        'theme_location' => 'header',
        'container' => 'nav',
        'container_class' => '',
        'container_id' => '',
        'menu_class' => '',
    ]);
    ?>

    <div id="burger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</header>