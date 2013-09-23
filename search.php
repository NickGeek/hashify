<?php
$hashtag = $_GET['hashtag'];

if (empty($hashtag)) {
	header("Location: http://etheralstudios.com/hashify/");
}
?>

<html>
<head>
	<title>#<?php echo $hashtag; ?> - #ify</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<meta charset="utf-8">

	<script>
  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  	ga('create', 'UA-8931238-8', 'hashify.tk');
  	ga('send', 'pageview');
	</script>
</head>

<body>
<?php
echo "<p><a href='./'><< Go back</a></p>";
echo "<h2>Results for #$hashtag:</h2>";

echo "<div class='results'>";

//Google+
//Get Data
$ch = curl_init();
$url = "https://www.googleapis.com/plus/v1/activities?query=${hashtag}&maxResults=20&orderBy=best&key=XXXXXXXXXXXXXXXXXXXXX";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec($ch);
$json = json_decode($result, TRUE);

//Find Data
$gplusTitles = array();
$gplusURLs = array();
if (isset($json['items'])) {
	foreach ($json['items'] as $item) {
		$objects = $item['object'];
		$attachments = $objects['attachments'];
		$attachment = $attachments['0'];
		//NOTE: Links on G+ are named "article"s for some stupid reason
		$type = $attachment['objectType'];
		$title = $attachment['displayName'];
		$url = $attachment['url'];
		if ($type == "article" && !empty($title) && !empty($url)) {
			array_push($gplusTitles, $title);
			array_push($gplusURLs, $url);
		}
	}
}

//Facebook
//Get Data
$ch = curl_init();
$url = "https://graph.facebook.com/search?q=%23${hashtag}&type=post&locale=en_US&access_token=XXXXXXXXXXXXXXXX|XXXXXXXXXXXXXXXXXXXXX";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, "en-US;q=0.6,en;q=0.4");
$result = curl_exec($ch);
$json = json_decode($result, TRUE);

//Find Data
$facebookTitles = array();
$facebookURLs = array();
if (isset($json['data'])) {
	foreach ($json['data'] as $post) {
		//We are looking for a "link"
		$type = $post['type'];
		$title = $post['name'];
		$url = $post['link'];
		if ($type == "link" && !empty($title) && !empty($url)) {
			array_push($facebookTitles, $title);
			array_push($facebookURLs, $url);
		}
	}
}

$index = 0;
$firstPost = True;
while ($index <= 20) {
	//Google+
	$title = $gplusTitles[$index];
	$url = $gplusURLs[$index];
	if (!$firstPost && !empty($url) && !empty($title)) {
		echo "<hr />";
	}

	echo "<p id='gp'>";
	echo "<h3><a href='$url'>$title</a></h3>";
	echo "<i>$url</i>";
	echo "</p>";

	$firstPost = False;

	//Facebook
	$title = $facebookTitles[$index];
	$url = $facebookURLs[$index];
	if (!$firstPost && !empty($url) && !empty($title)) {
		echo "<hr />";
	}
	echo "<p id='fb'>";
	echo "<h3><a href='$url'>$title</a></h3>";
	echo "<i>$url</i>";
	echo "</p>";

	//Gotta loop em' all!
	$index += 1;
}

echo "</div>";
?>
</body>
</html>
