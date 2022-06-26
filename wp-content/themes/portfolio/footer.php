<?php global $redux_demo; ?>
<div id="page_bottom">
    <!-- BEGIN ABOVE_FOOTER -->
    <section id="above_footer">
        <div class="wrapper above_footer_boxes page_text">

		<?php ( get_sidebar( 'footer' ) ); ?>

        </div>
    </section>
    <!-- END ABOVE_FOOTER -->

    <!-- BEGIN FOOTER -->
    <footer id="footer">
        <div class="wrapper">
            <p class="copyrights">Copyright © <?php echo date('Y');?> by TheSame. All rights reserved</p>
            <a href="#page" class="up">
                <span class="arrow"></span>
                <span class="text">top</span>
            </a>
        </div>
    </footer>
    <!-- END FOOTER -->
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>