<?php
require __DIR__.'/../cred.php';

$db = 'loaner';
$conn = file_get_contents('cache.txt');

if (! $conn) {
    $credential = getCredential();
    $host = '127.0.0.1';
    $user = $credential['username'];
    $pass = $credential['password'];
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $conn = new PDO($dsn, $user, $pass, $options);
        file_put_contents('cache.txt', $conn);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

//Getting the tables in the database

$tabler=Array();

try {
    $sql = "SHOW TABLES FROM $db";
    $result = $conn->query($sql)->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $PDOException) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' .$PDOException->getMessage() ;
}


//var_dump($result->fetchAll(PDO::FETCH_COLUMN));

$counter=0;
foreach ($result as $row) {
   $tabler[$counter]= "{$row}";
  // echo $tabler[$counter]."</br>";
	$counter++;
}
//mysql_free_result($result);
//Tables getting ends here //

function namegetter ($conn){
	$logman=$_SESSION["user"];
$detail_que=$conn->query("select * from useres where uname='$logman' limit 1")->fetch();
if($detail_que){
		/* echo "<script> alert(\"".$get_details['lname']."\");</script>"; */
		$_GET["ufname"]=$detail_que['fname'];
}else{echo "Some error(s) ";}
return $_GET["ufname"];
}


//Selecting all
function select_all($conn, $table, $field, $value, $req)
{
	try {

        $det_all = $conn->query("select * from $table where $field='$value'")->fetchAll();
		if ($table == "loglog") {
			$tbrow = count($det_all);
			///////////
			if ($tbrow < 1 && $req == "lognum") {
				return "0";
			} else if ($tbrow > 0 && $req == "lognum") {
				return $tbrow;
			} else if ($tbrow >= 1 && $req == "logstat") {

				foreach ($det_all as $item) {
					////////////////////
					if ($item['time_out'] == "0000-00-00 00:00:00") {
						return "Online";
					} else {
						return "Offline";
					}
					///////////////////////
				} ///////////////////// while end here
			} /////// 2nd if
		} //// 3rd if
    } catch (PDOException $PDOException) {
		echo $PDOException->getMessage();
	}
}

?>
