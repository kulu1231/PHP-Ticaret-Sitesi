
<html>
<head>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="notifyme.css">
<script type="text/javascript" src="notifyme.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
			notifyme.config({
				showtime: 4000,
				position: "topright"
			});
		$("#error").click(function(){
			notifyme.create({
				title: "This is error notification",
				text: "This is error notification text",
				type: "error"
			});
		});

		$("#success").click(function(){
			notifyme.create({
				title: "This is success notification",
				text: "This is success notification text",
				type: "success"
			});
		});

		$("#alert").click(function(){
			notifyme.create({
				title: "This is just alert notification",
				text: "This is just alert notification text",
				type: "alert"
			});
		});
	});
	</script>
<title>jQuery notifyme plugin demos</title>
</head>
<body>
<button id="success">Success</button>
<button id="error">Error</button>
<button id="alert">Warning</button>
<h1>jQuery notifyme plugin demos</h1>
<div class="jquery-script-ads"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>