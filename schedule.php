<?php
session_start();
include('connect.php');
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    //$sql = "SELECT * FROM doctors WHERE department_id= ".$_GET['department_choice'];

     $docSql = "SELECT * FROM doctors WHERE department_id = ".$_GET['department_choice'];
    $doctor_id = '';
    $i=1;
    $text='';
    foreach ($dbh->query($docSql) as $row)
    {
        if($_GET['doctor_id']==$i)
    	{
            $doctor_id = $row['id'];
            break;
        }  
            $i++;
    }
    //echo $doc_id;
    
    $csql = "SELECT * FROM `schedule` WHERE doctor_id=".$doctor_id ." AND flag =0 AND start > NOW() ORDER BY start ASC LIMIT 4";

     $start = '';
     $end= '';
     $newstr= '';
     $newend= '';
     $txt='';
     $p=1;

    foreach (($dbh->query($csql)) as $row)
    {	
    	$txt .='To book an appointment ';
    	$dt=date_create($row['start']);
    	$et=date_create($row['end']);
    	$day=date_create($row['appointment']);
    	$dat=date_format($day, '\o\n l jS F');

        $start = date_format($dt,'g A  ');
        $end = date_format($et,'g A  ');
        $newstr = substr_replace($start, ' ', strlen($start)- 3, 0);
        $newend = substr_replace($end, ' ', strlen($end)- 3, 0);
        $txt .=$dat." from ".$newstr." to ".$newend." press ".$p.'. ';
        $p++;

    }
   

    echo $txt;
    //echo "Your appointment has been set on ".$dat." from ".$newstr." to ".$newend ;
    
 }   
catch(PDOException $e)
    {
    echo $e->getMessage();
    }


?>