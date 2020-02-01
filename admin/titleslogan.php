﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style>
    .leftside{float:left;width:70%;}
    .rightside{float:right;width:20%;}
    .rightside img{height:160px;width:160px;}
</style>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $title=$fm->validation($_POST['title']);
        $slogan=$fm->validation($_POST['slogan']);
    $title=mysqli_real_escape_string($db->link, $title);
    $slogan=mysqli_real_escape_string($db->link, $slogan);

    $permited  = array('png');
    $file_name = $_FILES['logo']['name'];
    $file_size = $_FILES['logo']['size'];
    $file_temp = $_FILES['logo']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $same_image = 'logo'.'.'.$file_ext;
    $uploaded_image = $same_image;

    if($title==""||$slogan==""){
        echo "<span class='error'>Field must not be empty ! </span>";
    }else{
if(!empty($file_name)){
    if ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
        echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, "upload/".$uploaded_image);


        $query="update tbl_slogan
                set
                title ='$title',
                slogan ='$slogan',
                logo = '$uploaded_image'
                where id = '1'";
        $updated_row = $db->update($query);
        if ($updated_row) {
            echo "<span class='success'>Data Updated Successfully.
     </span>";
        }else {
            echo "<span class='error'>Data Not Updated !</span>";
        }
    }

}else{
        $query="update tbl_slogan
                set
                title ='$title',
                slogan ='$slogan'
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
}

?>

<?php
    $query="select * from tbl_slogan where id='1'";
    $blog_title=$db->select($query);
    if($blog_title){
    while($result = $blog_title->fetch_assoc()){
?>


            <div class="block sloginblock">
                <div class="leftside">

                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" <?php if(Session::get('userRole')==3||Session::get('userRole')==2){}else{?> readonly <?php } ?> value="<?php echo $result['title']; ?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" <?php if(Session::get('userRole')==3||Session::get('userRole')==2){}else{?> readonly <?php } ?> value="<?php echo $result['slogan']; ?>" name="slogan" class="medium" />
                            </td>
                        </tr>
                        <?php if(Session::get('userRole')==3){?>
						 <tr>
                    <td>
                        <label>Upload Logo</label>
                    </td>
                    <td>
                        <input type="file" name="logo" />
                    </td>
                    <?php } ?>
                </tr>
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" <?php if(Session::get('userRole')==3){ ?> Value="Update" <?php }else{?> Value="OK" <?php } ?> />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                <div class="rightside">

                <?php
                    echo "<img src=upload/".$result['logo']."?".time()."alt=\"logo\"/>";
                ?>
                </div>
                </div>
<?php } } ?>
            </div>
        </div>


<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
            setSidebarHeight();
        });
    </script>

<?php include 'inc/footer.php';?>