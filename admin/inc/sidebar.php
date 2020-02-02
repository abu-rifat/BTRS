<div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       <li><a class="menuitem">Action List</a>
                            <ul class="submenu">
                                <li><a href="buslist.php">Bus List</a></li>
                                <li><a href="triplist.php">Trip List</a></li>
                                
                            </ul>
                        </li>
						
                         <li><a class="menuitem">Company</a>
                            <ul class="submenu">
                                 <li><a href="addcompany.php">Add New Company</a> </li>
<?php
    $query="select * from company";
    $blog_title=$db->select($query);
    if($blog_title){
    while($result = $blog_title->fetch_assoc()){
?>

                                <li><a href="page.php?pageid=<?php echo $result['C-ID']; ?>"><?php echo $result['C_Name']; ?></a> </li>
<?php } } ?>
                            </ul>
                        </li>
                        <li><a class="menuitem">Bus Model</a>
                            <ul class="submenu">
                                
                                <li><a href="addcat.php">Add Model</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Slider Option</a>
                            <ul class="submenu">
                                <li><a href="addslider.php">Add Slider</a>
                                <li><a href="sliderlist.php">Slider List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Route Option</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Route</a> </li>
                                <li><a href="postlist.php">Route List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>