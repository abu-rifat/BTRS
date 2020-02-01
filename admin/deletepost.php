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
    if(!isset($_GET['delpostid']) || $_GET['delpostid']==NULL){
        echo "<script>window.location='postlist.php';</script>";
    }else{
        $postid=$_GET['delpostid'];

        $query ="select * from tbl_post where id='$postid'";
        $getData=$db->select($query);
        if($getData){
        	while($delimg=$getData->fetch_assoc()){
        		$dellink="upload/".$delimg['image'];
        		unlink($dellink);
        	}
        }
        $delquery="delete from tbl_post where id = '$postid'";
        $delData=$db->delete($delquery);
        if($delData){
        	echo "<script>alart('Data Deleted Successfully. ');</script>";
        	echo "<script>window.location = 'postlist.php';</script>";
        }else{
        	echo "<script>alart('Data Not Deleted. ');</script>";
        	echo "<script>window.location = 'postlist.php';</script>";
        }
    }
?>

