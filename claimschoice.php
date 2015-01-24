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
        if($_GET['patient_choice']==$i)
    	   {
            $claim_id = $row['claimsid'];
            }  
            $i++;
    }
    $clSql = "SELECT status FROM claims WHERE claimsid = ".$claim_id;
     $rows = $dbh->query($clSql);
     $row = $rows->fetch();
     $st= $row[0];

     echo "Current status is ".$st;
    // echo $claims= substr($claims, 2);
    
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