<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php'; // Include Brand Class ?>

<?php

	$brand = new Brand(); // Create Object for Category Class and take this with one variable as $cat
	/*
    if(isset($_GET['delcat'])){
		$id = $_GET['delcat']; // get this delcat Id and take this on $id variable 
		$delCat = $cat->delCatById($id); //With Category class object i access method with id  
	}
    */

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block"> 
					
				<?php
				if(isset($delCat)){
					echo $delCat;
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
					$getBrand = $brand->getAllBrand(); // with this category object i access this method getAllCat() 
					if($getBrand){ // if condition start from here 
						$i = 0;
						while($result = $getBrand->fetch_assoc()){ // while loop start from here.
						$i++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brandName']; ?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brandId']; ?>">Edit</a> ||
							 <a onclick="return confirm('Are you sure to delete')" href="?delbrand=<?php echo $result['brandId']; ?>">Delete</a></td>
						</tr>
						
						<?php } }  // Close if condition and while loop. ?>
						
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

