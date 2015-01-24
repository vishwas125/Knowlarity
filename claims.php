<?php

include('connect.php');
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    $sql = "SELECT id FROM users WHERE phone = ".$_GET['patient_phone'];
    $rows = $dbh->query($sql);
    $row = $rows->fetch();
    $user_id = $row[0];
    //echo $user_id;
    $docSql = "SELECT * FROM claims WHERE user_id = ".$user_id;
    $claims = '';
    $i=1;
    $text='';
    foreach ($dbh->query($docSql) as $row)
    {
    	$text .= 'Press '. $i++ .'  for claim id of '.$row['claimsid'].'. ' ;
        $claims .= '&&'.$row['claimsid'];  

    }

    // echo $claims= substr($claims, 2);
    echo $text;
    // $rows = $dbh->query($docSql);
    // $row = $rows->fetch();
    // $doctor_id =  $row[0];
    // //Get Doctor Number
    // $docSql2 = "";
    // $rows = $dbh->query($docSql2);
    // $row = $rows->fetch();
    // echo  $row[0]; 
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }


?>