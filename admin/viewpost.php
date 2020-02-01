<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!isset($_GET['viewpostid']) || $_GET['viewpostid']==NULL){
        echo "<script>window.location='postlist.php';</script>";

    }else{
        $postid=$_GET['viewpostid'];
    }
?>


<div class="grid_10">
	 <div class="box round first grid">
        <h2>Update Post</h2>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    echo "<script>window.location='postlist.php';</script>";
}
?>

        <div class="block">        
        <?php
            $query = "select * from tbl_post where id='$postid' order by id desc";
            $getpost=$db->select($query);
            if($getpost){
                while($postresult=$getpost->fetch_assoc()){

        ?>       
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="title" readonly value="<?php echo $postresult['title']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <?php
                                $query="select * from tbl_category";
                                $category=$db->select($query);
                                if($category){
                                    while($result=$category->fetch_assoc()){
                            ?>
                            <?php
                                if($postresult['category']==$result['id']) { 
                                    $val=$result['name'];
                                } } }
                            ?>
                        <input type="text" name="title" readonly value="<?php echo $val; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea class="tinymce"><?php echo $postresult['body']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tags</label>
                    </td>
                    <td>
                        <input type="text" readonly value="<?php echo $postresult['tags']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Author</label>
                    </td>
                    <td>
                        <input type="text" readonly value="<?php echo $postresult['author']; ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" Value="OK" />
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



