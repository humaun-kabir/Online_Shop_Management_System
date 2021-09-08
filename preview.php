<?php include 'inc/header.php'; ?>

<?php
    if(!isset($_GET['proid']) || $_GET['proid'] == NULL){ // Get this id from catadd.php and take this on $id variable.
        echo "<script>window.location = '404.php'; </script>"; // we transfer to catlist.php page
    }else {
        $id = $_GET['proid']; // Get this id from catadd.php and take this on $id variable.
    }
?>


<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $quantity = $_POST['quantity']; // here i add our input filed name 

        $addCart = $ct->addToCart($quantity,$id); // with this Category object i access one method. 
    }

?>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">	
					
				<?php
				$getPd = $pd->getSingleProduct($id);
				if($getPd){
					while($result = $getPd->fetch_assoc()){					

				?>
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']; ?></h2>
					<p><?php echo $fm->textShorten($result['body'], 200); ?></p>					
					<div class="price">
						<p>Price: <span>$<?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						<p>Brand:<span><?php echo $result['brandName']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Add to Cart"/>
					</form>				
				</div>
				<span style="color: red; font-size: 18px;">
				<?php
				if(isset($addCart)){
					echo $addCart;
				}

				?>
				</span>

			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $result['body']; ?>
	    </div>

		<?php } } ?>
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>

					<?php 
						$getCat = $cat->getAllCat(); // Create this method in Category.php class 
						if ($getCat) {
						while ($result = $getCat->fetch_assoc()) {
									
						?> 
						<li><a href="productbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
						<?php }  }  ?> // End of if condition and while loop
										
						</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
   
<?php include 'inc/footer.php'; ?>