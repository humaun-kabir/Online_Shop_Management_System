<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php'; ?>

<?php
    $brand = new Brand(); // Create Object for Category Class and take this with one variable as $cat
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $copyRight = $_POST['copyright']; // here i add our input filed name 

        $updatefooter = $brand->footerUpdate($copyRight); // with this Category object i access one method. 
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
        <?php
            if(isset($updatefooter)){
                echo $updatefooter;
            }
        ?>
        <div class="block copyblock"> 

        <?php
            $brand = new Brand();
            $getcopy = $brand->getcopyById(); // With category object i create one method with also id
            if($getcopy){
                while($result = $getcopy->fetch_assoc()){

        ?>

         <form action=" " method="post" >
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" value="<?php echo $result['copyright']; ?>" name="copyright" class="large" />
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