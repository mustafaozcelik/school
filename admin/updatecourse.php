<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];
//reguest type sadece post oldugunda çalışmasını saglıyoruz çünkü kaydet butonuna basıldıgında post istegi gonderilir
if($requestMethod=='POST'){
    session_start();
    include("../repository/courseRepository.php"); //veritabanını ekliyoruz
    
    // hangi ögrenciyi silecegimizi anlamak için get query paramatresi olarak bize geçilen studentid degereini okuyoruz 
    $course_id=$_GET['courseid'];
    

    //ögrenci tablosundan veri silmek için kullanıcagımız query
    updateCourseById($course_id);
    header("location: listcourse.php"); // Redirecting To Other Page
}

