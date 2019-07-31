<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];
//reguest type sadece post oldugunda çalışmasını saglıyoruz çünkü kaydet butonuna basıldıgında post istegi gonderilir
if($requestMethod=='POST'){
    session_start();
    include("../repository/studentRepository.php"); //veritabanını ekliyoruz
    
    // hangi ögrenciyi silecegimizi anlamak için get query paramatresi olarak bize geçilen studentid degereini okuyoruz 
    $student_id=$_GET['studentid'];
    

    //ögrenci tablosundan veri silmek için kullanıcagımız query
    addStudentById($student_id);
    header("location: liststudent.php"); // Redirecting To Other Page
}