<?php get_template_part('contact', 'header'); ?>


  <main class="main-contact-container">
    <section class="contact-wraper">
      <div id="map" class="height-map contact-map">
      </div>
          <h1 class="contact-title app-form  margin0">Kontakt</h1>
      <address class="contact-address">
        <ul class="contact-list">
          <li class="contact-row-block">
          <img class="icon-contact-form" src=<?php getIcon("adres.png"); ?> ><p class="contact-row-text">Lorem Ipsum</p>
        </li>
        <li class="contact-row-block">
          <img class='icon-contact-form' src=<?php getIcon('mail.png'); ?> ><p class="contact-row-text">lorem.ipsum.pl</p>
        </li>
        <li class="contact-row-block">
          <img class='icon-contact-form' src=<?php getIcon('fax.png'); ?> > <p class="contact-row-text">414 123 092</p>
        </li>
        <li "contact-row-block">
          <img class='icon-contact-form' src=<?php getIcon ('fax.png'); ?> ><p class="contact-row-text">829 32 01</p>
        </li>
        </ul>
      </address>
        <?php echo do_shortcode("[contact-form-7 id='37' title='Contact']"); ?>
    </section>
  </main>
<?php get_template_part('footer','contact'); ?>
</body>
</html>
