<?php get_template_part('contact', 'header'); ?>


  <section id="middle_sub" class="devblog_middle">
    <?php get_template_part('form',''); ?>
    <div id="map">
    </div>
  </section>
<?php get_footer(); ?>
<script type="text/javascript"
<?php
$directoryURL = get_template_directory_uri();
$URL = "./JS/google_maps.js";
$concatString = $directoryURL.$URL;
echo "src=$concatString";
 ?> async defer ></script>
<script type="text/javascript" async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaqnLM1SVrvL3kQshw_XDulLz383P6vig&callback=initMap">
  </script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>
