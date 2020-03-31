<?php 
session_start();
$id = $_REQUEST["id"];
if ($_SESSION['user']==null)
{
  header('Location:login.php');
  exit;
}
    include_once("model/entity/blog.php");
    $rs = blog::deleteBlogFromDB($id);
    header('Location:comment.php');


?>