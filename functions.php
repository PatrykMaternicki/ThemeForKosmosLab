
<?php
// Miniaturki - thumbnails
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}
add_filter( 'use_default_gallery_style', '__return_false' );
?>

<?php
function infoURL ()
{
  if (is_home()){
    	echo '<li id="1" class="nav_size nav_activ"><a href="http://localhost/wp/topic/about/">About</a></li>';
      echo '<li id="2"class="nav_size"><a href="http://localhost/wp/topic/projects/">Projects</a></li>';
      echo '<li id="3" class="nav_size"><a href="http://localhost/wp/topic/jobs/">Contact</a></li>';
      return;
  }
	if (is_category('jobs'))
	{
	echo '<li id="1" class="nav_size"><a href="http://localhost/wp/topic/about/">About</a></li>';

	echo '<li id="3" class="nav_size nav_activ"><a href="http://localhost/wp/topic/jobs/">Contact</a></li>';
	return;
	}
	if (is_category('about'))
	{
	echo '<li id="1" class="nav_size nav_activ"><a href="http://localhost/wp/topic/about/">About</a></li>';
	echo '<li id="2"class="nav_size"><a href="http://localhost/wp/topic/projects/">Projects</a></li>';
	echo '<li id="3" class="nav_size "><a href="http://localhost/wp/topic/jobs/">Contact</a></li>';
	return;
	}

	if  (is_category('projects'))
	{
	echo '<li id="1" class="nav_size"><a href="http://localhost/wp/topic/about/">About</a></li>';
	echo '<li id="2"class="nav_size nav_activ"><a href="http://localhost/wp/topic/projects/">Projects</a></li>';
	echo '<li id="3" class="nav_size "><a href="http://localhost/wp/topic/jobs/">Contact</a></li>';
	return;
	}
	else
	{
	echo '<li id="1" class="nav_size"><a href="http://localhost/wp/topic/about/">About</a></li>';
	echo '<li id="2"class="nav_size nav_activ"><a href="http://localhost/wp/topic/projects/">Projects</a></li>';
	echo '<li id="3" class="nav_size "><a href="http://localhost/wp/topic/jobs/">Contact</a></li>';
	return;
	}
}

?>

<?php
function getHTMLBtn ()
{
if ($btn2 == null)
	{
	echo "[code]<p class='red_square'>".$btn1."</p>[/code]";
	return;
	}
elseif ($btn2 != null)
	{
	echo "[code]<p class='red_square'>".$btn1."</p>[/code]";
	echo "[code]<p class='red_square red_square_after'>".$btn2."</p>[/code]";
	}
}
?>
<?php
function getLogo (){
  $directoryURL = get_template_directory_uri();
  $URL = "./img/logo.jpg";
  $concatString = $directoryURL.$URL;
  echo "<img class='img_sub' src=$concatString />";
}
 ?>
