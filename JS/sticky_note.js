var size = 0;
var nowSticky = false;
window.addEventListener ('scroll', stickyNote, false)
window.addEventListener ('load' , stickyNote, false)
function stickyNote ()
{
var header = document.getElementById("header");
var triangle = document.getElementById("triangle");
var logo = document.getElementById ("logo");
var navbar = document.getElementById("navbar");
var text0 = document.getElementById("text0");
var text1 = document.getElementById("text1");
var square = document.getElementById("square");




headerSize (logo,navbar,square,text0,text1);
	
	
}



function headerSize (logo,navbar,square,text0,text1)
{
if (window.innerWidth > 3000)
	{
	square.style.opacity = 1;
	return;
	}
	



var header = document.getElementById("header");
size = 600 - window.pageYOffset;



if (size == 600)
		{
		
		header.removeAttribute ("style");
		navbar.removeAttribute ("style");
		logo.removeAttribute ("style");
		triangle.removeAttribute("style");
		return;
		}
	if (size > 75 )
		{
		navbar.classList.remove ("navbar_fixed")
		}
	if (size <= 75)
		{
		
		navbar.classList.add ("navbar_fixed");
		text0.classList.add ("move_text");
		text1.classList.add ("move_text_after");
		
		}
	
	var logoOpacity = 2 - (window.pageYOffset / 100);
	logo.style.opacity = logoOpacity;
	console.log(logo.style.opacity);
		if (square.style.opacity >= 1 || window.pageYOffset >= 600)
		{
		    console.log("Hm?");
			text0.classList.add ("move_text");
			text1.classList.add ("move_text_after");
			}
		else
		{
		    console.log("hm2?")
		    var squareOpacity = (window.pageYOffset / 100) - 4;
            square.style.opacity = squareOpacity;
            console.log(square.style.opacity);
			}
	
}
