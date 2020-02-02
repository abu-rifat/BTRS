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
                            <th>Total Seats</th>
                            <th>Class</th>
                            <th>Category</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                            $C_Name="";
                            $Coach_No;
                            $totalseats;
							$query = "select * from bus order by Bus_ID desc";
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


                                    $Class_ID=$result['Class_ID'];
                                    $qq = "select Class_Name from class,bus where bus.Class_ID='$Class_ID' LIMIT 1";
                                    $res = $db->select($qq);
                                    $tr=mysqli_fetch_array($res);
                                    $Class_Name=$tr['Class_Name'];

                                    $Category_ID=$result['Category_ID'];
                                    $qq = "select Category_type from category,bus where bus.Category_ID='$Category_ID' LIMIT 1";
                                    $res = $db->select($qq);
                                    $tr=mysqli_fetch_array($res);
                                    $Category_type=$tr['Category_type'];

						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
                            <td><?php echo $C_Name; ?></td>
                            <td><?php echo $Coach_No; ?></td>
                            <td><?php echo $totalseats; ?></td>
                            <td><?php echo $Class_Name; ?></td>
                            <td><?php echo $Category_type; ?></td>
							<td><a onclick="return confirm('Are you sure to Delete!'); " href="?delid=<?php echo $Bus_ID; ?>">Delete</a></td>
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
