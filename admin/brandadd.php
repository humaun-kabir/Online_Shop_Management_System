<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php'; // Include Brand Class ?> 

<?php
    $brand = new Brand(); // Create Object for Category Class and take this with one variable as $cat
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brandName = $_POST['brandName']; // here i add our input filed name 

        $insertBrand = $brand->brandInsert($brandName); // with this Category object i access one method. 
    }


?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
                <?php
                if(isset($insertBrand)){ // showing this return $msg
                    echo $insertBrand;
                }

                ?>

                 <form action="" method="POST">
                     <?php // Adding form action and make this blank coz i want to work in the same page. and also add method as post ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>