<?php
//import init 
require_once('../../helpers/init.php');

print "<pre>";
print_r($_POST); 
print_r($_SESSION);  

// a place to handle the question form submission

$uid = 0; //get this ffrom session
$tid = 0; 
$question = "";
$explanation = ""; 
$userHash = "";
$userInfo = array();

// grab values

if(isset($_SESSION['uhash'])){
    $userHash = $_SESSION['uhash']; 
    $userInfo = getUserInforFromHash($userHash);
    if(!empty($userInfo)) {
        // print_r(userInfo);
        if(isset($userInfo['uid'])){
            $uid = $userInfo['uid'];
        }
    }
}

if(isset($_POST['topic'])){
    $tid = $_POST['topic']; 
}
if(isset($_POST['explanation'])){
    $explanation = $_POST['explanation']; 
}

if(isset($_POST['question'])){
    $question = $_POST['question']; 
}

// add question to DB
if($uid != 0 && $tid != 0 && !empty($question))
{
    // echo "Here";
    addQuestion($uid, $tid, $question,
    $explanation);
}

?>