<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width = "5%">No</th>
							<th width = "15%">Post Title</th>
							<th width = "18%">Description</th>
							<th width = "7%">Category</th>
							<th width = "10%">Image</th>
							<th width = "10%">Author</th>
							<th width = "10%">Tags</th>
							<th width = "15%">Date</th>
							<th width = "10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = "select tbl_post.*, tbl_category.name from tbl_post inner join tbl_category on tbl_post.category = tbl_category.id order by tbl_post.title desc";
							$post = $db->select($query);
							if($post){
								$i=0;
								while($result=$post->fetch_assoc()){
									$i++;

						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><a href="editpost.php?editpostid=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></td>
							<td><?php echo $fm->textShorten($result['body'], 50); ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><img src="upload/<?php echo $result['image']; ?>" height="40px" width="60px"/></td>
							<td><?php echo $result['author']; ?></td>
							<td><?php echo $result['tags']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><a href="viewpost.php?viewpostid=<?php echo $result['id']; ?>">View</a>
						<?php if($result['userid']==Session::get('userID')||Session::get('userRole')==3){ ?>
							|| <a href="editpost.php?editpostid=<?php echo $result['id']; ?>">Edit</a> 
							|| <a onclick="return confirm('Are you sure to Delete !');" href="deletepost.php?delpostid=<?php echo $result['id']; ?>">Delete</a></td> <?php } ?>
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