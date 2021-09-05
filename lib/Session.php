<?php
    //Session class
    class Session{
        public static function init(){
            session_start();
        }

        public static function set($key, $val){
            $_SESSION[$key] = $val;
        }

        public static function get($key){
            if(isset($_SESSION[$key])){
                return $_SESSION[$key];
            }else{
                return false;
            }
        }

        public static function checkSession(){
            self::init();
            if(self::get("adminlogin") == false){
                self::destroy(); // I added this when is will false then its will be apply selt::destroy method
                header("Location:login.php");
            }
        }

        public static function checkLogin(){
            self::init(); // Here i stat this session with init method
            if(self::get("adminlogin") == true){
                header("Location:dashbord.php");
            }
        }

        public static function destroy(){
            session_destroy();
            header("Location:login.php");
        }
    }

?>