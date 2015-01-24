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
    $clSql = "SELECT * FROM schedule WHERE doctor_id = ".$doctor_id." AND flag =0 AND start > NOW() ORDER BY start ASC LIMIT 4";
    $schedule_id = '';
    $i=1;
    $text='';
    foreach ($dbh->query($clSql) as $row)
    {
        if($_GET['schedule_choice']==$i)
    	{
            $schedule_id = $row['id'];
            break;
        }  
            $i++;
    }
    $sql = "UPDATE schedule SET flag = 1, user_id=".$user_id." WHERE id =".$schedule_id;
    $rows = $dbh->query($sql);
    //var_dump($sql);
    $row = $rows->fetch();
     echo "Appointment has been scheduled";
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