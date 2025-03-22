<?php get_header(); ?>

<header>
    <div id="logo">
        <a href="#"><img src="<?= get_template_directory_uri();  ?>/assets/images/logo-60x60.png" alt="logo"></a>
    </div>
    <!--  <nav>
        <ul>
            <li><a href="#">link 1</a></li>
            <li><a href="#">link 2</a></li>
            <li><a href="#">link 3</a></li>
            <li><a href="#">link 4</a></li>
        </ul>
    </nav> -->

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

<section class="doc">
    <h1><span>Documentation</span> Créer thème wordpress</h1>

    <table>
        <caption>Les articles</caption>
        <tr>
            <th>fonction</th>
            <th>description</th>
        </tr>
        <tr>
            <td>the_title()</td>
            <td>Affiche le titre de l'article</td>
        </tr>
        <tr>
            <td>the_author()</td>
            <td>Affiche l'auteur de l'article</td>
        </tr>
        <tr>
            <td>the_category()</td>
            <td>Affiche la catégorie de l'article</td>
        </tr>
        <tr>
            <td>the_excerpt()</td>
            <td>Affiche un extrait de l'article</td>
        </tr>
        <tr>
            <td>the_content()</td>
            <td>Affiche le contenu de l'article</td>
        </tr>
        <tr>
            <td>the_time()</td>
            <td>Affiche la date et l'heure de l'article <span>Exemple: the_time('l/d/m/Y à H:i:s')</span></td>
        </tr>
        <tr>
            <td>the_permalink()</td>
            <td>Défini le lien menant à l'article</td>
        </tr>
        <tr>
            <td>the_post_thumbnail()</td>
            <td>Affiche l'image mise en avant de l'article</td>
        </tr>
        <tr>
            <td>the_posts_pagination()</td>
            <td>Crée une pagination pour une liste d'article</td>
        </tr>
        <tr>
            <td>previous_post_link()</td>
            <td>Affiche un lien menant sur l'article précédent</td>
        </tr>
        <tr>
            <td>next_post_link()</td>
            <td>Affiche un lien menant sur l'article suivant</td>
        </tr>
    </table>

    <table>
        <caption>Les catégories</caption>
        <tr>
            <th>fonction</th>
            <th>description</th>
        </tr>
        <tr>
            <td>$cats = get_the_category()</td>
            <td>Stocke les catégories à appliquer à une boucle foreach</td>
        </tr>
        <tr>
            <td>$cat->cat_ID</td>
            <td>Affiche l'identifiant de la catégorie depuis la boucle foreach</td>
        </tr>
        <tr>
            <td>$cat->name</td>
            <td>Affiche le nom de la catégorie depuis la boucle foreach</td>
        </tr>
        <tr>
            <td>get_category_link()</td>
            <td>Défini le lien menant à la catégorie <span>Prend pour paramètre $cat->cat_ID</span></td>
        </tr>
        <tr>
            <td>single_cat_title()</td>
            <td>Affiche le nom de la catégorie courante</td>
        </tr>
        <tr>
            <td>category_description</td>
            <td>Affiche la description de la catégorie courante <span>Affichage via un echo</span></td>
        </tr>
    </table>

    <table>
        <caption>Les étiquettes</caption>
        <tr>
            <th>fonction</th>
            <th>description</th>
        </tr>
        <tr>
            <td>$tags = get_the_tags()</td>
            <td>Stocke les étiquettes à appliquer à une boucle foreach</td>
        </tr>
        <tr>
            <td>$tag->term_id</td>
            <td>Affiche l'identifiant de l'étiquette depuis la boucle foreach</td>
        </tr>
        <tr>
            <td>$tag->name</td>
            <td>Affiche le nom de l'étiquette depuis la boucle foreach</td>
        </tr>
        <tr>
            <td>get_tag_link()</td>
            <td>Défini le lien menant à l'étiquette <span>Prend pour paramètre $tag->term_id</span></td>
        </tr>
        <tr>
            <td>single_tag_title()</td>
            <td>Affiche le nom de l'étiquette courante</td>
        </tr>
        <tr>
            <td>tag_description()</td>
            <td>Affiche la description de l'étiquette courante<span>Affichage via un echo</span></td>
        </tr>
    </table>


    <table>
        <caption>Factoriser code</caption>
        <tr>
            <th>fonction</th>
            <th>description</th>
        </tr>
        <tr>
            <td>get_template_part()</td>
            <td>Inclu du code</td>
        </tr>
    </table>

    <pre>






    </pre>
</section>



<?php get_footer() ?>
