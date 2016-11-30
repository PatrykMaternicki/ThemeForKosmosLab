
<?php get_header(); ?>

<section id="middle_sub">
				
				<h1 class="title_sub">JOBS</h1>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div id="wrap_content">
				
					<?php
										if ( has_post_thumbnail() ) {
										the_post_thumbnail('large');
										}
										?>
					<div class="content">
						
							<h1 class="content_title"><?php the_title(); ?></h1>
							
						
					<article class="about">
							<?php the_content(); ?>
					</article>
					</div>



				</div>
			
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
</section>

<?php get_footer(); ?>

</body>
</html>