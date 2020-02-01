<?php include 'ins/header.php';?>
<?php include 'ins/navbar.php';?>
<?php include 'ins/slider.php';?>

<div class="container-fluid">
<br>
<h4>Booked Ticket List</h4>
<div class="row">
    <div class="col-12">
        <table class="table table-striped table-hover table-bordered"
            style="font-weight: bolder; font-size: 15px; text-align: center;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Coach Info</th>
                    <th>Booking ID</i></th>
                    <th>Time</th>
                    <th>Fare</th>
                    <th>Confirm</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sakura Paribahan<br>
                        <p style="font-size: x-small;">#34-BAR-DHA-AC</p>
                    </td>
                    <td>2343255643</td>
                    <td>8:30AM<br><p style="font-size: x-small;">Dec-17-2019</p></td>
                    <td>
                        BDT 2700.00</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            style="padding: 2%;">
                            Confirm
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Ticket</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="confirm" method="post">
                                            <div class="form-group">
                                                <label for="payment">Payment Method</label>
                                                <select class="form-control" id="payment" required>
                                                    <option value="">Choose from The List Below</option>
                                                    <option value="bkash">bKash(BRAC Bank Ltd)</option>
                                                    <option value="rocket">Rocket(DBBL Mobile Banking)</option>
                                                    <option value="nagad">Nagad(Postal Authority, BD) </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email">Transaction ID</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Transaction ID" required="required">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Confirm Ticket</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>


<div class="container-fluid">
<br>
<h4>Your Next trip(Confirmed Ticket)</h4>
<div class="row">
    <div class="col-12">
        <table class="table table-striped table-hover table-bordered"
            style="font-weight: bolder; font-size: 15px; text-align: center;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Coach Info</th>
                    <th>Boarding At</i></th>
                    <th>Time</th>
                    <th>Seats</th>
                    <th>Seats</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sakura Paribahan<br>
                        <p style="font-size: x-small;">#34-BAR-DHA-AC</p>
                    </td>
                    <td>Gabtali(Dhaka)</td>
                    <td>8:30AM<br><p style="font-size: x-small;">Dec-17-2019</p></td>
                    <td>
                        C1, C2</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2"
                            style="padding: 2%;">
                            Cancel Trip
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel2">Cancel Trip</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <h5>Please Contact To The Nearest Ticket Counter To 
                                                        Cancel Your Ticket Before 2 Hours of The Trip, else 
                                                        the money won't be refundable.</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
</div>


<?php include 'ins/footnav.php';?>
<?php include 'ins/footer.php';?>