//  fonction permettant d'obtenir la largeur disponible à côté d'un élément de taille définie
function availwidth(el){
	var widthavail;
	var widthel;
	var marginl;
	var marginr;
	widthel = $(el).width();
	marginl = parseInt($(el).css('margin-left'))+parseInt($(el).css('padding-left'));
	marginr = parseInt($(el).css('margin-right'))+parseInt($(el).css('padding-right'));
	widthavail = $(document).width() - widthel - marginl - marginr;
	return widthavail;
}
//  barre son , prise sur http://neutroncreations.com/blog/building-a-custom-html5-audio-player-with-jquery/
function initAudio() {
	
	var supportsAudio = !!document.createElement('audio').canPlayType,
			audio,
			loadingIndicator,
			positionIndicator,
			timeleft,
			loaded = false,
			manualSeek = false;

	if (supportsAudio) {
		

		
		var player = '<p class="player">\
									  <span id="playtoggle" />\
									  <span id="gutter">\
									    <span id="loading" />\
									    <span id="handle" class="ui-slider-handle" />\
									  </span>\
									  <span id="timeleft" />\
									  <audio preload="metadata">\
									    <source src="musique/humans.ogg" type="audio/ogg"></source>\
											<source src="musique/humans.mp3" type="audio/mpeg"></source>\
										</audio>\
									</p>';									
		
		$(player).insertAfter("#son");
		
		audio = $('.player audio').get(0);
		loadingIndicator = $('.player #loading');
		positionIndicator = $('.player #handle');
		timeleft = $('.player #timeleft');
		
		//  Pour voir la barre d'avancement du chargement; inutile??
		
		if ((audio.buffered != undefined) && (audio.buffered.length != 0)) {
			$(audio).bind('progress', function() {
				var loaded = parseInt(((audio.buffered.end(0) / audio.duration) * 100), 10);
				loadingIndicator.css({width: loaded + '%'});
			});
		}
		else {
			loadingIndicator.remove();
		}
		
		
		$(audio).bind('timeupdate', function() {
			
			var rem = parseInt(audio.duration - audio.currentTime, 10),
					pos = (audio.currentTime / audio.duration) * 85,
					mins = Math.floor(rem/60,10),
					secs = rem - mins*60;
			
			timeleft.text('-' + mins + ':' + (secs < 10 ? '0' + secs : secs));
			if (!manualSeek) { positionIndicator.css({left: pos + '%'}); }
			if (!loaded) {
				loaded = true;
				
				$('.player #gutter').slider({
						value: 0,
						step: 0.01,
						orientation: "horizontal",
						range: "min",
						max: audio.duration,
						animate: true,					
						slide: function(){							
							manualSeek = true;
						},
						stop:function(e,ui){
							manualSeek = false;					
							audio.currentTime = ui.value;
						}
					});
			}
			
		}).bind('play',function(){
			$("#playtoggle").addClass('playing');		
		}).bind('pause ended', function() {
			$("#playtoggle").removeClass('playing');		
		});		
		
		$("#playtoggle").click(function() {			
			if (audio.paused) {	audio.play();	} 
			else { audio.pause(); }			
		});

	}
}
