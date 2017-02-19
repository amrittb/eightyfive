<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?php wp_title( '|', true, 'right' ); ?>
    </title>

    <link rel="favicon" href="<?php echo get_option('favicon'); ?>">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="js/vendor/html5shiv.js"></script>
    <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

    <?php wp_head();?>

    <script>
        $(document).ready(function() {
            $(".parallax").parallax();
        });
    </script>

    <style>
        .primary-bg-color {
            background: <?php echo ot_get_option("primary-color"); ?>;
        }

        .secondary-bg-color {
            background: <?php echo ot_get_option("secondary-color"); ?>;
        }

        nav a, nav ul a {
            color: <?php echo ot_get_option("nav-fg-color"); ?>;
        }

        nav a:hover, nav a:focus, nav ul a:hover, nav ul a:focus {
            color: <?php echo ot_get_option("nav-hover-color"); ?>;
            text-decoration: none;
        }

        .header {
            background-image: url('<?php echo ot_get_option("header-bg-img"); ?>');
        }

        .header h1, .header h5 {
            color: <?php echo ot_get_option("header-fg-color"); ?>;
        }

        a {
            color: <?php echo ot_get_option("color-primary"); ?>;
        }

        a:hover, a:focus {
            color: <?php echo ot_get_option("color-primary-dark"); ?>;
        }

        .btn {
            background-color: <?php echo ot_get_option("color-accent"); ?>;
            color: <?php echo ot_get_option("button-text-color"); ?>;
        }

        .btn:hover, .btn:focus {
            background-color: <?php echo ot_get_option("color-accent-dark"); ?>;
            color: <?php echo ot_get_option("button-text-color"); ?>;
        }
    </style>
</head>
<body>
<nav>
    <div class="nav-wrapper">
        <div class="container">
            <a href="<?php echo get_home_url(); ?>">
                <img src="<?php echo ot_get_option('nav-brand'); ?>" class="brand-logo responsive-img" alt="<?php echo ot_get_option('nav-sidebar-title'); ?>">
            </a>

            <?php $isNavAlwaysCollapsed = (ot_get_option("nav-always-collapsed") == "on"); ?>

            <a href="#" data-activates="mobile-nav" class="right button-collapse<?php echo ($isNavAlwaysCollapsed)?' show-on-large':''; ?>"><i class="material-icons">menu</i></a>
            <?php
            if( ! $isNavAlwaysCollapsed){
                wp_nav_menu(array('theme_location'=>'header','menu_class'=>'right hide-on-med-and-down','container'=>'','menu_id' => '','fallback_cb'=> false));
            }
            ?>

            <?php
            $theme_locations = get_nav_menu_locations();

            $menu = get_term( $theme_locations['header'], 'nav_menu' );

            if($menu->count != 0) {
                echo '<ul class="side-nav" id="mobile-nav">';

                echo
                    '<li>
                                <div class="userView">
                                    <div class="background blue-grey darken-2">
                                    </div>
                                    <a>
                                        <span class="white-text">
                                            '. ot_get_option('nav-sidebar-title') .'
                                        </span>
                                    </a>
                                </div>
                            </li>';

                foreach(wp_get_nav_menu_items($menu->name) as $item) {
                    echo '<li><a href="' . $item->url . '" class="waves-effect">' . $item->title . '</a></li>';
                }

                echo '</ul>';
            }
            ?>
        </div>
    </div>
</nav>

<div class="header parallax-container
    <?php
        if(ot_get_option("header-bg-overlay") == "on") {
            echo " header-filter ";
        }

        echo (is_front_page())?'header-home':'header-normal'; ?>"
    <?php if((is_single() || is_page()) && has_post_thumbnail()) : ?>
        style="background-image: url('<?php the_post_thumbnail_url(); ?>');"
     <?php endif; ?>
>
    <div class="container center parallax">
        <h1 class="text--thin center">
            <?php
                if(is_front_page()) {
                    echo ot_get_option("header-title-home");
                }

                if(!is_front_page() && !is_single() && (is_home() || is_category() || is_author())) {
                    echo ot_get_option("header-title-post-list");
                }

                if(!is_front_page() && (is_single() || is_page())) {
                    the_title();
                }
            ?>
        </h1>
        <?php if(is_front_page()): ?>
            <h5 class="text--light center">
                <?php echo ot_get_option("header-description-home"); ?>
            </h5>
            <a href="<?php echo ot_get_option("header-home-cta-link"); ?>"
               class="btn btn-large waves-effect waves-light">
                <?php echo ot_get_option("header-home-cta-text"); ?>
            </a>
        <?php endif; ?>
    </div>
</div>

<div class="main main-raised">
    <div class="container">