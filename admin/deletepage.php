<?php 
    include '../lib/Session.php';
    Session::checkSession();
?>

<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/Format.php';?>

<?php 
    $db = new Database();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000"); 
?>
<?php
    if(!isset($_GET['delpage']) || $_GET['delpage']==NULL){
        echo "<script>window.location='index.php';</script>";
    }else{
        $pageid=$_GET['delpage'];

        
        $delquery="delete from tbl_page where id = '$pageid'";
        $delData=$db->delete($delquery);
        if($delData){
            echo "<script>alert('Page Deleted Successfully. ');</script>";
            echo "<script>window.location = 'index.php';</script>";
        }else{
            echo "<script>alert('Page Not Deleted. ');</script>";
            echo "<script>window.location = 'index.php';</script>";
        }
    }
?>

