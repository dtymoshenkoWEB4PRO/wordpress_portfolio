<!DOCTYPE HTML>
<html>
<head>

    <title>The Same</title>

    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory')?>/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory')?>/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory')?>/css/light.css" title="light" type="text/css" />
    <link rel="alternate stylesheet" href="<?php echo get_bloginfo('template_directory')?>/css/dark.css" title="dark" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory')?>/css/flexslider.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory')?>/css/prettyPhoto.css" type="text/css" />

    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory')?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory')?>/js/jquery.ui.min.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory')?>/js/jquery.flexslider.min.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory')?>/js/jquery.prettyphoto.min.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory')?>/js/jquery.stylesheettoggle.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory')?>/js/onload.js"></script>

    <!--[if IE]>
    <script type="text/javascript" src=<?php echo
            get_bloginfo('template_directory')?>"../portfolio/assets/js/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <link rel="stylesheet" type="<?php echo get_bloginfo('template_directory')?>text/css"
          href="../portfolio/assets/css/ie7.css"/>
    <![endif]-->
    <meta charset="UTF-8">
</head>
<body>

<!-- BEGIN STYLESHEET SWITCHER -->
<div id="stylesheet_switcher">
    <a href="#" id="switcher"></a>
    <ul id="stylesheets">
        <li>
            <a href="#" class="sheet" id="light">
                <span class="image"><img src="<?php echo get_bloginfo('template_directory')?>/gfx/stylesheet_light.jpg" alt="" /></span>
                <span class="mask"></span>
                <span class="name">Light version</span>
            </a>
        </li>
        <li>
            <a href="#" class="sheet" id="dark">
                <span class="image"><img src="<?php echo get_bloginfo('template_directory')?>/gfx/stylesheet_dark.jpg" alt="" /></span>
                <span class="mask"></span>
                <span class="name">Dark version</span>
            </a>
        </li>
    </ul>
</div>
<!-- END STYLESHEET SWITCHER -->

<!-- BEGIN PAGE -->
<div id="page">
    <div id="page_top">
        <div id="page_top_in">
            <!-- BEGIN TITLEBAR -->
            <header id="titlebar">
                <div class="wrapper">
                    <a id="logo" href="#"><span></span></a>
                    <div id="titlebar_right">
                        <ul id="social_icons">
                            <li><a href="#" class="linkedin"></a></li>
                            <li><a href="#" class="facebook"></a></li>
                            <li><a href="#" class="twitter"></a></li>
                            <li><a href="#" class="rss"></a></li>
                        </ul>
                        <div class="clear"></div>

                        <nav>
                            <ul id="top_menu">
                                <li class="current"><a href="index.php">Home</a></li>
                                <li><a href="./aboutus.htm.html">About Us</a></li>
                                <li><a href="index.php">Blog</a></li>
                                <li>
                                    <a href="#">Other</a>
                                    <div class="submenu">
                                        <ul>
                                            <li><a href="/blog-article.htm.html"><span>Single Blog</span></a></li>
                                            <li><a href="./shortcodes-columns.htm.html"><span>Columns</span></a></li>
                                            <li><a href="./shortcodes-elements.htm.html"><span>Elemantary</span></a></li>
                                            <li><a href="./shortcodes-boxes.htm.html"><span>Boxes</span></a></li>
                                            <li><a href="./shortcodes-typography.htm.html"><span>Typography</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="portfolio-single.php">Portfolio</a>
                                    <div class="submenu">
                                        <ul>
                                            <li><a href="portfolio.php#all"><span>All categories</span></a></li>
                                            <li><a href="portfolio.php#photography"><span>Photography</span></a></li>
                                            <li><a href="portfolio.php#webdesign"><span>Webdesign</span></a></li>
                                            <li><a href="portfolio.php#branding"><span>Branding</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="../portfolio/template-page/gallery.php">Gallery</a></li>
                                <li><a href="./contact.htm.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php wp_head(); ?>
            </header>
            <!-- END TITLEBAR -->