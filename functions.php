
<?php
// thumbnails Supoort
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}
add_filter( 'use_default_gallery_style', '__return_false' );
?>



<?php
/*
Category links.
*/
$category  = [
get_home_url(),
get_category_link(get_cat_ID("devblog")),
get_category_link(get_cat_ID("projects")),
get_category_link(get_cat_ID("contact"))
];


/*
Task: Build navbar (return),
Type: void
Return: none;
*/
function buildBackNav(){
  global $category;
  if (in_category('devblog')){
  echo '<li id="2"class="nav_size nav_activ back_menu"><a class="nav_link active_site" href='.$category[1].'>Back</a></li>';
  return;
}
else if (in_category('projects')){
  echo '<li id="2"class="nav_size nav_activ back_menu"><a class="nav_link active_site" href='.$category[2].'>Back</a></li>';
  return;

}

}


/*
* Task: Build Navbar.
* Type: void,
* Return: none,
*/
function buildNav ()
{
  global $category;

  	if (is_category('devblog'))
  	{
        echo '<li id="6" class="nav_size display"><a class="nav_link" href='.$category[0].'>About</a></li>';
        echo '<li id="2"class="nav_size display nav_activ"><a class="nav_link active_site" href='.$category[1].' >DevBlog</a></li>';
        echo '<li id="2"class="nav_size display"><a class="nav_link" href='.$category[2].'>Projects</a></li>';
      	echo '<li id="3" class="nav_size display"><a class="nav_link" href='.$category[3].'>Contact</a></li>';
          return;
  	}
  	if (is_category('contact'))
  	{
      	echo '<li id="1" class="nav_size display"><a class="nav_link" href='.$category[0].'>About</a></li>';
        echo '<li id="2"class="nav_size display "><a class="nav_link" href='.$category[1].'>DevBlog</a></li>';
      	echo '<li id="2"class="nav_size display "><a class="nav_link" href='.$category[2].'>Projects</a></li>';
      	echo '<li id="3" class="nav_size display nav_activ "><a class="nav_link active_site" href='.$category[3].'>Contact</a></li>';
      	return;
  	}

  	if  (is_category('projects'))
  	{
        echo '<li id="1" class="nav_size display"><a class="nav_link" href='.$category[0].'>About</a></li>';
        echo '<li id="2"class="nav_size display"><a  class="nav_link" href='.$category[1].'>DevBlog</a></li>';
      	echo '<li id="2"class="nav_size display nav_activ "><a class="active_site nav_link" href='.$category[2].'>Projects</a></li>';
      	echo '<li id="3" class="nav_size display "><a class="nav_link" href='.$category[3].'>Contact</a></li>';
      	return;
  	}
  	else
  	{
        echo '<li id="1" class="nav_size display nav_activ"><a class="active_site nav_link" href='.$category[0].'>About</a></li>';
        echo '<li id="2"class="nav_size display"><a class="nav_link" href='.$category[1].' >DevBlog</a></li>';
      	echo '<li id="2"class="nav_size display "><a class="nav_link"  href='.$category[2].'>Projects</a></li>';
      	echo '<li id="3" class="nav_size display"><a class="nav_link"  href='.$category[3].'>Contact</a></li>';
    }
}


?>


<?php
function getLogo (){
  $directoryURL = get_template_directory_uri();
  $URL = "./img/logo.png";
  $mediaImageURL = "/img/min_logo.jpg";
  $size = " 10w";
  $concatString = $directoryURL.$URL;
  $concatString2 = $directoryURL.$mediaImageURL;
  echo "<picture>";
  echo "<source srcset=$concatString2 media='(max-width:620px)'>";
  echo "<img  class='img_sub' src=$concatString />";
  echo "</picture>";
}


/*function remove_shortcode_from_index( $content ) {
  if (is_home()){
   return $content;
  }
  if ( is_single() || is_category('DevBlog') || is_category('projects') ){
    echo "Why u do is?";
    $a = strip_shortcodes( $content );
  }
  return $a;
}


add_filter( 'the_content', 'remove_shortcode_from_index' );*/
function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array('google-map','form-api','another-handle');

   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }

   }
   return $tag;
}

function add_async_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_async = array('google-map','another-handle');

   foreach($scripts_to_async as $async_script) {
      if ($async_script === $handle) {
         return str_replace(' src', ' async="async" src', $tag);
      }
   }
   return $tag;
}


add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

function initSliderAPI(){
  if (in_category("devblog") || in_category("projects") && is_single()){
  $srcTemplate=get_template_directory_uri();
    $directoryApiURL = './JS/slider-scroll.js';
    $concatSRC = $srcTemplate.$directoryApiURL;
    wp_register_script( 'scroll-slider1',
    $concatSRC,
     false,
     true);
     wp_enqueue_script('scroll-slider1',true);
    }

  }
  add_filter ('wp_enqueue_scripts', 'initSliderAPI');
function addCookie (){
$src = get_template_directory_uri();
setcookie("src", $src,  time()+3600);
}
add_filter ('init', 'addCookie');
 ?>
