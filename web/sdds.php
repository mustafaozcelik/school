<?php

session_start();
include("../dbconnection.php"); //veritabanını ekliyoruz

$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod=='GET'){
    //Request methodu GET ise

    //Hangi kursun update edildiği bilgisini öğrenmek için courseid değerini okuyoruz

    $course_id=$_GET["courseid"];

    //veritabanına ögrenci bilgilerini girmek için gerekli sql hazırlıyoruz
    $sql="select * from course where id=?";

    $stmt=$dbconnection->prepare($sql);
    if($stmt){
        $stmt->bind_param("i",$course_id);
        $stmt->execute();
        $result=$stmt->get_result();

        if($result->num_rows >0)
         {
        
          $rows=$result->fetch_all(MYSQLI_ASSOC);
          $course=$rows[0];

         }
        //var_dump($result); 
        //header("location: listcourse.php");
       
    }else{
        echo "Database error".$dbconnection->error;
        //header("location: listcourse.php");
    }
?>

<html>
<head>
<meta charset="utf-8">
<title>Ders Güncelleme</title>
</head>
 
<body>
<left><p>Ders  Güncelleme</p></left>
<form id="form1" name="form1" method="post">
<table width="259" border="0" align="left"
<tbody>
<tr>
<td width="96">name</td>
<td width="153"><input type="text" name="name" id="name" value="<?php echo $course['name'] ?>"></td>
</tr>
<tr>
<td>code</td>
<td><input type="text" name='code' id="code" value="<?php echo $course['code'] ?>"></td>
</tr>
<tr>
<td>kredi</td>
<td><input type="text" name="kredi" id="kredi" maxlength="11" value="<?php echo $course['kredi'] ?>"></td>
</tr>
<tr>
<td><input type="submit" name="submit" id="submit" value="KAYDET"></td>
</tr>
</tbody>
</table>
</form>

<a href="listcourse.php">Kayıtlı Dersleri  Listele </a>

</body>
</html>
<?php
    }
?>
    
<?php

//reguest type sadece post oldugunda çalışmasını saglıyoruz çünkü kaydet butonuna basıldıgında post istegi gonderilir
if($requestMethod=='POST'){
   
    
    // ögrenci kayıt formundan gelen degişkenleri okuyoruz


    $course_id=$_GET['courseid'];


    

    $code=$_POST['code'];
    $kredi=$_POST['kredi'];
    $name=$_POST['name'];


    //veritabanına ögrenci bilgilerini girmek için gerekli sql hazırlıyoruz
    $sql="UPDATE course SET name='$name',  code='$code', kredi='$kredi'  WHERE  id='$course_id'";
 

    $stmt=$dbconnection->prepare($sql);
    if($stmt){
        $stmt->bind_param("sis",$code,$kredi,$name);
        $stmt->execute();
        //$result=$stmt->get_result();
        //var_dump($result); 
        header("location: listcourse.php");
       
    }else{
        echo "Database error".$dbconnection->error;
        //header("location: listcourse.php");
    }
    
}


?>