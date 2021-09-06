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

        public function getAllBrand(){
            $query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function getUpdateById($id){
            $query = "SELECT * FROM tbl_brand WHERE brandId = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function brandUpdate($brandName,$id){
            $brandName = $this->fm->validation($brandName); // Validation for special Characters             
            $brandName = mysqli_real_escape_string($this->db->link, $brandName); // Validation for mysqli   
            $id = mysqli_real_escape_string($this->db->link, $id);
            
            if(empty($brandName)){
                $msg = "<span class='error'>Brand field must not be empty.</span>"; // validation for empty 
                return $msg;
            }else{
                $query = "UPDATE tbl_brand
                SET 
                brandName = '$brandName'
                WHERE brandId = '$id' ";

                $update_row = $this->db->update($query);
                if($update_row){
                    $msg = "<span class='success'>Brand Updated Succesfully.</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Brand Not Updated.</span>";
                    return $msg;
                }
            }
        }

        public function delBrandById($id){
            $query = "DELETE FROM tbl_brand WHERE brandId = '$id' ";
            $branddeldata = $this->db->delete($query);
            if($branddeldata){
                $msg = "<span class='success'>Brand Deleted Succesfully.</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Brand Not Deleted.</span>";
                return $msg;
            }
        }
    }

?>