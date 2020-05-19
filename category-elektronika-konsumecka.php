<?php get_header(); ?>
<body>
  <main class="main">
    <!-- desktop version -->
    <section class="main-contener main-contener--none">
      <h1>Oferujemy</h1>
        <section class="flexbox">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <?php
                echo "<div class='flexbox-post'>";
                echo "<img class='flexbox-post-images--size' src=". get_the_post_thumbnail_url()  .">";
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
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
      </section>
    </section>
    
    <!-- mobile version -->
    <section class="mobile-container-post">
      <h1 class="mobile-title">Oferujemy</h1>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="mobile-wraper">
          <div class="mobile-post-wraper">
            <?php
              echo "<img class='post-image' src=". get_the_post_thumbnail_url() ." alt='tools'></img>";
            ?>
            <div class="article-wraper">
            <h2 class="post-title"><?php echo the_title(); ?></h2>
            <article class="mobile-post-article">
              <?php echo the_content();?>
            </article>
            <div class="mobile-post-list">
              <?php echo get_field("Description"); ?>
            </div>
          </div>
          </div>
        </div>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
    </section>
    
  </main>
  <section class="description-container description-container--none">
    <section class="descriptionFlexbox">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="flexbox-post">
        <div class="descriptionFlexbox__list ">
          <?php the_field('Description'); ?>
        </div>
      </div>
      <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
    </section>
  </section>
  <?php get_template_part('footer','post'); ?>
</body>
</html>
