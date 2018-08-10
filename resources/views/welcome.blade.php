<!doctype html>
<style>
div#mp3_player{ width:500px; height:60px; background:#000; padding:5px; margin:50px auto; }
div#mp3_player > div > audio{  width:500px; background:#000; float:left;  }
div#mp3_player > canvas{ width:500px; height:30px; background:#002D3C; float:left; }
</style>
<script>
// Create a new instance of an audio object and adjust some of its properties
var audio = new Audio();
audio.src = '{{ asset('12333.mp3') }}';
audio.controls = true;
audio.loop = true;
audio.autoplay = true;
// Establish all variables that your Analyser will use
var canvas, ctx, source, context, analyser, fbc_array, bars, bar_x, bar_width, bar_height;
// Initialize the MP3 player after the page loads all of its HTML into the window
window.addEventListener("load", initMp3Player, false);
function initMp3Player(){
  document.getElementById('audio_box').appendChild(audio);
  context = new webkitAudioContext(); // AudioContext object instance
  analyser = context.createAnalyser(); // AnalyserNode method
  canvas = document.getElementById('analyser_render');
  ctx = canvas.getContext('2d');
  // Re-route audio playback into the processing graph of the AudioContext
  source = context.createMediaElementSource(audio); 
  source.connect(analyser);
  analyser.connect(context.destination);
  frameLooper();
}
// frameLooper() animates any style of graphics you wish to the audio frequency
// Looping at the default frame rate that the browser provides(approx. 60 FPS)
function frameLooper(){
  window.webkitRequestAnimationFrame(frameLooper);
  fbc_array = new Uint8Array(analyser.frequencyBinCount);
  analyser.getByteFrequencyData(fbc_array);
  ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
  ctx.fillStyle = '#00CCFF'; // Color of the bars
  bars = 100;
  for (var i = 0; i < bars; i++) {
    bar_x = i * 3;
    bar_width = 2;
    bar_height = -(fbc_array[i] / 2);
    //  fillRect( x, y, width, height ) // Explanation of the parameters below
    ctx.fillRect(bar_x, canvas.height, bar_width, bar_height);
  }
}
</script>
<style>
.page-break {
    page-break-after: always;
}
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PFG</title>

   
</head>
<body>	
	<h1>Page 1</h1>
	<div class="page-break"></div>
	<h1>Page 2</h1>
	<a href="{{ asset('pdfs\ai_lecture.pdf') }}">AI</a>
   	<a href="{{ asset('pdfs\gramma.pdf') }}">Gramma</a>
   	<a href="{{ asset('pdfs\PL.pdf') }}">PL</a>
   	<a href="{{ asset('pdfs\database_fundamentals_th.pdf') }}">Database</a>
      <a href="{{ asset('12333.mp3') }}">Database</a>
      <audio id="player" src="{{ asset('12333.mp3') }}"></audio>
<audio controls>
  <source src="{{ asset('12333.mp3') }}" type="audio/mpeg"/>
  <source src="vincent.ogg" type="audio/ogg"/>
  <object type="application/x-shockwave-flash" data="media/OriginalMusicPlayer.swf" width="225" height="86"> 
    <param name="movie" value="media/OriginalMusicPlayer.swf"/>
    <param name="FlashVars" value="mediaPath=vincent.mp3" /> 
  </object> 
  <a href="vincent.mp3">Download this lovely song and wish you all the best!</a>
</audio>
<div id="mp3_player">
  <div id="audio_box"></div>
  <canvas id="analyser_render"></canvas>
</div>

</body>
</html>

