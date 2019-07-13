<?php

session_start();
if(!isset($_SESSION["user"])){
			header("Location:index.php?alert_msg=kkjuyt38498");
			/* //echo "<script> alert ('Please LOGIN AGAIN TO CONTINUE!');"."</script>"; */
} else{
}

$notify_msg=$_GET["alert_msg"];
include("class/connector.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/salficon.ico" />
<title>LOAN DATA APP - UPDATE RECORDS</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="styles/css3splitmenu.css" />

<!--[if lte IE 8]>

<style>

/* Hide split menu from IE8 and below */

div.css3splitmenu {
		margin-right: 5px;
		}

div.css3splitmenu > a:after {
		display: none;
		}

div.css3splitmenu > input {
		display: none;
		}

div.css3splitmenu > ul {
		display: none;
		}

</style>

<![endif]-->
</head>

<body>

<!-- This is the top navigation section -->
<div id="top_wrapper">

  
  <div class="css3splitmenu" style="margin-left:0px; margin-top:7px;">
<a href="http://www.dynamicdrive.com">Welcome: <u><?php echo namegetter($conn); ?></u></a> <input type="checkbox" />

<ul id="t">
<li><a href="http://www.dynamicdrive.com/new.htm">Details</a></li>
<li><a href="http://www.dynamicdrive.com/revised.htm">Edit Profile</a></li>
<li><a href="http://www.dynamicdrive.com/forums/">View All Actions</a></li>
<li><a href="http://tools.dynamicdrive.com/gradient/">Gradient Image Maker</a></li>
<li><a href="procs2.php?aact=o&n=u&l=t&u=auto">Logout!</a></li>
</ul>
</div>

<!-- Script below should follow all split menus -->

<script type="text/javascript">

( function(){ // local scope

	if (!document.querySelectorAll || !document.addEventListener)
		return
	var uls = document.querySelectorAll('div.css3splitmenu > ul'),
			docbody = document.documentElement || document.body,
			checkboxes = document.querySelectorAll('div.css3splitmenu > input[type="checkbox"]'),
			zindexvalue = 100

	for (var i=0; i<uls.length; i++){
		( function(x){ // closure to capture each i value
			checkboxes<i>.addEventListener('click', function(e){
				uls[x].style.zIndex = ++zindexvalue
				for (var y=0; y<uls.length; y++){ // loop through checkboxes other than current and uncheck them (since Chrome doesn't respond to onblur event on checkboxes)
					if (y != x)
						checkboxes[y].checked = false
				}
				e.cancelBubble = true
			})
			checkboxes<i>.addEventListener('blur', function(e){
				setTimeout(function(){checkboxes[x].checked = false}, 100) // delay before menu closes, for Opera's sake (otherwise links are un-navigatable)
				e.cancelBubble = true
			})
		}) (i)
	}

	docbody.addEventListener('click', function(e){
		for (var i=0; i<uls.length; i++){
			checkboxes<i>.checked = false
		}
	})

})();


</script>


<div class="menulist" style="float:left; margin-left:30%; margin-right:5px;">
    <ul >
  		<li><b>.::NOTIFICATION::.</b> <?php if($_GET["alert_msg"])echo ($_GET["alert_msg"]); else echo ""; ?></li>
		<li><a href="home.php?alert_msg=No Operation!">Home</a></li>
        <li><a href="updater.php?alert_msg=No Operation!">Updater</a></li>
        <li><a class="active_nav">Restorer</a></li>
        <li><a href="helper.php?alert_msg=No Operation!">Help</a></li>
        <li><a href="abouter.php?alert_msg=No Operation!">About</a></li>
    </ul>
    </div>
 
</div>
</body>
</html>