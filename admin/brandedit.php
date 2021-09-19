<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php'; // Include Brand Class ?> 

<?php
    if(!isset($_GET['brandid']) || $_GET['brandid'] == NULL){ // Get this id from catadd.php and take this on $id variable.
        echo "<script>window.location = 'brandlist.php'; </script>"; // we transfer to catlist.php page
    }else {
        $id = $_GET['brandid']; // Get this id from catadd.php and take this on $id variable.
    }
?>


<?php
    $brand = new Brand(); // Create Object for Category Class and take this with one variable as $cat
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brandName = $_POST['brandName']; // here i add our input filed name 

        $updateBrand = $brand->brandUpdate($brandName,$id); // with this Category object i access one method. 
    }
?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
                <?php
                if(isset($updateBrand)){ // showing this return $msg
                    echo $updateBrand;
                }

                ?>

                <?php
                    $getBrand = $brand->getUpdateById($id); // With category object i create one method with also id
                    if($getBrand){
                        while($result = $getBrand->fetch_assoc()){

                ?>

                 <form action="" method="POST">
                     <?php // Adding form action and make this blank coz i want to work in the same page. and also add method as post ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo $result['brandName'];  ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php } } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>