      function findPos(obj) {
    var curleft = 0, curtop = 0;
    if (obj.offsetParent) {
        do {
            curleft += obj.offsetLeft;
            curtop += obj.offsetTop;
        } while (obj = obj.offsetParent);
        return { x: curleft, y: curtop };
    }
    return undefined;
}

function rgbToHex(r, g, b) {
    if (r > 255 || g > 255 || b > 255)
        throw "Invalid color component";
	var red = r.toString(16);
	var green = g.toString(16);
	var blue = b.toString(16);
	
    return red+green+blue;
}
(function() {
	var CX=860;
	var CY=600;
	var Wim = 1800;
	var Him = 1300;
    var c = document.getElementById("carte");
    //    IMPORTANT: mettre les dimensions  !!!
	c.setAttribute('width', CX);
	c.setAttribute('height', CY);   	
	var $section = $('#plage_jeu');
	var $panzoom = $section.find('.panzoom').panzoom();
	$panzoom.parent().on('mousewheel.plage_jeu', function( e ) {
	e.preventDefault();
	var delta = e.delta || e.originalEvent.wheelDelta;
	var zoomOut = delta ? delta < 0 : e.originalEvent.deltaY > 0;
	$panzoom.panzoom('zoom', zoomOut, {
		increment: 0.1,
		animate: false,
		focal: e,
		minScale:1
		});
	});
	 //   quand on double-clique, on effectue une transformation
	$panzoom.parent().on('dblclick', function( e ) {
	var pos = findPos(this);
	var x = e.pageX - pos.x;
	var y = e.pageY - pos.y;
	var coord = "x=" + x + ", y=" + y;
	var matrix = 	$panzoom.panzoom("getMatrix");	
	var xdimzoom = CX * matrix[0];
	var ydimzoom = CY * matrix[0];
	var xp = (xdimzoom - CX)/2 - matrix[4];
	var yp = (ydimzoom - CY)/2 - matrix[5];
	var relposx = (xp+x)/xdimzoom;
	var relposy = (yp+y)/ydimzoom;
	var realx = relposx*Wim;
	var realy = relposy*Him;
	alert("X="+realx+", Y="+realy);
			});
          
        })();
