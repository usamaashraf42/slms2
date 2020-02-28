<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
<base href="http://www.lyceumgroupofschools.com">
  <meta name="csrf-token" content="udWgrpM1ylKex6yn7aBWMq39NeBMxsrURtyUggMX">

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
    
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-16x16.png')}}" sizes="16x16" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-32x32.png')}}" sizes="32x32" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-96x96.png')}}" sizes="96x96" />
        <title>American Lyceum School</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script async src="https://www.youtube.com/iframe_api"></script>
        <style>
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
         
    position: relative;
    display: block;
    letter-spacing: 0.2px;
    font-weight: 700;
    min-height: 44px;
    line-height: 50px;
    border: 0;
    margin: 5px;
    border-radius: 5px 5px 5px 5px;
    border-bottom: 8px solid #f32525;
    border-left: 25px solid transparent;
    border-right: 25px solid transparent;
    height: 0;
    width: 125px;
    padding: 12px 22px;
    color: #fff !important;
    font-size: 22px;
    display: inline;
    background-color: #34327C;
                }
  .m-b-md {
              margin-bottom: 30px;
         }
         @font-face {
   font-family: myFirstFont;
   src: url(sansation_light.otf);
}

h6{
   font-family: ITC Zapf Chancery!important;
}
            @import url('https://fonts.googleapis.com/css?family=Roboto');
* { 
  box-sizing: border-box; 
}
.video-background {
  background: #000;
  position: fixed;
  top: 0; right: 0; bottom: 0; left: 0;
  z-index: -99;
}
#video-foreground, .video-background iframe {
  position: absolute;
  top: 0;
  left: 10;
  width: 100%;
  opacity: 0.5;
  height: 100%;
  pointer-events: none;
}
@media (min-aspect-ratio: 16/9) {
  #video-foreground { height: 300%; top: -100%; }
}
@media (max-aspect-ratio: 16/9) {
  #video-foreground { width: 300%; left: -100%; }
}
h1, p, i {
  color: white;
}
p {
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
}
h1 {
  font-size: 68px;
  font-family: 'Roboto', sans-serif;
  font-weight: 600;
  text-transform: uppercase;
}
.main-content {
  margin-top: 15%;
}

        </style>
    </head>
    <body>
      
        <div class="video-background">
        <div id="video-foreground" class="mute"></div>
    </div>
    <div class="color name_value">
        <div class="name_print solo">
            <div class="background">    
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12 main-content content">
            <div class="text-center">
                <h1>   <span> American</span><br> <span style="    background-color: #34327c;
    letter-spacing: 14.5px;"> Lyceum</span><br>  </h1>
                <h6 style="    font-size: 42px;
    color: aliceblue;">International  Schools</h6>
                <p>  
                 <div class="links">
                    <a href="{{route('muscat.nursery')}}"> NURSERY </a>
                    <a href="{{route('muscat.school')}}"> SCHOOL </a>
               
                </div>
              </p>
            </div>
        </div>
    </div>
    <script>
 var player; 
function onYouTubeIframeAPIReady() {
  player = new YT.Player('video-foreground', {
    videoId: 'r0McdN3hAdY', // YouTube Video ID
    playerVars: {
      autoplay: 1,        // Auto-play the video on load
      controls: 0,        // Show pause/play buttons in player
      showinfo: 0,        // Hide the video title
      modestbranding: 1,  // Hide the Youtube Logo
      loop: 1,            // Run the video in a loop
      fs: 0,              // Hide the full screen button
      cc_load_policy: 0, // Hide closed captions
      iv_load_policy: 1,  // Hide the Video Annotations
      autohide: 0,         // Hide video controls when playing
      playlist: 'r0McdN3hAdY'
    },
    events: {
      onReady: function(e) {
        e.target.mute();
      }
    }
  });
}
$(document).ready(function(e) {   
  $('.sound').on('click', function(){
    $('#video-foreground').toggleClass('mute');
    $('.volume-icon').toggleClass('fa-volume-up', 'fa-volume-off');
    if($('#video-foreground').hasClass('mute')){
      player.mute();
    } else {
      player.unMute();
    }
  });
});
</script>
</body>
</html>
