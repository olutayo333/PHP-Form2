<?php
require('connection.php');
session_start();

if(isset($_POST['submit'])){
    $firstName = $_POST["firstName"];
    $lastName= $_POST ["lastName"];
    $email = $_POST ["email"];
    $password = $_POST ["password"];
    $address = $_POST ["address"];

    if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($address)){
        $_SESSION['error_message'] = 'All Fields must be filled ';
        header('location:form.php');
    }
    else  { 
        //if(count($password) <=8){$_SESSION['error_message']="Password Must be more than 8 characters" ;}
        $checkEmailQuery = "SELECT * FROM table2 WHERE `email`= ?";
        //$found = mysqli_query($connect, $checkEmailQuery);
       
        //USING PREPARED STATMENTS
        $prepare = $connect->prepare($checkEmailQuery);
        $bind = $prepare->bind_param('s', $email);
        $check=$prepare->execute();
        $found=$prepare->get_result()->fetch_assoc();

        //if(mysqli_num_rows($found)>0){
        if ($found>0){  
            $_SESSION['error_message']="User already exist";
            header("location:form.php");
        }
        else{
            //HASHING PASSWORD
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            //SAVING INTO DB
            //$query="INSERT INTO `table2`( `firstName`,`lastName`,`email`,`password`,`address` ) VALUES ( '$firstName', '$lastName', '$email', '$hashedpassword', '$address'  )" ;
            //$check = mysqli_query($connect, $query);
            
            // $execute = $prepareQuery->execute();

            // $preparedQuery = $connect->prepare($query);
            //         $execute = $preparedQuery->execute();
            
            //USING PREPARED STATMENT
            $query ="INSERT INTO `table2`(`firstName`, `lastName`, `email`, `password`, `address`) VALUES(?, ?, ?, ?, ?)";
            $prepare = $connect->prepare($query);
            $bind = $prepare->bind_param('sssss',  $firstName, $lastName, $email, $hashedpassword, $address );
            $check=$prepare->execute(); 
            print_r($check);
            //$check = mysqli_query($connect, $query);
            if($check){
               // echo "user saved successfully"; //echo $hashedPassword;
                $_SESSION['error_message']='Registration successfull';
                header("location:login.php");
            }
            else{
                echo "</br>"; 
                //echo" Not Successful";
                $_SESSION['error_message']="Registration Failed";
                //header("location:form.php");
            }
        }
         //INSERT INTO `table1` ( `name`, `phone_number`, `email`, `address`, `password`) VALUES ('laolas', '0703334333456', 'jkjtyr6e@ertfgtyu.com', 'ogbomoso', 'Assdfderrytgfgndhfg34');
    }
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password=$_POST['password'];

    $query = "SELECT * FROM table2 WHERE email='$email'";
    $found = mysqli_query($connect, $query);
    $result = mysqli_fetch_assoc($found);

    if(mysqli_num_rows($found)>0){
        $verify = password_verify($password, $result['password']);
        if($verify){
            echo "correct";
        }
        else{
            $_SESSION['response']="Password is incorrect";
            header("location:login.php");
        }
    }
    else{
        $_SESSION['response'] = "Email does not exist";
        header("location:login.php");
    }
}


//UPDATE USING PREPARED STATEMENT
//$updateQuery= "$UPDATE products SET product_name =?, product_price =?, quantity =? WHERE product_id =?";
//prepare = "$connect->prepare($updateQuery)";
//$bind = $prepare->bind("sssi", $product_name, $product_price, $product_quantity, $product_id);
//$insert = $prepare->execute();
// $_POST $_GET $_REQUEST



?>