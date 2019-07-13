
<?php

session_start();
if(!isset($_SESSION["user"])){
			header("Location:index.php?alert_msg=kkjuyt38498");
			/* //echo "<script> alert ('Please LOGIN AGAIN TO CONTINUE!');"."</script>"; */
} else{
}
	

require_once("class/connector.php");
$lga_id = $_GET['id'];
$lga_lga = $_GET['lga'];
$lga_act= $_GET['act'];
$user_id=$_SESSION["user"];


if($lga_act == "delete"){
	echo "This will delete the record with id $lga_id at $lga_act";
	
	//Deleting the record retrieved
		if ($_GET['id'] != "") {
		$backSel=$conn->prepare("select * from $lga_lga where sn ='$lga_id'",$conn)->fetchAll();
			if(empty($backSel)) {
					die ("wrong query");
				}else{
					foreach ($backSel as $backList) {
					$backData=$conn->prepare("INSERT INTO lgabackup (sn,fname,mname,lname,phone,gender,age,spec,datein,lga,address) VALUES('".$backList['sn']."','".$backList['fname']."','".$backList['mname']."','".$backList['lname']."','".$backList['phone']."','".$backList['gender']."','".$backList['age']."','".$backList['spec']."','".$backList['DateEntered']."','".$lga_lga."','".$backList['address']."')")->execute();
						}
						if(!$backData)
							{
								die ("wrong query");
							}else{
								$delData=$conn->prepare("delete from $lga_lga where sn = '$lga_id' limit 1")->execute();
								if(!$delData)
									{
										die ("wrong query");
									} else {
										echo "Data successfully deleted!";
										header("Location:updater.php?alert_msg=record_deleted");
									}
								}
						}

	} else {header("Location:plane.php?alert_msg=error");} 
	//End Deleting Record
	
}else if($lga_act == "res"){
	if ($_GET['id'] != "") {
		$resSel=$conn->prepare("select * from $lga_lga where sn ='$lga_id'",$conn)->fetchAll();
	if(empty($resSel))
				{
					die ("wrong query");
				}else{
					foreach ($resSel as $resList){
						$resData=$conn->prepare("INSERT INTO ". $resList['lga']." (sn,fname,mname,lname,phone,gender,age,spec,address,DateEntered) VALUES('".$resList['sn']."','".$resList['fname']."','".$resList['mname']."','".$resList['lname']."','".$resList['phone']."','".$resList['gender']."','".$resList['age']."','".$resList['spec']."','".$resList['address']."','".$resList['address']."');")->execute();
					if(!$resData)
							{
								die ("wrong query");
							}else{
								$resLogData=$conn->prepare("INSERT INTO restorelog (res_by,res_sn,res_lga,del_date,res_date) VALUES ('omitobi','".$lga_id."','".$resList['lga']."','".$resList['datedel']."',now())")->execute();
							if(!$resLogData)
									{
										die ("wrong query");
									} else {
										$delBackRes=$conn->prepare("delete from $lga_lga where sn = '$lga_id' limit 1")->execute();
								if(!$delBackRes)
									{
										die ("wrong query");
									} else {
										echo "Data successfully Restored!";
										header("Location:restorer.php?alert_msg=record_restored");
									}
										
									}	
							}
						
					}
				}
	}else {header("Location:plane.php?alert_msg=error");}
	
	} else if($lga_act == "update") {
	
	//header("Location:plane.php?id=".$lga_id."&amp;lga=$lga_lgaa &amp;act=$lga_act");
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/salficon.ico" /> 	
<title>UPDATING RECORD</title>
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
<?php
$_GET["alert_msg"]="Updating!";
extract($_POST);
	if(isset($_POST["upd_butt"])){
		
		echo "<script> alert(\"$lga_lga, $lga_id, '$upd_fname', '$upd_mname', '$upd_lname', '$upd_phone','$upd_gender','$upd_age','$upd_spec','$upd_add'\"); </script>";
		$updSel=$conn->prepare("replace into $lga_lga values ($lga_id, '$upd_fname', '$upd_mname', '$upd_lname', '$upd_phone','$upd_gender','$upd_age','$upd_spec','$upd_add',now())")->execute();
		if(!$updSel)
				{
					die ("wrong query");
				}else{
					$msg1 = "Record for ".$lga_id." to ".$lga_lga." updated successfully!";
						header("Location:updater.php?alert_msg=".$msg1);
				}

		
	}elseif (isset($_POST["upd_canc"])){
			header("Location:updater.php?alert_msg=Cancelled");
		}

		$backSel=$conn->prepare("select * from $lga_lga where sn ='$lga_id'",$conn)->fetchAll();
			if(empty($backSel))
				{
					die ("wrong query");
				}else{
					foreach($backSel as $backList){
						
	?>
    <!-- Top navigation codes here -->
<?php include ("top_nav.php"); ?>
<!-- top navigation codes end here -->

<div class="all_wrapper">

<!-- THE LEFT NAVIGATION MENU WRAPPER BEGINS HERE -->
	<?php include ("left_nav.php"); ?>
<!-- THE LEFT NAVIGATION OR MENU WRAPPER ENDS HERE -->

    <div class="center_wrapper">
<div id="indiv_updater">
<h3> Here you update records:</h3>
<hr style=" margin-right:40px"/>
<form method="post" id="indiv_form">
<label>Updating id <?php echo "\"<b>".$lga_id. "</b>\" from LGA: <b>".$lga_lga."</b>"; ?>: <div style="width:130px; height:100px; border:thick; background:url(images/tran_bg.png); float:right; margin-right:50px;"><input type="button"  style="width:53px; margin-left:-13px; vertical-align: baseline; float:left; margin-top:57%" value="upload" onclick="alert('Image Upload not Available!');" /> <p align="center" style="width:60%; height:95%; margin-top: 0; margin-left:30%; background-color: #FFF; vertical-align:middlel; border-color:#000; border-style:outset" > Passport </p> </div> </label><br />
<div><label>Firstname Middlename Lastname Phone</label>
</div>
<?php if($backList['gender']=="male"){$sex1="checked=\"checked\""; $sex2="";}else if($backList['gender']=="female"){$sex2="checked=\"checked\""; $sex1="";}else{$sex1=""; $sex2="";} ?>
<input type="text" value="<?php echo $backList['fname']; ?>" name="upd_fname" />
<input type="text" value="<?php echo $backList['mname']; ?>" name="upd_mname" />
<input type="text" value="<?php echo $backList['lname']; ?>" name="upd_lname" />
<input type="text" value="<?php echo $backList['phone']; ?>" name="upd_phone" />
<br />
<div><label>Age Occupation DateEntered Address Gender</label>
</div>
<input type="text" value="<?php echo $backList['age']; ?>" name="upd_age" />
<input type="text" value="<?php echo $backList['spec']; ?>" name="upd_spec" />
<input type="text" value="<?php echo $backList['DateEntered']; ?>" readonly="readonly" name="upd_date" />
<input type="text" value="<?php echo $backList['address']; ?>" name="upd_add" />
M<input type="radio" value="male" name="upd_gender" id="upd_gender" <?php echo $sex1; ?> />F<input type="radio" value="female" name="upd_gender" id="upd_gender" <?php echo $sex2; ?> />
<!-- <input type="text" value="<?php //echo $backList['gender']; ?>" name=""  readonly="readonly" onfocus="alert('Use the gender radio button!');"/> -->
<p align="right"><button type="submit" value="upd_canc" name="upd_canc"> Cancel</button>
<button type="submit" value="Update" name="upd_butt" > Update</button>
</p>

</form>
</div>
</div>
</div>
</body>
</html>
<?php
			};
		}
	} 
	exit;
  ?>