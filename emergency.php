<?php
include('connect.php');
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    $sql = "SELECT id FROM users WHERE phone = ".$_GET['patient_phone'];
    $rows = $dbh->query($sql);
    $row = $rows->fetch();
    $user_id = $row[0];
    $docSql = "SELECT doctor_id FROM emergencies WHERE user_id = ".$user_id;
    $rows = $dbh->query($docSql);
    $row = $rows->fetch();
    $doctor_id =  $row[0];
    //Get Doctor Number
    $docSql2 = "SELECT phone FROM doctors WHERE id = ".$doctor_id;
    $rows = $dbh->query($docSql2);
    $row = $rows->fetch();
    echo  $row[0]; 
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }


?>