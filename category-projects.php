<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <section id="middle_sub" class="devblog_middle">


    <?php
              if ( has_post_thumbnail() ) {
              the_post_thumbnail('large');
              }
              ?>
  				<div id="wrap_content_devblog">
            <article class='article_devblog devblog'>
              <?php
              echo "<h1 class='title_sub devblog' >";
              the_title();
              echo"</h1>";
               ?>
              <?php

              $content = get_the_content();
              $link = get_permalink();
              $trimmed_content = wp_trim_words( $content, 100, '<a href='.$link.'/>More...</a>' );

              echo $trimmed_content;
            echo "</article>";
            ?>
  </section>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
</div>
</section>
<?php get_footer(); ?>

</body>
</html>
