<?php

//import init 

require_once('../helpers/init.php');

print "<pre>";
print_r($_POST);  
print_r($_SESSION); 

$email = "";
$password = "";
$loggedInUser = array();

// grab values

if(isset($_POST['email'])){
    $email = $_POST['email']; 
}

if(isset($_POST['password'])){
    $password = $_POST['password']; 
}

if(!empty($email) && !empty($password)){
    $loggedInUser = loginUser($email, $password);

}

if(empty($loggedInUser)) {
    echo " Not Logged in ";
}else{
    print_r($loggedInUser);
    $_SESSION['uhash'] = $loggedInUser['uHash'];
}


?>