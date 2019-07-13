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
<!--Force
 IE6 into quirks mode with this comment tag-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/salficon.ico" />
<title>LOAN DATA APP - UPDATE RECORDS</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="styles/css3splitmenu.css" />
<link rel="stylesheet" href="styles/sidemenuflip.css" />
<link rel="stylesheet" href="styles/pagination.css" />
<link rel="stylesheet" href="styles/csspushdown.css" />
<link rel="stylesheet" href="styles/form_styles.css" />

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

<!--[if lte IE 8]>

<script>

	window.onload = function(){ // ie 8 menu compatibility code
		var mainlabel = document.getElementById('mainlabel_ie')
		var	menuflip = document.getElementById('menuflip_ie')
				menuflip.style.top = mainlabel.offsetHeight
				mainlabel.onmouseover = function(){
					menuflip.style.visibility = 'visible'
				}
				menuflip.onclick = function(){
					menuflip.style.visibility = 'hidden'
				}
	}

	</script>

<![endif]-->
<link rel="stylesheet" href="styles/pagination.css" />
</head>

<body>

<!-- Top navigation codes here -->
<?php include ("top_nav.php"); ?>
<!-- top navigation codes end here -->

<!-- THE ALL WRAPPER LAYER BEGINS HERE -->

<div class="all_wrapper">
<!-- THE LEFT NAVIGATION MENU WRAPPER BEGINS HERE -->
	<?php include ("left_nav.php"); ?>
<!-- THE LEFT NAVIGATION OR MENU WRAPPER ENDS HERE -->

<!-- THE CENTER WRAPPER BEGINS HERE -->
 	<div class="center_wrapper">
    
    <!-- THE TABLE SEARCH FOR RESTORE LOG BEGINS HERE -->
    <div id="search_result">
    
              <h3><a href="report.php?action=none&alert_msg=ViewReport">View Report</a> &gt;&gt;
          <a href="report.php?action=add&alert_msg=Adding Report">Add Report</a> &gt;&gt;
         <a href="report.php?action=resolve&alert_msg=ResolvingReport">Resolve Report</a>
          </h3> 
    
    <?php
	
		include("ireport.php");	
	
	?>
    
    
       

        </div>
        
        <!-- TABLE SEARCH RESULT FOR RESTORE LOG ENDS HERE -->
        
        
        
    </div>
    <!-- THE CENTER WRAPPER ENDS HERE -->
 </div>
 <!-- THE ALL WRAPPER LAYER ENDS HERE -->
 
 
 
 
 
 
<!-- Bottom Frame beings here -->
<div id="framecontent">
<div class="innertube">

<h1>CSS Bottom Frame Layout</h1>
<h3>Sample text here</h3>

</div>
</div>


<div id="maincontent">
<div class="innertube">

<h1>Dynamic Drive CSS Library</h1>
<p><script 
type="text/javascript">filltext(255)</script></p>
<p style="text-align: center">Credits: <a 
href="http://www.dynamicdrive.com/style/">Dynamic Drive CSS 
Library</a></p>

</div>
</div>

</body>
</html>
