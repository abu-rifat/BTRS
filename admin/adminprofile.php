<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $A_ID = Session::get('A_ID');
?>


<div class="grid_10">
     <div class="box round first grid">
        <h2>Profile</h2>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $A_Name=mysqli_real_escape_string($db->link, $_POST['A_Name']);
    $A_PhoneNo=mysqli_real_escape_string($db->link, $_POST['A_PhoneNo']);
    $A_Email=mysqli_real_escape_string($db->link, $_POST['A_Email']);
    $A_Gender=mysqli_real_escape_string($db->link, $_POST['A_Gender']);

    $query1 = "select * from admin where A_PhoneNo = '$A_PhoneNo'";
        $row=$db->select($query1);
        $ck=0;
        if($row){
            
            while($result=$row->fetch_assoc()){
                if($result['A_ID']==$A_ID){   
                }else{
                    $ck=1;
            echo "<span class='error'>Mobile No already exists! Try Another One... </span>";
        }}}
        if($A_Name==" "||$A_PhoneNo==" "||$A_Email==" "||$A_Gender==" "){
            $ck=1;
            echo "<span class='error'>Plese Fillup All The Inputs... </span>";
        }
        if($ck!=1){
   
        $query="update admin
                set
                A_Name ='$A_Name',
                A_PhoneNo ='$A_PhoneNo',
                A_Email ='$A_Email',
                A_Gender ='$A_Gender'
                where A_ID = '$A_ID'";
        $updated_row = $db->update($query);
        if ($updated_row) {
            echo "<span class='success'>Profile Updated Successfully.
     </span>";
     Session::set("A_Name",$A_Name);
        }else {
            echo "<span class='error'>Profile Not Updated !</span>";
        }
    }
}

?>

        <div class="block">        
        <?php
            $query = "select * from admin where A_ID='$A_ID'";
            $getuser=$db->select($query);
            if($getuser){
                while($result=$getuser->fetch_assoc()){

        ?>       
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="A_Name" value="<?php echo $result['A_Name']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phone No</label>
                    </td>
                    <td>
                        <input type="text" name="A_PhoneNo" value="<?php echo $result['A_PhoneNo']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="email" name="A_Email" readonly value="<?php echo $result['A_Email']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Gender</label>
                    </td>
                    <td>
                    <input type="text" name="A_Gender" value="<?php echo $result['A_Gender']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>



<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>



<?php include 'inc/footer.php';?>



