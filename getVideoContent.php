<?php
// Get episode url contents
$episodeUrl = $_POST['data'];
$desiredExtension = $_POST['ext'];
if (empty($episodeUrl)) {
   return false; 
}

if (strpos($episodeUrl,'http://') === false){
	$episodeUrl = 'http://'.$episodeUrl;
}
$basePath = 'http://ororo.tv';
// $episodeUrl = 'http://ororo.tv/pl/shows/big-bang-theory#1-4';
$episodeHtml = file_get_contents($episodeUrl);

$episodeMatch = '#' . substr($episodeUrl, strpos($episodeUrl, "#") + 1);
$dom = new DOMDocument;
$dom->loadHTML($episodeHtml);
foreach ($dom->getElementsByTagName('a') as $node) {
	if(!empty($node->getAttribute('href')) && $node->getAttribute('href') !== '') {

		$kek = $node->getAttribute('href');
		if($kek == $episodeMatch ){
			$newHtmlUrl = $node->getAttribute('data-href');
		}
	}

}
if(!empty($newHtmlUrl)) {
	$newHtml = file_get_contents($basePath . $newHtmlUrl);
	preg_match("<source src='(.*?)' type='video/webm'>",$newHtml, $display);
        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $display[1]);
        $extMatch = $withoutExt.'.'.$desiredExtension;
        
	echo $extMatch;
}

?>