<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];
//reguest type sadece post oldugunda çalışmasını saglıyoruz çünkü kaydet butonuna basıldıgında post istegi gonderilir
if($requestMethod=='POST'){
    session_start();
    include("../repository/studentRepository.php"); //veritabanını ekliyoruz
    
   
    $student_id=$_GET['studentid'];
    

    
    getStudentByUsernameAndPasswordBy($student_id);
    header("location: liststudent.php"); 
}