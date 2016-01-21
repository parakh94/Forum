<?php
include 'header.php';
include 'connect.php';
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    echo "<form method='POST' action=''>
        Category name: <input type='text' name='cat_name' /><br><br>
        Category description: <textarea name='cat_description' /></textarea>
        <input type='submit' value='Add category' />
     </form>";
}
else
{
    $sql = "INSERT INTO categories(cat_name, cat_description)
       VALUES('". mysql_real_escape_string($_POST['cat_name']) . "',
             '". mysql_real_escape_string($_POST['cat_description']) ."')";
    $result = mysql_query($sql);
    if(!$result)
    {
        echo "Error" ;
    }
    else
    {
        echo "New category successfully added.";
    }
}
include 'footer.php';
?>
