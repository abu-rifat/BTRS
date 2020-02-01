<?php 
    include 'lib/Session.php';
    Session::checkLogin2();
?>

<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>

<?php 
	$db = new Database();
	$fm = new Format();
?>
<?php
        if(isset($_GET['action']) && $_GET['action']=="fp"){
        Session:: destroy2();
    }
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
                    
                        <h2>Login</h2>
                        </br>
                        <?php
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$User_Email=$fm->validation($_POST['User_Email']);
				$Password=$fm->validation(md5($_POST['Password']));

				$email=mysqli_real_escape_string($db->link, $User_Email);
                $password=mysqli_real_escape_string($db->link, $Password);
                

				$query = "select * from user where User_Email = '$User_Email' and Password = '$Password'";
				$result = $db->select($query);
				if($result !=false){
					$value = mysqli_fetch_array($result);
					$row = mysqli_num_rows($result);
					if($row>0){
						Session::set2("login",true);
						Session::set2("User_Email",$value['User_Email']);
						Session::set2("User_Name",$value['User_Name']);
                        Session::set2("User_ID",$value['User_ID']);
                        Session::set2("User_PhoneNo",$value['User_PhoneNo']);
						Session::set2("User_Gender",$value['User_Gender']);
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
                                <label for="User_Email">Email address</label>
                                <input type="email" class="form-control" id="User_Email" aria-describedby="emailHelp"
                                    placeholder="Enter email" required="required" name="User_Email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.</small>
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
                            <div class="col-6">
                            <h3><a href="signup.php" style='float: right; color: darkgreen;'>Signup</a></h3>
                            </div>
                        </div>
                </div>

                
            </div>
            <div class="col-xl-3 col-lg-2 col-md-1"></div>
        </div>
    </div>

    <!--End of the login Section-->


<?php include 'ins/footnav.php';?>
<?php include 'ins/footer.php';?>