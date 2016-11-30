var endNum = 0;
var nextText = false;
var activeAnim = true;
var x = 0;
var id;
var id2;
var id3;
var rdyAnimation = false;
var PanelPosition = 0;
window.addEventListener('load',main_panel, false)

var sqrt0 = document.getElementById("sqrt0");
		sqrt0.sqrt_num = 0;
	
		var sqrt1 = document.getElementById("sqrt1");
		sqrt1.sqrt_num = 1;
	
		var sqrt2 = document.getElementById("sqrt2");
		sqrt2.sqrt_num = 2;
	
		var sqrt3 = document.getElementById("sqrt3");
		sqrt3.sqrt_num = 3;
	
		var sqrt4 = document.getElementById("sqrt4");
		sqrt4.sqrt_num = 4;	
		
	var arr = new Array
		(
		sqrt0,
		sqrt1,
		sqrt2,
		sqrt3,
		sqrt4
		);	
		
			var arr_texts = new Array
		//Normal is function Ajx.wordpress, when we get a content. But now for test is normal text.
		(
		'<div class="panel_text"><img class="float" src="img/mobile.png"></img><span class="span">Lorem</span >ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem.<ul><li><span class="span4">LOREM IPSUM DOLOR SIT AMET </span></li><li><span class="span4">LOREM IPSUM DOLOR SIT AMET</span></li><li ><span class="span4">LOREM IPSUM DOLOR SIT AMET</span></li></ul></div>',
		'<div class="panel_text"><img class="float" src="img/web.png"></img><span class="span">Lorem</span >ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem.<ul><li><span class="span4">LOREM IPSUM DOLOR SIT AMET </span></li><li><span class="span4">LOREM IPSUM DOLOR SIT AMET</span></li><li ><span class="span4">LOREM IPSUM DOLOR SIT AMET</span></li></ul></div>',
		'<div class="panel_text"><img class="float" src="img/games.png"></img><span class="span">Lorem</span >ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem.<ul><li><span class="span4">LOREM IPSUM DOLOR SIT AMET </span></li><li><span class="span4">LOREM IPSUM DOLOR SIT AMET</span></li><li ><span class="span4">LOREM IPSUM DOLOR SIT AMET</span></li></ul></div>',
		'<div class="panel_text"><img class="float" src="img/mobile.png"></img><span class="span">Lorem</span >ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem.<ul><li><span class="span4">LOREM IPSUM DOLOR SIT AMET </span></li><li><span class="span4">LOREM IPSUM DOLOR SIT AMET</span></li><li ><span class="span4">LOREM IPSUM DOLOR SIT AMET</span></li></ul></div>',
		'<div class="panel_text"><img class="float" src="img/mobile.png"></img><span class="span">Lorem</span >ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem.<ul><li><span class="span4">LOREM IPSUM DOLOR SIT AMET </span></li><li><span class="span4">LOREM IPSUM DOLOR SIT AMET</span></li><li ><span class="span4">LOREM IPSUM DOLOR SIT AMET</span></li></ul></div>'
		);
		
		var arr_title = new Array
		(
		"MOBILE APPS",
		"WEB APPS",
		"GAMES APPS",
		"NULL",
		"NULL"
		);
	
		var titlePanel = document.getElementById("title_panel");
		
		var content0 = document.createElement("div");
		content0.setAttribute("id" , "content");
		content0.classList.add ("onload_anim_sqrt");
		content0.classList.add ("float_right");
		
		
	for (var n=0; n < arr.length; n++)
		{	
	    arr[n].addEventListener('click', changeContent, false);
	    
		}
	console.log("OK");

function main_panel ()
	{
    console.log(x);
    console.log("Ok2");
		arr[x].classList.add ("litle_anim_sqrt");
		titlePanel.classList. add ("anim_panel_text");
		article.insertBefore(content0, aside);
		titlePanel.innerHTML = arr_title[x];
		content0.innerHTML = arr_texts[x];
		id = setInterval (Animation , 10000);
		console.log(x);
		
	}

function Animation ()
{			
    console.log(x);
    console.log("droga");
    console.trace(x);
    activeAnim = true;
    x++;
    console.log(x);
    console.trace(x);
    console.log(arr.length);
    console.log('Hello');
			if (x == arr.length)
			{
			    console.log("This");
					x=0;
					}
			titlePanel.classList.remove ("anim_panel_text");
			titlePanel.classList.add ("anim_panel_text_revert");
			content0.classList.remove("onload_anim_sqrt");
			console.log(x);
						if (x == 0)
						{
						content0.innerHTML = arr_texts[0];
						titlePanel.innerHTML = arr_title[x];
						content0.classList.add ("go_out");
						var thisID = content0;
						var thisCreate = content0;
						setTimeout(function()
						{
						removeElement(thisID);
						}, 250);
						setTimeout(function()
						{
						createElement(thisCreate, arr, arr_texts,titlePanel, arr_title);
						}, 250);
						
						return;
						}
			titlePanel.innerHTML = arr_title[x-1];
			content0.innerHTML = arr_texts[x-1];
			content0.classList.add ("go_out");
			var thisID = content0;
			var thisCreate = content0;
			setTimeout(function()
			{
			removeElement(thisID);
			}, 250);
			setTimeout(function()
			{
			createElement(thisCreate,arr,arr_texts,titlePanel, arr_title);
			}, 250);
			console.log("xyz");
			console.log(x);
			
					
}

		function createElement (thisCreate, arr, arr_texts, titlePanel, arr_title)
{
       
		var article = document.getElementById("article");
		var aside = document.getElementById ("aside");

		thisCreate.setAttribute ("id","content");
		article.insertBefore (thisCreate,aside);
		thisCreate.innerHTML = arr_texts[x];
		arr[x].classList.add ("litle_anim_sqrt");
		titlePanel.innerHTML = arr_title[x];
		titlePanel.classList.remove ("anim_panel_text_revert");
		titlePanel.classList.add ("anim_panel_text");
		if ( x == 0)
			{
			arr[arr.length-1].classList.remove ("litle_anim_sqrt");
			}
		else
			{
			arr[x-1].classList.remove ("litle_anim_sqrt");
			}
		}


		function removeElement (thisID, thisAnimation)
		{

		if (thisAnimation == true)
			{
			thisID.classList.remove ("onload_anim_sqrt1");
			thisID.classList.add ("onload_anim_sqrt1");
			article.removeChild(thisID);
			return;
			}
		article.removeChild(thisID);
		thisID.classList.remove ("go_out");
		thisID.classList.add ("onload_anim_sqrt");	
		}


   

function changeContent ()
	{
	
	
	
	if (x == this.sqrt_num)
		{
		return;
		}
	
	this.classList.add("bg");
	for ( var n=0 ; n < arr.length ; n++)
		{
			if (n == this.sqrt_num)
				{
				continue;
				}
		arr[n].classList.remove("bg");
		arr[n].classList.remove ("litle_anim_sqrt");
		
		}
	
		panelPosition = this;
		endNum = this.sqrt_num;
		titlePanel.classList.remove ("anim_panel_text");
		document.getElementById("content").classList.remove ("onload_anim_sqrt");
		document.getElementById("content").classList.add ("test30");
		titlePanel.classList.add ("test30");
		var style="test30";
		clearInterval(id);
		x = endNum;
		rdyAnimation = true;
		setTimeout(function()
			{
			removeAnimation(titlePanel);
			}, 500);
		setTimeout(function()
			{
			change(titlePanel,endNum);
			}, 250);
	}
function removeAnimation ()
{
titlePanel.classList.remove ("test30");
document.getElementById("content").classList.remove ("test30");
}

function change ()
{

titlePanel.innerHTML = arr_title[endNum];
document.getElementById("content").innerHTML = arr_texts[endNum];
}