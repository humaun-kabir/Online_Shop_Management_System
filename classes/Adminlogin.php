<?php include '../lib/Session.php'; ?>
<?php Session::checkLogin(); // Here i just added our Session Method ?> 
<?php include_once '../lib/Database.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php
    //Adminlogin class
    class Adminlogin{

        private $db; // Database class property 
        private $fm; // Format class property

        public function __construct(){
            $this->db = new Database(); // Object for Database Class
            $this->fm = new Format(); // Object for Format Class

        }

        public function adminLogin($adminUser,$adminPass){
            //here i with this format class object i access the method
            $adminUser = $this->fm->validation($adminUser);
            //here i with this format class object i access the method
            $adminPass = $this->fm->validation($adminPass);

            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser); // our login field adminUser 
            $adminPass = mysqli_real_escape_string($this->db->link,$adminPass); // our login field adminPass 
            
            if(empty($adminUser) || empty($adminPass)){
                $loginmsg = "Username or Password must not be empty"; // I take one variable as $loginmsg 

                return $loginmsg;
            }else{
                // here will be our select query
                $query = "SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass' ";
                $result = $this->db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set("adminlogin",true);
                    Session::set("adminId", $value['adminId']);
                    Session::set("adminUser", $value['adminUser']);
                    Session::set("adminName", $value['adminName']);

                    header("Location:dashbord.php");
                }else{
                    $loginmsg = "Username or password not match";
                    return $loginmsg;
                }
            }
        }

    }

?>