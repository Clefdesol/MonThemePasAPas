<article>
    

    <?php if (have_posts()): ?>

        <?php while (have_posts()): the_post(); ?>
            <div class="card">
                 
            <?php if (has_post_thumbnail()):?>

                <?php the_post_thumbnail('', [
                    'class' => 'image',
                    'alt'   => 'get_the_title',
                ]) ?>
                <?php else: ?>
                    <img class="image" src="<?= get_template_directory_uri();  ?>/assets/images/Logo_base.png" alt="Image par défault">

                <?php endif ?>

                <section>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <h4><a href="<?php the_permalink(); ?>">Lire la suite</a></h4>
                    <p class=""><strong>Auteur</strong><em><?php the_author(); ?></em></p>
                </section>

            </div>

        <?php endwhile; ?>


        <!-- La Pagination -->
        <section class="pagination"> <!-- class dans le fichier card-style.css -->
            <?php the_posts_pagination(); ?>
        </section>

        <!-- FIN La Pagination -->
        


    <?php else: ?>
        <p class="empty">Il n'y a pas d'article disponible</p>
    <?php endif; ?>
</article>