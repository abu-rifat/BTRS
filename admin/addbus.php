<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Bus</h2>
               <div class="block copyblock"> 

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $C_Name=$fm->validation($_POST['C_Name']);
    $Class_ID=$fm->validation($_POST['Class_ID']);
    $Category_ID=$fm->validation($_POST['Category_ID']);
    $numrow=$fm->validation(md5($_POST['numrow']));
    $numcolleft=$fm->validation($_POST['numcolleft']);
    $numcolright=$fm->validation($_POST['numcolright']);
    $lastrowseat=$fm->validation(md5($_POST['lastrowseat']));


    $C_Name=mysqli_real_escape_string($db->link, $C_Name);
    $Class_ID=mysqli_real_escape_string($db->link, $Class_ID);
    $Category_ID=mysqli_real_escape_string($db->link, $Category_ID);
    $numrow=mysqli_real_escape_string($db->link, $numrow);
    $numcolleft=mysqli_real_escape_string($db->link, $numcolleft);
    $numcolright=mysqli_real_escape_string($db->link, $numcolright);
    $lastrowseat=mysqli_real_escape_string($db->link, $lastrowseat);
    
    

    if(empty($C_Email) || empty($Password) || empty($C_Name) || empty($C_PhoneNo)){
        echo "<span class='error'>Field Must Not Be Empty ! </span>";
    }else {
        $query1 = "select * from company where C_Email = '$C_Email'";
        $row=$db->select($query1);
        if($row){
            echo "<span class='error'>Email Already Existed, Try Another Email! </span>";
        }elseif(strlen($_POST['Password'])<6){
            echo "<span class='error'>Password Must Be Atleast 6 Charecters !! </span>";
        }else{
            $query = "INSERT INTO company (C_Email, Password, C_PhoneNo, C_Name) VALUES('$C_Email', '$Password','$C_PhoneNo','$C_Name')";
            $catinsert=$db->insert($query);
            if($catinsert){
                echo "<span class='success'>Company Created Successfully! </span>";
            }else {
                echo "<span class='error'>Company Not Created! </span>";
            }
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
                                <select name="C_Name" class="medium">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="fiat">Fiat</option>
                                    <option value="audi">Audi</option>
  </select>
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <label>Class</label>
                            </td>
                            <td>
                                <input type="text" name="Class_ID" placeholder="Class" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <input type="password" name="Category_ID" placeholder="Category" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Number of Rows</label>
                            </td>
                            <td>
                                <input type="text" name="numrow" placeholder="Number of Rows" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Number of Left Columns</label>
                            </td>
                            <td>
                                <input type="text" name="numcolleft" placeholder="Num of Left Columns" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Number of Right Columns</label>
                            </td>
                            <td>
                                <input type="text" name="numcolright" placeholder="Num of Right Columns" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Number of Last row seats</label>
                            </td>
                            <td>
                                <input type="text" name="lastrowseat" placeholder="Num of Last row seats" class="medium" />
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
