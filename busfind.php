<?php include 'ins/header.php';?>
<?php include 'ins/navbar.php';?>
<?php include 'ins/slider.php';?>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $Dep_Place=$fm->validation($_POST['Dep_Place']);
        $Ari_Place=$fm->validation($_POST['Ari_Place']);
        $date1=$_POST['date1'];
        $date2=$_POST['date2'];
        $shift1=$_POST['shift1'];
        $shift2=$_POST['shift2'];

        $Dep_Place=mysqli_real_escape_string($db->link, $Dep_Place);
	    $Ari_Place=mysqli_real_escape_string($db->link, $Ari_Place);

        


    }
?>

<!--SearchResult Section of BTRS - University of Barishal-->

<br>
<div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-xm-12 col-12" id="sidebarfilter">
                <div class="card">
                    <div class="card-header" id="headingZero">
                        <h5 class="mb-0" style="text-align: center; font-weight: bolder; padding-top: 5px;">
                            <i class="far fa-filter"></i> Filters
                        </h5>
                    </div>
                </div>
                <br>
                <div id="accordion">

                    <div class="card">
                        <div class="card-header" id="cardheading">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="false" aria-controls="collapseOne">
                                    Modify Search <i class="far fa-arrow-down"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">

                                <form action="searchbus" method="post">
                                    <div class="form-group">
                                        <label for="Dep_Place">LEAVING FROM</label>
                                        <input type="text" class="form-control" id="Dep_Place"
                                            value=<?php echo $Dep_Place; ?> required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="Ari_Place">GOING TO</label>
                                        <input type="text" class="form-control" id="Ari_Place"
                                        value=<?php echo $Ari_Place; ?> required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="date1">DEPARTING DATE</label>
                                        <input type="date" class="form-control" id="date1" value=<?php echo $Dep_Place; ?>
                                            required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="date2">RETURNING DATE (OPTIONAL)</label>
                                        <input type="date" class="form-control" name="date2"
                                        value=<?php echo $Dep_Place; ?> >
                                    </div>
                                    <div class="form-group">
                                        <label for="time">TIME (OPTIONAL)</label>
                                        <select class="form-control" id="time1">
                                            <option value="anytime">Any Time</option>
                                            <option value="morning">Morning(4:01 AM to 11:59 AM)</option>
                                            <option value="afternoon">After Noon(12:00 PM to 6:00 PM)</option>
                                            <option value="evening">Evening(6:01 PM to 8:00 PM)</option>
                                            <option value="night">Night(8:01 PM to 4:00 AM)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="time">TIME (OPTIONAL)</label>
                                        <select class="form-control" id="time1">
                                        <option value="anytime">Any Time</option>
                                            <option value="morning">Morning(4:01 AM to 11:59 AM)</option>
                                            <option value="afternoon">After Noon(12:00 PM to 6:00 PM)</option>
                                            <option value="evening">Evening(6:01 PM to 8:00 PM)</option>
                                            <option value="night">Night(8:01 PM to 4:00 AM)</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="searchbtn">SEARCH NOW</button>
                                    </br>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Operator <i class="far fa-arrow-down"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                No data Available
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Bus Type <i class="far fa-arrow-down"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="card-body">
                                No data Available
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>


            <div class="col-xl-9 col-lg-9 col-md-8 col-xm-12 col-12" id="busresult">
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary" style="float: left;">&lt; Prev Day</button>

                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary" style="float: right;">Next Day &gt;</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-hover table-bordered" style="font-weight: bolder; font-size: 15px; text-align: center;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Operator<br>&<br>Coach Info. <i class="far fa-sort"></i></th>
                                    <th>Last<br>Departure<br>Time <i class="far fa-sort"></i></th>
                                    <th>Seats<br>Capacity</th>
                                    <th>Fare<br>&<br>Booking<i class="far fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							$query = "select * from admin order by A_ID desc";
							$user = $db->select($query);
							if($user){
								$i=0;
								while($result = $user->fetch_assoc()){
									$i++;
						?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>Sakura Paribahan<br>
                                    </td>
                                    <td>8:35AM</td>
                                    <td>36</td>
                                    <td>
                                        BDT 2700.00<br>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal" style="padding: 5%;">
                                            View Seats
                                        </button>
                                    </td>
                                </tr>
                                <?php include 'seatplan.php';?>
                                <?php }  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <br><br>

    <!--End of SearchResult section-->


<?php include 'ins/footnav.php';?>
<?php include 'ins/footer.php';?>