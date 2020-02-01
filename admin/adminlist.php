<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Admin List</h2>
<?php
	if(isset($_GET['deladmin'])){
		$delid = $_GET['deladmin'];
		$delquery="delete from tbl_user where A_ID = '$delid'";
		if($delid==Session::get('A_ID')){
			echo "<span class='error'>You Can't Delete Your Own User! </span>";
		}else{
			$deladmin = $db->delete($delquery);
			if($deladmin){
                echo "<span class='success'>Category Deleted Successfully! </span>";
            }else {
                echo "<span class='error'>Category Not Deleted! </span>";
            }
        }
		}
		
?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Phone No</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Action</th>
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
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['A_Name']; ?></td>
							<td><?php echo $result['A_PhoneNo']; ?></td>
							<td><?php echo $result['A_Email']; ?></td>
							<td><?php echo $result['A_Gender']; ?></td>
							<td><a href="viewadmin.php?adminid=<?php echo $result['A_ID']; ?>">View</a>
							<?php if($result['A_ID']==Session::get('A_ID')){ ?>
								 || <a href="adminprofile.php?adminid=<?php echo $result['A_ID']; ?>">Edit</a>
							<?php }else{ ?>
								 || <a onclick="return confirm('Are you sure to Delete!'); " href="?deladmin=<?php echo $result['A_ID']; ?>">Delete</a></td>
								<?php } ?>
						</tr>

						<?php } } ?>
						
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
