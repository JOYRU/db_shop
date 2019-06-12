<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

 <?php include '../classess/Brand.php'; ?>


 <?php
   
    $brand = new Brand() ; 
    if(isset($_GET['delbrand'])){
    	$id = $_GET['delbrand'] ; 
    	$delBrand = $brand->delBrandById($id); 
    }
    $getBrand=$brand->getAllBrand() ; 
?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">  

                <?php 
                   if(isset($delBrand)){
                   	echo $delBrand ; 
                   }


                ?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php

                        if($getBrand){
                            $i = 0 ; 
                        	while($value=$getBrand->fetch_assoc()){

                                $i++; ?>
						       <tr class="odd gradeX">
							   <td><?php echo $i ; ?></td>
							   <td><?php echo $value['brandName']; ?></td>
							   <td><a href="brandedit.php?brandid=<?php  echo $value['brandId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete?')" href="?delbrand=<?php  echo $value['brandId']; ?>">Delete</a></td>
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

