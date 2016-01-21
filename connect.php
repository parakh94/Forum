<?php
$server = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'forum';
 $connection=mysql_connect($server, $username,  $password);
if(!$connection)
{
    exit('Error: could not establish database connection');
}
$db=mysql_select_db($database);
if(!$db)
{
    exit('Error: could not select the database');
}	
?>