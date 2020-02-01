<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Admin</h2>
               <div class="block copyblock"> 

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $A_Email=$fm->validation($_POST['A_Email']);
    $password=$fm->validation(md5($_POST['password']));
    $A_Email=mysqli_real_escape_string($db->link, $A_Email);
    $password=mysqli_real_escape_string($db->link, $password);
    if(empty($A_Email) || empty($password)){
        echo "<span class='error'>Field Must Not Be Empty ! </span>";
    }else {
        $query1 = "select * from admin where A_Email = '$A_Email'";
        $row=$db->select($query1);
        if($row){
            echo "<span class='error'>Email Already Existed, Try Another Email! </span>";
        }elseif(strlen($_POST['password'])<6){
            echo "<span class='error'>Password Must Be Atleast 6 Charecters !! </span>";
        }else{
            $query = "INSERT INTO admin (A_Email, password) VALUES('$A_Email', '$password')";
            $catinsert=$db->insert($query);
            if($catinsert){
                echo "<span class='success'>Admin Created Successfully! </span>";
            }else {
                echo "<span class='error'>Admin Not Created! </span>";
            }
        }
        }
    }
?>

                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="A_Email" placeholder="Enter Email" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="text" name="password" placeholder="Atleast 6 Charecters" class="medium" />
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
