<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
     <div class="box round first grid">
        <h2>Select Theme</h2>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $category=mysqli_real_escape_string($db->link, $_POST['category']);
    if($category!=""){
    $query="update tbl_theme set name = '$category' where id ='0'";
    $inserted_rows = $db->update($query);
    if ($inserted_rows) {
        echo "<span class='success'>Theme Selected Successfully.
     </span>";
    }else {
        echo "<span class='error'>Somthing went wrong !</span>";
    }
}else{
    echo "<span class='error'>Select a theme !</span>";
}
}

?>

        <div class="block">   
        <div>            
         <form action="theme.php" method="post">
            <table class="form">
                <tr>
                    <td>
                        <label>Theme</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option value="">Select Theme</option>
                            <option value="default">Default Theme</option>
                            <option value="dark">Dark Theme</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Select" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <div>
        <img src="../images/theme/default.png" width="48%" alt="theme default"/>
        <img src="../images/theme/dark.png" width="48%" alt="theme dark"/>
        </div>
        </div>
        
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



