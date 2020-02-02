<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Bus Model List</h2>
<?php
	if(isset($_GET['delid'])){
		$She_ID = $_GET['delid'];
		$delquery="delete from schedule where She_ID = '$She_ID'";
		$deladmin = $db->delete($delquery);
		if($deladmin){
            echo "<span class='success'>Category Deleted Successfully! </span>";
        }else {
            echo "<span class='error'>Category Not Deleted! </span>";
        }
        }
		
?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
                            <th>Serial No.</th>
                            <th>Company</th>
                            <th>Coach No</th>
                            <th>Deperture</th>
                            <th>Arival</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Total Seats</th>
                            <th>Fare</th>
							<th>Model</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                            $C_Name="";
                            $Coach_No;
                            $totalseats;
							$query = "select * from schedule order by date desc";
							$user = $db->select($query);
							if($user){
								$i=0;
								while($result = $user->fetch_assoc()){
                                    $i++;
                                    $C_ID=$result['C_ID'];
                                    $qq = "select C_Name from company where C_ID='$C_ID' LIMIT 1";
                                    $res = $db->select($qq);
                                    $tr=mysqli_fetch_array($res);
                                    $C_Name=$tr['C_Name'];

                                    $Bus_ID=$result['Bus_ID'];
                                    $qq = "select Coach_No,totalseats from bus where Bus_ID='$Bus_ID' LIMIT 1";
                                    $res = $db->select($qq);
                                    $tr=mysqli_fetch_array($res);
                                    $Coach_No=$tr['Coach_No'];
                                    $totalseats=$tr['totalseats'];

						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
                            <td><?php echo $C_Name; ?></td>
                            <td><?php echo $Coach_No; ?></td>
                            <td><?php echo $result['dep_place']; ?></td>
                            <td><?php echo $result['destination']; ?></td>
                            <td><?php echo $result['date']; ?></td>
                            <td><?php echo $result['time']; ?></td>
                            <td><?php echo $totalseats; ?></td>
                            <td><?php echo $result['ticket_cost']; ?></td>
							<td><a href="viewmodel.php?She_ID=<?php echo $result['She_ID']; ?>">View Model</a>
								 || <a onclick="return confirm('Are you sure to Delete!'); " href="?delid=<?php echo $result['She_ID']; ?>">Delete</a></td>
								<?php } ?>
						</tr>

						<?php }  ?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>

<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
            setSidebarHeight();
        });
    </script>


<?php include 'inc/footer.php';?>
