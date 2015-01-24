<?php
include('connect.php');
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/
    //echo 'Connected to database';

    $sql = "SELECT * FROM users WHERE phone = ".$_GET['patient_phone'];
   /*  
    foreach ($dbh->query($sql) as $row)
        {
        print $row['user'] .' - '. $row['phone'] . '<br />';
        }
    }
    */
    $rows = $dbh->query($sql);
    $row = $rows->fetch();
    echo 'Hello '.$row[1];
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }


?>
