<script type="text/javascript">
    function checkpass() {
        var activsub = false;
        if (regForm.ver_pass.value != regForm.password.value || regForm.password.value < 6) {
            alert("Password does not match!/invalid");
            regForm.ver_pass.value = "";
            activsub = false;
        }
    }

    function cuname() {

        if (regForm.username.value == "" || regForm.username.value < 3) {
            alert("this field is empty");
            activsub = false;
        } else {
            activsub = false;
        }

    }

    function cfname() {

        if (regForm.firstname.value == "" || regForm.firstname.value < 3) {
            alert("this field is empty");
        }
    }

    function cmname() {
        if (regForm.middlename.value == "" || regForm.middlename.value < 3) {
            alert("this field is empty");
        }
    }

    function clname() {
        if (regForm.lastname.value == "" || regForm.lastname.value < 3) {
            alert("this field is empty");
        }
    }

    if (activesub = true) {
        regForm.sub_reg.disabled = true;
    }

</script>

<?php

extract($_POST);
if (isset($sub_reg) && $sub_reg !=='') {

    if ($username != "" && $ver_pass != "" && $firstname != "" && $middlename != "" && $lastname != "") {

        try {
            $regquery = $conn->prepare("INSERT INTO useres (uname,pword,fname,mname,lname,prev) VALUES ('$username','$ver_pass','$firstname','$middlename','$lastname','$aright')")->execute();
            try {
                $logreg = $conn->prepare("INSERT INTO reglog (registerer_id,reg_id,date_reg) VALUES ('" . $_SESSION["user"] . "','$username',now())")->execute();
                $_GET["action"] = "nothing";
                $_GET["alert_msg"] = "Form success!";
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            $_GET["alert_msg"] = "Submission Error!";
        }

    } else {
        $_GET["alert_msg"] = "Discrepancies in form";
    }
}
?>
<hr/>
<div style="margin-left:20%; margin-right:20%; padding-top:5px; padding-left:40px; background:url(images/wallback.png) bottom center;  border-radius:10px;">
    <h2> Make Registration Entries:</h2>
    <form action="" method="post" style=" position: static" name="regForm">
        <div class="dynamiclabel">
            <input type="text" name="username" id="username" placeholder="Username" onblur="cuname()"/>
            <label for="username">Username</label>
        </div>
        <div class="dynamiclabel">
            <input type="password" name="password" id="password" placeholder="Password"/>
            <label for="password">Password</label>
        </div>
        <div class="dynamiclabel">
            <input type="password" name="ver_pass" id="ver_pass" placeholder="Verify Password" onblur="checkpass()"/>
            <label for="ver_pass">Verify password</label>
        </div>
        <div class="dynamiclabel">
            <input type="text" name="firstname" id="firstname" placeholder="Firstname" onblur="cfname()"/>
            <label for="firstname">Firstname</label>
        </div>
        <div class="dynamiclabel">
            <input type="text" name="middlename" id="middlename" placeholder="Middlename" onblur="cmname()"/>
            <label for="middlename">Middlename</label>
        </div>
        <div class="dynamiclabel">
            <input type="text" name="lastname" id="lastname" placeholder="Lastname" onblur="clname()"/>
            <label for="lastname">Lastname</label>
        </div>
        <div align="center" style="background-color:#FFF; margin-right:21%; margin-left:6%">
            <b>Privilege:</b> Normal<input type="radio" name="aright" value="normal" checked="checked"/>
            Admin<input type="radio" name="aright" value="admin"/>
            TopAdmin<input type="radio" name="aright" value="tadmin"/>
        </div>
        <div class="dynamicbutton" style="margin-right:10%"><input type="submit" name="sub_reg" id="sub_reg"
                                                                   value="Register"/><input type="reset"/></div>
    </form>
</div>