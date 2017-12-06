<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>Text to Script XML.</title>
  <style type="text/css">code{white-space: pre;}</style>
  <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
  <meta name="theme-color" content="#A2DFCA">
  <link rel="stylesheet" type="text/css" href="common.css"/>
  <link rel="stylesheet" type="text/css" href="https://zachdecook.com/shared/w3css/4/w3.css"/>
</head>
<body>
<header>
<h1 class="title">Text to Script XML</h1>
</header>
<form action='myscript.php'>
	<input type="file" id="fileBox" onchange="uploadFile();"/>
</form>
<br/>
<form action='setup.php'>
<input placeholder="No File Added" name="filename" type='textbox' disabled/>
<br/>
<br/>
Character Name format<br/>
<label><input type="radio" name="parsingType" value="" checked>Character Name:</label>
<label><input type="radio" name="parsingType" value="shakes">Character. Name.</label>
<br/>
<input type='submit' value="Parse Script"/>
</form>
<br/>
<a id='outputfilename' download></a>
<textarea rows=28 disabled id='output'>
</textarea>
<script src="https://zachdecook.com/sts/res/js/jqm.js"></script>
<script src='index.js'></script>
</body>
</html>
