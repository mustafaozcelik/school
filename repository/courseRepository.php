<?php

    function getAllCourses(){
        include("dbconnection.php"); //veritabanını ekliyoruz
     
        //Tüm ögrencilerin listesini çekiyoruz
        $sql="SELECT * FROM course";
        $stmt=$dbconnection->prepare($sql);
        if($stmt){
            $stmt->execute();
            $result=$stmt->get_result();
            return $result;
        }else{
            echo "Database error".$dbconnection->error;
        }   

     }

     function deleteCourseById($courseId){
        include("dbconnection.php"); //veritabanını ekliyoruz

        //ögrenci tablosundan veri silmek için kullanıcagımız query
        $sql="delete from course where id=?";
        $stmt=$dbconnection->prepare($sql);
        if($stmt){
            $stmt->bind_param( "i" ,$courseId);
            $stmt->
            $stmt->execute();
            $result=$stmt->get_result();
        }else{
            echo "Database error".$dbconnection->error;

        }
    }
    
    function addCourse($name,$code,$kredi){
        
        include("dbconnection.php");

        $sql="insert into course(name,code,kredi) values(?,?,?)";
        $stmt=$dbconnection->prepare($sql);
        if($stmt){
  
            $stmt->bind_param("ssi",$name,$code,$kredi);
            $stmt->execute();
            //$result=$stmt->get_result();
            //var_dump($result); 
        }else{
            echo "Database error".$dbconnection->error;
        }
    }
   f
            
    


    
    
?>

  