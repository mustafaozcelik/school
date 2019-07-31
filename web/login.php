<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GİRİŞ</title>
</head>
 
<body>
<center><p>GİRİŞ</p></center>
<form id="form1" name="form1" method="post">
<table width="259" border="0" align="center">
<tbody>
<tr>
<td width="96">Kullanıcı Adı</td>
<td width="153"><input type="text" name="username" id="username"></td>
</tr>
<tr>
<td>Şifre</td>
<td><input type="password" name="password" id="password"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" id="submit" value="GİRİŞ"></td>
</tr>
</tbody>
</table>
</form><center><a href="kayit.php"><br>
KAYIT OL</a></center>
</body>
</html>
<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod=='POST'){
    session_start();
    include("../repository/studentRepository.php"); //veritabanını ekliyoruz
    
    // giriş formundan gelen kullanıcı adı (kuladi) ve şifre(sifre) değişkenlere atıyoruz
    $username=$_POST['username'];
    $password=$_POST['password'];


    $rows=getStudentByUsernameAndPassword($username,$password);

    //kullanıcı adı ve şifeyi sorguluyoruz
  if ($rows<>NULL){
        $studentId=$rows[0]['id'];
        $_SESSION['username'] = $username; // Initializing Session
        $_SESSION['studentId']= $studentId;
        header("location: home.php"); // Redirecting To Other Page
        echo "<center>Login Başarılı</center>";
        }else{
            echo "<center>Şifreniz veya Kullanıcı adınız yanlış</center>";
        }
    
    }


?>