﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

 <?php include '../classess/Category.php'; ?>


 <?php
   
    $cat = new Category() ; 
    if(isset($_GET['delcate'])){
    	$id = $_GET['delcate'] ; 
    	$delCate = $cat->delCatById($id) ; 
    }
    $getCat=$cat->getAllCat() ; 
?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">  

                <?php 
                   if(isset($delCate)){
                   	echo $delCate ; 
                   }


                ?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php

                        if($getCat){
                            $i = 0 ; 
                        	while($value=$getCat->fetch_assoc()){

                                $i++; ?>
						       <tr class="odd gradeX">
							   <td><?php echo $i ; ?></td>
							   <td><?php echo $value['catName']; ?></td>
							   <td><a href="catedit.php?catid=<?php  echo $value['catId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete?')" href="?delcate=<?php  echo $value['catId']; ?>">Delete</a></td>
						       </tr>
                        <?php } } ; ?>

						
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

