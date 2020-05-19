
<?php  get_header();  ?>



<main class="main">
	<section class="main-contener">
	  <div class="main-wrapper-img-company">
			<article class="main-article">
				<?php
				if (have_posts()) : while (have_posts()) : the_post();
				if (in_category('about')){
				echo "<h1 class='main-title--mobile'>";
				the_title();
				echo"</h1>";
				the_content();
			}?>
			<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

			</article>
  	</div>
	</section>
</main>



<section class="images-contener">
	    <div class="images-contener-wrapper-title">
      <h1 class="images-contener-title"> Oferujemy</h1>
		</div>
			<div class="images-contener-wrapper">
				<?php
				if (have_posts()) : while (have_posts()) : the_post();
				if (in_category("uslugi")){
					echo "<div class='images-contener-row'>";
					echo "<h2 class='images-contener-row-title'>";
					the_title();
					echo "</h2>";
					echo "<div class='contentWrapper'>";
					echo "<img class='images-wraper-image' src=". get_the_post_thumbnail_url() .">";
					echo "<article class='images-contener-row-content'>";
					the_content();
					echo "</article>";
					echo "</div>";
					echo "</div>";
				}
				?>
				<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
		</div>
</div>
</section>
<?php get_footer(); ?>

</body>
</html>
