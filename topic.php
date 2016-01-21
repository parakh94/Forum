<?php
include 'connect.php';
include 'header.php';
 
 $sql="SELECT
    topics.topic_id,
    topics.topic_subject,
    topics.topic_date,
    users.user_name,
    posts.post_content,
    posts.post_date
FROM
    topics,users,posts
WHERE
    users.user_id=topics.topic_by AND
    topics.topic_id=posts.post_topic AND
    topics.topic_id = " . mysql_real_escape_string($_GET['topic_id']);
    
$t=$_GET['topic_id'];
//echo 'zzzzz'.$t.'<br>';
$result = mysql_query($sql);
//echo 'fvfdvfdd'.'<br>';
//echo mysql_num_rows($result).'dffddfdf'.'<br>'; 
if(!$result)
{
    echo 'The topic could not be displayed, please try again later.' . mysql_error();
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo 'This topic does not exist.';
    }
    else
    {
        $row = mysql_fetch_assoc($result);
        $num=mysql_num_rows($result);
        echo '<table border="1">
          <tr>
            <th>'.$row["topic_subject"].'</th>
          </tr>';  
        while($num--)
            {   
                echo '<tr>';
                    echo '<td class="leftpart">';
                        echo $row["user_name"].'<br>'.($row["topic_date"]);
                    echo '<td class="rightpart">';
                        echo $row['post_content'];
                    echo '</td>';
                echo '</tr>';
            }
            if($_SERVER['REQUEST_METHOD'] != 'POST')
            {
                echo "<h2>Reply</h2>"."<form method='post' action='reply.php?topic_id=' ". mysql_real_escape_string($_GET['topic_id']). ">
                    <textarea name='reply-content'></textarea>
                    <input type='submit' value='Submit reply' />
                </form>";
            }
            /*else
            {
                echo '<br>'.$_SESSION['signed_in'].'acaacacaaa'.'<br>'; 
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
                                    " . mysql_real_escape_string($t) . ",
                                    ". $_SESSION['user_id'] . ")";
                                     
                                     echo $_POST["reply-content"].'<br>'.'fdcvff'.'<br>' . $t. 'azaza'.'<br>'.$_SESSION['user_id'].'bbtbtt';
                    $result = mysql_query($sql,$connection);
                    if(!$result)
                    {
                        echo 'Your reply has not been saved, please try again later.';
                    }
                    else
                    {
                        echo 'Your reply has been saved, check out <a href="topic.php?topic_id=' . htmlentities($t) . '">the topic</a>.';
                    }
                }
            }*/
    
        }
    }
include('footer.php');
?>