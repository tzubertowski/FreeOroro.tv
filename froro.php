<html>
<head>
	<title>Free ororo</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>
	<!--  jQuery for ajax action -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/ajaxaction.js"></script>
	<div class="centerbody" style="margin: 0 auto;width: 200px;margin-top:10%;">
	<form id="urlForm" class="pure-form" action="getVideoContent.php">
	    <fieldset>
	        <legend>Ororo.tv URL to episde</legend>
	        <input type="text" placeholder="url" name='url'>

	        <button type="submit" class="pure-button pure-button-primary">Get video</button>
	    </fieldset>
	</form>
	</div>
</body>
</html>