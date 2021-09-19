<?php  
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
        
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

        public function getcopyById(){
            $query = "SELECT * FROM tbl_copy ";
            $result = $this->db->select($query);
            return $result;
        }

        public function footerUpdate($copyRight){
            $copyRight = $this->fm->validation($copyRight); // Validation for special Characters             
            $copyRight = mysqli_real_escape_string($this->db->link, $copyRight); // Validation for mysqli   
            
            if(empty($copyRight)){
                $msg = "<span class='error'>Footer field must not be empty.</span>"; // validation for empty 
                return $msg;
            }else{
                $query = "UPDATE tbl_copy
                SET 
                copyRight = '$copyRight'
                WHERE id = '1' ";

                $update_row = $this->db->update($query);
                if($update_row){
                    $msg = "<span class='success'>Footer Updated Succesfully.</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Footer Not Updated.</span>";
                    return $msg;
                }
            }
        }

        public function getsocialById(){
            $query = "SELECT * FROM tbl_copy ";
            $result = $this->db->select($query);
            return $result;
        }

        public function socialUpdate($fb,$tw,$ln,$gp){
            $fb = $this->fm->validation($fb); // Validation for special Characters             
            $tw = $this->fm->validation($tw); // Validation for special Characters             
            $ln = $this->fm->validation($ln); // Validation for special Characters             
            $gp = $this->fm->validation($gp); // Validation for special Characters             
            
            $fb = mysqli_real_escape_string($this->db->link, $fb); // Validation for mysqli   
            $tw = mysqli_real_escape_string($this->db->link, $tw); // Validation for mysqli   
            $ln = mysqli_real_escape_string($this->db->link, $ln); // Validation for mysqli   
            $gp = mysqli_real_escape_string($this->db->link, $gp); // Validation for mysqli   
            

            if(empty($fb)){
                $msg = "<span class='error'>Social field must not be empty.</span>"; // validation for empty 
                return $msg;
            }else{
                $query = "UPDATE tbl_social
                SET 
                fb = '$fb',
                tw = '$tw',
                ln = '$ln',
                gp = '$gp'

                WHERE id = '1' ";

                $update_row = $this->db->update($query);
                if($update_row){
                    $msg = "<span class='success'>Social Updated Succesfully.</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Social Not Updated.</span>";
                    return $msg;
                }
        }
    }
}

?>