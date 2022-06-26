<div id="page_bottom">
	<!-- BEGIN ABOVE_FOOTER -->
	<section id="above_footer">
		<div class="wrapper above_footer_boxes page_text">
			<div class="box first">
				<h3>About Us</h3>
				<p>Suspendisse in faucibus lorem, pretium quis, <a href="#">lacinia aliquet</a> enim sapien et lacus tellus quis consectetuer nisl.</p>
				<p>Vestibulum tempus. Pellentesque sagittis, nunc eu odio. Suspendisse turpis at ipsum. Pellentesque placerat. Vivamus vulputate luctus.</p>
			</div>

			<div class="box second">
				<h3>Recent Posts</h3>
				<ul class="recent_posts">
					<li class="item">

						<?php
						$recent_posts = wp_get_recent_posts(array(
							'numberposts' => 3,
							'post_status' => 'publish'
						));
						foreach( $recent_posts as $post_item ) : ?>
                    <li>

                        <a class="thumbnail" href="<?php echo get_permalink($post_item['ID']) ?>">
							<?php echo get_the_post_thumbnail($post_item['ID'], 'full'); ?>
                        </a>
                        <div class="text">
                            <h4 class="title"><a href="#"><?php echo $post_item['post_title'] ?></a></h4>
                            <p class="data">
                                <span class="date"><?php echo $post_item['post_date'] ?></span>
                            </p>
                        </div>

                    </li>
					<?php endforeach; ?>
					</li>
				</ul>
			</div>

			<div class="box third">
				<h3>Categories</h3>
				<ul class="menu categories page_text">
					<li><a href="#">Webdesign (8)</a></li>
					<li>
						<a href="#">Branding (12)</a>
						<ul>
							<li><a href="#">Photography (45)</a></li>
						</ul>
					</li>
					<li><a href="#">Photomanipulation (5)</a></li>
					<li><a href="#">3D (1)</a></li>
					<li><a href="#">Others (7)</a></li>
				</ul>
			</div>

			<div class="box fourth">
				<h3>Contact Us</h3>
				<ul class="list_contact page_text">
					<li class="phone">+41 987 654 321<br />(011) 123 32 23</li>
					<li class="email"><a href="#">contact@thesame.com</a></li>
					<li class="address">King Street 4/30<br />12-345 City</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- END ABOVE_FOOTER -->

	<!-- BEGIN FOOTER -->
	<footer id="footer">
		<div class="wrapper">
			<p class="copyrights">Copyright &copy; 2012 by TheSame. All rights reserved.</p>
			<a href="#page" class="up">
				<span class="arrow"></span>
				<span class="text">top</span>
			</a>
		</div>
	</footer>
	<!-- END FOOTER -->
</div>
</div>
<?php wp_footer();?>
</body>
</html>