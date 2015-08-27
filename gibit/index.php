<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="$1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Frororo - your free ororo.tv</title>
        <link href="//vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
        <script src="//vjs.zencdn.net/4.12/video.js"></script>
    </head>
    <body>
      <?php
        // I will make it a class one day, lol
        include './helpers/curlhelper.php';
        require('./helpers/srtFile.php');

        $videoUrl     = isset($_GET['vid']) ? $_GET['vid'] : null;
        $subsUrl      = isset($_GET['subs']) ? $_GET['subs'] : null;
        $curlSubs     = CurlHelper::getData($subsUrl);
        $timeStamp    = time();

        $srtFile      = getcwd().'/tmpsrt/'.$timeStamp.'.srt';
        file_put_contents($srtFile, $curlSubs);

        try{
        	$srt = new \SrtParser\srtFile($srtFile);
        	$srt->setWebVTT(true);
        	$srt->build(true);
        	$srt->save($timeStamp.'.vtt', true);
        }
        catch(Exeption $e){
        	echo "Error: ".$e->getMessage()."\n";
        }
      ?>
      <!-- <video id="bgvid" controls="controls" srt-track="<?= 'tmpsrt/'.$timeStamp.'.srt' ?>">
      	<source src="<?= $videoUrl ?>" type="video/mp4" />
      	<track src="<?= 'tmpsrt/'.$timeStamp.'.srt' ?>" kind="subtitle" srclang="en-US" label="English" default>
      	Your browser does not support HTML5 video.
      </video> -->
      <video id ="example_video_1" class="video-js vjs-default-skin" autoplay controls preload="auto" width="100%" height="100%">
					<source src="<?= $videoUrl ?>" type="video/mp4">
          <track src="<?= 'tmpsrt/'.$timeStamp.'.vtt' ?>" kind="subtitles" srclang="en" default>
					<div class="message">
						<p><strong>Sorry, you'll need an HTML5 Video capable browser to view this example.</strong></p>
					</div>
			</video>
      <script>videojs("example_video_1", {}, function(){
        // Player (this) is initialized and ready.
      });</script>
    </body>
</html>
