<?php

session_start();
if(!isset($_SESSION["user"])){
			header("Location:index.php?alert_msg=kkjuyt38498");
			/* //echo "<script> alert ('Please LOGIN AGAIN TO CONTINUE!');"."</script>"; */
} else{
}

$notify_msg=$_GET["alert_msg"];
include("class/connector.php");

function logGetter ($conn, $logname){
$reslitab="";
			$reslog=$conn->prepare("select * from $logname ORDER BY sn")->fetchAll();	   //userdata is the table name in tester1 database
	if(!empty($reslog))
	{	
		foreach ($reslog as $reslii)
			{
			    $resli = array_values($reslii);
				if($logname=="restorelog"){
				
				$reslitab .= "<tr bgcolor=\"#999999\">";
				$reslitab .= "<td>".$resli[0]. "</td> \n";
				$reslitab .= "<td>".$resli[1]. "</td> \n";
				$reslitab .= "<td>".$resli[2]. "</td> \n";
				$reslitab .= "<td>".$resli[3]. "</td> \n";
				$reslitab .= "<td>".$resli[4]. "</td> \n";
				$reslitab .= "<td>".$resli[5]. "</td> \n";
				$reslitab.= "</tr> \n";	
				} else{
					$reslitab .= "<tr bgcolor=\"#999999\">";
				$reslitab .= "<td>".$resli[0]. "</td> \n";
				$reslitab .= "<td>".$resli[1]. "</td> \n";
				$reslitab .= "<td>".$resli[2]. "</td> \n";
				$reslitab .= "<td>".$resli[3]. "</td> \n";
				
				$reslitab.= "</tr> \n";	
				}
			}
	} else {echo "<font color=\"#990000\">No Record in Table "."'".$logname."' </font>";}
return $reslitab;
}

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
<!--[if lte IE 8]>

<style>

/* Hide panel from IE8 and below */

div.css3droppanel {
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
    
    
    
    
    <!-- THE TABLE SEARCH FOR RESTORE LOG BEGINS HERE -->
    <div id="search_result">
    
    
    <h2> Restore Log </h2>
    <hr />
    <div class="css3droppanel">
<input type="checkbox" id="paneltoggle" />
<label for="paneltoggle" title="Click to open Panel">Open/Close</label>
<div class="content">
    
        	<table align="center">
            	<tr id="result_header">
                	<td>
                    S/N
                    </td>
                    <td>
                    Restored By
                    </td>
                    <td>
                    Restored SN
                    </td>
                    <td>
                    Restored LGA
                    </td>
                    <td>
                    Deletion Date
                    </td>
                    <td>
                    Restored Date
                    </td>
                </tr>
              <?php echo logGetter($conn, "restorelog");	?>
             </table>
             <img src="images/box1bottom.png" style="width:100%;" />
             
           <!-- Pagination Code Begins Here -->
             
             <div class="pagination" style="float:right">
				<ul>
					<li><a href="#" class="prevnext disablelink">« previous</a></li>
					<li><a href="#" class="currentpage">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">9</a>...</li>
					<li><a href="#">15</a></li>
					<li><a href="#">16</a></li>
					<li><a href="#" class="prevnext">next »</a></li>
				</ul>
			</div>
             <!-- Pagination Code ends here -->  
             
        </div>
        </div>
             
        </div>
        
        <!-- TABLE SEARCH RESULT FOR RESTORE LOG ENDS HERE -->
        

        
        <!-- THE TABLE SEARCH FOR REGISTER LOG BEGINS HERE -->
    <div id="search_result">
    <h2> Registration Log </h2>
        	<table align="center">
            	<tr id="result_header">
                	<td>
                    S/N
                    </td>
                    <td>
                    Registral ID
                    </td>
                    <td>
                    User [Redistered] ID
                    </td>
                    <td>
                    Registration Date
                    </td>
                </tr>
              <?php echo logGetter($conn, "reglog");	?>
             </table>
             <img src="images/box1bottom.png" style="width:100%;" />
             
           <!-- Pagination Code Begins Here -->
             
             <div class="pagination" style="float:right">
				<ul>
					<li><a href="#" class="prevnext disablelink">« previous</a></li>
					<li><a href="#" class="currentpage">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">9</a>...</li>
					<li><a href="#">15</a></li>
					<li><a href="#">16</a></li>
					<li><a href="#" class="prevnext">next »</a></li>
				</ul>
			</div>
             <!-- Pagination Code ends here -->  
             
        </div>
        
        <!-- TABLE SEARCH RESULT FOR REGISTER  LOG ENDS HERE -->
        
        
        
               <!-- THE TABLE SEARCH FOR REGISTER LOG BEGINS HERE -->
    <div id="search_result">
    <h2> Logger Log </h2>
        	<table align="center">
            	<tr id="result_header">
                	<td>
                    S/N
                    </td>
                    <td>
                    Logger ID
                    </td>
                    <td>
                    Time In
                    </td>
                    <td>
                    Time Out
                    </td>
                </tr>
              <?php echo logGetter($conn, "loglog");	?>
             </table>
             <img src="images/box1bottom.png" style="width:100%;" />
             
           <!-- Pagination Code Begins Here -->
             
             <div class="pagination" style="float:right">
				<ul>
					<li><a href="#" class="prevnext disablelink">« previous</a></li>
					<li><a href="#" class="currentpage">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">9</a>...</li>
					<li><a href="#">15</a></li>
					<li><a href="#">16</a></li>
					<li><a href="#" class="prevnext">next »</a></li>
				</ul>
			</div>
             <!-- Pagination Code ends here -->  
             
        </div>
        
        <!-- TABLE SEARCH RESULT FOR REGISTER  LOG ENDS HERE -->
        
        
        
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

</body>
</html>