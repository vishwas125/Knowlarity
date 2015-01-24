<?php
include('connect.php');
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $sql = "SELECT name FROM doctors WHERE department_id= ".$_GET['department_id'];
    $doctors = '';
    $i=1;
    foreach ($dbh->query($sql) as $row)
    {
        $doctors .= 'Press '.$i++.' for Doctor '.substr($row['name'], 4).' . ';
        //$row['name'] = substr($row['name'], 4);
        //$doctors .= '&&'.$row['name'];
    }
    //$doctors = substr($doctors, 2);
    echo $doctors;
 }   
catch(PDOException $e)
    {
    echo $e->getMessage();
    }


?>