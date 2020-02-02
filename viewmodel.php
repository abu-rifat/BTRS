<?php include 'ins/header.php';?>
<?php include 'ins/navbar.php';?>
<?php include 'ins/slider.php';?>


<?php


if($_SERVER['REQUEST_METHOD']=='POST'){
    $fare=$_POST['total_price'];
    $id=$_POST['tripid'];
   

    foreach ($_POST['booked_seats'] as  $key =>  $seat) {
        echo  $seat ;
           
 }
}

if($_SERVER['REQUEST_METHOD']=='GET'){
    $trip_id=$_GET['She_ID'];
    $query="SELECT ticket_cost FROM schedule WHERE She_ID='$trip_id'";
    $result = $db->select($query);
    $busmodelinfo = mysqli_fetch_array($result);
    $fare=$busmodelinfo['ticket_cost'];
    
    $query = "SELECT * FROM bus,schedule WHERE bus.Bus_ID=schedule.Bus_ID AND schedule.She_ID='$trip_id'";
    
    $result = $db->select($query);
    $busmodelinfo = mysqli_fetch_array($result);



    $numrow=(int)$busmodelinfo['numrow'];
    $numcolleft=(int)$busmodelinfo['numcolleft'];
    $numcolright=(int)$busmodelinfo['numcolright'];
    $lastrowseat=(int)$busmodelinfo['lastrowseat'];
    $totalseats=(int)$busmodelinfo['totalseats'];
    $Bus_ID=$busmodelinfo['Bus_ID'];


    //$trip_id=3;
    //$fare=700.00;

?>



<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-7 col-9" id="seatmap">
            <hr>
            <h2>FRONT</h2>
            <hr>
            <div class="row">
                <div class="col-12">

<?php
                $ck=0;
                if($lastrowseat==($numcolleft+$numcolright)){
                    $ck=1;
                }
                for($i=0;$i<($numrow-1+$ck);$i++){
?>
                    <div class="row" style="padding-left: 15px;margin-bottom: 5px;">
<?php
                    for($j=0; $j<$numcolleft;$j++){

                        
?>
                        <button class="
                        <?php 
                        $rr = chr($i+65);
                        $cc =chr(49+$j);
                        $seatno= $rr.$cc;
                        $query2= "SELECT seat_booking.SB_Status FROM seat_booking,schedule WHERE schedule.Bus_ID=$Bus_ID and schedule.She_ID=$trip_id and seat_booking.She_ID=schedule.She_ID and Sb_Seat_No='$seatno'";
                        $result2 = $db->select($query2);
                        $seatstatus = mysqli_fetch_array($result2);
                        echo $seatstatus['SB_Status'];
                        $dis="disabled";
                        if($seatstatus['SB_Status']=="A"){
                            $dis="";
                        }
                        ?>

                        
                        " id=<?php echo $seatno; ?> onclick="myFunction(this.id)" <?php echo $dis; ?> >
                        <?php 
                        echo $seatno;?></button>
<?php
                    }
?>
                    <div class="space"></div>
<?php
                    for($j=0; $j<$numcolright;$j++){
?>
                    <button class="
                    <?php 
                        $rr=chr($i+65);
                        $cc=chr($j+$numcolleft+49);
                        $seatno= $rr.$cc;
                        $query2= "SELECT seat_booking.SB_Status FROM seat_booking,schedule WHERE schedule.Bus_ID=$Bus_ID and schedule.She_ID=$trip_id and seat_booking.She_ID=schedule.She_ID and Sb_Seat_No='$seatno'";
                        $result2 = $db->select($query2);
                        $seatstatus = mysqli_fetch_array($result2);
                        echo $seatstatus['SB_Status'];
                        $dis="disabled";
                        if($seatstatus['SB_Status']=="A"){
                            $dis="";
                        }
                    ?>
                    " id=<?php echo $seatno; ?> onclick="myFunction(this.id)" <?php echo $dis; ?> ><?php echo $seatno; ?></button>
<?php
                    }
                    ?>
                    </div>
                    <?php
                }
                if(!$ck){
?>
                    <div class="row" style="padding-left: 15px;margin-bottom: 5px;">
<?php
                    for($j=0; $j<$lastrowseat; $j++){
?>
                        <button class="
                        <?php 
                        $rr=chr($numrow-1+65);
                        $cc=chr($j+49);
                        $seatno= $rr.$cc;
                        $query2= "SELECT seat_booking.SB_Status FROM seat_booking,schedule WHERE schedule.Bus_ID=$Bus_ID and schedule.She_ID=$trip_id and seat_booking.She_ID=schedule.She_ID and Sb_Seat_No='$seatno'";
                        $result2 = $db->select($query2);
                        $seatstatus = mysqli_fetch_array($result2);
                        echo $seatstatus['SB_Status'];
                        $dis="disabled";
                        if($seatstatus['SB_Status']=="A"){
                            $dis="";
                        }
                        ?>
                        
                        " id=<?php echo $seatno; ?> onclick="myFunction(this.id)" <?php echo $dis; ?> ><?php echo $seatno; ?></button>
<?php
                    }
                }
?>
                    </div>
                </div>
            </div>
            <br>
            
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 col-9" id="seatlegends">
        <hr>
        <h2>Seat Legends</h2>
        <hr>
        <br>
        <div class="legends" style="float:center;">
        <button class="Available" style="width:21%;height:40px;margin-right:4%;background-color:#5c666b;color:white;" disabled><span>Available</span></button>
        <button class="Selected" style="width:21%;height:40px;margin-right:4%;background-color:darkgreen;color:white;" disabled>Selected</button>
        <button class="Booked" style="width:21%;height:40px;margin-right:4%;background-color:rgb(255, 145, 0);color:white;" disabled>Booked</button>
        <button class="Sold" style="width:21%;height:40px;background-color:darkred;color:white;" disabled>Sold</button>
            </div>
        <br><br>
        <h2>Booking Details</h2>
        <div id="bks"></div>
        <div id="total"></div>
        <br><br>
        <p id="demo"></p>
        <br><br>
        <form method="POST" name="fake" action="confirm.php">
		    <input type="hidden" id="booked_seats" name="booked_seats[]" multiple />
            <input type="hidden" id="total_price" name="total_price" require/>
            <input type="hidden" id="tripid" name="tripid" value="<?php echo $trip_id; ?>"/>
		    <input type="submit" id="sumbit" value="Book Seats" />
	    </form>
        </div>
        
    </div>
</div>
<br>
        <script>
       var passdata={};
        var tbl="<table class=\"table table-striped table-sm table-success\"><tr><th>#</th><th>Seats</th><th>Fare</th><th>Action</th></tr><tr></table>";
        document.getElementById("bks").innerHTML = tbl;
        var totalbooked=0;
        var totalfare=0;

        var total="<table class=\"table table-sm table-success\"><th>Selected Seats: "+totalbooked+"</th><th>Total: &#2547;"+totalfare+"</th></table>";
        document.getElementById("total").innerHTML = total;
        var selected_seats=[];
        var fare=<?php echo $fare ?>;
        var tripid=<?php echo $trip_id ?>;
            function myFunction(id) {
                if (document.getElementById(id).style.backgroundColor == "darkgreen") {
                    document.getElementById(id).style.backgroundColor = "#5c666b";
                    selected_seats.splice(selected_seats.indexOf(id),1);
                    totalbooked=totalbooked-1;
                    totalfare=totalfare-fare;
                    var total="<table class=\"table table-sm table-success\"><th>Selected Seats: "+totalbooked+"</th><th>Total: &#2547;"+totalfare+"</th></table>";
                    document.getElementById("total").innerHTML = total;
                    var tbl="<table class=\"table table-striped table-sm table-success\"><tr><th>#</th><th>Seats</th><th>Fare</th><th>Action</th></tr>";
                    for (var i=0; i<selected_seats.length; i++) {
                        tbl += "<tr><td><b>" + (i+1) + "</b></td>"+ "<td><b>" + selected_seats[i] + "</b></td>" + "<td>" +"&#2547;<b>"+ fare + "</b></td>" + "<td><button id="+ selected_seats[i] +" onclick=\"myFunction(this.id)\"><i class=\"far fa-trash-alt\" style=\"color:red\"></i></button></td></tr>";
                    }
                    tbl+="</table>";
                    document.getElementById("bks").innerHTML = tbl;
                    document.getElementById("demo").innerHTML = selected_seats;
                   
                } else {
                    document.getElementById(id).style.backgroundColor = "darkgreen";
                    selected_seats.push(id);
                    totalbooked=totalbooked+1;
                    totalfare=totalfare+fare;
                    var total="<table class=\"table table-sm table-success\"><th>Selected Seats: "+totalbooked+"</th><th>Total: &#2547;"+totalfare+"</th></table>";
                    document.getElementById("total").innerHTML = total;
                    var tbl="<table class=\"table table-striped table-sm table-success\"><tr><th>#</th><th>Seats</th><th>Fare</th><th>Action</th></tr>";
                    for (var i=0; i<selected_seats.length; i++) {
                        tbl += "<tr><td><b>" + (i+1) + "</b></td>"+ "<td><b>" + selected_seats[i] + "</b></td>" + "<td>" +"&#2547;<b>"+ fare + "</b></td>" + "<td><button id="+ selected_seats[i] +" onclick=\"myFunction(this.id)\"><i class=\"far fa-trash-alt\" style=\"color:red\"></i></button></td></tr>";
                    }
                    tbl+="</table>";
                    document.getElementById("bks").innerHTML = tbl;
                    document.getElementById("demo").innerHTML = selected_seats;
                
                   console.log(totalfare);
                }
				 document.fake.total_price.value=totalfare;
                 document.fake.booked_seats.value=selected_seats;
            }
            passdata.fare=total_price;
            console.log(totalfare);
		
        </script>
<script>
        
            $.ajax({
                url: "confirm.php",
                type: "POST",
                data: passdata,                   
                success: function()
                            {
                                alert("ok");                                    
                            }
            });
     
</script>

        <?php } ?>

<?php include 'ins/footnav.php';?>
<?php include 'ins/footer.php';?>