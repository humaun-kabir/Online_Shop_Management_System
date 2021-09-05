<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; // Include Category Class ?>

<?php

	$cat = new Category(); // Create Object for Category Class and take this with one variable as $cat


?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
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
					$getCat = $cat->getAllCat(); // with this category object i access this method getAllCat() 
					if($getCat){ // if condition start from here 
						$i = 0;
						while($result = $getCat->fetch_assoc()){ // while loop start from here.
						$i++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['catName']; ?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catId']; ?>">Edit</a> || <a href="">Delete</a></td>
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

