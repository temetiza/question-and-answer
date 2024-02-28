<?php
// cleanup function

function cleanUp($data){
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;

}

// register function 

function registerUser($fname, $lname, $email, $password) {
    global $sqlConnect;
    $fname = cleanUp($fname);
    $lname = cleanUp($lname);
    $email = cleanUp($email);
    $password = md5($password);
    $joined_date = date("Y-m-d H:i:s");
    $uHash = md5($email);

    $query_text = "INSERT INTO users (fname, lname, email, pass, joined_date, uHash)
    VALUES ('$fname','$lname','$email','$password', 
    '$joined_date','$uHash')";
    $query = mysqli_query($sqlConnect, $query_text);
    // handle if there is error 
    if($query){
        echo ("user Table Created!");
    }else{
        echo ("user Not Table Created!");
    }
}

// login function

function loginUser($email, $password) {

    global $sqlConnect;
    $email = cleanUp($email);
    $password = md5($password);
    $fetched_data = array();

    $query_text = "SELECT * FROM users WHERE 
    email = '$email' AND pass = '$password' ";

    $query = mysqli_query($sqlConnect, $query_text);

    if($query){
        while ($row = mysqli_fetch_assoc($query)) {
            $fetched_data = $row;
        }
    }
    return $fetched_data;

}


// Add topic Functions

function addTopic($topic) {
    global $sqlConnect;
    $topic = cleanUp($topic);

    // insert data
    $query_text = "INSERT INTO topics (topicName)
    VALUES ('$topic')";
    $query = mysqli_query($sqlConnect, $query_text);
    // handle if there is error 
    if($query){
        echo ("topic Table Created!");
    }else{
        echo ("topic Not Table Created!");
    }
}


// get Topics

function getTopics(){
    global $sqlConnect;

    $fetched_data = array();

    $query_text = "SELECT * FROM topics";

    $query = mysqli_query($sqlConnect, $query_text);

    if($query){
        while ($row = mysqli_fetch_assoc($query)) {
            $fetched_data[] = $row;
        }
    }
    return $fetched_data;

}

// get user info from uhash

function getUserInforFromHash($userHash){
    global $sqlConnect;
    $userHash = cleanUp($userHash);
    $fetched_data = array();
    $query_text = "SELECT * FROM users WHERE 
    uHash = '$userHash'";
    $query = mysqli_query($sqlConnect, $query_text);
    if($query){
        while ($row = mysqli_fetch_assoc($query)) {
            $fetched_data = $row;
        }
    }
    return $fetched_data;
}

// add question to DB 

function addQuestion($uid, $tid, $question,
$explanation){
    global $sqlConnect;
    $uid = cleanUp($uid);
    $tid = cleanUp($tid);
    $question = cleanUp($question);
    $explanation = cleanUp($explanation);
    $askedDate = date("Y-m-d H:i:s");
    $qHash = md5($question.$askedDate);
    // insdert data
    $query_text = "INSERT INTO question (uid, tid, question, explanation, askedDate, qHash)
    VALUES ('$uid','$tid','$question','$explanation', 
    '$askedDate','$qHash')";
    $query = mysqli_query($sqlConnect, $query_text);
    // handle if there is error 
    if($query){
        echo ("Question Table Created!");
    }else{
        echo ("question Not Table Created!");
    }

}

// get questions 

function getQuestions($limit){
    global $sqlConnect;
    $limit = cleanUp($limit);
    $fetched_data = array();
    $query_text = "SELECT * FROM question LIMIT 
    $limit";
    $query = mysqli_query($sqlConnect, $query_text);
    if($query){
        while ($row = mysqli_fetch_assoc($query)) {
            $fetched_data[] = $row;
        }
    }
    return $fetched_data;
}








?>
