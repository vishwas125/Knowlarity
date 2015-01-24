<?php

include('connect.php');
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    $sql = "SELECT id, user FROM users WHERE phone = ".$_GET['patient_phone'];
    $rows = $dbh->query($sql);
    $row = $rows->fetch();
    $user_id = $row[0];
    $name= $row[1];
    $docSql = "SELECT * FROM userinfo WHERE user_id = ".$user_id;
    $rows = $dbh->query($docSql);
    $row = $rows->fetch();
    
    $txt= $name.", your age is ".$row['age'].". Height is ".$row['height']." feet. Weight is ".$row['weight'].". External Insulin dosage is ".$row['insulin']." units per day. Blood pressure medication is ".$row['bloodpressure'];
echo $txt;
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }


?>