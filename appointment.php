<?php
include('connect.php');
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $sql = "SELECT name FROM departments";
    $departments = '';
    foreach ($dbh->query($sql) as $row)
    {
        $departments .= '&&'.$row['name'];    
    
        
    }
    $departments = substr($departments, 2);
    echo $departments;
 }   
catch(PDOException $e)
    {
    echo $e->getMessage();
    }


?>