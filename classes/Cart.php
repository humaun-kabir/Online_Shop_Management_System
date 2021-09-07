<?php  
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
        
?>

<?php
    class Cart{

        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function addToCart($quantity,$id){
            $quantity = $this->fm->validation($quantity); // Validation for special Characters             
            $quantity = mysqli_real_escape_string($this->db->link, $quantity); // Validation for mysqli   
            $productId = mysqli_real_escape_string($this->db->link, $id);
            $sId = session_id();
        
            $query = "SELECT * FROM tbl_product WHERE productId = '$productId'";
            $result = $this->db->select($query)->fetch_assoc();

            $productName = $result['productName'];
            $price = $result['price'];
            $image = $result['image'];

            $query = "INSERT INTO tbl_cart(sId, productId, productName, price, quantity, image)
                        VALUES('$sId','$productId','$productName','$price','$quantity','$image')";

                        $inserted_row = $this->db->insert($query);
                        if($inserted_row){
                            header("Location:cart.php");
                        }else{
                            header("Location:404.php");
                        }
        }

        public function getCartProduct(){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
            $result = $this->db->select($query);
            return $result;
        }
    }

?>