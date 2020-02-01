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

<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2 col-md-1"></div>
            <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-xs-12">
                <div class="form" id="login">
                    
                        <h2>Forget Password?</h2>
                        </br>
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $User_Email=$fm->validation($_POST['User_Email']);

                $User_Email=mysqli_real_escape_string($db->link, $User_Email);

                $query = "select * from user where User_Email='$User_Email'";
                $result = $db->select($query);
                if($result !=false){
                    $value = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);
                    if($row>0){
                        while($data=$result->fetch_assoc()){
                        $to     =$fm->validation($data['User_Email']);
                        $to     =mysqli_real_escape_string($db->link, $to);
                        $from   ='btrs@noreply.com';
                        $subject='Password Recovery';
                        $message='User_Email: '.$data['User_Email'].', Password: '.$data['Password'];
                        $message=mysqli_real_escape_string($db->link, $message);
                        $sendmail=mail($to, $subject, $message, $from);
                        if($sendmail){
                            echo "<script>alert('Message Sent Successfully ! ');
            window.location.href='login.php';
            </script>";
                        }else {
                                echo "<span class='error'>Message Not Sent !</span>";
                        }
                }
                    }else{
                            echo "<span style='color:red; font-size:18px;'>No Account Found !!. </span>";
                    }
                }else{
                    echo "<span style='color:red; font-size:18px;'>Email not matched !!.</span>";
                }

            }
        ?>

        <form action="forgetpass.php" method="post">
                            <div class="form-group">
                                <label for="User_Email">Email address</label>
                                <input type="email" class="form-control" id="User_Email" aria-describedby="emailHelp"
                                    placeholder="Enter email" required="required" name="User_Email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.</small>
                            </div>
                            </br>
                            <input type="submit" value="Submit" />
                        </form>
                            <br>
                        <div class="row" style="background-color:#02343234; padding:2px;">
                            <div class="col-6">
                            <h3><a href="login.php" style='float: left; color: darkgreen;'>Login</a></h3>
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

<?php include 'ins/footnav.php';?>
<?php include 'ins/footer.php';?>