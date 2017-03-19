<?php get_template_part ('back' , 'header') ?>
<section id="middle_sub" class="devblog_middle">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php

       $content = strip_shortcodes(get_the_content());
       if (get_post_gallery()){
         initSliderAPI();
         echo "<h1 class='title_sub single_title' >";
         the_title();
         echo"</h1>";
         $gallery = get_post_gallery( $post, false );
          $ids = explode( ",", $gallery['ids'] );
          $linkList = Array();
          $counter = 0;
          foreach( $ids as $id ) {
          $link = wp_get_attachment_url( $id );
          $linkList[$counter] = $link;
          $counter++;
        }
            $width = ($counter*100+100)."px";
            echo"<div class='wrap_content_devblog_single'>";
            echo "<section class='slider_wrapper'>";
            echo "<div class='current_image' id='image_show'>";
            echo "</div>";
            echo "<div class='slider'>";
            echo "<button class='left_button' id='left'>";
            echo "</button>";
            echo "<button class='right_button' id='right'>";
            echo ">";
            echo"</button>";
            echo "<div class='overflow_slider' id='slider'>";
            echo "<nav>";
            echo "<ol style='width:$width' class='group_image_slider' id='image_group'>";
              foreach ($linkList as $src){
              echo "<li class='currentImage'>";
              echo "<img class='image_slider'  id='$i' src='$src' > </img>";
              echo "</li>";
              $i++;
              }
            echo "</ol>";
            echo"</nav>";
            echo "</div>";
            echo "</div>";
            echo "</section>";
            echo "<article class='single_post'>";
        }


       if (!get_post_gallery()){
           if ( has_post_thumbnail() ) {
           the_post_thumbnail('large');
           }
          echo"<div id='wrap_content_devblog'>";
          echo "<article class='article_devblog devblog'>";
          echo "<h1 class='title_sub' >";
          the_title();
          echo"</h1>";
          }
       echo $content;
       echo "</article>";
       echo "</div>";
      ?>

    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

  </section>
  <?php get_footer(); ?>
</body>
</html>
