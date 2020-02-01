<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!isset($_GET['catid']) || $_GET['catid']==NULL){
        echo "<script>window.location='catlist.php';</script>";

        //alternative code.....
        //header("Location:catlist.php");
    }else{
        $id=$_GET['catid'];
    }
?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){

        
        


    $name=$fm->validation($_POST['name']);
    $name=mysqli_real_escape_string($db->link, $name);
    if(empty($name)){
        echo "<span class='error'>Field Must Not Be Empty ! </span>";
    }else {
        $query1 = "select * from tbl_category where name = '$name'";
        $row=$db->select($query1);
        if($row){
            $ck=0;
            while($result=$row->fetch_assoc()){
                if($result['id']==$id){
                    $ck=1;
                    echo "<span class='error'>Already ".$name." is the category name, if you don't want to change, please go back to dashboard !! </span>";
                }
            }
            if($ck!=1){
                echo "<span class='error'>Category name already exists, try anotherone !! </span>";
        }}else{
            $query = "update tbl_category set name = '$name' where id = '$id'";
            $catupdate=$db->update($query);
            if($catupdate){
                echo "<span class='success'>Category Updated Successfully! </span>";
            }else {
                echo "<span class='error'>Category Not Updated ! </span>";
            }
    }
}
}
?>
<?php
    $editquery = "select * from tbl_category where id = '$id' order by id desc";
    $editcategory=$db->select($editquery);
    while($editresult = $editcategory->fetch_assoc()){

?>

                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php  echo $editresult['name']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>