<?php

/*
if($_GET['id'] !=""){
	echo $_GET['msg'];
}
*/
include("class/connector.php");
$sr_res = "";
$lg_sn = Array("");
$zIndex=0;
extract($_POST);
if (isset($sr_LGA_bt)){
	echo "<font color=\"#FF0000\">Working!</font>";
	echo $sr_LGA;
	echo $sr_fname;
	echo $sr_lname;
	echo $sr_phone;
	
	$lgSearch=$conn->prepare("select * from $sr_LGA where fname like '$sr_fname%'",$conn)->fetchAll();
	if(empty($lgSearch)) {
			die ("wrong query");
		} else{
		
			foreach ($lgSearch as $sr_lg) {
				$lg_sn[$zIndex] = $sr_lg['sn'];
				$sr_res .= "<tr>";
				$sr_res .= "<td>".$sr_lg['sn']. "</td> \n";
				$sr_res .= "<td>".$sr_lg['fname']. "</td> \n";
				$sr_res .= "<td>".$sr_lg['mname']. "</td> \n";
				$sr_res .= "<td>".$sr_lg['lname']. "</td> \n";
				$sr_res .= "<td>".$sr_lg['phone']. "</td> \n";
				$sr_res .= "<td>"."<a href=\"procs2.php?id=".$sr_lg['sn']."&amp;lga=$sr_LGA&amp;act=delete\" title=\"Delete This\" >Delete</a> \n"
				."<a href=\"procs2.php?id=".$sr_lg['sn']."&amp;lga=$sr_LGA&amp;act=update\" title=\"Update This\" >Update</a></td>";
				 $sr_res .= "</tr> \n";
			//	 echo $lg_sn[$zIndex];
				$zIndex += 1;
			}
		}
}

/*
if(isset($_POST["checker"]))
{
$tryDel=Array();
$tryDel[0]=htmlentities($_POST["delete"."1"]);
$tryDel[1]=htmlentities($_POST["delete"."2"]);
//echo $_POST["delete".$tryDel[1]];
for($i=1; $i>=0; $i--){
		if(isset($_POST["delete".$tryDel[$i]])){
		echo "delete".$tryDel[$i];
	} else{
		echo "Not like that ".$tryDel[$i];
		}
}
}
*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/salficon.ico" /> 	
<title>Untitled Document</title>
</head>
<body>
<form method="post" action="" style="background-color:#FFF; word-spacing:10px; width:900px">
			<label>Search by:</label>
			<select style="height:30px; border:none; vertical-align:middle" name="sr_LGA">
        		<option title="Pick one LGA to search" onclick="alert('please select a correct LGA'); return false;">SELECT LGA</option>
                      <?php
	  					$tab_val="";
	 					for($nm=0;$nm<count($tabler);$nm++){
		   				$temp=$tabler[$nm];
		   				echo "<option value=\"$temp\" onclick=\"return true;\">".$temp."</option>"." \n";
	  						 }
					  ?>
        	</select>
			<input type="text" name="sr_fname" value="" autocomplete="on" placeholder="Firstname" title="The Firstname" />
            <input type="text" name="sr_lname" value="" autocomplete="on" placeholder="Lastname" title="The Last name" />
            <input type="text" name="sr_phone" value="" autocomplete="on" placeholder="Phone" title="The Phone number"/><img src="class/images/form_lock.png" width="10" height="10" title="Leave Unnecessary box Empty"/>
			<button type="submit" title="Search LGA" name="sr_LGA_bt" /><img src="class/images/search_but.png" height="20" align="absmiddle"/></button>
            </form>
            <form name="dell" method="post">
         <input type="submit" name="delete1" id="button" value="1" />
         
         <input type="submit" name="delete2" id="button" value="23" />
         
</form>
         <?php
		 	function getButton($buttNmae){
				$buttoner=$buttNmae;
				setButton($buttoner);
			}
			
			function setButton($buttName){
		 	if(isset($_POST[$buttName])){
				echo $buttName;
			}
			}
		 ?>
         <label style="color:#FFF; text-decoration:underline;">****************RESULT*****************</label>:
  		<div style="background:#FFF; margin-top:10px; width:900px">
        	<table style="width:850px">
            	<thead>
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
                    Action
                    </td>
                </thead>
                <?php echo $sr_res;
                
		/*
				for($i=0; $i<=$zIndex; $i++){
                //	getButton("del".$lg_sn[$i]);
				//	getButton("upd".$lg_sn[$i]);
				//if(isset($_POST["checker"]))
						if($_POST["del".$lg_sn[$i]]){
						echo "del".$lg_sn[$i];
						} else {
							echo $lg_sn[$i]."\n";
							echo ($i+1)."Not working joor!";
						}
					//echo "Not set at all";
				}
*/
				?>
             </table>
             <form>
             <input type="hidden" name="checker" value="checker" />
             </form>
        </div>
</body>
</html>