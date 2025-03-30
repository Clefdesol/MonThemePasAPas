<?php
/* ******* Version du thème */
define('VERSION', '1.2.01');

/* ******* Charger les styles et les scripts */
function tutocarlapp_cssjs(){

    // Charger le fichier global-style.css
    wp_enqueue_style('global-style', get_template_directory_uri().'/assets/css/global-style.css', [],VERSION, 'all');

    // Charger le fichier header-style.css
    wp_enqueue_style('header-style', get_template_directory_uri().'/assets/css/header-style.css', [],VERSION, 'all');

    // Charger le fichier card-style.css
    wp_enqueue_style('card-style', get_template_directory_uri().'/assets/css/card-style.css', [],VERSION, 'all');

    // Charger le fichier single-style.css
    wp_enqueue_style('single-style', get_template_directory_uri().'/assets/css/single-style.css', [],VERSION, 'all');

     // Charger le fichier slider-style.css
     wp_enqueue_style('slider-style', get_template_directory_uri().'/assets/css/slider-style.css', [],VERSION, 'all');

     // Charger le fichier page-style.css
     wp_enqueue_style('page-style', get_template_directory_uri().'/assets/css/page-style.css', [],VERSION, 'all');

          // Charger le fichier footer-style.css
          wp_enqueue_style('footer-style', get_template_directory_uri().'/assets/css/footer-style.css', [],VERSION, 'all');

    // Charger le fichier documentation-style.css
    wp_enqueue_style('documentation-style', get_template_directory_uri().'/assets/css/documentation-style.css', [],VERSION, 'all');

      // Charger le fichier grille-style.css
      wp_enqueue_style('grille-style', get_template_directory_uri().'/assets/css/grille-style.css', [],VERSION, 'all');

        // Charger le fichier lightbox-style.css
        wp_enqueue_style('lightbox-style', get_template_directory_uri().'/assets/css/lightbox-style.css', [],VERSION, 'all');




    // Charger le fichier header-script.js
    wp_enqueue_script('header-script', get_template_directory_uri().'/assets/js/header-script.js', [],VERSION, true);

    // Charger le fichier lightbox-script.js
    wp_enqueue_script('lightbox-script', get_template_directory_uri().'/assets/js/lightbox-script.js', [],VERSION, true);
}


add_action('wp_enqueue_scripts','tutocarlapp_cssjs');


/* ****** Fonction d'entête */

function tutocarlapp_entete(){
    remove_action('wp_head', 'wp_generator');
        //supprime le meta name generator
    
    add_theme_support('title-tag');
        //Ajouter le title de la page

        add_theme_support('menus');
        //register_nav_menu('header', 'Navigation du header');
        register_nav_menus([ // Avec le s je peut mettre plusieurs emplacements
            'header' => 'Navigation du header',
            'footer' => 'Navigation du footer'
        ]);
        //Ajouter les menus

        add_theme_support('post-thumbnails');
        //Ajouter l'image mise en avant'

        /* add_filter('wp_get_attachment_image_attributes', function($attr) {
            unset($attr['width'], $attr['height']);
            return $attr;
        }); */
        /* Pour éviter que WordPress ajoute automatiquement les attributs `width` et `height` aux balises `<img>`, vous pouvez utiliser un filtre dans votre thème. Ajoutez ce code dans le fichier `functions.php` de votre thème : */
        
}
add_action('after_setup_theme', 'tutocarlapp_entete');
?>


