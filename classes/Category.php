<?php
    include '../lib/Database.php'; // Include Database Class 
    include '../helpers/Format.php'; // Include Format Class 
?>

<?php
    //Category class
    class Category{
        private $db; // Create one Property for Database Class
        private $fm; // Create one Property for Format Class

        public function __construct()
        {
            $this->db = new Database(); // Create one Object for Database Class
            $this->fm = new Format(); // Create one Property for Object Class
        }

        public function catInsert($catName){
            $catName = $this->fm->validation($catName); // Validation for special Characters             
            $catName = mysqli_real_escape_string($this->db->link, $catName); // Validation for mysqli   
            
            if(empty($catName)){
                $msg = "Category Field must not be empty"; // validation for empty 
                return $msg;
            }else{
                $query = "INSERT INTO tbl_category(catName) VALUES('$catName')"; // else its will insert data in to the database with insert query.
                
                $catinsert = $this->db->insert($query);
                if($catinsert){
                    $msg = "<span class='success'>Category Inserted Succesfully.</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Category Not Inserted.</span>";
                    return $msg;
                }
            }
        }

        public function getAllCat(){
            $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function getCatById($id){
            $query = "SELECT * FROM tbl_category WHERE catId = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function catUpdate($catName,$id){
            $catName = $this->fm->validation($catName); // Validation for special Characters             
            $catName = mysqli_real_escape_string($this->db->link, $catName); // Validation for mysqli   
            $id = mysqli_real_escape_string($this->db->link, $id);
            
            if(empty($catName)){
                $msg = "<span class='error'>Category field must not be empty.</span>"; // validation for empty 
                return $msg;
            }else{
                $query = "UPDATE tbl_category
                SET 
                catName = '$catName'
                WHERE catId = '$id' ";

                $update_row = $this->db->update($query);
                if($update_row){
                    $msg = "<span class='success'>Category Updated Succesfully.</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Category Not Updated.</span>";
                    return $msg;
                }
            }
        }

        public function delCatById($id){
            $query = "DELETE FROM tbl_category WHERE catId = '$id' ";
            $deldata = $this->db->delete($query);
            if($deldata){
                $msg = "<span class='success'>Category Deleted Succesfully.</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Category Not Deleted.</span>";
                return $msg;
            }
        }
    }

?>