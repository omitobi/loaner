<?php

session_start();
if(!isset($_SESSION["user"])){
			header("Location:index.php?alert_msg=kkjuyt38498");
			/* //echo "<script> alert ('Please LOGIN AGAIN TO CONTINUE!');"."</script>"; */
} else{
}

$notify_msg=$_GET["alert_msg"];
include("class/connector.php");
//if($_GET['msg'] !=""){
	//echo $_GET['msg'];
//}
$sr_res = "";
$sr_LGA_temp = "";
$lg_sn = Array();
extract($_POST);
if (isset($sr_LGA_bt)){
	//echo "<font color=\"#FF0000\">Working!</font>";
	//echo $sr_LGA;
	//echo $sr_fname;
	//echo $sr_lname;
	//echo $sr_phone;
	//$sr_LGA_temp = $sr_LGA;
	
	$lgSearch=$conn->prepare("select * from $sr_LGA where fname like '$sr_fname%'",$conn)->fetchAll();
	if(!$lgSearch)
		{
			die ("wrong query");
		} else{
			$zIndex=0;
			foreach ($lgSearch as $sr_lg)
			{
				$lg_sn[$zIndex] = $sr_lg['sn'];
				$sr_res .= "<tr bgcolor=\"#999999\">";
				$sr_res .= "<td>".$sr_lg['sn']. "</td> \n";
				$sr_res .= "<td>".$sr_lg['fname']. "</td> \n";
				$sr_res .= "<td>".$sr_lg['mname']. "</td> \n";
				$sr_res .= "<td>".$sr_lg['lname']. "</td> \n";
				$sr_res .= "<td>".$sr_lg['phone']. "</td> \n";
				$sr_res .= "<td>".$sr_lg['datedel']. "</td> \n";
				$sr_res .= "<td valign=\"middle\" align=\"center\">"."<a href=\"procs.php?id=".$sr_lg['sn']."&amp;lga=$sr_LGA&amp;act=res\" title=\"Restore This\" >Restore</a> \n</td>";
				 $sr_res .= "</tr> \n";
				$zIndex += 1;
			}
			$_GET["alert_msg"]="Checking List!";
			$notify_msg=$_GET["alert_msg"];
		}
		

}



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

<div class="all_wrapper">

<!-- THE LEFT NAVIGATION MENU WRAPPER BEGINS HERE -->
	<?php include ("left_nav.php"); ?>
<!-- THE LEFT NAVIGATION OR MENU WRAPPER ENDS HERE -->

<div class="center_wrapper">

<div class="update_wrapper">
		<p>
	<h2  style="margin-left:50px; float: inherit">Home &gt;&gt; Restore <label style="font-size:12px; color:#900; margin-left:350px;"> *Restore functions are performed here!</label></h2>
	</p>

<p align="center"><legend style="background:url(images/templatemo_body.jpg); background-repeat:repeat;">HOW DO YOU SEARCH ?</legend> <label>*You can leave other fields empty, but fill at least one of the fields after the LGA Dropdown is selected</label>
</p>

	<div id="searcher" align="center">
		<form method="post" action="" style="background-color:#FFF; word-spacing:10px; width:92%">
			<label>Search by:</label>
			LGA:<select name="sr_LGA" id="search_sel"> 
                      <?php
	  					$tab_val="";
	 					for($nm=0;$nm<count($tabler);$nm++){
							if($tabler[$nm] == "lgabackup"){
							$temp=$tabler[$nm];
		   				echo "<option value=\"$temp\" onclick=\"return true;\">".$temp."</option>"." \n";
							}
							else continue;								
	  						}
					  ?>
        	</select>
			<input type="text" name="sr_fname" value="" autocomplete="on" placeholder="Firstname" title="The Firstname" />
            <input type="text" name="sr_lname" value="" autocomplete="on" placeholder="Lastname" title="The Last name" />
            <input type="text" name="sr_phone" value="" autocomplete="on" placeholder="Phone" title="The Phone number"/><img src="images/form_lock.png" width="10" height="10" title="Leave Unnecessary box Empty"/>
			<button type="submit" title="Search LGA" name="sr_LGA_bt" value="Searh LGA" accesskey="Enter" ><img src="images/search_but.png" height="20" align="absmiddle"/></button>
         </form>
<label style="color:#FFF; text-decoration:underline;">****************RESULT*****************</label>:
  		<div id="search_result">
        	<table align="center">
            	<tr id="result_header">
                	<td>
                    S/N
                    </td>
                    <td>
                    Firstname
                    </td>
                    <td>
                    Middle Name
                    </td>
                    <td>
                    Lastname
                    </td>
                    <td>
                    Phone Number
                    </td>
                    <td>
                    Deletion Date
                    </td>
                    <td>
                    Action
                    </td>
                </tr>
                <?php echo $sr_res; ?>
             </table>
             <img src="images/box1bottom.png" style="width:100%;" />
        </div>
	</div>
</div>
</div>
</div>
<br />
<br />
<br />
<p id="copy_wrap">Assembled and Formed by TP-Soft; <em>TransformationPrime</em> &copy; <a href="http://www.trans-prime.com" target="_blank">Trans-Prime.com</a><br />
<label>This Test version is not optimized for a mobile device; Best viewed with Mozilla Firefox browser</label>
</p>
</body>
</html>
<?php exit; ?>