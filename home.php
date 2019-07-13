<?php

session_start();
if (!isset($_SESSION["user"])) {
    header("Location:index.php?alert_msg=kkjuyt38498");
//			/* //echo "<script> alert ('Please LOGIN AGAIN TO CONTINUE!');"."</script>"; */
} else {

}

include("class/connector.php");


$alerter = "<label style=\"color:green;\">" . "........Nothing is wrong.........</label>";
$viewCloser = "style=\"visibility:hidden;  position:fixed; width:1030px; margin-left:100px\"";
$lgTable = "<div style=\"background-color:#FFF; border:dashed; color:#000; width: 1050px;\">";
$lg_name_active = "\"Undefined\"";
$lg_upd = "\"None\"";
$notify_msg = "No operation!";
/*foreach ($db as $key=>$value) {
    print "\$db[\"$key\"] == $value<br>";
 }

$tabler=mysql_query("show tables");
for($j=0; $j<=$tabler.count; $j++){
	echo $tabler[$j];
}
*/


extract($_POST);
if (isset($submit)) {

    $fnamer = Array($fname1, $fname2, $fname3, $fname4, $fname5, $fname6, $fname7, $fname8, $fname9, $fname10) or die("");
    $mnamer = Array($mname1, $mname2, $mname3, $mname4, $mname5, $mname6, $mname7, $mname8, $mname9, $mname10) or die("");
    $lnamer = Array($lname1, $lname2, $lname3, $lname4, $lname5, $lname6, $lname7, $lname8, $lname9, $lname10) or die("");
    $jober = Array($job1, $job2, $job3, $job4, $job5, $job6, $job7, $job8, $job9, $job10) or die("");
    $phoner = Array($phone1, $phone2, $phone3, $phone4, $phone5, $phone6, $phone7, $phone8, $phone9, $phone10) or die("");
    $ager = Array($age1, $age2, $age3, $age4, $age5, $age6, $age7, $age8, $age9, $age10);
    $gender = Array($gend1, $gend2, $gend3, $gend4, $gend5, $gend6, $gend7, $gend8, $gend9, $gend10);
    $addresser = Array($addr1, $addr2, $addr3, $addr4, $addr5, $addr6, $addr7, $addr8, $addr9, $addr10);


//for($k=0; $k<count($namer); $k++)

    for ($i = 0; $i < $data_num; $i++) {
        if ($fnamer[$i] != "" && $mnamer[$i] != "" && $lnamer[$i] != "" && $jober[$i] != "" && $phoner[$i] != "" && $ager[$i] != "" && $gender[$i] != "") {
            echo $fnamer[$i] . $mnamer[$i] . $lnamer[$i] . $jober[$i] . $phoner[$i] . $lg_upd . $data_num . $ager[$i] . $gender[$i] . "<br />";
            $res = $conn->prepare("INSERT INTO " . $lg_upd . " (fname,mname,lname,phone,gender,age,spec,address) VALUES ('$fnamer[$i]','$mnamer[$i]','$lnamer[$i]','$phoner[$i]','$gender[$i]','$ager[$i]','$jober[$i]','$addresser[$i]')")->execute();
            if ($res) {
                $notify = $fnamer[$i] . " with " . $jober[$i] . " successfully inserted <br />";
                header("Location:home.php?alert_msg=$notify_msg");
            } else {
                echo $result[$i];
                echo "One of the fields have an error";
            }
        }
    }
}
if (isset($updBut) || isset($delBut)) {
    header("Location:updater.php?alert_msg=Updating_Page");
}

?>


    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
            "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="shortcut icon" href="images/salficon.ico"/>
        <title>TEST PAGE - LOAN DATA APP</title>
        <link href="styles/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="styles/css3splitmenu.css"/>
        <link rel="stylesheet" href="styles/sidemenuflip.css"/>
        <link rel="stylesheet" href="styles/pagination.css"/>
        <link rel="stylesheet" href="styles/csspushdown.css"/>
        />
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

        <script type="text/javascript">
            function tab_new() {
                var tabval = allform.table_txt.value;
                alert("");
                if (tabval != "" && tabval != "Type LGA") {

                } else {
                    alert("You have not entered a table to create");
                }
            }

            function checkValue() {
                var counter = eval(allform.data_num.value);
                if (allform.checker.checked == true) {
                    for (i = 1; i <= counter; i++) {

                        //  alert(allform.name+i.toString());
                    }
                    alert("Checked");
                } else {
                    alert("Unchecked");
                }

            }

        </script>

    </head>

    <body>
    <!-- Top navigation codes here -->
    <?php include("top_nav.php"); ?>
    <!-- top navigation codes end here -->
    <!--Left wrapper begins here -->
    <div class="all_wrapper">

        <!-- THE LEFT NAVIGATION MENU WRAPPER BEGINS HERE -->
        <?php include("left_nav.php"); ?>
        <!-- THE LEFT NAVIGATION OR MENU WRAPPER ENDS HERE -->


        <div class="center_wrapper">
            <div class="update_wrapper">
                <p>
                <h2 style="margin-left:50px; float: inherit">Home &gt; <u>Add Details</u> <label
                            style="font-size:12px; color:#900; margin-left:350px;"> *Create and Add Functions are
                        performed here!</label></h2>
                </p>

                <p align="center">
                    <legend style="background:url(images/templatemo_body.jpg); background-repeat:repeat;">HOW DO YOU ADD
                        AND CREATE MORE DETAILS ?
                    </legend>
                    <label>*Note: you have to select the LGA and enter the number of data to input</label>
                </p>
                <?php


                if (isset($table_sub)) {
                    if ($tab_txt <> "" && $tab_txt != "Type LGA") {
                        echo "</br>The table text is " . $tab_txt;
                        $sql = "CREATE TABLE $tab_txt (sn BIGINT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY, fname VARCHAR(80) NOT NULL, mname VARCHAR(80) NOT NULL, lname VARCHAR(80) NOT NULL, phone VARCHAR(15) NOT NULL, gender VARCHAR(15) NOT NULL, age BIGINT(255) NOT NULL,  spec VARCHAR(80) NOT NULL, address VARCHAR(100) NOT NULL, DateEntered TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
                        try {
                            $cr_rs = $conn->prepare($sql)->execute();
                            echo "</br>Table $tab_txt successfully created";
                        } catch (PDOException $PDOException) {
                            echo "</br>" . "Table not successfully inserted" . $PDOException->getMessage();
                        }
                    } else {
                        echo "<script> alert(\"Enter the correct LGA\")" . "</script>";
                    }
                }


                ?>
                <?php

                if (isset($closeView)) {
                    $viewCloser = "style=\"visibility:hidden; position:fixed; width:860px; margin-left:100px;\"";
                }

                if (isset($viewQuery)) {
                    $viewCloser = "style=\"visibility:visible; position:fixed; width:860px; margin-left:100px; background:url(images/tran_bg.png); background-repeat:repeat;\"";
                }
                if (isset($viewTable)) {
                    $lgGet = $conn->prepare("SELECT * FROM $lg_view LIMIT 0 , 50")->execute();
                    if (count($lgGet)) {
                        die ("wrong query");
                    } else {
                        $temp_sy = "style=\"list-style:none; width:100px; float:left; background: #ccc;\"";
                        $temp_sn = "<ul style=\"list-style:none; width: 30px; float:left; background: #333;\"> <li>S/N</li> \n";
                        $temp_fn = "<ul $temp_sy> <li> First name </li> \n";
                        $temp_mn = "<ul $temp_sy> <li> Middle name </li> \n";
                        $temp_ln = "<ul $temp_sy> <li> Last name </li> \n";
                        $temp_pn = "<ul $temp_sy> <li> Phone number </li> \n";
                        $temp_sp = "<ul style=\"list-style:none; width:150px; float:left; background: #333;\"> <li> Specialization </li> \n";
                        $temp_date = "<ul style=\"list-style:none; width:160px;  float:left; background: #ccc;\"> <li> Reg Date </li> \n";
                        foreach ($lgGet as $lgList) {
                            $temp_sn .= "<li>" . $lgList['sn'] . "</li> \n";
                            $temp_fn .= "<li>" . $lgList['fname'] . "</li> \n";
                            $temp_mn .= "<li>" . $lgList['mname'] . "</li> \n";
                            $temp_ln .= "<li>" . $lgList['lname'] . "</li> \n";
                            $temp_pn .= "<li>" . $lgList['phone'] . "</li> \n";
                            $temp_sp .= "<li>" . $lgList['spec'] . "</li> \n";
                            $temp_date .= "<li>" . $lgList['DateEntered'] . "</li> \n";
                        }
                        $temp_sn .= "</ul>";
                        $temp_fn .= "</ul>";
                        $temp_mn .= "</ul>";
                        $temp_ln .= "</ul>";
                        $temp_pn .= "</ul>";
                        $temp_sp .= "</ul>";
                        $temp_date .= "</ul>";
                        $temp_val = $temp_sn . "\n" . $temp_fn . "\n" . $temp_mn . "\n" . $temp_ln . "\n" . $temp_pn . "\n" . $temp_sp . "\n" . $temp_date;
                        $viewCloser = "style=\"visibility:visible; position:fixed; width:1050px; margin-left:-10px; background:url(images/tran_bg.png); background-repeat:repeat\"";
                        $lg_name_active = "\"" . $lg_view . "\"";
                    }
                } else {
                    $temp_val = "The List goes Here";
                }
                $lgTable .= $temp_val . "</div>";

                ?>

                <!--Everything about view data page begins here -->
                <!--background:url(images/tran_bg.png); background-repeat:repeat-x -->
                <div class="bg" <?php echo $viewCloser; ?>>
                    <form method="post" action="" style="margin-top:88px">
                        <input type="submit" name="closeView" id="closeView" Value=" CLOSE" style="float:right;"/>

                        <div style="background:#000; position:absolute">VIEW THE DETAILS IN
                            <select name="lg_view" id="lg_view">
                                <option value="default" selected="selected">SELECT LGA</option>
                                <?php
                                $tab_val = "";
                                for ($nm = 0; $nm < count($tabler); $nm++) {
                                    $temp = $tabler[$nm];
                                    if ($tabler[$nm] == "lgabackup" || $tabler[$nm] == "restorelog")
                                        continue;
                                    echo "<option value=\"$temp\">" . $temp . "</option>" . " \n";
                                }
                                ?>
                            </select>
                            <input type="submit" value="VIEW" name="viewTable" id="viewTable"/>
                            You are viewing <b><?php echo $lg_name_active; ?></b> LGA.<br/>

                            <?php echo $lgTable; ?>
                        </div>
                    </form>
                </div>
                <!--Everything about view details page Ends here -->

                <div class="main_wrapper">
                    <form id="form1" name="allform" method="post" action="">
                        <p>ENJOY: <label>Want to view the data available</label><input type="submit" name="viewQuery"
                                                                                       value="VIEW"/>
                        </p>
                        <p>
                            CREATE NEW TABLE FOR
                            <label for="table_txt"></label>
                            <input name="tab_txt" type="text" id="tab_txt" size="10" value="Type LGA"
                                   onfocus="if(this.value=='Type LGA')this.value='';"
                                   onblur="if(this.value=='')this.value='Type LGA'; "/>
                            <label for="lg_cr8"></label>
                            <input type="submit" name="table_sub" id="table_sub" value="Create"/>

                            Currently Updating table <b><?php echo "\"$lg_upd\""; ?></b>
                        </p>
                        <p>
                            UPDATE TABLE FOR
                            <label for="lg_upd"></label>
                            <select name="lg_upd" id="lg_upd">
                                <!-- <option value="default" selected="selected">SELECT LGA</option> -->
                                <?php
                                $tab_val = "";
                                for ($nm = 0; $nm < count($tabler); $nm++) {
                                    $temp = $tabler[$nm];
                                    if ($tabler[$nm] == "lgabackup" || $tabler[$nm] == "restorelog" || $tabler[$nm] != "ido")
                                        continue;
                                    echo "<option value=\"$temp\">" . $temp . "</option>" . " \n";
                                }
                                ?>
                            </select>
                            Enter how many data <input name="data_num" type="text" id="data_num" value="10" size="10"
                                                       readonly="readonly"/>
                            <input type="submit" name="load" id="load" value="LOAD.."/>
                        </p>
                        <p>
                        <p style="word-spacing:15px; margin-left:90px; font-size:0.9em; background-color:#999; width:80%">
                            <label>Firstname</label>
                            <label>Middlename</label>
                            <label>Surname </label>
                            <label>Phone</label>
                            <label>&nbsp;&nbsp;&nbsp;Gender&nbsp;&nbsp;</label>
                            <label>&nbsp;&nbsp;Age</label>
                            <label>Occupation</label>
                            <label>Address</label>
                        </p>


                        <?php


                        if (isset($load)) {
                            if ($data_num != "" && $data_num <= 10 && $lg_upd != "default") {

                                echo "<script>" . "alert(\"Remember to Reselect the Number of fields and \\n the LGA for an accurate entry.\\n The work on the application is still in progress \"); </script>";
                                for ($i = 1; $i <= $data_num; $i++) {

                                    echo " <div class=\"form_txt\">" . $i . " : "
                                        . "<input type=\"text\" name=\"fname" . $i . "\" id=\"fname" . $i . "\" size=\"10\" /> \n";
                                    //$namer[$i]=$name.$i;
                                    echo "		<input type=\"text\" name=\"mname" . $i . "\" id=\"mname" . $i . "\" size=\"10\" value=\"-\" /> \n";
                                    echo "		<input type=\"text\" name=\"lname" . $i . "\" id=\"lname" . $i . "\" size=\"10\" /> \n";
                                    echo "      <input type=\"text\" name=\"phone" . $i . "\" id=\"phone" . $i . "\" size=\"10\" /> \n";
                                    //$phoner[$i]=$phone;
                                    echo "    Male <input type=\"radio\" name=\"gend" . $i . "\" id=\"gend" . $i . "\" value=\"male\" checked=\"checked\" /> \n";
                                    echo "    Female <input type=\"radio\" name=\"gend" . $i . "\" id=\"gend" . $i . "\" value=\"female\" /> \n";
                                    //$jober[$i]=$job.$i;
                                    echo "     <input type=\"text\" name=\"age" . $i . "\" id=\"age" . $i . "\" size=\"10\" value=\"0\" /> \n";
                                    echo "     <input type=\"text\" name=\"addr" . $i . "\" id=\"addr" . $i . "\" size=\"10\" value=\"-\" /> \n";
                                    echo "     <input type=\"text\" name=\"job" . $i . "\" id=\"job" . $i . "\" size=\"10\" value=\"-\" /></div> \n";
                                    echo "<br />";
                                }

                            } else {
                                $alerter = "<label style=\"color:red; margin-left:400px;\">" . ".....A field is not right!....</label>";
                            }

                        }
                        ?>

                        <div style=" float:right; margin-right:50px;">Have you Checked for Errors?<input type="checkbox"
                                                                                                         name="checker"
                                                                                                         onclick="checkValue();"/><input
                                    type="submit" name="submit" id="submit" value="Submit"
                                    style="background-color:#930"/></div>
                        </p>

                    </form>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
    <p align="center"><?php echo $alerter; ?></p>
    <br/>
    <br/>
    <br/>
    <p id="copy_wrap">Assembled and Formed by TP-Soft; <em>TransformationPrime</em> &copy; <a
                href="http://www.trans-prime.com" target="_blank">Trans-Prime.com</a><br/>
        <label>This Test version does not fit a mobile device; Best viewed with Mozilla Firefox browser</label>
    </p>
    </body>
    </html>
<?php exit; ?>