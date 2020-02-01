<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider Image</h2>
<?php
	if(isset($_GET['delimg'])){
		$delid = $_GET['delimg'];

		$query ="select * from tbl_slider where id='$delid'";
        $getData=$db->select($query);
        if($getData){
        	while($delimg=$getData->fetch_assoc()){
        		$dellink="upload/slider/".$delimg['image'];
        		unlink($dellink);
        	}
        }

		$delquery="delete from tbl_slider where id = '$delid'";
			$delimg = $db->delete($delquery);
			if($delimg){
                echo "<span class='success'>Slider Image Deleted Successfully! </span>";
            }else {
                echo "<span class='error'>Slider Image Not Deleted! </span>";
            }
        }
		
?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Slider Image</th>
							<th>Slider Text</th>
							<?php if(Session::get('userRole')==3){ ?>
							<th>Action</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = "select * from tbl_slider order by id desc";
							$img = $db->select($query);
							if($img){
								$i=0;
								while($result = $img->fetch_assoc()){
									$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><img src="upload/slider/<?php echo $result['image']; ?>" height="40px" width="60px"/></td>
							<td><?php echo $result['text']; ?></td>
							
							<?php if(Session::get('userRole')==3){ ?>
								<td>
								 <a href="editslider.php?imgid=<?php echo $result['id']; ?>">Edit</a>|| <a onclick="return confirm('Are you sure to Delete!'); " href="?delimg=<?php echo $result['id']; ?>">Delete</a></td>
								 </tr>
								<?php } ?>
						

						<?php } }else{
							echo "<span class='error'>No Slider Image Found! </span>";
						} ?>
						
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
