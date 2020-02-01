<?php 
    include '../lib/Session.php';
    Session::checkLogin();
?>

<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/Format.php';?>

<?php 
	$db = new Database();
	$fm = new Format();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/style.css">


    <title>Bus Ticket Reservation System</title>
</head>
<body>

<?php include 'ins/lognav.php';?>


<!--Login section of BTRS - University of barishal-->

<div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2 col-md-1"></div>
            <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-xs-12">
                <div class="form" id="login">
                    
                        <h2>Admin Login</h2>
                        </br>
                        <?php
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$A_Email=$fm->validation($_POST['A_Email']);
                $Password=$fm->validation(md5($_POST['Password']));
                echo $Password;

				$email=mysqli_real_escape_string($db->link, $A_Email);
                $password=mysqli_real_escape_string($db->link, $Password);
                
                //$query = "INSERT INTO admin(A_Email, Password) VALUES('$A_Email','$Password')";
        		//$inserted_rows = $db->insert($query);

				$query = "select * from admin where A_Email = '$A_Email' and Password = '$Password'";
				$result = $db->select($query);
				if($result !=false){
					$value = mysqli_fetch_array($result);
					$row = mysqli_num_rows($result);
					if($row>0){
						Session::set("login",true);
						Session::set("A_Email",$value['A_Email']);
						Session::set("A_Name",$value['A_Name']);
                        Session::set("A_ID",$value['A_ID']);
                        Session::set("A_PhoneNo",$value['A_PhoneNo']);
						Session::set("A_Gender",$value['A_Gender']);
						header("Location:index.php");


					}else{
							echo "<span style='color:red; font-size:18px;'>No Result Found !!. </span>";
					}
				}else{
					echo "<span style='color:red; font-size:18px;'>Email or Password not matched !!.</span>";
				}

			}
		?>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="A_Email">Email address</label>
                                <input type="email" class="form-control" id="A_Email" 
                                    placeholder="Enter email" required="required" name="A_Email">
                                
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" placeholder="Password"
                                    required="required" name="Password">
                            </div>
                            </br>
                            <input type="submit" value="Login" />
                        </form>
                        <br>
                        <div class="row" style="background-color:#02343234; padding:2px;">
                            <div class="col-6">
                            <h3><a href="forgetpass.php" style='float: left; color: red;'>Forget Password ?</a></h3>
                            </div>
                        </div>
                </div>

                
            </div>
            <div class="col-xl-3 col-lg-2 col-md-1"></div>
        </div>
    </div>

    <!--End of the login Section-->


<?php include 'ins/footer.php';?>