<!--  div element music source -->
<audio id="music">
<source src="music/libertribes.ogg" type="audio/ogg" />
<source src="music/libertribes.mp3" type="audio/mpeg" />
</audio>

<div id="audioplayer">
	<button id="pButton" class="play" onclick="playAudio()"></button>
	<div id="timeline" style="width:100px;height:10px;">
		<div id="playhead" style="position:absolute;left:0;width:10px;"></div>
	</div>
</div>
<script type="text/javascript"  src="./js/player.js"></script>