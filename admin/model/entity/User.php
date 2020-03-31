<?php
    class User{
        var $password;
        var $fullName;
        function User($user,$password)
        {
            $this->username =$user;
            $this->password=$password;
        }
        Static function authentication($username,$password){
            $conn = new mysqli("localhost","root","","simplecms")  ;    
            $conn->set_charset("utf8");
            if($conn->connect_error)
              die("kết nối thất bại. Chi tiết lỗi".$conn->connect_error);
             $query = "SELECT * FROM user";
             $result = $conn->query($query);
             if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    if(strcmp($username, $row['username'])==0 && strcmp($password, $row['password'])==0){
                         return new User($username,$password);
                    }
                        
                }

            return null;

        }
    }
}
?>
