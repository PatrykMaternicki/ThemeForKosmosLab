
<?php
// Miniaturki - thumbnails
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}
add_filter( 'use_default_gallery_style', '__return_false' );
?>
<?php
function getBackNav(){
  if (in_category('DevBlog')){
  echo '<li id="2"class="nav_size nav_activ back_menu"><a href="http://localhost/wordpress/wordpress/category/devblog/">Back</a></li>';
}
if (in_category('projects')){
  echo '<li id="2"class="nav_size nav_activ back_menu"><a href="http://localhost/wordpress/wordpress/category/projects/">Back</a></li>';

}

}
 ?>
<?php
function infoURL ()
{
  if (is_home()){
    	echo '<li id="1" class="nav_size nav_activ"><a href="http://localhost/wordpress/wordpress/">About</a></li>';
      echo '<li id="2"class="nav_size"><a href="http://localhost/wordpress/wordpress/category/devblog/">DevBlog</a></li>';
      echo '<li id="2"class="nav_size"><a href="http://localhost/wordpress/wordpress/category/projects/">Projects</a></li>';
    	echo '<li id="3" class="nav_size  "><a href="http://localhost/wordpress/wordpress/category/contact/">Contact</a></li>';
      return;
  }
	if (is_category('DevBlog'))
	{
  echo '<li id="1" class="nav_size"><a href="http://localhost/wordpress/wordpress/">About</a></li>';
  echo '<li id="2"class="nav_size nav_activ"><a href="http://localhost/wordpress/wordpress/category/devblog/">DevBlog</a></li>';
  echo '<li id="2"class="nav_size"><a href="http://localhost/wordpress/wordpress/category/projects/">Projects</a></li>';
	echo '<li id="3" class="nav_size"><a href="http://localhost/wordpress/wordpress/category/contact/">Contact</a></li>';
    return;
	}
	if (is_category('Contact'))
	{
	echo '<li id="1" class="nav_size "><a href=http://localhost/wordpress/wordpress/">About</a></li>';
  echo '<li id="2"class="nav_size "><a href="http://localhost/wordpress/wordpress/category/devblog/">DevBlog</a></li>';
	echo '<li id="2"class="nav_size "><a href="http://localhost/wordpress/wordpress/category/projects/">Projects</a></li>';
	echo '<li id="3" class="nav_size nav_activ "><a href="http://localhost/wordpress/wordpress/category/contact/">Contact</a></li>';
	return;
	}

	if  (is_category('projects'))
	{
  echo '<li id="1" class="nav_size "><a href=http://localhost/wordpress/wordpress/">About</a></li>';
  echo '<li id="2"class="nav_size "><a href="http://localhost/wordpress/wordpress/category/devblog/">DevBlog</a></li>';
	echo '<li id="2"class="nav_size nav_activ "><a href="http://localhost/wp/topic/projects/">Projects</a></li>';
	echo '<li id="3" class="nav_size "><a href="http://localhost/wordpress/wordpress/category/contact/">Contact</a></li>';
	return;
	}
	else
	{
    echo '<li id="1" class="nav_size "><a href=http://localhost/wordpress/wordpress/">About</a></li>';
    echo '<li id="2"class="nav_size "><a href="http://localhost/wordpress/wordpress/category/devblog/">DevBlog</a></li>';
  	echo '<li id="2"class="nav_size "><a href="http://localhost/wp/topic/projects/">Projects</a></li>';
  	echo '<li id="3" class="nav_size "><a href="http://localhost/wordpress/wordpress/category/contact/">Contact</a></li>';
}
	return;
	}

?>


<?php
function getLogo (){
  $directoryURL = get_template_directory_uri();
  $URL = "./img/logo.jpg";
  $concatString = $directoryURL.$URL;
  echo "<img class='img_sub' src=$concatString />";
}

function getForm (){
  echo "<input type='text' name='name' /> ";
}
 ?>
