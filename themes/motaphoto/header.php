<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class('site'); ?>>
<?php include('modal.php'); ?>
    
    <header class="site-header">

        <?php
        // Vérifier si le logo personnalisé est défini
        if (has_custom_logo()) {
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');

            // Vérifier si l'image du logo existe
            if ($logo_image) {
        ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <h1><img src="<?php echo esc_url($logo_image[0]); ?>" alt="Logo"></h1>
                </a>
            <?php
            }
        } else {
            // Afficher le texte du site si aucun logo personnalisé n'est défini
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        <?php
        }
        ?>

        <nav>
            <div class="toggle"></div>
            <?php
            $menu_args = array(
                'theme_location' => 'main', // Emplacement du menu à afficher
                'container' => 'ul', // Ne pas afficher le conteneur <div> par défaut
                'echo' => false, // Ne pas afficher directement le menu, nous allons le stocker dans une variable
                'items_wrap' => '<ul>%3$s</ul>', // Format personnalisé pour les éléments <li> avec un conteneur <ul>
                'menu_class' => 'site__header',
            );

            $menu = wp_nav_menu($menu_args);
            echo $menu;
            ?>

        </nav>
    </header>

    <?php wp_body_open(); ?>