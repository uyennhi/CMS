<?php
    class blog{
        var $id;
        var $tieude ;
        var $noidung;
        var $loai;
        var $anh;
        function __construct($id,$tieude,$noidung,$loai,$anh){
            $this->id=$id;
            $this->tieude=$tieude;
            $this->noidung=$noidung;
            $this->loai = $loai;
            $this->anh=$anh;
        }
      
     
         static function getListBlogFromDB(){
            //bước 1: mở kết nối vs db
            $conn = new mysqli("localhost","root","","simplecms")  ;    
            $conn->set_charset("utf8");
            if($conn->connect_error)
              die("kết nối thất bại. Chi tiết lỗi".$conn->connect_error);
            // bước 2: thao tác với db
             //
             $query = "SELECT * FROM blog ";
             $result = $conn->query($query);
             $rs = array();
             if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    array_push($rs,new blog(
                        $row["id"],
                        $row["tieude"],
                        $row["noidung"],
                        $row["loai"],
                        $row["anh"]
                     )
                    );
                }
             }
            //bước 3 : đóng kết nối db
            $conn->close();
            ksort($rs);
            return  $rs;
        }


        static function getidBlogFromDB($id){
            //bước 1: mở kết nối vs db
            $conn = new mysqli("localhost","root","","simplecms")  ;    
            $conn->set_charset("utf8");
            if($conn->connect_error)
              die("kết nối thất bại. Chi tiết lỗi".$conn->connect_error);
            // bước 2: thao tác với db
             //
             $query = "SELECT * FROM blog where id= $id";
             $result = $conn->query($query);
             $rs = array();
             if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    array_push($rs,new blog(
                        $row["id"],
                        $row["tieude"],
                        $row["noidung"],
                        $row["loai"],
                        $row["anh"]
                     )
                    );
                }
             }
            //bước 3 : đóng kết nối db
            $conn->close();
            ksort($rs);
            return  $rs;
        }
        

        static function deleteBlogFromDB($id){
            //bước 1: mở kết nối vs db
            $conn = new mysqli("localhost","root","","simplecms")  ;    
            $conn->set_charset("utf8");
            if($conn->connect_error)
              die("kết nối thất bại. Chi tiết lỗi".$conn->connect_error);
            // bước 2: thao tác với db
             //
             $query = "DELETE FROM blog WHERE id=$id";
            if ($conn->query($query) === TRUE) {
                echo '<script language="javascript">';
                echo 'alert("Đã xóa thành công")';
                echo '</script>';
            
            exit;
            } else {
            echo "Error: " .$query . "<br>" . $conn->error;
            }
                        //bước 3 : đóng kết nối db
            $conn->close();
        }
         
           // static function getSoLuongRow(){
           //    $rs = self::getListFromDB();
           //    return  count($rs);
           // }
        //     static function getListFromDBPage($page,$limit){
        //       $rs = self::getListBanhBa();
        //       $l = count($rs);
        //       $start = ($page-1)*$limit;
        //       if(($start+$limit)>$l)
        //          $limit = $l;
        //        else
        //           $limit = $start+$limit;
        //       $rs2 = array();
        //       for($i=$start; $i < $limit; $i++) { 
        //          array_push($rs2,$rs[$i]);
        //        }
        //       return $rs2;
        // }
       
        }
?>