<?php
session_start();
$notify_msg="<font color=\"green\" style=\"background-color:#FFFFFF\">"."Login correctly</font>";
 require_once ("class/connector.php");

if(!$_SESSION["user"]){

}else header("Location:home.php?alert_msg=Welcome");

//	else {
	//	header("Location:index.php");
	//	$_GET["alert_msg"]="<font color=\"red\">Login with the right credentials</font>";
//}

//echo "Please LOGIN to continue!";


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/tpicon.png" />
<title>LOAN DATA SOFTWARE :: ROBUST ONE</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link href="styles/form_styles.css" rel="stylesheet" type="text/css" />

<style type="text/css">
body{
	background-color:#000;
	font-family:Tahoma, Geneva, sans-serif;
	color:#CCC;
}

ul{
	list-style:none;
	width:100px;
	float:left;
}

ul, li{
	background: #333;
}
</style>


<?php
extract($_POST);
					//$ is for variable declaration
if(isset($pass))
{
	$rs=$conn->query("select * from useres where uname='$spec_id' and pword='$spec_word'")->fetchAll();	   //userdata is the table name in tester1 database
	if(empty($rs))
	{
		$notify_msg="<font color=\"red\" style=\"background-color:#FFFFFF\">"."Incorrect login credentials</font>";
	}
	else
	{
	    try {
            $loggerin=$conn->prepare("INSERT INTO loglog (logger_id,time_in) VALUES ('$spec_id',now())")->execute();
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
        }

		$_SESSION["user"]=$spec_id;
		$logman=$_SESSION["user"];
		header("Location:home.php?alert_msg=Welcome");
		$session_msg="Welcome Here!!!";
	}

}
?>
</head>

<body style=" background:url(images/login_bg.jpg); background-position: top center">
<!--<b style="color:#FFF"> The tester application for the <i>Loaner Software</i> is <a href="home.php?alert_msg=No operation!">Here</a></b>-->

<div class="login_center" style="float:left">

<div class="login_wrap">
  <p style="font-size:25px">Pass through this door: <img src="images/ajaxload.gif" title="Take the key with you!" width="20" height="20" align="bottom" /></p>
  		<div>
        	<form action="" method="post">
            	<div class="dynamiclabel">
                <input type="text" name="spec_id" value="" autocomplete="on" placeholder="Username"/>
                <label for="spec_id">Special ID</label></div>
                <div class="dynamiclabel">
                <input type="password" name="spec_word" id="spec_word" autocomplete="off" placeholder="Password"/>
                <label for="spec_word">Special Word</label></div>
                <legend style=" text-align:center"> <?php echo $notify_msg; ?></legend>
              <div class="dynamicbutton"> <input type="reset" /><input type="submit" name="pass" value="Pass" /> </div>
            </form>
        </div>
        <br />
        <br />
        <p style="background-color:#FFF; color: #333; margin-left:30px">Loan Data Management System Version 1.0.0TP</p>
        <p id="copy_wrap" style="font-size:10px">Assembled and Formed by TP-Soft; <em>TransformationPrime</em> &copy; <a href="http://www.trans-prime.com" target="_blank">Trans-Prime.com</a><br />
<label>This Test version does not fit a mobile device; Best viewed with Mozilla Firefox browser</label>
</p>

</div>

</div>


</body>
</html>
<?php
exit;
?>
