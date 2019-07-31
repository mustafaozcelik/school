<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];
//reguest type sadece post oldugunda çalışmasını saglıyoruz çünkü kaydet butonuna basıldıgında post istegi gonderilir
if($requestMethod=='GET'){
    session_start();
    include("../repository/courseRepository.php"); //veritabanını ekliyoruz
    
    // hangi ögrenciyi silecegimizi anlamak için get query paramatresi olarak bize geçilen studentid degereini okuyoruz 


  

    $course_id=$_GET['courseid'];
    

  
        //$result=$stmt->get_result();
        //var_dump($result); 
        deleteCourseById($course_id);
        header("location: listcourse.php"); // Redirecting To Other Page
       
 
   
    }

