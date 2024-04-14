<!DOCTYPE html>
<html>
<head>
	<title>Musico - Trim and merge audio in browser</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
	<link rel="icon" type="image/jpg" href="assets/logo.jpg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/introjs.min.css">
	<style>
    footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    display: flex;
    justify-content: space-around;
}

footer .icon {
    display: flex;
    flex-direction: column;
    align-items: center;
    cursor: pointer;
}

footer .icon svg {
    fill: #fff;
    width: 24px;
    height: 24px;
    margin-bottom: 5px;
}

footer .icon span {
    font-size: 12px;
}
</style>
</head>
<!-- main wavesurfer.js lib -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/wavesurfer.min.js"></script>
<!-- wavesurfer.js regions -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/plugin/wavesurfer.regions.min.js"></script>
<!--Enjoy Hints-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js"></script>

<script src="actionhelper.js"></script>
<script src="audio.js"></script>
<body onLoad="showTour()">
	<div class="w3-container">
	  <br>
	  <div id="waveform" class="w3-border w3-round-large" 
	  	data-step="3" data-intro="Click and drag to select section">	
	  </div>
	  <br>
	    <div class="w3-row">
	    <div class="w3-half w3-container w3-hide" id="audio-buttons">
		<button class="w3-button w3-border w3-border-green w3-round-xlarge" onClick="playAndPause()">
			<i id="play-pause-icon" class="fa fa-play"></i>
		</button>

		<b id="time-current">0.00</b> / <b id="time-total">0.00</b>
		</div>
		<div class="w3-half w3-container">
		<input id="audio-file" type="file" onChange="loadAudio()"
			data-step="2" data-intro="Select a MP3 File">
	    </div>
		</div>
	  <hr>
	  	  <div data-step="4" data-intro="Would you like to know how to merge tracks. Click Next.">
	  	  <table class="w3-table-all w3-card-4" id="audio-tracks" 
	  	  	data-step="5" data-intro="Select atleast 2 checkboxes for merging. Click Next.">
		   	<thead>
		    <tr class="w3-border w3-border-teal w3-text-teal">
		      <th></th>
		      <th>Start</th>
		      <th>End</th>
		      <th></th>
		      <th></th>
		      <th></th>
		    </tr>
			</thead>
			<tbody></tbody>
			<tfoot></tfoot>
		  </table>
		  </div>
		  <br>
		  <div id="merge-option" class="w3-hide">
			<button class="w3-button w3-border w3-border-teal w3-round-xlarge" onClick="mergeTrack()"
				data-step="6" data-intro="Click to merge selected tracks. Bye bye!! :)">
				<i>Merge tracks</i>
			</button>	 
			<br><br>
			<div class="w3-row w3-hide" id="merged-track-div">
			<b class="w3-col l1 w3-text-olive"><i>Merged Audio : </i></b>	
			<audio controls="controls" class="w3-col l11" id="merged-track">
				<source src="" type="">
			</audio>
			</div>
		  </div>
	  <footer class="w3-display-bottom">
	  	<hr>
	  	<image id="tour-button" class="w3-right" src="assets/tutorial.png" width="40" height="40" onClick="startTour()" data-step="1" data-intro="Hey User, Welcome. Click me for a walkthrough. To skip click Skip.">
	  </footer>
</div>


<footer id="footer">
    <div class="icon" onclick="navigate('home')">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
</svg>
        <span>Home</span>
    </div>
    <div class="icon" onclick="navigate('search')">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg>
        <span>Search</span>
    </div>
    <div class="icon" onclick="navigate('library')">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-music-note-list" viewBox="0 0 16 16">
  <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2"/>
  <path fill-rule="evenodd" d="M12 3v10h-1V3z"/>
  <path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1z"/>
  <path fill-rule="evenodd" d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5m0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5m0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5"/>
</svg>
        <span>Library</span>
    </div>
    <div class="icon" onclick="navigate('profile')">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>
        <span>Profile</span>
    </div>
</footer>
</body>
<script>
  
function navigate(destination) {
    switch(destination) {
        case 'home':
            window.location.href = '../pages/home.php';
            break;
        case 'search':
            window.location.href = '../pages/search.php';
            break;
        case 'library':
            window.location.href = '../pages/music list.php';
            break;
        case 'profile':
            window.location.href = '../pages/profile.php';
            break;
        default:
            console.log("Invalid destination");
    }
}


</script>
</html>
