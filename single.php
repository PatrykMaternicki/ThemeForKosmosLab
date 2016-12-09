<?php get_template_part ('back' , 'header') ?>
  <section id="middle_sub" class="devblog_middle">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php
      echo "<h1 class='title_sub devblog_title_post' >";
      the_title();
      echo"</h1>";
      echo "<article class='devblog_post' >";
      the_content();
      echo "</article>";
      ?>
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
  </section>
  <?php get_footer(); ?>
</body>
</html>
