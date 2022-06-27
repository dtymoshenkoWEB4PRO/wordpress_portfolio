<!DOCTYPE HTML>
<html>
<head>

    <title>The Same</title>

    <meta charset="UTF-8">
</head>
<body>
<div id="page">
    <div id="page_top">
        <div id="page_top_in">
            <!-- BEGIN TITLEBAR -->
            <header id="titlebar">
                <div class="wrapper">
                    <a id="logo" href="#"><span><?php  the_custom_logo() ?></span></a>
                    <div id="titlebar_right">
                        <ul id="social_icons">
	                        <?php ( get_sidebar( 'social-networks' ) ); ?>
                        </ul>
                        <div class="clear"></div>
		                    <?php
		                    wp_nav_menu(
			                    array(
				                    'theme_location'  => 'menu-1',
				                    'menu_id'         => 'top_menu',
				                    'container'       => 'ul',
				                    'container_class' => 'nav-primary-menu',

			                    )
		                    );
		                    ?>
                    </div>
                    <div class="clear"></div>
                </div>
	            <?php wp_head(); ?>
            </header>
            <!-- END TITLEBAR -->