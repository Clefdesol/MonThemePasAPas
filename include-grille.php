<?php
/* print_r($post); */
$postId = $post->ID;
$images = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'attachment',
    'post_mime_type' => 'image/jpeg, image/jpg, image/png',
    'post_parent' => get_the_ID(),
    'order' => 'ASC', // Changez "DESC" en "ASC"
    'orderby' => 'ID'
));

if(count($images) > 0) : ?>

     <!-- Lightbox -->
        <div id="simpleLightbox">
        <div class="lightbox-content">
            <span class="close-btn">&times;</span>
            <button class="arrow left-arrow">&larr;</button>
            <img src="" alt="Image agrandie" id="lightbox-image">
            <button class="arrow right-arrow">&rarr;</button>
        </div>
    </div>

    <!-- Galerie -->

    <ul id="galerieGrille">
    <?php foreach($images as $im) : ?>
        <?php $srcImg = wp_get_attachment_image_src($im->ID, 'galerie_max'); ?>
        <li>
            <a href="<?php echo esc_url($srcImg[0]); ?>" class="lightbox-trigger">
                <div class="imageContainer">
                    <img src="<?php echo esc_url($srcImg[0]); ?>" alt="">
                </div>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>

<?php else : ?>
    <div class='pasimage'>Il n'y a pas encore d'images dans cette galerie</div>
<?php endif; ?>
