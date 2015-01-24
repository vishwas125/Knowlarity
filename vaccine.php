<?php
include('connect.php');
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    $sql = "SELECT * FROM vaccines WHERE user_id = (SELECT id from users WHERE phone= '".$_GET['patient_phone']."')";
    $rows = $dbh->query($sql);
    $row = $rows->fetch();
    $dt=date_create($row['next_dosage']);
    $dat=date_format($dt, 'l  F jS');
    echo "Your ".$row['vaccine_name']." Vaccine is due on ".$dat;
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }


?>