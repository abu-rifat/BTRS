<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php if(Session::get('userRole')==3){
    }else{
    echo "<script>window.location='index.php';</script>";
} ?>

<div class="grid_10">
	 <div class="box round first grid">
        <h2>Add New Slider</h2>

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

    if($text==""||$file_name==""){
        echo "<span class='error'>Field must not be empty ! </span>";
    }elseif ($file_size >10048567) {
        echo "<span class='error'>Image Size should be less then 10MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
        echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, "upload/slider/".$uploaded_image);
        $query = "INSERT INTO tbl_slider(text, image) VALUES('$text','$uploaded_image')";
        $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
            echo "<span class='success'>Image Uploaded Successfully.
     </span>";
        }else {
            echo "<span class='error'>Image Not Uploaded !</span>";
        }
    }








}
?>

        <div class="block">               
         <form action="addslider.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Slider Text</label>
                    </td>
                    <td>
                        <input type="text" name="text" placeholder="Enter Slider Text..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Slider Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Add Slider" />
                    </td>
                </tr>
            </table>
            </form>
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



