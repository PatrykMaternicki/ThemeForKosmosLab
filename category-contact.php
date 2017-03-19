<?php get_template_part('contact', 'header'); ?>


  <section id="middle_sub" class="devblog_middle contact">
    <?php get_template_part('form',''); ?>
    <div id="map">
    </div>
  </section>
  <?php
  include("mail.php");
  ?>
<?php get_footer(); ?>

</body>
</html>
