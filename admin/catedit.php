<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; // Include Category Class ?> 

<?php
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){ // Get this id from catadd.php and take this on $id variable.
        echo "<script>window.location = 'catlist.php'; </script>"; // we transfer to catlist.php page
    }else {
        $id = $_GET['catid']; // Get this id from catadd.php and take this on $id variable.
    }
?>


<?php
    $cat = new Category(); // Create Object for Category Class and take this with one variable as $cat
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $catName = $_POST['catName']; // here i add our input filed name 

        $updateCat = $cat->catUpdate($catName,$id); // with this Category object i access one method. 
    }


?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
                <?php
                if(isset($updateCat)){ // showing this return $msg
                    echo $updateCat;
                }

                ?>

                <?php
                    $getCat = $cat->getCatById($id); // With category object i create one method with also id
                    if($getCat){
                        while($result = $getCat->fetch_assoc()){

                        

                ?>

                 <form action="" method="POST">
                     <?php // Adding form action and make this blank coz i want to work in the same page. and also add method as post ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['catName'];  ?>" class="medium" />
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