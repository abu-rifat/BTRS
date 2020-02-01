<?php include 'ins/header.php';?>
<?php include 'ins/navbar.php';?>
<?php include 'ins/slider.php';?>

<br>
<form action="bookingdetails" method="post">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <h4>Passenger Details</h4><br>
                <div class="row">
                    
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="name">Passenger Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Full Name"
                                required="required">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" required>
                                <option value="">Choose from The List Below</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="phone">Mobile No.</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Mobile No."
                                required="required">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="Email">Email address</label>
                            <input type="email" class="form-control" id="Email" aria-describedby="emailHelp"
                                placeholder="Enter email" required="required">
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="journeydetails">
                <h4>Journey Details</h4>
                <h3 style="color:green">Dhaka - Barisal</h3>
                <p>Hanif Enterprise</p>
                <p>Tue, 17 Dec 2019, 10:30 PM</p>
                <p>Seat No(s): <span style="color:green">D1, D2</span></p>
                <p>Boarding at Gabtoli Bus Point, 11:45 PM</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <h4>Payment Details</h4>
            <br>
            <h1 style="color:red">Total Amount Payable: BDT 725.00</h1>
            <br>
                <div class="form-group">
                    <label for="payment">Payment Method</label>
                    <select class="form-control" id="payment" aria-describedby="paymentHelp" required>
                        <option value="">Choose from The List Below</option>
                        <option value="bkash">bKash(BRAC Bank Ltd)</option>
                        <option value="rocket">Rocket(DBBL Mobile Banking)</option>
                        <option value="nagad">Nagad(Postal Authority, BD) </option>
                    </select>
                    <small id="paymentHelp" class="form-text text-muted">
                        Your ticket(s) would be reserved and inactive for 
                        <span style="color:red">30 minutes</span> from the time of booking. Pay and confirm your 
                        transaction ID within <span style="color:red">30 minutes</span> to get the confirmed ticket. <br>
                        By clicking on the, <span style="color:red">Confirm Reservation</span> box below, 
                        I have read, acknowledged and agreed to the <a href="#">Terms of Use</a>, <a href="#">Privacy Policy</a> and <a href="#">Cancellation Policy</a> of <span style="color:darkgreen;">BTRS</span>.</small>
                </div>
                <button type="submit" class="btn btn-primary">Confirm Reservation</button>
                <br><br>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="journeydetails">
                <div class="col-12">
                    <h4>Fare Details</h4>
                    <table class="table table-striped table-hover table-bordered"
                        style="font-weight: bolder; font-size: 15px; text-align: center;">
                        <thead>
                            <tr>
                                <th>Ticket Price</th>
                                <td style="color:red">700.00</td>
                            </tr>
                            <tr>
                                <th>Processing Fee</th>
                                <td style="color:red">16.00</td>
                            </tr>
                            <tr>
                                <th>Convenience Fee</th>
                                <td style="color:red">25.00</td>
                            </tr>
                            <tr>
                                <th>Total Price</th>
                                <td style="color:red">BDT 741.00</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <br>
    </div>
</form>




<?php include 'ins/footnav.php';?>
<?php include 'ins/footer.php';?>