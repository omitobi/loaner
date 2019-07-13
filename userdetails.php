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
    	<div style="margin:5%">
        <?php
	$logman=$_SESSION["user"];
$detail_que=$conn->query("select * from useres where uname='$logman' limit 1")->fetchAll(PDO::FETCH_ASSOC);
if(!empty($detail_que)){
    foreach ($detail_que as $get_detailss){
        $get_details = array_values($get_detailss);
		/* echo "<script> alert(\"".$get_details['lname']."\");</script>"; */
		$namefull=$get_details[3]." ".$get_details[4]." ".$get_details[5];
		$uright=$get_details[6];
	
	}
}else{echo "Some error(s) ";}

		?>
       <?php
	   	if ($_GET["action"]=="view")
		{
			require_once("udview.php");
		} else if($_GET["action"]=="edit"){
			require_once("udedit.php");
		} else{echo "Some discrepancies";}
	   ?> 
        
       
        </div>
    </div>
</div>
<!-- THE ALL WRAPPER CODE BEGINS HERE -->

<!-- THE BOTTOM WRAPPER CODE BEGINS HERE -->
<div style="min-height:100px; margin-top:40%;width:100%; margin-left:-7px; background-color:#FFF; position:fixed">
</div>


</body>
</html>