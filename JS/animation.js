
document.getElementById("anim_square0").addEventListener('mouseout',removeFill,false)
document.getElementById("anim_square1").addEventListener('mouseout',removeFill,false)
document.getElementById("anim_square2").addEventListener('mouseout',removeFill,false)
document.getElementById("anim_square3").addEventListener('mouseout',removeFill,false)



// Navigator JS
window.addEventListener('load', navigator, false)

function navigator()
{
    if (navigator.product == 'Gecko')
		{
		alert ("OK");
		}
}



function removeFill()
{
var square0 = document.getElementById("anim_square");
	square0.elements = document.getElementById("anim_square");
	
var square1 = document.getElementById("anim_square1");
	square1.elements = document.getElementById("anim_square1");
	
var square2 = document.getElementById("anim_square2");
	square2.elements = document.getElementById("anim_square2");
	
var square3 = document.getElementById("anim_square3");
	square3.elements = document.getElementById("anim_square3");


this.elements.classList.add ("remove_fill");
var whatThis = this.elements;
var whatStyle = "remove_fill";
setTimeout(function()
{
    removeClass(whatThis, whatStyle);
}, 300);
}

function removeClass (whatThis,whatStyle)
{
console.log ("and this you see?")
whatThis.classList.remove (whatStyle);
}
