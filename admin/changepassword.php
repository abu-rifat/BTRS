<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">

    <div class="box round first grid">
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $userid=Session::get("userID");
                $oldpass=$fm->validation(md5($_POST['oldpass']));
                $newpass1=$fm->validation(md5($_POST['newpass1']));
                $newpass2=$fm->validation(md5($_POST['newpass2']));

                $oldpass=mysqli_real_escape_string($db->link, $oldpass);
                $newpass1=mysqli_real_escape_string($db->link, $newpass1);
                $newpass2=mysqli_real_escape_string($db->link, $newpass2);
                if($userid=="" || $oldpass=="" || $newpass1=="" || $newpass2==""){
                    echo "<span style='color:red; font-size:18px;'>Field Must Not Be Empty ...!!. </span>";
                }else{
                $query = "select * from tbl_user where id = '$userid' and password = '$oldpass'";
                $result = $db->select($query);
                if($result !=false){
                    if($newpass1 !=$newpass2 || strlen($_POST['newpass1'])<6){
                    echo "<span style='color:red; font-size:18px;'>Please Enter New Password Correactly..!! </span>";
                }else{
                    $query2 = "update tbl_user set password = '$newpass1' where id = '$userid' and password = '$oldpass'";
                    $result2 = $db->update($query2);
                    if($result2){
                            echo "<span class='success'>Password Changed Successfully! </span>";
                    }else{
                            echo "<span style='color:red; font-size:18px;'>No Result Found !!. </span>";
                    }
                }
                }else{
                    echo "<span style='color:red; font-size:18px;'>Current Password did not matched !!.</span>";
                }

            }
        }
        ?>
        <h2>Change Password</h2>
        <div class="block">               
         <form method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="oldpass" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Atleast 6 characters" name="newpass1" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Re-enter New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Re-enter the new password" name="newpass2" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>