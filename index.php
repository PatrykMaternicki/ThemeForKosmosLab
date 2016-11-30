
<?php get_header(); ?>



<section id="middle_sub">

				<div id="wrap_content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php

					if (in_category('About') ){
					if ( get_post_gallery() ){
					echo "<div class='gallery' >";
	        echo get_post_gallery();
					echo "</div>";
				 }
				 if (!get_post_gallery()){
					 echo "<article >";

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
