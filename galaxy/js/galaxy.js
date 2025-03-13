$(document).ready(
function()
{
	//szálak
	//threads
	csillagok();	//dinamikusan létrehozott csillagok - dynamic stars
	
	urhajok();	//két különböző űrhajót hoz létre - dynamic space ships
	
	bazis();	//űrbázist hoz létre - dynamic player space ship
	
	utkozes_figyelo();	//objektum ütközést figyeli - collision check
});

//objektum ütközést figyeli
//object collision check
function utkozes_figyelo()
{
	var lovedekek = $(".lovedekek");	//az adott objektum típusból tömböt csinál - array out of projectile objects
	
	var urhajos = $(".urhajo");	//nem keverendő össze az urhajok függvénnyel - different from urhajok
	
	for(var i=0;i<lovedekek.length;i++)
	{
		for(var j=0;j<urhajos.length;j++)
		{
			//adott objektum left pozíciója
			//left position of object
			var lx = parseInt($(lovedekek[i]).css("left"));
			
			//adott objektum top pozíciója
			//top position of object
			var ly = parseInt($(lovedekek[i]).css("top"));
			
			//űrhajó pozíciói
			//spaceship position
			var ux = parseInt($(urhajos[j]).css("left"));
			
			var uy = parseInt($(urhajos[j]).css("top"));
			
			//űrhajó szélessége
			//width of spaceship
			var usz = $(urhajos[j]).width();
			
			//űrhajó magassága
			//height of spaceship
			var um = $(urhajos[j]).height();
			
			//ütközés
			//collision
			if(lx >= ux && lx <= ux+usz && ly >= uy && ly <= uy+um)
			{
				if(!$(lovedekek[i]).hasClass("talalat"))
				{
					//ütközés
					//ekkor az animáció érvénytelen
					//at collision does the animation stop
					$(lovedekek[i]).hide();
					$(urhajos[j]).hide();
					
					//osztály a vizsgálathoz
					//class for checking
					$(lovedekek[i]).addClass("talalat");
					
					//effekt
					//animation
					var robbanas = $("<img src='kepek/robban.gif' class='robbanas'>");
					
					robbanas.css(
					{
						"left": ux
						,
						"top": uy
						,
						"height": 160
					});
					
					robbanas.appendTo($("body"));
					
					robbanas.load(
					function()
					{
						//effekt eltűntetése
						//removing the animation effect
						robbanas.hide(1500,function(){$(this).remove()});
					});
				}
			}
		}
	}
		
	//futtatás
	//running
	setTimeout(function(){utkozes_figyelo();}, 80);
}

//billentyűvel vezérelhető bázist hoz létre
//base / player spaceship can be controlled with left and right arrow keys
function bazis()
{
	var bazis = $("<img src='kepek/bazis.png' class='bazis'>");
	
	bazis.appendTo($("body"));
	
	bazis.css(
	{
		"left": ($(window).width() / 2) - bazis.width() / 2	//hogy középen legyen - adjusting to center
	});
	
	//billentyű események globálisan
	//key event has to be global and put into document
	$(document).keydown(
	function(e)	//e-be átadásra kerül az event objektum, amely tartalmazza a leütött billentyű virtuális kódját, ami egy szám - event object handled, that has the numeric code of the hit key
	{
		//console.log(e.keyCode); 	//kísérleti célokra - experimental purposes
		
		//jobbra nyíl billentyű
		//right arrow key
		if(e.keyCode==39)
		{			
			//objektum pozíciója
			//position of the object
			var xpoz= parseInt($(".bazis").css("left"));	//számmá kell konvertálni, pixel érték - pixel value that has to be converted to numeric value
			
			//hogy ne lógjon ki a képernyőből
			//that prevents the object from moving out of screen
			if(xpoz < $(window).width() - $(".bazis").width())
			{
				bazis.css(
				{
					"left": xpoz+20	
				});
			}
		}
		
		//balra nyíl billentyű
		//left arrow key
		if(e.keyCode==37)
		{
			//objektum pozíciója
			var xpoz= parseInt($(".bazis").css("left"));	//számmá kell konvertálni, pixel érték - pixel value that has to be converted to numeric value
			
			//hogy ne lógjon ki a képernyőből
			//that prevents the object from moving out of screen
			if(xpoz > 0)
			{
				bazis.css(
				{
					"left": xpoz-20	
				});
			}
		}
		
		//space billentyű
		//space key to make projectile object
		if(e.keyCode==32)
		{
			//egyszerre adott számú objektum
			//only given amount of objects are allowed to be constructed at a time
			if($(".lovedek").length < 5)
			{
				lovedek();
			}
		}
	}
	);
}

//bázishoz kapcsolódó objektumot hoz létre
//projectile object
function lovedek()
{
	var egylovedek = $("<div class='lovedek'></div>");
	
	realheight = window.innerHeight;
	
	egylovedek.css(
	{
		"left": parseInt($(".bazis").css("left"))+($(".bazis").width() / 2)
		,
		"top": realheight - 80
	});
	
	egylovedek.appendTo($("body"));
	
	//linear -> egyenletes mozgás - linear move for the animation
	egylovedek.animate(
	{
		"top": 0
	}
	,
	800
	,
	"linear"
	,
	function()
	{
		$(this).remove();
	});
}

//két különböző űrhajót hoz létre
//two types of spaceship objects constructor function
function urhajok()
{
	//vagy az egyik, vagy a másik űrhajó generálásához random szám
	//based on a random number
	var velszam = Math.ceil(Math.random()*2);	//1 és 2 között - 1-2
	
	var urhajo = $("<img src='kepek/urhajo"+velszam+".png' class='urhajo'>");
	
	urhajo.hide();	//villogás ellen - against flashing 
	
	urhajo.appendTo($("body"));
	
	urhajo.load(
	function()
	{
		urhajo.show();
		
		//arányok és magasság értékek itt is kellenek, nemcsak a csillagoknál
		//arányosítás
		//ratio change and height values are needed here too, not just for the star objects
		var arany = Math.round(urhajo.width() / urhajo.height());

		//magasság
		//height
		var mag = Math.round(Math.random()*100)+30;	//30 és 130 között
		
		//szélesség
		//width
		var szel = arany * mag;
		
		//alapból bal oldalt van ez az űrhajó
		//default position of the spaceship is at the left
		var pozx = 0;
		
		var h = window.innerHeight;	//segédváltozó window.height nem a teljes ablakméret, még a !doctype elenére sem
		//
		var pozy = Math.round(Math.random()*(h-150))+mag;		
		
		//elhelyezkedés
		//position of spaceship
		urhajo.css(
		{
			"top": pozy
			,
			"height": mag
			,
			"left": pozx
			,
			"z-index":100
		});
		
		//random sebességge
		//random speed of the ship
		var seb = Math.round(Math.random()*3000)+2000;	//2000 és 5000 között - 2000-5000
		
		//jquery és css alapú animáció
		//véletlen sebességgel halad az űrhajó
		//jquery and css mixture animation, the speed of the spaceship is randomized
		urhajo.animate(
		{
			"left":$(window).width()-szel-15
		}
		,
		seb
		,
		function(){$(this).remove()}
		);
		
		setTimeout(function(){urhajok()},1500);
	});
}

//csillag objektumokat hoz létre
//constructing star objects
function csillagok()
{	
	//egy megoldás 30 csillag létrehozására
	//one solution for constructing 30 stars
	/*for(var i = 0; i < 30; i++)
	{*/
		var egycsillag = $("<img src='kepek/csillag.gif' class='csillag'>");	//sokszorosítandó csillag - clonable stars

		egycsillag.appendTo($("body"));	//csak akkor keletkezik értéke, ha vizualizálódik - value it will get once it gets visualized

		//csak akkor kapja meg, ha betöltődött
		//value will be given once the object is loaded
		egycsillag.load(
		function()
		{
				//magasság
				//height
				var mag = Math.round(Math.random()*50)+20;	//20 és 70 között - 20-70
				
				//arányosítás
				//ratio
				var arany = Math.round(egycsillag.height() / egycsillag.width());
				
				//szélesség
				//width
				var szel = arany * mag;
				
				//képernyő szélesség és csillag szélesség alapján
				//screen width and star width based
				var pozx = Math.round(Math.random()*$(window).width())-szel-15;
				
				var h = window.innerHeight;	//segédváltozó window.height nem a teljes ablakméret, még a !doctype elenére sem
				//innerHeight has to be used, because even with !doctype the $(window).height() doesn't work
				var pozy = Math.round(Math.random()*(h-150))+mag;

				//elhelyezkedés
				//position
				egycsillag.css(
				{
					"top": pozy
					,
					"height": mag
					,
					"left": pozx
				});
				
				/*egycsillag.css(
				{
					"left": pozx-egycsillag.width()	//hogy ne lógjon ki - to have it inside the screen
				});*/
				
				//létrehozó szál
				//constructor thread
				if($(".csillag").length < 30)
				{
					setTimeout(function(){csillagok()},20);
				}
		});
	/*}*/
}