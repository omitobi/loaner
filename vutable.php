<?php
function userGetter ($conn, $tname){
$reslitab="";
			$reslog=mysql_query("select * from $tname ORDER BY sn");	   //userdata is the table name in tester1 database
	if(mysql_num_rows($reslog)>0)
	{	
		while ($resli=mysql_fetch_array($reslog))
			{

				
				$reslitab .= "<tr bgcolor=\"#999999\">";
				$reslitab .= "<td>".$resli[0]. "</td> \n";
				$reslitab .= "<td>".$resli[1]. "</td> \n";
				$reslitab .= "<td>".$resli[3]. "</td> \n";
				$reslitab .= "<td>".$resli[4]. "</td> \n";
				$reslitab .= "<td>".$resli[5]. "</td> \n";
				$reslitab .= "<td>".$resli[6]. "</td> \n";
				$reslitab .= "<td>".select_all($conn, "loglog","logger_id",$resli[1],"logstat"). "</td> \n";
				$reslitab .= "<td> Unknown </td> \n";
				$reslitab .= "<td><a href=\"viewusers.php?vuaction=umore&id=".$resli[1]."&alert_msg=MoreDetails\" title=\"Get more details on this user\" ><img src=\"images/more_que.png\" width=\"20\" height=\"20\" /></a> </td> \n";
				$reslitab.= "</tr> \n";
			}
		
	} else {echo "<font color=\"#990000\">No Record in Table "."'".$tname."' </font>". mysql_error();}
return $reslitab;
}

	
	?>
    <h2> All Users </h2>
    <hr />
        	<table align="center">
            	<tr id="result_header">
                	<td>
                    S/N
                    </td>
                    <td>
                    User ID:
                    </td>
                    <td>
                    Firstname
                    </td>
                    <td>
                    Middlename
                    </td>
                    <td>
                    Lastname
                    </td>
                    <td>
                    Right
                    </td>
                    <td>
                    Status
                    </td>
                    <td>
                    Location
                    </td>
                    <td>
                    More
                    </td>
                </tr>
              <?php echo userGetter($conn, "useres");	?>
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