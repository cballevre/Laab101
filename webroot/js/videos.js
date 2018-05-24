	$('.finvideo').hide();
	var heightVideo = $('.jumbotron').width() / (16/9);
	
	var tag = document.createElement('script');
		
	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		
	var player;
	

	function onYouTubeIframeAPIReady() {
		player = new YT.Player('player', {
			height: heightVideo,
			width: '100%',
			autoplay: 1,
			videoId: videos[0]['videoId'],
			playerVars: {
				'autoplay' : 1,
				'start' : videos[0]['start'],
				'end' : videos[0]['end'],
			},
			events: {
				'onStateChange': onPlayerStateChange
			}
		});
	}
	
	var done = false;
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
        	var time = videos[0]['end']*1000;
        	setTimeout(finishVideo, time);
        	done = true;
        }
    }
    
    function finishVideo(){
    	$('#player').hide();
    	$('.finvideo').show();
    }


	
