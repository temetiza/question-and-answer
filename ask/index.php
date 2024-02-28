<?php

//import init 

require_once('../helpers/init.php');

$topic = getTopics();

// print "<pre>";
// print_r($topic); 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask</title>
</head>
<body>
    <h1>Ask your question</h1>
    <form action="/ask/received/index.php" method="post">
    <label for="question"> Your Question:</label><br />
    <input type="text" name="question" /> <br /> <br />
    <textarea name="explanation" id="" cols="30" rows="10"></textarea>  <br /> <br />

    <select name="topic" >
        <?php
        foreach($topic as $topic) {
            echo '<option value="'.$topic['tid'].'">'.$topic['topicName'].'</option>';
        }
        
        ?>
        
    </select>
    <br /> <br />
    <input type="submit" value="Ask" />
    </form>
</body>
</html>