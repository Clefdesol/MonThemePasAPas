<?php get_header(); ?>
<?php get_template_part('include', 'header'); ?>

<section id="slider">
    <div>
        <h4>Orion</h4>
        <p>Vous souhaite la bienvenue</p>
    </div>

</section>

<section id="contentfrontpage">
    <?php the_content(); ?>
    <br>
    <p><a href="<?= get_permalink(get_page_by_path('page-des-articles')); ?>">Lire les dernières actualités</a></p>

    <!-- Afficher les articles d'une catégorie -->
    <h2>Les articles par catégories</h2>

<?php
function display_category_hierarchy($parent = 0, $level = 2) {
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC',
        'parent' => $parent
    );
    $categories = get_categories($args);

    foreach ($categories as $category) {
        echo '<h' . $level . '>' . $category->name . '</h' . $level . '>';
        
        // Obtenir les IDs des sous-catégories
        $subcategories = get_categories(array('parent' => $category->term_id));
        $subcategory_ids = wp_list_pluck($subcategories, 'term_id');
        
        // Afficher les articles uniquement si la catégorie n'a pas de sous-catégories
        if (empty($subcategory_ids)) {
            $posts_args = array(
                'cat' => $category->term_id,
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC'
            );
            
            $query = new WP_Query($posts_args);
            
            if ($query->have_posts()) {
                echo '<ul>';
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Aucun article dans cette catégorie.</p>';
            }
            
            wp_reset_postdata();
        }
        
        // Appel récursif pour les sous-catégories
        display_category_hierarchy($category->term_id, $level + 1);
    }
}

// Appel initial de la fonction pour afficher toute la hiérarchie
display_category_hierarchy();
?>





</section>

<?php get_footer(); ?>