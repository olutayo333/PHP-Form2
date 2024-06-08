<!-- Qservers for hosting php servers -->
<?php
    $host = 'localhost';
    $username= 'root';
    $password = '';
    $db='db_1';

    //CONNECTING USING PROCEDURER
    $connect = mysqli_connect($host, $username, $password, $db);
    if($connect){
        echo " connected";
    }
    else {
        echo 'not connected'; echo'<br/>';
        echo(mysqli_connect_error());
        //die("Not connected". $connect->error);
    }
        
?>