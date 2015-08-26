<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" >
	<title>Free ororo</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" href="css/ribbon.css">
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
        <div id="ribbon" class="ribbon">
            <a href="http://zadnychlag.blogspot.com/">Znajdź mnie na blogu</a>
        </div>
	<!--  jQuery for ajax action -->
	<script src="js/ajaxaction.js"></script>
	<div id="formcontainer" class="centerbody" style="margin: 0 auto;width: 335px;margin-top:10%;">
		<form id="urlForm" class="pure-form" action="getVideoContent.php">
		    <fieldset>
		        <legend><h3>Ororo.tv za darmooo</h3></legend>


		        <input type="text" placeholder="url" class="pure-input-rounded" name='url' required>
                        <label for="mp4" class="pure-radio">
                            <input id="mp4" type="radio" name="extensionType" value="mp4" checked>
                            MP4
                        </label>
                        <label for="webm" class="pure-radio">
                            <input id="webm" type="radio" name="extensionType" value="webm">
                            webm (nie dla IE)
                        </label>
		        <button type="submit" class="pure-button pure-button-primary">Get video</button>
                        

		    </fieldset>
		    	    	<legend> </legend>
		    	<legend>Mały tutorial: wchodzimy na ororo.tv, wybieramy dowolny odcinek dowolnego show, po załadowaniu się playera kopiujemy linka z przeglądarki i wstawiamy go tu. Cieszymy się filmem.
				<br><h5>PS. Nie możecie być Anią, Ani nie działa.</h5>
		    	</legend>
		</form>

		<div id="share-buttons">
			 <div id="shareit" style="width:210; margin:0 auto;">
			<!-- Facebook -->
			<a href="http://www.facebook.com/sharer.php?u=http://frororo.hol.es/" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" /></a>
			 
			<!-- Twitter -->
			<a href="http://twitter.com/share?url=http://frororo.hol.es/&text=FreeOroror.tv&hashtags=frororo" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" /></a>
			 
			<!-- Google+ -->
			<a href="https://plus.google.com/share?url=http://frororo.hol.es/" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/google.png" alt="Google" /></a>
			 </div>
		</div>

		<div id="footer"></div>
	</div>

	<video id="orohandler" style="height:100%" autoplay="" style="cursor: none;" controls>
	</video>
</body>
</html>