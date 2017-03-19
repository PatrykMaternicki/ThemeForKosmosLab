
<?php  get_header();  ?>



<section id="middle_sub" class="border">
	      <div class="line"></div>
				<div id="wrap_content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php
					$directory_uri = get_template_directory_uri();
					if (in_category('about')){
								if (get_field('img-01')){
										$fields = [
											get_field('img-01'),
											get_field('img-02'),
											get_field('img-03')
										];
										echo "<div class='gallery' >";
										echo "<ol class='gallery-wrapper'>";
											foreach ($fields as $field_src){
												echo "<li class='flex'>";
												echo "<img class='gallery-image' src=".$field_src." />";
												echo "</li>";
									}
									echo "</ol>";
									echo "</div>";
							}
							 else {
								 echo "<article class='main_article' >";
								 echo "<h1 class='title_sub' >";
								 the_title();
								 echo"<h1>";
								 the_content();
								 echo "</article>";
							 }
			 }


				 ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
</div>
</section>
<?php get_footer(); ?>

</body>
</html>
