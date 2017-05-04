<?php get_header(); ?>
<body>
  <main class="main">
    <section class="main-contener">
    <h1>Oferujemy</h1>
    <section class="flexbox">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
          $field = get_field("img");
          echo "<div class='flexbox-post'>";
          echo "<img class='flexbox-post-images--size' src=$field >";
          echo "</img>";
          echo "<h2 class='post-title'>";
          echo the_title();
          echo "</h2>";
          echo "<article class='post-article'>";
          echo the_content();
          echo "</article>";
          echo "</div>";

        ?>
    <?php endwhile; else: ?>
    </section>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

    </section>
  </main>
  <?php get_template_part('footer','contact'); ?>
</body>
