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
<link rel="stylesheet" href="styles/sidemenuflip.css" />
<link rel="stylesheet" href="styles/pagination.css" />
<link rel="stylesheet" href="styles/csspushdown.css" />

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
    	<div id="search_result">
        <hr />
        	<div class="about_box">
    <h2> About Loan Data</h2>
    <h3> About Builder</h3>
    	<div>
        <p>        
        	This software application is built by <i>Transformation Prime Software inc</i> for managing effectively and uptimely the data of loan clients. The update, deletion, insertion, and so on. It also features the backup and restore facilities, so you dont have to worry about losing any data.</p>
         </div>   
      <h3> Software Privilege</h3>
            <div>
            <p>
            There are three-level administrative privileges, which includes <i>Normal, Admin, and Top-Admin</i>. All these have their own share of management capabilities where the &quot;normal&quot; does the basic operations such as adding people's data/record and updating, while the admin does some other functions that are higher than the normal user and this include, deletion of records, restoring, adding another user, and so on. The &quot;Top-Admin&quot; does all other functions such as deleting users and so on.
            </p>
            </div>
      <h3> Software Versions</h3>
       <div><p>
       This version (1.0TP) is not yet optimized for mobile viewing.
            </p>
            </div>
    </div>
    <hr />
        </div>
    </div>
</div>
<!-- THE ALL WRAPPER CODE BEGINS HERE -->

<!-- THE BOTTOM WRAPPER CODE BEGINS HERE -->
<div style="min-height:100px; margin-top:40%;width:100%; margin-left:-7px; background-color:#FFF; position:fixed">
</div>
</body>
</html>