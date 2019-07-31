<?php

    function getAllStudents(){
        include("dbconnection.php"); //veritabanını ekliyoruz
     
        //Tüm ögrencilerin listesini çekiyoruz
        $sql="SELECT * FROM student";
        $stmt=$dbconnection->prepare($sql);
        if($stmt){
            $stmt->execute();
            $result=$stmt->get_result();
            return $result;
        }else{
            echo "Database error".$dbconnection->error;
        }   

     }

     function deleteStudentById($studentId){
        include("dbconnection.php"); //veritabanını ekliyoruz

        //ögrenci tablosundan veri silmek için kullanıcagımız query
        $sql="delete from student where id=?";
        $stmt=$dbconnection->prepare($sql);
        if($stmt){
            $stmt->bind_param( "i" ,$studentId);
            $stmt->execute();
        }else{
            echo "Database error".$dbconnection->error;

        }
    }
    function UpdateStudentById($studentId){
        include("dbconnection.php"); //veritabanını ekliyoruz

        $sql="Update student set name='$name',surname='$surname',tcno='$tcno' ,username='$username',password='$password'";
        $stmt=$dbconnection->prepare($sql);
        if($stmt){
            $stmt->bind_param( "i" ,$studentId);
            $stmt->execute();
        }else{
            echo "Database error".$dbconnection->error;

        }
    }
    
    function addStudent($name,$surname,$TCNO,$username,$password){
        
        include("dbconnection.php");

        $sql="insert into student(name,surname,tcno,username,password) values(?,?,?,?,?)";
        $stmt=$dbconnection->prepare($sql);
        if($stmt){
  
            $stmt->bind_param("sssss",$name,$surname,$TCNO,$username,$password);
            $stmt->execute();
            //$result=$stmt->get_result();
            //var_dump($result); 
        }else{
            echo "Database error".$dbconnection->error;
        }
        
    
    function getStudentByUsernameAndPassword($username,$password){
        include("dbconnection.php");
        $sql="SELECT * FROM student WHERE username=? and password=?";
        $stmt=$dbconnection->prepare($sql);
        if($stmt){
            $stmt->bind_param("ss",$username,$password);
            $stmt->execute();
            $result=$stmt->get_result();
            
            //Eğer sorgulanan kullanıcı adı var ise bir oturum oluşturup home.php ye yönlendiriyoruz
            //Yok ise hata verdiriyoruz.
            
            if($result->num_rows == 1){
        
             $rows=$result->fetch_all(MYSQLI_ASSOC);
             return $rows;
            }else{
                return NULL;
             
        
               
            }
        }
    else{
            echo "Database error".$dbconnection->error;
        }
    }
  

}



    
    ?>