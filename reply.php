<?php
include 'connect.php';
include 'header.php';
 echo 'caca'.$_GET["topic_id"].'<br>';
 echo  $_SERVER['REQUEST_METHOD'].'dfsdfdfsdfsdfsd';
/*if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    echo 'This file cannot be called directly.';
}
else
{
 */   echo '<br>'.$_SESSION['signed_in'].'acaacacaaa'.'<br>'; 
    if(!$_SESSION['signed_in'])
    {
        echo 'You must be signed in to post a reply.';
    }
    else
    {
        $sql = "INSERT INTO 
                    posts(post_content,
                          post_date,
                          post_topic,
                          post_by) 
                VALUES ('" . $_POST['reply-content'] . "',
                        NOW(),
                        " . mysql_real_escape_string($_POST['topic_id']) . ",
                        ". $_SESSION['user_id'] . ")";
                         
                         echo $_POST["reply-content"].'<br>'.'fdcvff'.'<br>' . $_POST["topic_id"]. 'azaza'.'<br>'.$_SESSION['user_id'].'bbtbtt';
        $result = mysql_query($sql,$connection);
        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.';
        }
        else
        {
            echo 'Your reply has been saved, check out <a href="topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
        }
    }
 
include ('footer.php');
?>