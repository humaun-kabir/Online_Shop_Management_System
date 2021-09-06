<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';

?>

<?php
    class Brand{
        private $db; // I crate Property for Database Class
        private $fm; // I crate Property for Format Class  

        public function __construct()
        {
            $this->db = new Database(); // I crate Object for Database Class
            $this->fm = new Format(); // I crate Object for Format Class  
        }

        public function brandInsert($brandName){ // Our method with id 
            $brandName = $this->fm->validation($brandName); // Validation for special Characters             
            $brandName = mysqli_real_escape_string($this->db->link, $brandName); // Validation for mysqli   
            
            if(empty($brandName)){
                $msg = "Brand Field must not be empty"; // validation for empty 
                return $msg;
            }else{
                $query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')"; // else its will insert data in to the database with insert query.
                
                $brandinsert = $this->db->insert($query);
                if($brandinsert){
                    $msg = "<span class='success'>Brand Inserted Succesfully.</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Brand Not Inserted.</span>";
                    return $msg;
                }
            }
        }
    }

?>