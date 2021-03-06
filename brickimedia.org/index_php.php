<?php
$testers = array('ToaMeiko', 'UltrasonicNXT', 'NovaFlare', 'Ajraddatz', 'Jeyo', 'Berrybrick', 'LSCStealthNinja', 'BrickfilmNut', 'ErkelonJay', 'Legoboy9373', 'Tu-Sais-Qui', 'Djgourhan', 'CJC95', 'CzechMate', 'Klagoer', 'Captain Jag', 'SirComputer');
$username = $_COOKIE['sharedUserName'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- SPLASH PAGE BY GEORGE BARNICK -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- START WINDOWS 8 START TILE -->
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#429ec8"/>
<meta name="msapplication-TileImage" content="square.png"/>
<meta name="msapplication-square70x70logo" content="tiny.png"/>
<meta name="msapplication-square150x150logo" content="square.png"/>
<meta name="msapplication-wide310x150logo" content="wide.png"/>
<meta name="msapplication-square310x310logo" content="large.png"/>
<!-- END WINDOWS 8 START TILE -->
<!-- START OPEN GRAPH -->
<meta property="og:image" content="http://www.brickimedia.org/large.png"/>
<meta property="og:title" content="Brickimedia - An open project to create the largest LEGO fan network on the web"/>
<meta property="og:url" content="http://www.brickimedia.org"/>
<meta property="og:site_name" content="Brickimedia"/>
<!-- END OPEN GRAPH -->
<title>Brickimedia</title>
<script type="text/javascript" src="splash.js"></script>
<link rel="stylesheet" type="text/css" href="splash.css" />
<link rel="stylesheet" type="text/css" href="resources/fonts/lato/lato.css" />
<link rel="shortcut icon" href="img/favicon.ico" />
</head>

<body>
<div id="topbar">
	<?php
    	if (in_array("$username", $testers)) {
    		echo "<span class='beta-tools'><span title='You are logged in as a Brickimedia beta tester' class='tooltip'>Beta Tools:</span>
    <a href='http://meta.brickimedia.org/wiki/Main_Page'>Meta</a> | <a href='http://en.brickimedia.org/wiki/Main_Page'>En</a> | <a href='http://www.github.com/Brickimedia/brickimedia'>GitHub</a></span>";
		}
	?>
    <?php if ($username != "") { echo "<span class='username'><a href='http://meta.brickimedia.org/wiki/Special:MyPage'>$username</a> | <a href='http://meta.brickimedia.org/wiki/Special:MyTalk'>Talk</a></span>"; } ?>
	<img src="img/logo.png" alt="Brickimedia Logo" />
</div>
<div id="middle">
	<span class="big">Welcome &nbsp;to&nbsp; <b>Brickimedia</b>&nbsp;<small><sup><i>ßeta</i></sup></small></span>
    <br /><br />
	<span class="small">An open project to create the largest LEGO fan network on the web</span>
</div>

<div id="ad">
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
</div>

<div id="bottom">
	<a onclick="downtime()"><div class="tab">
    <br /><b>About our downtime</b>
    <br />Learn more about why we went offline, and what to expect next
    </div></a>
    <a onclick="news()"><div class="tab">
    <br /><b>News</b>
    <br />Keep up to date with the latest developments and additions
	</div></a>
    <a onclick="connect()"><div class="tab">
    <br /><b>Stay tuned</b>
    <br />Find more ways to stay up to date on the Brickimedia project
    </div></a>
</div>
</body>
</html>