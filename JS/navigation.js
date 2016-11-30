var startPosition = 0;
var thisActive = false;	
var frame = document.getElementById("frame");
var distance=0;
var nowPosition =0;	
var thisClicked = false;
var notAnim = false;
var pointOne = false;
var pointTwo = false;
var pointThree = false;
var scrollDown = true;
var scrollUp = false;
var lastScroll = window.scrollY;
var navbar  = document.getElementById("home");
	navbar.num =0;
	
var navbar1	= document.getElementById("about");
	navbar1.num =1;
	
var navbar2 = document.getElementById("services");
	navbar2.num =2;
	
var navbar3 = document.getElementById("contact");
	navbar3.num = 3;
var arr_button = new Array
(
navbar,
navbar1,
navbar2,
navbar3
);

var arr_section = new Array
(
document.getElementById("header"),
document.getElementById("midle"),
document.getElementById("bottom"),
document.getElementById("footer")
);




	

	
for (var n=0 ; n < arr_button.length; n++)
	{
	arr_button[n].addEventListener ('click' , moveFrame, false)
	}	

window.addEventListener('scroll', framePosition, false)
window.addEventListener('load', framePosition, false)
	
function moveFrame ()
{
thisClicked = true;
	
if (thisActive == true)
	{
	return;
	}
else if (thisActive == false)
	{
			var transformLeft = 140;
			var transformRight = 140;
				if (startPosition == this.num)
					{
					return;
					}
				if (startPosition > this.num)
					{
					var jumps = startPosition - this.num;
					var pxMove = transformLeft * jumps;
					thisActive = true;
					moveLeft = true;
					moveRight = false;
					distance = nowPosition - pxMove;
					id3 = setInterval(transform, 10)
					startPosition = this.num;
					scrollDown = false;
					scrollUp = true;
					
					}
				if (startPosition < this.num)
					{
					var jumps = this.num - startPosition;
					var pxMove = transformRight * jumps;
					distance = nowPosition + pxMove;
					thisActive = true;
					moveRight = true;
					moveLeft = false;
					id3 = setInterval (transform, 10)
					startPosition = this.num;
					scrollDown = true;
					scrollUp = false;
					}
				

	}	
}

function transform ()
{
if ( distance == nowPosition )
{
    if (startPosition == 0)
    {
        if (thisClicked == true && scrollUp == true) {
            console.log("?");
            pointOne = false;
            pointTwo = false;
            pointThree = false;
        }

    }
	if (startPosition == 2)
		{
		var transformPosition = 20 + nowPosition + "px";
		frame.style.transform = "" + 'translate( ' + '' + transformPosition + '' + ', 3px )' + "";
		    if (thisClicked == true && scrollDown == true) {
		        console.log("Gowno2");
		        pointOne = true;
		        pointTwo = true;
		    }
		    if (thisClicked == true && scrollUp == true) {
		        console.log("OK1");
		        pointThree = false;
		    }
		}
	if (startPosition == 3)
		{
		var transformPosition = 22 + nowPosition + "px";
		frame.style.transform = "" + 'translate( ' + '' + transformPosition + '' + ', 3px )' + "";
		    if (thisClicked == true && scrollDown == true)
		    {
		        console.log("cycki");
		        pointOne = true;
		        pointTwo = true;
		        pointThree = true;
		    }
		    if (thisClicked == true && scrollUp == true) {
		        console.log("OK2");
		        pointThree = false;
		    }
		}
	if (startPosition == 1)
		{
		var transformPosition = 13 + nowPosition + "px";
		frame.style.transform = "" + 'translate( ' + '' + transformPosition + '' + ', 3px )' + "";
		if (thisClicked == true && scrollDown == true) {
		    console.log("Hm?");
		        pointOne = true;

		    }
		    if (thisClicked == true && scrollUp == true)
		    {
		        console.log("OK3");
		        pointTwo = false;
		        pointThree = false;
		    }
		}

	moveLeft = null;
	moveRight = null;
	notAnim = false;
	if (scrollDown == true && thisClicked == false) {
	    switch (startPosition)
	    {
	        case 0:
	            {
	                console.log("Dzialaj ty kurewskie gowno");
	                pointOne = true;
	                console.log(startPosition);
	                startPosition = 1;
	                break;
	            }
	        case 1:
	            {
	   
	                startPosition = 2;
	                pointTwo = true;
	                break;
	            }
	        case 2:
	            {
	                console.log("GOWNO");
	                pointTwo = true;
	                break;
	            }
	        case 3:
	            {
	                console.log("Szmata");
	                pointThree = true;
	                break;
	            }
	    }
	}
	else if (scrollUp == true && thisClicked == false) {
	    switch (startPosition) {
	        case 3:
	            {
	                pointThree = false;
	                break;
	            }
	        case 2:
	            {
	                pointThree = false;
	                break;
	            }
	        case 0:
	            {
	                pointOne = false;
	                break;
	            }
	        case 1:
	            {
	                pointTwo = false;
	                break;
	            }

	    }
	}
	thisActive = false;
	thisClicked = false;
	clearInterval (id3);
	return;
	}
if (moveRight = true && moveLeft == false)
	{
	nowPosition =  nowPosition +10;
	var transformPosition = 10 + nowPosition + "px";
	frame.style.transform = "" + 'translate( ' + ''+ transformPosition + '' + ', 3px )' + "";
	}
else if (moveLeft = true && moveRight == false)
	{
	nowPosition = nowPosition -10;
	var transformPosition = 10 + nowPosition + "px";
	frame.style.transform = "" + 'translate( ' + ''+ transformPosition + '' + ', 3px )' + "";
	
	}
	
}

function framePosition() {

    if (thisActive == true  || window.innerHeight > 1200) {
        return;
    }
   
    var rect_home = document.getElementById("header").getBoundingClientRect();
    var rect_about = document.getElementById("midle").getBoundingClientRect();
    var rect_services = document.getElementById("bottom").getBoundingClientRect();
    var diff = window.scrollY - lastScroll;
    lastScroll = window.scrollY;

    if (diff > 0) {
        scrollDown = true;
        scrollUp = false;
        if (rect_about.top <= 12 && notAnim == false && pointOne == false && scrollDown == true && thisClicked == false) {
            console.log("LOL?");
            console.log(startPosition);
            var jumps = 1;
            var pxMove = 140 * jumps;
            distance = nowPosition + pxMove;
            thisActive = true;
            moveRight = true;
            moveLeft = false;
            id3 = setInterval(transform, 10)
            
            
        }
        if (rect_services.top <= 50 && notAnim == false && pointOne == true && scrollDown == true && pointTwo == false && thisClicked == false)
        {
        
            startPosition = 2;
            console.log(startPosition);
            console.log("Japierdole");
            var jumps = 1;
            var pxMove = 140 * jumps;
            distance = nowPosition + pxMove;
            thisActive = true;
            moveRight = true;
            moveLeft = false;
            id3 = setInterval(transform, 10)
        }


        if (rect_services.top + 300 < 0 && notAnim == false && pointOne == true && pointTwo == true && pointThree == false && scrollDown == true && thisClicked == false )
        {
            startPosition = 3;
            console.log("LOOLOL");
            var jumps = 1;
            var pxMove = 140 * jumps;
            distance = nowPosition + pxMove;
            thisActive = true;
            moveRight = true;
            moveLeft = false;
            id3 = setInterval(transform, 10);
        }
    



    }
    else if (diff < 0) {
            scrollDown = false;
            scrollUp = true;
            if (rect_about.top > 550 && scrollUp == true && pointOne == true && pointTwo == false && thisClicked == false) {
                console.log(rect_about.top);
                console.log("test");
                console.log(startPosition);
                console.log(pointOne);
                startPosition = 0;
            var jumps = 1;
            var pxMove = 140 * jumps;
            distance = nowPosition - pxMove;
            thisActive = true;
            moveRight = false;
            moveLeft = true;
            id3 = setInterval(transform, 10);
        }




            if (rect_services.top > 550 && pointTwo == true && scrollUp == true && thisClicked == false) {
                console.log(startPosition);
                console.log("test2");
                startPosition = 1;
            var jumps = 1;
            var pxMove = 140 * jumps;
            distance = nowPosition - pxMove;
            thisActive = true;
            moveRight = false;
            moveLeft = true;
            id3 = setInterval(transform, 10)
        }

        if (rect_services.top + 200 > 0 && pointThree == true && pointTwo == true && pointOne == true && scrollUp == true && thisClicked == false)
        {
            console.log(startPosition);
            console.log("test3");
            startPosition = 2;
            var jumps = 1;
            var pxMove = 140 * jumps;
            distance = nowPosition - pxMove;
            thisActive = true;
            moveRight = false;
            moveLeft = true;
            id3 = setInterval(transform, 10)
       
        }

    


    }
}
