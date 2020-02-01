<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Copyright Text</h2>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $note=$fm->validation($_POST['note']);
    $note=mysqli_real_escape_string($db->link, $note);

    if($note==""){
        echo "<span class='error'>Field must not be empty ! </span>";
    }else{
        $query="update tbl_footer
                set
                note ='$note'
                where id = '1'";
        $updated_row = $db->update($query);
        if ($updated_row) {
            echo "<span class='success'>Data Updated Successfully.
     </span>";
        }else {
            echo "<span class='error'>Data Not Updated !</span>";
        }
    
}
}

?>

<?php
    $query="select * from tbl_footer where id='1'";
    $footer=$db->select($query);
    if($footer){
    while($result = $footer->fetch_assoc()){
?>



        <div class="block copyblock"> 
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" <?php if(Session::get('userRole')==3){}else{?> readonly <?php } ?> value="<?php echo $result['note']; ?>" name="note" class="large" />
                    </td>
                </tr>
				
				 <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
<?php } } ?>

    </div>
</div>
<?php include 'inc/footer.php';?>
