<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!isset($_GET['imgid']) || $_GET['imgid']==NULL){
        echo "<script>window.location='sliderlist.php';</script>";

    }else{
        $imgid=$_GET['imgid'];
    }
?>


<div class="grid_10">
	 <div class="box round first grid">
        <h2>Update Post</h2>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $text=mysqli_real_escape_string($db->link, $_POST['text']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = $unique_image;

    if($text==""){
        echo "<span class='error'>Field must not be empty ! </span>";
    }else{
if(!empty($file_name)){
    if ($file_size >10048567) {
        echo "<span class='error'>Image Size should be less then 10MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
        echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, "upload/slider/".$uploaded_image);

        $query ="select * from tbl_slider where id='$imgid'";
        $getData=$db->select($query);
        if($getData){
            while($delimg=$getData->fetch_assoc()){
                $dellink="upload/slider/".$delimg['image'];
                unlink($dellink);
            }
        }
        $query="update tbl_slider
                set
                text ='$text',
                image ='$uploaded_image'
                where id = '$imgid'";
        $updated_row = $db->update($query);
        if ($updated_row) {
            echo "<span class='success'>Data Updated Successfully.
     </span>";
        }else {
            echo "<span class='error'>Data Not Updated !</span>";
        }
    }

}else{
        $query="update tbl_slider
                set
                text ='$text'
                where id = '$imgid'";
        $updated_row = $db->update($query);
        if ($updated_row) {
            echo "<span class='success'>Data Updated Successfully.
     </span>";
        }else {
            echo "<span class='error'>Data Not Updated !</span>";
        }
}



}


}
?>

        <div class="block">        
        <?php
            $query = "select * from tbl_slider where id='$imgid'";
            $getimage=$db->select($query);
            if($getimage){
                while($imageresult=$getimage->fetch_assoc()){

        ?>       
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Slider Text</label>
                    </td>
                    <td>
                        <input type="text" name="text" value="<?php echo $imageresult['text']; ?>" class="medium" />
                    </td>
                </tr>          
                <tr>
                    <td>

                        <label>Upload Image</label>
                    </td>
                    <td>
                    </br>
                        <img src="upload/slider/<?php echo $imageresult['image']; ?>" height="200px" width="350px"/></br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
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



