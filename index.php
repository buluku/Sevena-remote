<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Seven Secret Alphabets</title>
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<script type="text/javascript" src="mootools.js"></script>
<!--	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/mootools/1.2.5/mootools.js"></script> -->
	<script type="text/javascript" src="sevena.js"></script>
<!--	<script type="text/javascript" src="../lib/snowstorm.js"></script> -->
	<link rel="stylesheet" href="thumbs.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="icon" href="favicon.ico" type="image/x-icon" />

<!--Display text using the 7 secret alphabets - 22/12/2009 -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-41001923-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<?php

	define(NBSP, "&nbsp;");
//	define(IMG_BASE, "images/2/");

	$text = IsSet($_GET['text']) ? strtoupper($_GET['text']) : "";

	$size = IsSet($_GET['size']) ? $_GET['size'] : 80; //default is 80
	$size = ($size < 30 or $size > 200) ? 80 : $size;

	$alpha = IsSet($_GET['alpha']) ? $_GET['alpha'] : 1; //default is 1
	$alpha = ($alpha < 1 or $alpha > 7) ? 1  : $alpha;

	$img_base = "images/" . $alpha . "/";
?>
<body>

<?php
//var_dump($_SERVER);
echo <<<HEAD
<div id="main">
	<div id="head">
		<table id="topTable" border="0">
			<tr>
				<td>
				<img class="top" src="images/2/S.png" alt="S" />
				<img class="top" src="images/4/E.png" alt="E" />
				<img class="top" src="images/2/V.png" alt="V" />
				<img class="top" src="images/4/E.png" alt="E" />
				<img class="top" src="images/3/N.png" alt="N" />
				<img class="blank" src="images/4/blank.png" alt=" " />
				<img class="top" src="images/4/S.png" alt="S" />

				<img class="top" src="images/1/E.png" alt="E" />
				<img class="top" src="images/1/C.png" alt="C" />
				<img class="top" src="images/3/R.png" alt="R" />
				<img class="top" src="images/1/E.png" alt="E" />
				<img class="top" src="images/1/T.png" alt="T" />
				<img class="blank" src="images/4/blank.png" alt=" " />
				<img class="top" src="images/2/A.png" alt="A" />
				<img class="top" src="images/2/L.png" alt="L" />
				<img class="top" src="images/1/P.png" alt="P" />
				<img class="top" src="images/2/H.png" alt="H" />
				<img class="top" src="images/3/A.png" alt="A" />
				<img class="top" src="images/4/B.png" alt="B" />
				<img class="top" src="images/2/E.png" alt="E" />
				<img class="top" src="images/3/T.png" alt="T" />
				<img class="top" src="images/1/S.png" alt="S" />
				</td>
			</tr>
			<tr>
				<td>
					<h2>Inspired by <a href="http://anthonyearnshaw.com/" target="_blank">Anthony Earnshow</a>'s "Seven Secret Alphabets"</h2>
				</td>
			</tr>
		</table>
		<div id="infobutton" rel="">
			<img src="images/Info_Icon.png" alt="Info" title="Further information..." />
		</div>
		<form action="{$_SERVER['PHP_SELF']}" method="get">
			<table id="myTable">
				<tr>
					<td class="left" colspan="4">
						Enter text:
						<input class="bordered" type="text" name="text" size="80" value="$text" />
					</td>
					<td rowspan="3" class="left">
						<input type="submit" name="Submit" value="Go" />
					</td>
				</tr>
				<tr>
					<td class="left">
						Drag slider to change size:
					</td>
					<td>
						<div id="slsize" class="slider">
							<div class="knob">
							</div>
						</div>
					</td>
					<td class="left">
						Height of thumbnail (30 to 200):
					</td>
					<td>
						<input class="bordered" id="sz" type="text" name="size" size="3" value="$size" />
					</td>
				</tr>
				<tr>
					<td class="left">
						Drag slider to change initial alphabet:
					</td>
					<td>
						<div id="slalpha" class="slider" style="width: 100px">
							<div class="knob">
							</div>
						</div>
					</td>
					<td class="left">
						Initial alphabet (1 to 7):
					</td>
					<td>
						<input class="bordered" id="al" type="text" name="alpha" size="3" value="$alpha" />
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div class="info">
		<p><strong>The Story</strong>: I bought <a href="http://anthonyearnshaw.com/publications.htm" target="_blank">Seven Secret Alphabets</a>
		by chance at a jumble sale in London in 1987 for about 20 pence! <br />
		I got so excited by it that I made photocopies, cut them into letters and made posters. <br />
		I posted my colleague's and my name on our office door at City; and a "Smokers Only" sign too!<br />
		A few weeks ago, I found a forgotten pack of those letters and got inspired to make this site.<br />
		I first had to unearth the book! I did!
		<br /><br />
		<strong>Instructions</strong>: Enter text in the box provided and press "Go".
		Your text will appear below using one of Earnshow's <i>Seven Secret Alphabets</i>. <br />
		The initial alphabet may be selected by using the slider or the box provided.<br />
		The other slider or box may be used to change the size of the letters. <br />
		<br />
		<strong>Note</strong>: Clicking on any letter changes the image to that of the same letter of the <i>next</i> alphabet.
		Keep clicking until you get the desired one.<br />
		Clicking on the space between words forces the word on the right of the space clicked to move to the next line.<br />
		</p><p>
			&copy;&nbsp;Ultimate&nbsp;&bull;&nbsp;28 December 2009
		</p>
	</div>

<div id="content">

HEAD;

	if ($text != '') {
		$h = $size;
		$w = (int) ($size*7/8);
		$w2 = (int) ($w/2);

 		for ($i=0; $i < strlen($text); $i++) {
			$c = substr($text, $i, 1);
			if ($c == ' ') {
				echo '<span class="blank">';
				echo "\n";
				echo '<img class="blank" src="' . $img_base . 'blank.png" alt=" " width="' . $w2 . '" height="' . $h . '" title="click to move next word to next line" />';
				echo "\n</span>\n";
			}
			else {
				echo '<img class="bordered" src="' . $img_base . $c . '.png" alt="' . $c . '" height="' . $h . '" title="click for same letter of next alphabet" />';
				echo "\n";
			}
		}
	}
	echo "</div>\n";
	echo '<span id="msg"></span><br /><span id="msg2"></span>';
	echo <<<END
	<div id="footer">
		&nbsp;&bull;
			<a href="mailto:&#117;&#108;&#116;&#119;&#101;&#098;&#100;&#101;&#115;&#105;&#103;&#110;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">Ultimate</a>
		&bull;&nbsp;28 December 2009&nbsp;&bull;&nbsp;
	</div>
END;
?>


</div>
</body>
</html>
