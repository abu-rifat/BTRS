<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Bus</h2>
               <div class="block copyblock"> 

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $C_ID=$fm->validation($_POST['C_ID']);
    $Class_ID=$fm->validation($_POST['Class_ID']);
    $Category_ID=$fm->validation($_POST['Category_ID']);
    $numrow=$fm->validation($_POST['numrow']);
    $numcolleft=$fm->validation($_POST['numcolleft']);
    $numcolright=$fm->validation($_POST['numcolright']);
    $lastrowseat=$fm->validation($_POST['lastrowseat']);
    $Coach_No=$fm->validation($_POST['Coach_No']);
    $totalseats=(($numcolleft+$numcolright)*($numrow-1))+$lastrowseat;


    $C_ID=mysqli_real_escape_string($db->link, $C_ID);
    $Class_ID=mysqli_real_escape_string($db->link, $Class_ID);
    $Category_ID=mysqli_real_escape_string($db->link, $Category_ID);
    $numrow=mysqli_real_escape_string($db->link, $numrow);
    $numcolleft=mysqli_real_escape_string($db->link, $numcolleft);
    $numcolright=mysqli_real_escape_string($db->link, $numcolright);
    $lastrowseat=mysqli_real_escape_string($db->link, $lastrowseat);
    $Coach_No=mysqli_real_escape_string($db->link, $Coach_No);

    
    
    $query = "select * from bus where C_ID = '$C_ID' and Coach_No = '$Coach_No'";
    $result = $db->select($query);
    if($result !=false){
        echo "<span class='error'>Coach Already Registered!!</span><br>";
        echo "<span class='error'>Multiple Coach With Same Coach No is Not Allowed For The Same Company!! </span>";
    }else{
        $query = "INSERT INTO bus (C_ID, Class_ID, Category_ID, Coach_No, totalseats, numrow, numcolleft, numcolright,lastrowseat) 
        VALUES('$C_ID', '$Class_ID','$Category_ID','$Coach_No','$totalseats','$numrow','$numcolleft','$numcolright','$lastrowseat')";
    $catinsert=$db->insert($query);
    if($catinsert){
        echo "<span class='success'>Coach Registered Successfully! </span>";
    }else {
        echo "<span class='error'>Coach Not Registered! </span>";
    }
    }
}
?>

                 <form action="" method="post">
                    <table class="form">
                    <tr>
                            <td>
                                <label>Company</label>
                            </td>
                            <td>

                                <select name="C_ID" class="medium" required>
                                <option value="">Select From The List</option>
                                <?php
                                    $query="select * from company";
                                    $blog_title=$db->select($query);
                                    if($blog_title){
                                    while($result = $blog_title->fetch_assoc()){
                                ?>
                                <option value=<?php echo $result['C_ID']; ?>><?php echo $result['C_Name']; ?>
                                </option>
                                <?php } } ?>
                                </select>

                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <label>Class</label>
                            </td>
                            <td>
                                <select name="Class_ID" class="medium" required>
                                <option value="">Select From The List</option>
                                <?php
                                    $query="select * from class";
                                    $blog_title=$db->select($query);
                                    if($blog_title){
                                    while($result = $blog_title->fetch_assoc()){
                                ?>
                                <option value=<?php echo $result['Class_ID']; ?>><?php echo $result['Class_Name']; ?>
                                </option>
                                <?php } } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select name="Category_ID" class="medium" required>
                                <option value="">Select From The List</option>
                                <?php
                                    $query="select * from category";
                                    $blog_title=$db->select($query);
                                    if($blog_title){
                                    while($result = $blog_title->fetch_assoc()){
                                ?>
                                <option value=<?php echo $result['Category_ID']; ?>><?php echo $result['Category_type']; ?>
                                </option>
                                <?php } } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Coach No</label>
                            </td>
                            <td>
                                <input type="number" name="Coach_No" placeholder="Coach No (Ex: 35)" class="medium" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Number of Rows</label>
                            </td>
                            <td>
                                <input type="number" name="numrow" placeholder="Number of Rows" class="medium" min="1" max="26" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Number of Left Columns</label>
                            </td>
                            <td>
                                <input type="number" name="numcolleft" placeholder="Num of Left Columns" class="medium" min="1" max="3" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Number of Right Columns</label>
                            </td>
                            <td>
                                <input type="number" name="numcolright" placeholder="Num of Right Columns" class="medium" min="1" max="3" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Number of Last row seats</label>
                            </td>
                            <td>
                                <input type="number" name="lastrowseat" placeholder="Num of Last row seats" class="medium" min="1" max="7" required/>
                            </td>
                        </tr>
						<tr>
                        <td></td> 
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
