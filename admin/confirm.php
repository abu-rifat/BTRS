<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Bus</h2>
               <div class="block copyblock"> 

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $fare=$_POST['total_price'];
    $She_ID=$_POST['tripid'];
    $bookedseats=$_POST['booked_seats'];
    $arrayLength = count($bookedseats);
    $i=0;
    while($i<$arrayLength){
        $seat=$bookedseats[$i] ."<br>" ;
        $i++;
    
    //foreach ($bookedseats as $key => $seat) {
        echo  $seat ;
        ?><br><?php
        $query="UPDATE seat_booking
        SET SB_Status='S'
        WHERE She_ID = '$She_ID' and SB_Seat_No = '$seat'";
        $result = $db->update($query);
        if($result !=false){
        echo "<span class='success'>Seats Reserved!!</span>";
    }else{
        echo "<span class='error'>Seats Not Reserved! </span>";
    }
 }
}
?>
</div>
</div>
</div>
<?php include 'inc/footer.php';?>
