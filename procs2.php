<?php

session_start();
if(!isset($_SESSION["user"])){
			header("Location:index.php?alert_msg=kkjuyt38498");
			/* //echo "<script> alert ('Please LOGIN AGAIN TO CONTINUE!');"."</script>"; */
} else{
}
require_once("class/connector.php");
$o_act=$_GET["aact"].$_GET["n"].$_GET["l"];
if($o_act=="out"){
	echo "Logging out!".$_SESSION["user"];
	try {
        $outque=$conn->prepare("update loglog set time_out = now() where logger_id = '".$_SESSION["user"]."';")->execute();
            echo "Logging out!";
            session_destroy();
            header("Location:index.php?alert_msg=Logged+out!");
            exit;
        } catch(PDOException $exception){
            echo $exception->getMessage();
        }
} else{ exit;}

?>