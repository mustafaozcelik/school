<html>
<head>
<meta charset="utf-8">
<title>Ögrenci Kayıt</title>
</head>
 
<body>
<left><p>Ögrenci Kaydet</p></left>
<form id="form1" name="form1" method="post">
<table width="259" border="0" align="left"
<tbody>
<tr>
<td width="96">Ad</td>
<td width="153"><input type="text" name="name" id="name"></td>
</tr>
<tr>
<td>Soyad</td>
<td><input type="text" name='surname' id="surname"></td>
</tr>
<tr>
<td>TC NO</td>
<td><input type="text" name="tcno" id="TCNO" maxlength="11"></td>
</tr>
<tr>
<td>Kullanıcı Adı</td>
<td><input type="text" name='username' id="username"></td>
</tr>
<tr>
<td>Şifre</td>
<td><input type="password" name="password" id="password"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" id="submit" value="KAYDET"></td>
</tr>
</tbody>
</table>
</form>

<a href="liststudent.php">Kayıtlı Öğrencileri Listele </a>

</body>
</html>
<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];
//reguest type sadece post oldugunda çalışmasını saglıyoruz çünkü kaydet butonuna basıldıgında post istegi gonderilir
if($requestMethod=='POST'){
    session_start();
    include("../repository/studentRepository.php"); //veritabanını ekliyoruz
    
    // ögrenci kayıt formundan gelen degişkenleri okuyoruz

    $username=$_POST['username'];
    $password=$_POST['password'];

    $tcno=$_POST['tcno'];
    $name=$_POST['name'];
    $surname=$_POST['surname'];

    addStudent($name,$surname,$tcno,$username,$password);

    //Git deneme
    
   



}
?>
