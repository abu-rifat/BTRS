<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Trip</h2>
               <div class="block copyblock"> 

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $Bus_ID=$fm->validation($_POST['Bus_ID']);
    $ticket_cost=$fm->validation($_POST['ticket_cost']);
    $dep_place=$fm->validation($_POST['dep_place']);
    $destination=$fm->validation($_POST['destination']);
    $date=$fm->validation($_POST['date']);
    $time=$fm->validation($_POST['time']);
    $C_ID="";
    
    $qq="select C_ID from bus where Bus_ID=$Bus_ID";
    $qq2=$db->select($qq);
    while($qq3=$qq2->fetch_assoc()){
        $C_ID=$qq3['C_ID'];
    }


    $Bus_ID=mysqli_real_escape_string($db->link, $Bus_ID);
    $ticket_cost=mysqli_real_escape_string($db->link, $ticket_cost);
    $dep_place=mysqli_real_escape_string($db->link, $dep_place);
    $destination=mysqli_real_escape_string($db->link, $destination);
    $date=mysqli_real_escape_string($db->link, $date);
    $time=mysqli_real_escape_string($db->link, $time);

    

    $query = "INSERT INTO schedule (C_ID, Bus_ID, dep_place, destination, date, time, ticket_cost) 
        VALUES('$C_ID', '$Bus_ID','$dep_place','$destination','$date','$time','$ticket_cost')";
    
    $catinsert=$db->insert($query);
    $query = "SELECT She_ID FROM schedule where C_ID='$C_ID' and Bus_ID='$Bus_ID' and dep_place='$dep_place' and destination='$destination' and date='$date' and time='$time' and ticket_cost='$ticket_cost'";
    $qq2=$db->select($query);
    $She_ID="";
    while($qq3=$qq2->fetch_assoc()){
        $She_ID=$qq3['She_ID'];
    }

    $query = "SELECT * FROM bus WHERE Bus_ID='$Bus_ID'";
    $result = $db->select($query);
    $busmodelinfo = mysqli_fetch_array($result);
    $numrow=$busmodelinfo['numrow'];
    $numcolleft=$busmodelinfo['numcolleft'];
    $numcolright=$busmodelinfo['numcolright'];
    $lastrowseat=$busmodelinfo['lastrowseat'];
    $totalseats=$busmodelinfo['totalseats'];
    $Bus_ID=$busmodelinfo['Bus_ID'];

    $ck=0;
    if($lastrowseat==($numcolleft+$numcolright)){
        $ck=1;
    }
    for($i=0;$i<($numrow-1+$ck);$i++){
        for($j=0; $j<$numcolleft;$j++){
            $rr = chr($i+65);
            $cc =chr(49+$j);
            $seatno= $rr.$cc;
            $query2= "INSERT INTO seat_booking(She_ID,SB_Seat_No,SB_Status) VALUES('$She_ID','$seatno','A')";
            $result2 = $db->insert($query2);
        }
        for($j=0; $j<$numcolright;$j++){
            $rr=chr($i+65);
            $cc=chr($j+$numcolleft+49);
            $seatno= $rr.$cc;
            $query2= "INSERT INTO seat_booking(She_ID,SB_Seat_No,SB_Status) VALUES('$She_ID','$seatno','A')";
            $result2 = $db->insert($query2);
        }
    }
    if(!$ck){
        for($j=0; $j<$lastrowseat; $j++){
            $rr=chr($numrow-1+65);
            $cc=chr($j+49);
            $seatno= $rr.$cc;
            $query2= "INSERT INTO seat_booking(She_ID,SB_Seat_No,SB_Status) VALUES('$She_ID','$seatno','A')";
            $result2 = $db->insert($query2);
        }
    }



    if($catinsert){
        echo "<span class='success'>Trip Registered Successfully! </span>";
    }else {
        echo "<span class='error'>Trip Not Registered! </span>";
    }
}

?>

                 <form action="" method="post">
                    <table class="form">
                    <tr>
                            <td>
                                <label>Select Bus</label>
                            </td>
                            <td>

                                <select name="Bus_ID" class="medium" onChange="javascript: bus(this.options[this.selectedIndex].value);" required>
                                <option value="">Select From The List</option>
                                <?php
                                    $query="select * from bus";
                                    $blog_title=$db->select($query);
                                    if($blog_title){
                                    while($result = $blog_title->fetch_assoc()){
                                        $C_Name="";
                                        $Class_Name="";
                                        $Category_type="";
                                        $C_ID=$result['C_ID'];
                                        $Class_ID=$result['Class_ID'];
                                        $Category_ID=$result['Category_ID'];
                                        $qr="select C_Name from company where C_ID='$C_ID'";
                                        $ccr=$db->select($qr);
                                        while($rs=$ccr->fetch_assoc()){
                                            $C_Name=$rs['C_Name'];
                                        }
                                        $qr="select Class_Name from class where Class_ID='$Class_ID'";
                                        $ccr=$db->select($qr);
                                        while($rs=$ccr->fetch_assoc()){
                                            $Class_Name=$rs['Class_Name'];
                                        }
                                        $qr="select Category_type from category where Category_ID='$Category_ID'";
                                        $ccr=$db->select($qr);
                                        while($rs=$ccr->fetch_assoc()){
                                            $Category_type=$rs['Category_type'];
                                        }
                                ?>
                                <option value="<?php echo $result['Bus_ID']; ?>"><?php echo $C_Name;echo ", Coach No: "; echo $result['Coach_No'];echo ", ";echo $Class_Name;echo ", "; echo $Category_type; ?>
                                </option>
                                <?php } } ?>
                                </select>

                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <label>Fare Per Seat</label>
                            </td>
                            <td>
                            <input type="number" name="ticket_cost" placeholder="Fare in Taka" class="medium" min="1" max="5000" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Deperture Place</label>
                            </td>
                            <td>
                            <input type="text" name="dep_place" placeholder="Deperture Place" class="medium" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Arival Place</label>
                            </td>
                            <td>
                            <input type="text" name="destination" placeholder="Arival Place" class="medium" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                            <input type="date" name="date" min="<?php echo date('Y-m-d');  ?>" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Time</label>
                            </td>
                            <td>
                            <input type="time" name="time" required>
                            </td>
                        </tr>
						<tr>
                        <td></td> 
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
