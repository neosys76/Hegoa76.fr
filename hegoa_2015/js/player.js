
// les variables relatives au streaming
var music = document.getElementById('music');
var pButton = document.getElementById('pButton');
var duration;
var playhead = document.getElementById('playhead');
var playheadWidth = parseInt(playhead.style.width);
var timeline = document.getElementById('timeline');
var count=0;
var timelineWidth = parseInt(timeline.style.width);			//   la largeur de la ligne de temps, en px, et obligatoirement mise dans l'attribut style à l'intérieur de l'élément
var ouArreter = timelineWidth-playheadWidth;
var audioplayer = document.getElementById("audioplayer");

//  lance le streaming
function playAudio() {
	if (music.paused) {
		music.play();
		pButton.className = "";
		pButton.className = "pause";
	} else { 
		music.pause();
		pButton.className = "";
		pButton.className = "play";
	}
}


music.addEventListener("timeupdate", timeUpdate, false);
 
function timeUpdate() {
	var playPercent = timelineWidth* (music.currentTime / duration);
	if (playPercent>=ouArreter) {
		playhead.style.left = ouArreter+"px";
	}	
	else {
	playhead.style.left = playPercent + "px";
	}
}


// définit la durée de la bande son
music.addEventListener("canplaythrough", function () {
	duration = music.duration;
}, false);


//  rend la ligne de temps cliquable
timeline.addEventListener("click", function (event) {
	moveplayhead(event);
	music.currentTime = duration * clickPercent(event);
}, false);


// pourcentage de la ligne de temps
function clickPercent(e) {
	return (e.pageX - timeline.offsetLeft) / timelineWidth;
}
  
//   déplace le curseur où on veut sur la ligne de temps
function moveplayhead(e) {
	var newMargLeft = e.pageX - timeline.offsetLeft;

	if (newMargLeft > 0 && newMargLeft < timelineWidth) {
		playhead.style.left = newMargLeft + "px";
	}
	if (newMargLeft<=0) {
		playhead.style.left = "0px";
	}
	if (newMargLeft>=ouArreter) {
		playhead.style.left = ouArreter + "px";
	}
}
