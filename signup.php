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

<!--Signup Section of BTRS - University of Barishal-->

<div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2 col-md-1"></div>
            <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-xs-12">
                <div class="form" id="signup">
                    <h2>Signup</h2>
                    </br>

                    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $User_Name="Hello World";
        
        $User_Name=$fm->validation($_POST['User_Name']);
        $User_PhoneNo=$fm->validation($_POST['User_PhoneNo']);
        $User_Email=$fm->validation($_POST['User_Email']);
        $User_Gender=$fm->validation($_POST['User_Gender']);
        $Password=$fm->validation(md5($_POST['Password']));

    $User_Name=mysqli_real_escape_string($db->link, $User_Name);
	$User_PhoneNo=mysqli_real_escape_string($db->link, $User_PhoneNo);
    $User_Email=mysqli_real_escape_string($db->link, $User_Email);
    $User_Gender=mysqli_real_escape_string($db->link, $User_Gender);
    $Password=mysqli_real_escape_string($db->link, $Password);

	if($User_Name==""||$User_PhoneNo==""||$User_Email==""||$User_Gender==""||$Password==""){
        echo "<span class='error'>Field must not be empty ! </span>";
    }else{
    	$query1 = "select * from user where User_Email='$User_Email'";
        $result1 = $db->select($query1);
        $row1 = mysqli_num_rows($result1);
		if($row1>0){
        	echo "<span style='color:red; font-size:18px;'>Email Already Exists !!.</span>";
        }else{
        	//$query2 = "select * from user where username='$username'";
        		$query = "INSERT INTO user(User_Name, User_PhoneNo, User_Email, User_Gender, Password) VALUES('$User_Name', '$User_PhoneNo', '$User_Email','$User_Gender','$Password')";
        		$inserted_rows = $db->insert($query);
        		if ($inserted_rows) {
					$query = "select * from user where User_Email = '$User_Email' and Password = '$Password'";
					$result = $db->select($query);
					if($result !=false){
						$value = mysqli_fetch_array($result);
						$row = mysqli_num_rows($result);
						if($row>0){
							Session::set2("login",true);
							Session::set2("User_Name",$value['User_Name']);
							Session::set2("User_PhoneNo",$value['User_PhoneNo']);
                            Session::set2("User_Email",$value['User_Email']);
                            Session::set2("User_Gender",$value['User_Gender']);
                            Session::set2("User_ID",$value['User_ID']);
							header("Location:index.php");
						}else{
							echo "<span style='color:red; font-size:18px;'>No Result Found !!. </span>";
						}
					}else {
            			echo "<span style='color:red; font-size:18px;'>Problem Creating Account !</span>";	
					}
				}else{
					echo "<span style='color:red; font-size:18px;'>Username or Password not matched !!.</span>";
				}
			
        }
    }
}
?>


                    <form action="signup.php" method="post">
                        <div class="form-group">
                            <label for="User_Name">Full Name</label>
                            <input type="text" class="form-control" id="User_Name" placeholder="Full Name"
                                required="required" name="User_Name">
                        </div>
                        <div class="form-group">
                            <label for="User_PhoneNo">Mobile No.</label>
                            <input type="tel" class="form-control" id="User_PhoneNo" placeholder="Mobile No."
                                required="required" name="User_PhoneNo">
                        </div>
                        <div class="form-group">
                            <label for="User_Email">Email address</label>
                            <input type="email" class="form-control" id="User_Email" aria-describedby="emailHelp"
                                placeholder="Enter email" required="required" name="User_Email">
                            <small id="emailHelp" class="form-text text-muted">You have to use this Email to login
                                into
                                your account .</small>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" class="form-control" id="Password" placeholder="Password"
                                required="required" name="Password">
                        </div>
                        <div class="form-group">
                            <label for="User_Gender">Gender</label>
                            <select class="form-control" id="User_Gender" name="User_Gender" required>
                                <option value="">Choose from The List Below</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        </br>
                        <input type="submit" value="Signup" />
                        <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                    </form>
                    </br>
                    <div class="row" style="background-color:#02343234; padding:2px;">
                            <div class="col-6">
                            <h3><a href="forgetpass.php" style='float: left; color: red;'>Forget Password ?</a></h3>
                            </div>
                            <div class="col-6">
                            <h3><a href="login.php" style='float: right; color: darkgreen;'>Login</a></h3>
                            </div>
                        </div>
                </div>

            </div>
            <div class="col-xl-3 col-lg-2 col-md-1"></div>
        </div>
    </div>

    <!--End of Signup section-->


<?php include 'ins/footnav.php';?>
<?php include 'ins/footer.php';?>