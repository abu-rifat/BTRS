<?php include 'ins/header.php';?>
<?php include 'ins/navbar.php';?>
<?php include 'ins/slider.php';?>

<!--Signup Section of BTRS - University of Barishal-->

<div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2 col-md-1"></div>
            <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-xs-12">
                <div class="form" id="signup">
                    <h2>User Info.</h2>
                    </br>
                    <form action="editinfo" method="post">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" value="Abu Rifat Muhammed Al Hasib"
                            readonly>
                        </div>
                        <div class="form-group">
                            <label for="phone">Mobile No.</label>
                            <input type="tel" class="form-control" id="phone" value="01753537110"
                            readonly>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email address</label>
                            <input type="email" class="form-control" id="Email"
                            value="rifat.cse4.bu@gmail.com" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" class="form-control" id="gender" value="Male"
                            readonly>
                        </div>
                        <input type="hidden" id="userid" name="userid" value="45">
                        </br>
                        <button type="submit" class="btn btn-primary">Edit Info.</button>
                    </form>
                    </br>
                    </form>
                </div>

            </div>
            <div class="col-xl-3 col-lg-2 col-md-1"></div>
        </div>
    </div>

    <!--End of Signup section-->


<?php include 'ins/footnav.php';?>
<?php include 'ins/footer.php';?>