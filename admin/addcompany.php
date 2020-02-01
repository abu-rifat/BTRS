<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Company</h2>
               <div class="block copyblock"> 

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $C_Name=$fm->validation($_POST['C_Name']);
    $C_PhoneNo=$fm->validation($_POST['C_PhoneNo']);
    $C_Email=$fm->validation($_POST['C_Email']);
    $Password=$fm->validation(md5($_POST['Password']));
    $C_Name=mysqli_real_escape_string($db->link, $C_Name);
    $Password=mysqli_real_escape_string($db->link, $Password);
    $C_Email=mysqli_real_escape_string($db->link, $C_Email);
    $C_PhoneNo=mysqli_real_escape_string($db->link, $C_PhoneNo);
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
                                <label>Company Name</label>
                            </td>
                            <td>
                                <input type="text" name="C_Name" placeholder="Comapany Name" class="medium" />
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="email" name="C_Email" placeholder="Enter Email" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" name="Password" placeholder="Atleast 6 Charecters" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Phone No</label>
                            </td>
                            <td>
                                <input type="text" name="C_PhoneNo" placeholder="Mobile No" class="medium" />
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
